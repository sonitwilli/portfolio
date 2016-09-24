<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Models\Contact;
use Models\Contents;
use Models\MasterModel;
use Models\Orders;
use Models\Products;
use Models\Setting;
use Models\Languages;
use Response, Redirect, Session, Validator, DB, Auth;

class OrdersController extends Controller
{
    //

    private $table = "orders";

    public function getIndex() {
        return view("admin.products.orders.index", [
            'user' => Auth::user(),
            'active' => 'ecommerce',
            'sub_action' => 'order',
            'message' => Contact::where('publish', 0)->count(),
            'result' => Orders::RecursiveIndexAdmin()
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit($id)
    {
        $result = Orders::getDataById($id);
        return view("admin.products.orders.edit", [
            'user' => Auth::user(),
            'active' => 'ecommerce',
            'sub_action' => 'order',
            'message' => Contact::where('publish', 0)->count(),
            'result' => $result,
            'order_detail' => ($result->orderDetail)?$result->orderDetail:null,
            'billing' => ($result->userData)?$result->userData:null,
            'shipping' => ($result->shippingData)?$result->shippingData:null
        ]);
    }

    /**
     * Delete all item using checkbox, method post
     * @param Request $request
     * @return mixed
     */
    public function postDelete(Request $request)
    {
        if(!Auth::check() || Auth::user()->type != 1)
        {
            return Redirect::to('admin');
        }
        $id = $request->get('id');
        if(!empty($id)) {
            foreach ($id as $item)
            {
                Orders::find($item)->delete();
            }
        }
        Session::flash('delete','success');
        return Redirect::to('admin/products/orders');
    }
    
    public function getUpdateStatus(Request $request)
    {
        $id = $request->get('id');
        $value = $request->get('value');
        $check = Orders::find($id);
        if($check != null){
            MasterModel::CreateContent($this->table, ['publish' => $value], ['id' => $check->id]);
            if ($value == 0){
                $publish = "<i class='fa fa-refresh fa-spin'></i> Pending <span class=\"caret\"></span>";
            }
            if ($value == 1){
                $publish = "<i class='fa fa-archive'></i> Packaging <span class=\"caret\"></span>";
            }
            if ($value == 2){
                $publish = "<i class='fa fa-truck'></i> Delivery <span class=\"caret\"></span>";
            }
            if ($value == 3){
                $publish = "<i class='fa fa-check'></i> Complete <span class=\"caret\"></span>";
            }
            if ($value == 4){
                $publish = "<i class='fa fa-ban'></i> Canceled <span class=\"caret\"></span>";
            }
            return Response::json(['status' => 200, 'data' => $publish]);
        }
        return Response::json(['status' => 'error']);
    }

    /**
     * Delete item by id using method get
     * @param $id
     * @return mixed
     */
    public function getDelete($id)
    {
        if(!Auth::check() || Auth::user()->type != 1)
        {
            return Redirect::to('admin');
        }
        $check = Orders::find($id);
        if(count($check) > 0) {
            Orders::DeleteById($id);
        }
        Session::flash('delete','success');
        return Redirect::to('admin/products/orders');
    }
}
