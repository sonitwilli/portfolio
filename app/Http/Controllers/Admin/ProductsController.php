<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Models\Contact;
use Models\Contents;
use Models\MasterModel;
use Models\Products;
use Models\Setting;
use Models\Languages;
use Response, Redirect, Session, Validator, DB, Auth;

class ProductsController extends Controller
{
    //
    private $content = "contents";

    private $table = "products";

    private $media = "media";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        return view("admin.products.preview.index", [
            'user' => Auth::user(),
            'active' => 'ecommerce',
            'sub_action' => 'products',
            'message' => Contact::where('publish', 0)->count(),
            'result' => Products::RecursiveIndexAdmin()
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
        return view("admin.products.preview.edit", [
            'user' => Auth::user(),
            'active' => 'ecommerce',
            'sub_action' => 'products',
            'action' => 'Create',
            'message' => Contact::where('publish', 0)->count(),
            'setting' => Setting::first(),
            'category' => Products::RecursiveMenu(0, 0, 0)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit($id)
    {
        $result = Products::getById($id);
        return view("admin.products.preview.edit", [
            'user' => Auth::user(),
            'active' => 'ecommerce',
            'sub_action' => 'products',
            'action' => 'Edit',
            'message' => Contact::where('publish', 0)->count(),
            'setting' => Setting::first(),
            'result' => $result,
            'category' => Products::RecursiveMenu(0, 0, (!empty($result))?$result->category_id:0)
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
        $check = Products::find($id);
        if(count($check) > 0) {
            Products::DeleteById($id);
        }
        Session::flash('delete','success');
        return Redirect::to('admin/products/list');
    }

    /**
     * edit status public or hidden
     * @param $id
     * @return mixed
     */
    public function getCheckStatus($type,$id)
    {
        $check = Products::find($id);
        if($check != null)
        {
            $hidden = "hidden";
            if($type == 'featured'){
                $hidden = "normal";
            }
            if ($check->$type == 1)
            {
                MasterModel::CreateContent($this->table,[$type => 0], ['id' => $id]);
                return Response::json(['status' => 200, 'result' => $hidden]);
            } else {
                MasterModel::CreateContent($this->table,[$type => 1], ['id' => $id]);
                return Response::json(['status' => 200, 'result' => $type]);
            }
        }
        return Response::json(['status' => 'error']);
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
        $check = Products::find($id);
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
                Products::DeleteById($item);
            }
        }
        Session::flash('delete','success');
        return Redirect::to('admin/products/list');
    }

    /**
     * check detect links
     * @param Request $request
     * @return mixed
     */
    public function getCheckLink(Request $request)
    {
        if($request->get('lang') == 'general') {
            $check = Products::where('slug',$request->get('slug'))->where('id','<>',$request->get('id'))->first();

        } else {
            $language_id = Languages::where('language',$request->get('lang'))->pluck('id');
            $check = Contents::where(['language_id' => $language_id, 'type' => 'products', 'slug' => $request->get('slug')])->where('product_id','<>',$request->get('id'))->first();
        }
        if($check == null){
            $slug = $request->get('slug');
        } else {
            $slug = Products::count()."-".$request->get('slug');
        }
        return Response::json(['status' => 200, 'result' => $slug]);
    }

    /**
     * Create or edit one item
     * @param Request $request
     * @return mixed
     */
    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $setting = Setting::getSetting();
        $id = $request->get('id');
        $data = array(
            'name' => $request->get('name'),
            'slug' => clearUnicode($request->get('slug')),
            'condition' => $request->get('condition'),
            'price' => formatPrice($request->get('price', false)),
            'qty' => (!empty($request->get('qty'))?$request->get('qty'):0),
            'sale' => (!empty($request->get('sale'))?$request->get('sale'):0),
            'content' => addslashes($request->get('content')),
            'description' => addslashes($request->get('description')),
            'order_by' => (!empty($request->get('order_by'))?$request->get('order_by'):0),
            'category_id' => (!empty($request->get('category'))?$request->get('category'):0),
            'publish' => ($request->get('publish') == 'on')?1:0,
            'featured' => ($request->get('featured') == 'on')?1:0,
            'created_at' => gmdate('Y-m-d H:i:s', time()),
            'updated_at' => gmdate('Y-m-d H:i:s', time())
        );
        if($id == 0) {
            $check = Products::where(['name' => $request->get('name'), 'slug' => $request->get('slug')])->first();
            if($check == null) {
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
                            'description' => addslashes($request->get('description'.$check_lang->language)),
                            'content' => addslashes($request->get('content'.$check_lang->language)),
                            'language_id' => $language_id,
                            'product_id' => $id,
                            'type' => 'products'
                        );
                        $check_contents = Contents::where(['product_id' => $id, 'language_id' => $language_id])->first();
                        if($check_contents == null){
                            MasterModel::CreateContent($this->content, $data_content);
                        } else {
                            MasterModel::CreateContent($this->content, $data_content, ['product_id' => $id, 'language_id' => $language_id]);
                        }
                    }
                }
            }
        }
        Session::flash('success','success');
        return Redirect::to('admin/products/edit/'.$id);
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
            'descriptions' => $request->get('meta-description'),
            'keywords' => $request->get('meta-keywords')
        );
        if($id == 0) {
            $check = Products::where(['name' => $request->get('name'), 'slug' => $request->get('slug')])->first();
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
                            'product_id' => $id,
                            'type' => 'products'
                        );
                        $check_contents = Contents::where(['product_id' => $id, 'language_id' => $language_id])->first();
                        if($check_contents == null){
                            MasterModel::CreateContent($this->content, $data_content);
                        } else {
                            MasterModel::CreateContent($this->content, $data_content, ['product_id' => $id, 'language_id' => $language_id]);
                        }
                    }
                }
            }
        }
        Session::flash('success','success');
        return Redirect::to('admin/products/edit/'.$id);
    }

    /**
     * upload images
     * @param Request $request
     */
    public function postAvatar(Request $request) {
        $id = $request->get('id');
        $file = $request->file('images');
        if ($file->isValid()) {
            $name = $file->getClientOriginalName();
            $name = getNameImage($name);
            $extension = $file->getClientOriginalExtension();
            $fileName = $name.'-'.time().'.'.$extension;

            $check = Products::find($id);
            if($check == null) {
                $path = putUploadImage($file, $fileName);
                MasterModel::CreateContent($this->table,['images' => $path]);
            } else {
                if($check->images != null){
                    deleteImage($check->images);
                }
                $path = putUploadImage($file, $fileName);
                MasterModel::CreateContent($this->table,['images' => $path], ['id' => $check->id]);
            }
        }

    }

    public function postMultipleImages(Request $request) {
        $id = $request->get('id');
        $files = $request->file('images');
        foreach ($files as $file){
            if ($file->isValid()) {
                $name = $file->getClientOriginalName();
                $name = getNameImage($name);
                $extension = $file->getClientOriginalExtension();
                $fileName = $name.'-'.time().'.'.$extension;

                $path = putUploadImage($file, $fileName);
                MasterModel::CreateContent($this->media,['images' => $path, 'type' => 'product', 'product_id' => $id]);
            }
        }

    }

    /**
     * Delete image
     * @param Request $request
     * @return mixed
     */
    public function postDeleteImage(Request $request) {
        $check = Products::find($request->get('id'));
        if($check != null){
            if($check->images != null) {
                deleteImage($check->images);
                MasterModel::CreateContent($this->table,['images' => null], ['id' => $check->id]);
            }
        }
        return Response::json(['status' => 200]);
    }
}
