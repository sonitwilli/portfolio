<?php

namespace App\Http\Controllers\Admin;

use Models\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth,Input,Validator,Redirect,Session,Response,Excel,PDF;
use Models\MasterModel;
use Models\Users;

class UsersController extends Controller
{
    //
    private $table = "users";

    public function __construct()
    {
        if(!Auth::check() || Auth::user()->type != 1)
            return false;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Users
     */
    public function getListUser()
    {
        return view("admin.users.index", [
            'user' => Auth::user(),
            'active' => 'users',
            'message' => Contact::where('publish', 0)->count(),
            'result' => Users::RecursiveIndexAdmin()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Dashboard
     */
    public function getIndex() {
        return view("admin.dashboard",[
            'user' => Auth::user(),
            'active' => 'dashboard',
            'message' => Contact::where('publish', 0)->count()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * get create user page
     */
    public function getCreate($id = null)
    {
        $action = "Create";
        if($id != null)
        {
            $action = "Edit";
            $result = Users::find($id);
        }
        return view("admin.users.edit", [
            'user' => Auth::user(),
            'active' => 'users',
            'action' => $action,
            'message' => Contact::where('publish', 0)->count(),
            'result' => (!empty($result))?$result:""
        ]);
    }
    /**
     * @param $id
     * @param Request $request
     * @return mixed
     * change group index
     */
    public function getChangeGroup($id, Request $request) {
        $val = $request->get('val');
        $check = Users::find($id);
        if($check != '') {
            $data = array(
                'type' => $val
            );
            MasterModel::CreateContent($this->table, $data, ['id' => $id]);
        }
        return Response::json(['status' => 200]);
    }

    /**
     * @param Request $request
     * post create user
     */
    public function postCreate(Request $request)
    {
        $id = $request->get('id');
        if($id == 0) {
            $rules = array(
                'email' => 'required|email',
                'password' => 'required|max:32|min:6'
            );
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            $data = array(
                'email' => $request->get('email'),
                'firstname' => $request->get('first_name'),
                'lastname' => $request->get('last_name'),
                'password' => $request->get('password', false),
                'type' => $request->get('type',0)
            );
            $user = Users::CreateUser($data);
            if($user == false) {
                Session::flash('success', 'Email has been registered');
                return Redirect::back()->withInput();
            }
            $id = $user->id;
        } else {
            $rules = array(
                'email' => 'required|email'
            );
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            $data = array(
                'id' => $id,
                'email' => $request->get('email'),
                'firstname' => $request->get('first_name'),
                'lastname' => $request->get('last_name'),
                'password' => $request->get('password', false),
                'type' => $request->get('type',0)
            );
            $user = Users::ChangePasswordAdmin($data);
            if($user == false) {
                Session::flash('success', 'Email has been registered');
                return Redirect::back()->withInput();
            }
        }
        Session::flash('success', 'success');
        return Redirect::to('admin/user/edit/'.$id);
    }

    /**
     * Delete item by id using method get
     * @param $id
     * @return mixed
     */
    public function getDelete($id)
    {
        $check = Users::find($id);
        if(count($check) > 0) {
            Users::DeleteById($id);
        }
        Session::flash('delete','success');
        return Redirect::to('admin/user/list');
    }

    /**
     * Delete all item using checkbox, method post
     * @param Request $request
     * @return mixed
     */
    public function postDelete(Request $request)
    {
        $id = $request->get('id');
        if(!empty($id)) {
            foreach ($id as $item)
            {
                Users::DeleteById($item);
            }
        }
        Session::flash('delete','success');
        return Redirect::to('admin/user/list');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * get login page
     */
    public function getLogin() {
        return view("admin.users.login");
    }

    /**
     * @return Redirect
     * post login with email
     */
    public function postLogin() {
        $email = Input::get('login-email', false);
        $password = Input::get('login-password');
        if(Auth::attempt(['email' => $email, 'password' => $password], true)){
            return redirect('admin/dashboard');
        } else {
            Session::flash('error', 'Email or password not correct');
            return redirect('admin/login');
        }
    }

    /**
     * @return mixed
     * edit profile user
     */
    public function postEditProfile() {
        $rules = array(
            'user-settings-email' => 'required|email'
        );
        $validation = Validator::make(Input::All(), $rules);
        if($validation->fails()){
            return Redirect::back()->withError( $validation )->withInput();
        }
        $data = array(
            'id' => Auth::user()->id,
            'email' => Input::get('user-settings-email', false),
            'password' => Input::get('user-settings-password', false),
            'firstname' => Auth::user()->firstname,
            'lastname' => Auth::user()->lastname
        );
        Users::ChangePasswordAdmin($data);
        return Redirect::back();
    }

    public function postForgotPassword(){
        return Input::All();
    }

    /**
     * @return Redirect
     * post create user
     */
    public function postRegister() {
        $data = array(
            'email' => Input::get('register-email', ""),
            'firstname' => Input::get('register-firstname', ""),
            'lastname' => Input::get('register-lastname', ""),
            'password' => Input::get('register-password', ""),
            'type' => 1,
        );
        $user = Users::CreateUser($data);
        if($user == false) {
            Session::flash('error_register', 'Email has been registered');
            return redirect('admin/login#register');
        }
        if(Auth::attempt(['email' => $user->email, 'password' => Input::get('register-password')], true)){
            return redirect('admin/dashboard');
        }

    }

    /**
     * @return mixed
     * logout
     */
    public function getLogout() {
        Auth::logout();
        Session::flush();
        return redirect()->to('/');
    }

    /**
     * export data to excel
     */
    public function exportXLS()
    {
        $contact = Users::all();
        Excel::create('Users List', function($excel) use ($contact) {

            $excel->sheet('Users List', function($sheet) use ($contact) {

                $sheet->fromArray($contact);

            });

        })->export('xlsx');
    }

    /**
     * export data to pdf
     */
    public function exportPDF()
    {
        $pdf = PDF::loadView('admin.users.pdf', ['data' => Users::all()]);
        return $pdf->download('Users_List.pdf');
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

            $check = Users::find($id);
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

    /**
     * Delete image
     * @param Request $request
     * @return mixed
     */
    public function postDeleteImage(Request $request) {
        $check = Users::find($request->get('id'));
        if($check != null){
            if($check->images != null) {
                deleteImage($check->images);
                MasterModel::CreateContent($this->table,['images' => null], ['id' => $check->id]);
            }
        }
        return Response::json(['status' => 200]);
    }
}
