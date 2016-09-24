<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth,Validator,Redirect,Session;
use Models\Contact;
use Models\Languages;
use Models\MasterModel;

class LanguageController extends Controller
{
    private $language = "languages";
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getList() {
        return view('admin.language.index',[
            'user' => Auth::user(),
            'message' => Contact::where('publish', 0)->count(),
            'active' => 'language',
            'result' => Languages::all()
        ]);
    }

    public function getCreate() {
        return view('admin.language.edit',[
            'user' => Auth::user(),
            'message' => Contact::where('publish', 0)->count(),
            'active' => 'language',
            'action' => 'Create'
        ]);
    }

    public function getEdit($id) {
        return view('admin.language.edit',[
            'user' => Auth::user(),
            'message' => Contact::where('publish', 0)->count(),
            'active' => 'language',
            'action' => 'Edit',
            'result' => Languages::find($id)
        ]);
    }

    public function postCreate(Request $request) {
        $rules = array(
            'name' => 'required|not_in:English|not_in:english',
            'language' => 'required|not_in:en'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $id = $request->get('id');
        $data = array(
            'name' => $request->get('name'),
            'language' => $request->get('language')
        );
        if($id == 0){
            $id = MasterModel::CreateContent($this->language, $data);
        } else {
            MasterModel::CreateContent($this->language, $data, array('id' => $id));
        }
        Session::flash('success','success');
        return Redirect::to('admin/language/edit/'.$id);
    }

    public function getDelete($id)
    {
        if(!Auth::check() || Auth::user()->type != 1)
        {
            return Redirect::to('admin');
        }
        $check = Languages::find($id);
        if (count($check) > 0) {
            Languages::DeleteLanguage($id);
            Session::flash('delete','success');
        }
        return Redirect::back();
    }

    public function postDelete(Request $request)
    {
        if(!Auth::check() || Auth::user()->type != 1)
        {
            return Redirect::to('admin');
        }
        $id = $request->get('id');
        foreach ($id as $item){
            Languages::DeleteLanguage($item);
        }
        Session::flash('delete','success');
        return Redirect::back();
    }
}
