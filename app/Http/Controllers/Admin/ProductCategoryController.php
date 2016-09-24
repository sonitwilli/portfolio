<?php

namespace App\Http\Controllers\Admin;

use Models\CategoryProducts;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Models\Contact;
use Models\Contents;
use Models\MasterModel;
use Models\Setting;
use Models\Languages;
use Response, Redirect, Session, Validator, Auth;

class ProductCategoryController extends Controller
{
    private $content = "contents";

    private $table = "category_products";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        return view("admin.products.category.index", [
            'user' => Auth::user(),
            'active' => 'ecommerce',
            'sub_action' => 'category',
            'message' => Contact::where('publish', 0)->count(),
            'result' => CategoryProducts::RecursiveMenuIndexAdmin()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        return view("admin.products.category.edit", [
            'user' => Auth::user(),
            'active' => 'ecommerce',
            'sub_action' => 'category',
            'action' => 'Create',
            'message' => Contact::where('publish', 0)->count(),
            'setting' => Setting::first(),
            'category' => CategoryProducts::RecursiveMenu(0, 0, 0)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit($id)
    {
        $result = CategoryProducts::getMenuById($id);
        return view("admin.products.category.edit", [
            'user' => Auth::user(),
            'active' => 'ecommerce',
            'sub_action' => 'category',
            'action' => 'Edit',
            'message' => Contact::where('publish', 0)->count(),
            'setting' => Setting::first(),
            'result' => $result,
            'category' => CategoryProducts::RecursiveMenu((!empty($result))?$result->id:0, 0, (!empty($result))?$result->parent_id:0)
        ]);
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
        $check = CategoryProducts::find($id);
        if(count($check) > 0) {
            CategoryProducts::DeleteById($id);
        }
        Session::flash('delete','success');
        return Redirect::to('admin/products/category');
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * Update order
     */
    public function getUpdateOrder(Request $request, $id)
    {
        $val = $request->get('val');
        $check = CategoryProducts::find($id);
        if($check != null)
        {
            MasterModel::CreateContent($this->table,['order_by' => $val], ['id' => $id]);
            return Response::json(['status' => 200,'result' => $val]);
        }
        return Response::json(['status' => 'error']);
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
                CategoryProducts::DeleteById($item);
            }
        }
        Session::flash('delete','success');
        return Redirect::to('admin/products/category');
    }

    /**
     * check detect links
     * @param Request $request
     * @return mixed
     */
    public function getCheckLink(Request $request)
    {
        if($request->get('lang') == 'general') {
            $check = CategoryProducts::where('slug',$request->get('slug'))->where('id','<>',$request->get('id'))->first();
        } else {
            $language_id = Languages::where('language',$request->get('lang'))->pluck('id');
            $check = Contents::where(['language_id' => $language_id, 'type' => 'category_product', 'slug' => $request->get('slug')])->where('category_product_id','<>',$request->get('id'))->first();
        }
        if($check == null){
            $slug = $request->get('slug');
        } else {
            $slug = CategoryProducts::count()."-".$request->get('slug');
        }
        echo $slug;
        return Response::json(['status' => 200, 'result' => $slug]);
    }

    /**
     * edit status public or hidden
     * @param $id
     * @return mixed
     */
    public function getCheckStatus($id)
    {
        $check = CategoryProducts::find($id);
        if($check != null)
        {
            if ($check->publish == 1)
            {
                MasterModel::CreateContent($this->table,['publish' => 0], ['id' => $id]);
                return Response::json(['status' => 200, 'result' => 'hidden']);
            } else {
                MasterModel::CreateContent($this->table,['publish' => 1], ['id' => $id]);
                return Response::json(['status' => 200, 'result' => 'publish']);
            }
        }
        return Response::json(['status' => 'error']);
    }

    /**
     * Create or edit one item
     * @param Request $request
     * @return mixed
     */
    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $setting = Setting::getSetting();
        $id = $request->get('id');
        $data = array(
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'order_by' => (!empty($request->get('order_by'))?$request->get('order_by'):0),
            'parent_id' => (!empty($request->get('parent_id'))?$request->get('parent_id'):0),
            'publish' => ($request->get('publish') == 'on')?1:0,
        );
        if($id == 0) {
            $check = CategoryProducts::where(['name' => $request->get('name'), 'slug' => $request->get('slug')])->first();
            if(count($check) == 0) {
                $id = MasterModel::CreateContent($this->table, $data);
            }
        } else {
            MasterModel::CreateContent($this->table, $data, ['id' => $id]);
        }
        if(count($setting)>0 && $setting->language != null){
            $language = explode(',',$setting->language);
            foreach ($language as $language_id){
                $check_lang = Languages::find($language_id);
                if($check_lang != null){
                    if($request->get('name'.$check_lang->language) != "") {
                        $data_content = array(
                            'name' => $request->get('name'.$check_lang->language),
                            'slug' => $request->get('slug'.$check_lang->language),
                            'language_id' => $language_id,
                            'category_product_id' => $id,
                            'type' => 'category_product'
                        );
                        $check_contents = Contents::where(['category_product_id' => $id, 'language_id' => $language_id])->first();
                        if($check_contents == null){
                            MasterModel::CreateContent($this->content, $data_content);
                        } else {
                            MasterModel::CreateContent($this->content, $data_content, ['category_product_id' => $id, 'language_id' => $language_id]);
                        }
                    }
                }
            }
        }
        Session::flash('success','success');
        return Redirect::to('admin/products/category/edit/'.$id);
    }

    /**
     * Create or edit google meta
     * @param Request $request
     * @return mixed
     */
    public function postMetaData(Request $request)
    {
        $setting = Setting::getSetting();
        $id = $request->get('id');
        $data = array(
            'title' => $request->get('meta-title'),
            'description' => $request->get('meta-description'),
            'keywords' => $request->get('meta-keywords')
        );
        if($id == 0) {
            $check = CategoryProducts::where(['name' => $request->get('name'), 'slug' => $request->get('slug')])->first();
            if(count($check) == 0) {
                $id = MasterModel::CreateContent($this->table, $data);
            }
        } else {
            MasterModel::CreateContent($this->table, $data, ['id' => $id]);
        }
        if(count($setting)>0 && $setting->language != null){
            $language = explode(',',$setting->language);
            foreach ($language as $language_id){
                $check_lang = Languages::find($language_id);
                if($check_lang != null){
                    if($request->get('title'.$check_lang->language) != "" || $request->get('description'.$check_lang->language)  != "" || $request->get('keywords'.$check_lang->language) != "") {
                        $data_content = array(
                            'title' => $request->get('title'.$check_lang->language),
                            'descriptions' => $request->get('description'.$check_lang->language),
                            'keywords' => $request->get('keywords'.$check_lang->language),
                            'language_id' => $language_id,
                            'category_product_id' => $id,
                            'type' => 'category_product'
                        );
                        $check_contents = Contents::where(['category_product_id' => $id, 'language_id' => $language_id])->first();
                        if($check_contents == null){
                            MasterModel::CreateContent($this->content, $data_content);
                        } else {
                            MasterModel::CreateContent($this->content, $data_content, ['category_product_id' => $id, 'language_id' => $language_id]);
                        }
                    }
                }
            }
        }
        Session::flash('success','success');
        return Redirect::to('admin/products/category/edit/'.$id);
    }
}
