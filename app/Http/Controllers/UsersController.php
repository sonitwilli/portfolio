<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Models\MasterModel;
use Models\Users;
use Redirect;

class UsersController extends Controller
{
    //

    public function getActive(Request $request)
    {
        $token = $request->get('token');
        $check = Users::where(['active_token' => $token])->first();
        if($check != null) {
            MasterModel::CreateContent("users",['active_token' => null, 'active' => 1],['id' => $check->id] );
        }
        return Redirect::to('/');
    }
}
