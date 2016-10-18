<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\SettingController;
use App\Mail\ContactInfo;
use App\Mail\SendContactAdmin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Models\Banner;
use Models\Contact;
use Validator;
use Models\Article;
use Models\Category;
use Models\Menus;
use Models\Setting;

class HomeController extends Controller
{
    public function index(){
        $setting = Setting::first();
        $home_menu = Menus::where('slug','home')->where('parent_id',0)->first();
        $header = Article::where('slug','header')->first();
        $portfolio_menu = Menus::where('slug','projects')->first();
        $portfolio = Category::where('menu_id',$portfolio_menu->id)->where('publish',1)->orderby('order_by')->with('block')->get();
        $about_menu = Menus::where('slug','about')->where('parent_id',0)->first();
        $about = Article::where('featured',0)->where('publish',1)->where('category_id',$about_menu->id)->orderby('order_by')->get();
        $about_featured = Article::where('featured',1)->where('publish',1)->where('category_id',$about_menu->id)->orderby('order_by')->get();
        if(isset($home_menu)){
            $banner = Banner::where('category_id',$home_menu->id)->get();
        }else{
            $banner = '';
        }
        
        return view('frontend.pages.home')->with([
            'page'          => 'home',
            'setting'       => $setting,
            'web_title'     => $setting->title,
            'banner'        => $banner,
            'header'        => $header,
            'portfolio'     => $portfolio,
            'about'         => $about,
            'about_featured'=> $about_featured
        ]) ;
    }
    
    public function postContact(){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        if(isset($name)){
            $contact = new Contact;
            $contact->name = $name;
            $contact->email = $email;
            $contact->phone = $phone;
            $contact->content = $message;
            $contact->publish = 1;
            $contact->save();

            $setting = Setting::first();
            Mail::to($setting->email)->send(new SendContactAdmin($contact, $setting));
            echo 'success';
        }else{
            echo 'fail';
        }

    }


}
