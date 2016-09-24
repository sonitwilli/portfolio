<?php

namespace Models;

use App\Mail\RegisterUser;
use Illuminate\Database\Eloquent\Model;
use Mail;

class Users extends Model
{
    //
    protected $table = "users";

    /***
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userData()
    {
        return $this->hasOne('Models\UsersData');
    }

    /***
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shippingData()
    {
        return $this->hasOne('Models\UsersShipping');
    }
    /**
     * @param $data
     * @return bool|Users
     * create user
     */
    public static function CreateUser($data) {
        $check = self::where('email', $data['email'])->first();
        if(count($check) == 0) {
            $user = new self;
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->name = $data['firstname']." ".$data['lastname'];
            $user->type = $data['type'];
            $user->active = 0;
            $user->active_token = str_random(60);
            if($user->save()){
                Mail::send('emails.password', ['token' => $user->active_token], function ($m) use ($user) {
                    $m->from('leduyphuong64@gmail.com', 'Confirm your account!');

                    $m->to($user->email, $user->name)->subject('Just one more step to get started');
                });
            };
            return $user;
        }
        return false;
    }

    /**
     * @param $data
     * @return bool
     * change password for admin
     */
    public static function ChangePasswordAdmin($data) {
        $check_email = self::where('id', '<>', $data['id'])->where('email', $data['email'])->first();
        if ($check_email != null) {
            return false;
        }
        $check = self::find($data['id']);
        if(count($check) == 0)
            return false;
        if($check->email != $data['email']) {
            Mail::to($check->email, $check->name)->send(new RegisterUser($check->remember_token));
        }
        if ($data['password']) {
            return self::where('id', $check->id)->update(['email' => $data['email'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'password' => bcrypt($data['password'])]);
        }
        return self::where('id', $check->id)->update(['email' => $data['email'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname']]);
    }

    /**
     * @param $data
     * @return bool
     * send mail change password
     */
    public static function SendMailChangePassword($data) {
        $check = self::find($data['id']);
        if(count($check) == 0)
            return false;
        /*if($check->email != $data['email']) {
            Mail::send('emails.password', ['token' => $check->remember_token], function ($m) use ($check,$data) {
                $m->from('leduyphuong64@gmail.com', 'Your Application');

                $m->to($data['email'], $check->name)->subject('Your Reminder!');
            });
        }*/
        if ($data['password']) {
            return self::where('id', $check->id)->update(['email' => $data['email'], 'password' => bcrypt($data['password'])]);
        }
        return self::where('id', $check->id)->update(['email' => $data['email']]);
    }

    /**
     * @param string $rarr
     * @return string
     *
     */
    public static function RecursiveIndexAdmin($rarr = "")
    {
        $html = "";
        $query = self::orderBy('active', 'asc')->get();
        if($query != null){
            foreach ($query as $item){
                $administrator = "";
                if($item->type == 1) {
                    $administrator = "selected";
                }
                $edit_delete = "";
                if($item->type == 2) {
                    $edit_delete = "selected";
                }
                $edit = "";
                if($item->type == 3) {
                    $edit = "selected";
                }
                $html .= "<tr>";
                $html .= "<td class=\"text-center\">";
                $html .= "<input type=\"checkbox\" id=\"checkbox-".$item->id ."\" name=\"id[]\" value=\"".$item->id."\">";
                $html .= "</td>";
                $html .= "<td><a href=\"".url('admin/user/edit/'.$item->id)."\">".$rarr." ".$item->name."</a></td>";
                $html .= "<td>".$item->email."</td>";
                $html .= "<td>";
                $html .= "<select class=\"select-select2 change_group\" style=\"width: 100%;\" data-placeholder=\"Choose one..\" data-url=\"".url('admin/user/change-group/'.$item->id)."\">";
                $html .= "<option value='1' ".$administrator.">Administrator</option>";
                $html .= "<option value='2' ".$edit_delete.">Add + Edit</option>";
                $html .= "<option value='3' ".$edit.">Other</option>";
                $html .= "</select>";
                $html .= "</td>";
                $html .= "<td class='text-center'>";
                $html .= "<div class=\"btn-group btn-group-xs\">";
                $html .= "<a href=\"".url('admin/user/edit/'.$item->id)."\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-default\"><i class=\"fa fa-pencil\"></i></a>";
                $html .= HtmlDeleteRecord(url('admin/user/delete/'.$item->id));
                $html .= "</div>";
                $html .= "</td>";
                $html .= "</tr>";
            }

        }
        return $html;
    }

    public static function DeleteById($id)
    {
        /*$check = self::find($id);
        if($check != null)
        {
            Orders::where(['user_id' => $id])->delete();
        }*/
        return self::where('id',$id)->delete();
    }
}
