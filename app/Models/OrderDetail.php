<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = "order_detail";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productData()
    {
        return $this->belongsTo('Models\Products', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderData()
    {
        return $this->belongsTo('Models\Orders', 'order_id');
    }

    /**
     * @param $order_id
     * @param $data
     * create data
     */
    public static function CreateData($order_id, $data)
    {
        foreach ($data as $item)
        {
            $order_detail = new self;
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $item['item']['id'];
            $order_detail->product_name = $item['item']['name'];
            $order_detail->qty = $item['qty'];
            $order_detail->unit_cost = $item['item']['price'];
            $order_detail->price = $item['price'];
            $order_detail->save();
        }
        return;
    }

    /**
     * @param $where
     * delete multiple rows
     */
    public static function DeleteMultiple($where)
    {
        $check = self::where($where)->get();
        if(count($check) > 0)
        {
            foreach ($check as $item)
            {
                if ($item->images != null)
                {
                    deleteImage($item->images);
                    self::find($item->id)->delete();
                }
            }
        }
    }
}
