<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = "orders";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerData()
    {
        return $this->belongsTo('Models\Users','user_id');
    }

    /***
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userData()
    {
        return $this->belongsTo('Models\UsersData', 'user_id');
    }

    /***
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shippingData()
    {
        return $this->hasOne('Models\UsersShipping', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderDetail()
    {
        return $this->hasMany('Models\OrderDetail', 'order_id');
    }

    public static function getDataById($id)
    {
        return self::with('orderDetail', 'customerData', 'shippingData', 'userData')->find($id);
    }

    public static function CreateOrder($input)
    {
        $order = new self;
        $order->user_id = $input['user_id'];
        $order->payment_id = $input['payment_id'];
        $order->qty = $input['qty'];
        $order->price = $input['price'];
        $order->publish = $input['publish'];
        $order->save();
        return $order;

    }

    /**
     * @param $id
     * Delete only one row
     */
    public static function DeleteById($id)
    {
        $check = self::find($id);
        if($check != null) {
            self::find($check->id)->delete();
        }
    }
    /**
     * @param string $rarr
     * @return string
     *
     */
    public static function RecursiveIndexAdmin($rarr = "")
    {
        $html = "";
        $query = self::with('customerData')->orderBy('publish', 'asc')->get();
        if($query != null){
            foreach ($query as $item){
                if ($item->publish == 0){
                    $style = "danger";
                    $publish = "<i class='fa fa-refresh fa-spin'></i> Pending ";
                }
                if ($item->publish == 1){
                    $style = "info";
                    $publish = "<i class='fa fa-archive'></i> Packaging";
                }
                if ($item->publish == 2){
                    $style = "default";
                    $publish = "<i class='fa fa-truck'></i> Delivery";
                }
                if ($item->publish == 3){
                    $style = "success";
                    $publish = "<i class='fa fa-check'></i> Complete";
                }
                if ($item->publish == 4){
                    $style = "danger";
                    $publish = "<i class='fa fa-ban'></i> Canceled";
                }
                $html .= "<tr>";
                $html .= "<td class=\"text-center\">";
                $html .= "<input type=\"checkbox\" id=\"checkbox-".$item->id ."\" name=\"id[]\" value=\"".$item->id."\">";
                $html .= "</td>";
                $html .= "<td><a href=\"".url('admin/products/orders/edit/'.$item->id)."\">OID.".$item->id."</a></td>";
                $html .= "<td><a href=\"".url('admin/products/orders/edit/'.$item->id)."\">".$item->customerData->name."</a></td>";
                $html .= "<td>".$item->qty."</td>";
                $html .= "<td>".number_format($item->price, 0, '.', ',')."</td>";
                $html .= "<td>
                                <div class=\"btn-group btn-group-sm\">
                                    <a href=\"javascript:void(0)\" class=\"btn btn-alt btn-sm btn-$style dropdown-toggle enable-tooltip\" data-toggle=\"dropdown\" title=\"Options\">".$publish." <span class=\"caret\"></span></a>
                                    <ul class=\"dropdown-menu dropdown-custom dropdown-menu-right\">
                                        <li>
                                            <a href=\"javascript:void(0)\" data-url='".url('admin/products/orders/update-status')."' data-id='".$item->id."' data-value='1' class='update-status-orders'><i class=\"fa fa-archive pull-right\"></i>Packaging</a>
                                        </li>
                                        <li class=\"divider\"></li>
                                        <li>
                                            <a href=\"javascript:void(0)\" data-url='".url('admin/products/orders/update-status')."' data-id='".$item->id."' data-value='2' class='update-status-orders'><i class=\"fa fa-truck fa-fw pull-right\"></i>Delivery</a>
                                        </li>
                                        <li class=\"divider\"></li>
                                        <li>
                                            <a href=\"javascript:void(0)\" data-url='".url('admin/products/orders/update-status')."' data-id='".$item->id."' data-value='3' class='update-status-orders'><i class=\"fa fa-check fa-fw pull-right\"></i>Complete</a>
                                        </li>
                                        <li class=\"divider\"></li>
                                        <li>
                                            <a href=\"javascript:void(0)\" data-url='".url('admin/products/orders/update-status')."' data-id='".$item->id."' data-value='4' class='update-status-orders'><i class=\"fa fa-ban fa-fw pull-right\"></i>Canceled</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>";
                $html .= "<td>".convertDateTime($item->created_at)."</td>";
                $html .= "<td class=\"text-center\">";
                $html .= "<div class=\"btn-group btn-group-xs\">";
                $html .= "<a href=\"".url('admin/products/orders/edit/'.$item->id)."\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-default\"><i class=\"fa fa-pencil\"></i></a>";
                $html .= HtmlDeleteRecord(url('admin/products/orders/delete/'.$item->id));
                $html .= "</div>";
                $html .= "</td>";
                $html .= "</tr>";
            }
        }
        return $html;
    }
}
