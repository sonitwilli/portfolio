<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Models\Category;
use Models\Contact;
use Models\Contents;
use Models\MasterModel;
use Models\Setting;
use Models\Languages;
use Response, Redirect, Session, Validator, DB, Auth;

class CategoryController extends Controller
{
    //

    private $content = "contents";

    private $table = "categories";

    private $media = "media";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($type)
    {
        //
        return view("admin.article.category.index", [
            'user' => Auth::user(),
            'active' => $type.'_category',
            'message' => Contact::where('publish', 0)->count(),
            'type' => $type,
            'result' => Category::RecursiveIndexAdmin($type)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate($type)
    {
        //
        return view("admin.article.category.edit", [
            'user' => Auth::user(),
            'active' => $type.'_category',
            'action' => 'Create',
            'type' => $type,
            'message' => Contact::where('publish', 0)->count(),
            'setting' => Setting::first(),
            'category' => Category::RecursiveMenu(0, 0, 0)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit($type, $id)
    {
        $result = Category::getById($id);
        return view("admin.article.category.edit", [
            'user' => Auth::user(),
            'active' => $type.'_category',
            'action' => 'Edit',
            'type' => $type,
            'message' => Contact::where('publish', 0)->count(),
            'setting' => Setting::first(),
            'result' => $result,
            'category' => Category::RecursiveMenu(0, 0, (!empty($result))?$result->menu_id:0)
        ]);
    }

    /**
     * Delete item by id using method get
     * @param $id
     * @return mixed
     */
    public function getDelete($type, $id)
    {
        if(!Auth::check() || Auth::user()->type != 1)
        {
            return Redirect::to('admin');
        }
        $check = Category::find($id);
        if(count($check) > 0) {
            Category::DeleteById($id);
        }
        Session::flash('delete','success');
        return Redirect::to('admin/'.$type.'/category');
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * Update order
     */
    public function getUpdateOrder(Request $request, $type, $id)
    {
        $val = $request->get('val');
        $check = Category::find($id);
        if($check != null)
        {
            MasterModel::CreateContent($this->table,['order_by' => $val], ['id' => $id]);
            return Response::json(['status' => 200,'result' => $val]);
        }
        return Response::json(['status' => 'error']);
    }

    /**
     * edit status public or hidden
     * @param $id
     * @return mixed
     */
    public function getCheckStatus($type, $id)
    {
        $check = Category::find($id);
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
     * Delete all item using checkbox, method post
     * @param Request $request
     * @return mixed
     */
    public function postDelete(Request $request, $type)
    {
        if(!Auth::check() || Auth::user()->type != 1)
        {
            return Redirect::to('admin');
        }
        $id = $request->get('id');
        if(!empty($id)) {
            foreach ($id as $item)
            {
                Category::DeleteById($item);
            }
        }
        Session::flash('delete','success');
        return Redirect::to('admin/'.$type.'/category');
    }

    /**
     * check detect links
     * @param Request $request
     * @return mixed
     */
    public function getCheckLink(Request $request)
    {
        if($request->get('lang') == 'general') {
            $check = Category::where('slug',$request->get('slug'))->where('id','<>',$request->get('id'))->first();

        } else {
            $language_id = Languages::where('language',$request->get('lang'))->pluck('id');
            $check = Contents::where(['language_id' => $language_id, 'type' => 'category', 'slug' => $request->get('slug')])->where('category_id','<>',$request->get('id'))->first();
        }
        if($check == null){
            $slug = $request->get('slug');
        } else {
            $slug = Category::count()."-".$request->get('slug');
        }
        return Response::json(['status' => 200, 'result' => $slug]);
    }

    /**
     * Create or edit one item
     * @param Request $request
     * @return mixed
     */
    public function postCreate(Request $request, $type)
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
            'menu_id' => (!empty($request->get('parent_id'))?$request->get('parent_id'):0),
            'publish' => ($request->get('publish') == 'on')?1:0,
            'featured' => ($request->get('featured') == 'on')?1:0,
            'type' => $type
        );
        if($id == 0) {
            $check = Category::where(['name' => $request->get('name'), 'slug' => $request->get('slug')])->first();
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
                            'language_id' => $language_id,
                            'category_id' => $id,
                            'type' => 'category'
                        );
                        $check_contents = Contents::where(['category_id' => $id, 'language_id' => $language_id])->first();
                        if($check_contents == null){
                            MasterModel::CreateContent($this->content, $data_content);
                        } else {
                            MasterModel::CreateContent($this->content, $data_content, ['category_id' => $id, 'language_id' => $language_id]);
                        }
                    }
                }
            }
        }
        Session::flash('success','success');
        return Redirect::to('admin/'.$type.'/category/edit/'.$id);
    }

    /**
     * Create or edit google meta
     * @param Request $request
     * @return mixed
     */
    public function postMetaData(Request $request, $type)
    {
        $setting = Setting::getSetting();
        $id = $request->get('id');
        $data = array(
            'title' => $request->get('meta-title'),
            'descriptions' => $request->get('meta-description'),
            'keywords' => $request->get('meta-keywords'),
            'type' => $type
        );
        if($id == 0) {
            $check = Category::where(['name' => $request->get('name'), 'slug' => $request->get('slug')])->first();
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
                            'category_id' => $id,
                            'type' => 'category'
                        );
                        $check_contents = Contents::where(['category_id' => $id, 'language_id' => $language_id])->first();
                        if($check_contents == null){
                            MasterModel::CreateContent($this->content, $data_content);
                        } else {
                            MasterModel::CreateContent($this->content, $data_content, ['category_id' => $id, 'language_id' => $language_id]);
                        }
                    }
                }
            }
        }
        Session::flash('success','success');
        return Redirect::to('admin/'.$type.'/category/edit/'.$id);
    }

    /**
     * upload images
     * @param Request $request
     */
    public function postAvatar(Request $request, $type) {
        $id = $request->get('id');
        $file = $request->file('images');
        if ($file->isValid()) {
            $name = $file->getClientOriginalName();
            $name = getNameImage($name);
            $extension = $file->getClientOriginalExtension();
            $fileName = $name.'-'.time().'.'.$extension;

            $check = Category::find($id);
            if($check == null) {
                $path = putUploadImage($file, $fileName);
                MasterModel::CreateContent($this->table,['images' => $path, 'type' => $type]);
            } else {
                if($check->images != null){
                    deleteImage($check->images);
                }
                $path = putUploadImage($file, $fileName);
                MasterModel::CreateContent($this->table,['images' => $path, 'type' => $type], ['id' => $check->id]);
            }
        }

    }

    /**
     * @param Request $request
     * upload multiple images
     */
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
                MasterModel::CreateContent($this->media,['images' => $path, 'type' => 'category', 'category_id' => $id]);
            }
        }

    }

    /**
     * Delete image
     * @param Request $request
     * @return mixed
     */
    public function postDeleteImage(Request $request) {
        $check = Category::find($request->get('id'));
        if($check != null){
            if($check->images != null) {
                deleteImage($check->images);
                MasterModel::CreateContent($this->table,['images' => null], ['id' => $check->id]);
            }
        }
        return Response::json(['status' => 200]);
    }
}
