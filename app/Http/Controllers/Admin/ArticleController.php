<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Models\Article;
use Models\Category;
use Models\Contact;
use Models\Contents;
use Models\MapTags;
use Models\MasterModel;
use Models\Setting;
use Models\Languages;
use Models\Tags;
use Response, Redirect, Session, Validator, DB, Auth;

class ArticleController extends Controller
{
    //
    private $content = "contents";

    private $table = "articles";

    private $media = "media";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        return view("admin.article.preview.index", [
            'user' => Auth::user(),
            'active' => 'article',
            'message' => Contact::where('publish', 0)->count(),
            'result' => Article::RecursiveIndexAdmin()
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
        return view("admin.article.preview.edit", [
            'user' => Auth::user(),
            'active' => 'article',
            'action' => 'Create',
            'message' => Contact::where('publish', 0)->count(),
            'setting' => Setting::first(),
            'category' => Article::RecursiveMenu(0, 0, 0)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit($id)
    {
        $result = Article::getById($id);

        $tags_name = "";
        if(!empty($result) && count($result->mapTags) > 0)
        {
            foreach ($result->mapTags as $item)
            {
                $tags_name .= $item->tags->name.",";
            }
            $tags_name = rtrim($tags_name, ",");
        }
        return view("admin.article.preview.edit", [
            'user' => Auth::user(),
            'active' => 'article',
            'action' => 'Edit',
            'message' => Contact::where('publish', 0)->count(),
            'setting' => Setting::first(),
            'result' => $result,
            'tags' => $tags_name,
            'category' => Article::RecursiveMenu(0, 0, (!empty($result))?$result->category_id:0)
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
        $check = Article::find($id);
        if(count($check) > 0) {
            Article::DeleteById($id);
        }
        Session::flash('delete','success');
        return Redirect::to('admin/article/list');
    }

    /**
     * edit status public or hidden
     * @param $id
     * @return mixed
     */
    public function getCheckStatus($type,$id)
    {
        $check = Article::find($id);
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
        $check = Article::find($id);
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
                Article::DeleteById($item);
            }
        }
        Session::flash('delete','success');
        return Redirect::to('admin/article/list');
    }

    /**
     * check detect links
     * @param Request $request
     * @return mixed
     */
    public function getCheckLink(Request $request)
    {
        if($request->get('lang') == 'general') {
            $check = Article::where('slug',$request->get('slug'))->where('id','<>',$request->get('id'))->first();

        } else {
            $language_id = Languages::where('language',$request->get('lang'))->pluck('id');
            $check = Contents::where(['language_id' => $language_id, 'type' => 'article', 'slug' => $request->get('slug')])->where('category_id','<>',$request->get('id'))->first();
        }
        if($check == null){
            $slug = $request->get('slug');
        } else {
            $slug = Article::count()."-".$request->get('slug');
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
            'content' => addslashes($request->get('content')),
            'description' => addslashes($request->get('description')),
            'order_by' => (!empty($request->get('order_by'))?$request->get('order_by'):0),
            'category_id' => (!empty($request->get('parent_id'))?$request->get('parent_id'):0),
            'publish' => ($request->get('publish') == 'on')?1:0,
            'featured' => ($request->get('featured') == 'on')?1:0,
            'created_at' => gmdate('Y-m-d H:i:s', time()),
            'updated_at' => gmdate('Y-m-d H:i:s', time())
        );
        if($id == 0) {
            $check = Article::where(['name' => $request->get('name'), 'slug' => $request->get('slug')])->first();
            if($check == null) {
                $id = MasterModel::CreateContent($this->table, $data);
            }
        } else {
            MasterModel::CreateContent($this->table, $data, ['id' => $id]);
        }
        if($request->get('tags') != "") {
            $tags = explode(",", $request->get('tags'));
            $tags_arr = array();
            foreach ($tags as $tag)
            {
                $data_tags = array(
                    'name' => $tag,
                    'slug' => clearUnicode($tag)
                );
                $tags_id = Tags::CreateTags($data_tags, $id);
                array_push($tags_arr, $tags_id->id);
            }
            MapTags::DeleteMapTagsNotInTagsId($id, $tags_arr);
        } else {
            MapTags::DeleteMapTags($id);
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
                            'article_id' => $id,
                            'type' => 'article'
                        );
                        $check_contents = Contents::where(['article_id' => $id, 'language_id' => $language_id])->first();
                        if($check_contents == null){
                            MasterModel::CreateContent($this->content, $data_content);
                        } else {
                            MasterModel::CreateContent($this->content, $data_content, ['article_id' => $id, 'language_id' => $language_id]);
                        }
                    }
                }
            }
        }
        Session::flash('success','success');
        return Redirect::to('admin/article/edit/'.$id);
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
            $check = Article::where(['name' => $request->get('name'), 'slug' => $request->get('slug')])->first();
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
                            'article_id' => $id,
                            'type' => 'article'
                        );
                        $check_contents = Contents::where(['article_id' => $id, 'language_id' => $language_id])->first();
                        if($check_contents == null){
                            MasterModel::CreateContent($this->content, $data_content);
                        } else {
                            MasterModel::CreateContent($this->content, $data_content, ['article_id' => $id, 'language_id' => $language_id]);
                        }
                    }
                }
            }
        }
        Session::flash('success','success');
        return Redirect::to('admin/article/edit/'.$id);
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

            $check = Article::find($id);
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
                MasterModel::CreateContent($this->media,['images' => $path, 'type' => 'article', 'article_id' => $id]);
            }
        }

    }

    /**
     * Delete image
     * @param Request $request
     * @return mixed
     */
    public function postDeleteImage(Request $request) {
        $check = Article::find($request->get('id'));
        if($check != null){
            if($check->images != null) {
                deleteImage($check->images);
                MasterModel::CreateContent($this->table,['images' => null], ['id' => $check->id]);
            }
        }
        return Response::json(['status' => 200]);
    }
}
