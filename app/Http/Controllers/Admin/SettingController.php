<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth,Redirect,Validator,Response;
use Illuminate\Support\Facades\Storage;
use Models\Contact;
use Models\Contents;
use Models\Languages;
use Models\MasterModel;
use Models\Media;
use Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @var string
     */
    private $table = "setting";

    private $media = "media";

    /**
     * @var string
     */
    private $content = "contents";

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex() {
        return view("admin.setting.edit", [
            'user' => Auth::user(),
            'country' => Languages::get(),
            'active' => 'setting',
            'maps' => true,
            'message' => Contact::where('publish', 0)->count(),
            'result' => Setting::getSetting()
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postContent(Request $request) {
        $validation = Validator::make($request->all(), ['name' => 'required']);
        if($validation->fails()){
            return Redirect::back()->withErrors( $validation )->withInput();
        }
        $data = array(
            'name' => $request->get('name'),
            'language' => ($request->get('language'))?implode(',',$request->get('language')):null,
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'lat' => $request->get('latitude'),
            'lng' => $request->get('longitude')
        );
        $check = Setting::first();
        if($check == null){
            MasterModel::CreateContent($this->table, $data);
            return Redirect::back();
        } else {
            MasterModel::CreateContent($this->table, $data, ['id' => $check->id]);
            $check = Setting::first();
            $language = explode(",", $check->language);
            Contents::DeleteMetaNotIn("language_id", $language);
            return Redirect::back();
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postMetaData(Request $request) {
        $check = Setting::first();
        if($check == null){
            $data = array(
                'title' => $request->get('meta-title'),
                'keywords' => $request->get('meta-keywords'),
                'description' => $request->get('meta-description'),
                'google_url' => $request->get('google-plus'),
                'facebook_url' => $request->get('facebook-plus'),
                'twitter_url' => $request->get('twitter-page'),
            );
            MasterModel::CreateContent($this->table, $data);
            return Redirect::back();
        } else {
            if($check->language != null) {
                $language = explode(',',$check->language);
                foreach ($language as $id){
                    $country = Languages::find($id);
                    $data_meta = array(
                        'title' => $request->get('title'.$country->language),
                        'keywords' => $request->get('keywords'.$country->language),
                        'descriptions' => $request->get('description'.$country->language),
                        'setting_id' => $check->id,
                        'type' => 'setting',
                        'language_id' => $id
                    );
                    $check_meta = Contents::where(array('setting_id' => $check->id, 'language_id' => $id))->first();
                    if($check_meta == null) {
                        MasterModel::CreateContent($this->content, $data_meta);
                    } else {
                        MasterModel::CreateContent($this->content, $data_meta, array('id' => $check_meta->id));
                    }
                }
                Contents::DeleteMetaNotIn("language_id", $language);
            }
            $data = array(
                'title' => $request->get('meta-title'),
                'keywords' => $request->get('meta-keywords'),
                'description' => $request->get('meta-description'),
                'google_url' => $request->get('google-plus'),
                'facebook_url' => $request->get('facebook-plus'),
                'twitter_url' => $request->get('twitter-page')
            );
            MasterModel::CreateContent($this->table, $data, ['id' => $check->id]);
            return Redirect::back();
        }
    }

    public function postAvatar(Request $request) {
        $file = $request->file('images');
        if ($file->isValid()) {
            $name = $file->getClientOriginalName();
            $name = getNameImage($name);
            $extension = $file->getClientOriginalExtension();
            $fileName = $name.'-'.time().'.'.$extension;

            $check = Setting::first();
            if($check == null) {
                $path = putUploadImage($request->file('images'), $fileName);
                MasterModel::CreateContent($this->table,['images' => $path]);
            } else {
                if($check->images != null){
                    deleteImage($check->images);
                }
                $path = putUploadImage($request->file('images'), $fileName);
                MasterModel::CreateContent($this->table,['images' => $path], ['id' => $check->id]);
            }
        }

    }

    public function postDeleteImage(Request $request) {
        $check = Setting::find($request->get('id'));
        if($check != null){
            if($check->images != null) {
                deleteImage($check->images);
                MasterModel::CreateContent($this->table,['images' => null], ['id' => $check->id]);
            }
        }
        return Response::json(['status' => 200]);
    }

    public function postDeleteMediaImage(Request $request)
    {
        $check = Media::find($request->get('id'));
        if($check != null){
            if($check->images != null) {
                deleteImage($check->images);
                Media::find($request->get('id'))->delete();
            }
        }
        return Response::json(['status' => 200]);
    }
    
    public function postUpdateNameMedia(Request $request)
    {
        $check = Media::find($request->get('id'));
        if($check != null)
        {
            MasterModel::CreateContent($this->media,['name' => $request->get('name')], ['id' => $check->id]);
        }
        return Response::json(['status' => 200]);
    }

    public function postUpdateOrderMedia(Request $request)
    {
        $check = Media::find($request->get('id'));
        if($check != null)
        {
            MasterModel::CreateContent($this->media,['order_by' => $request->get('order_by')], ['id' => $check->id]);
        }
        return Response::json(['status' => 200]);
    }
}
