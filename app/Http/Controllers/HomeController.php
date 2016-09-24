<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\SettingController;
use App\Mail\ContactInfo;
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
            'portfolio'     => $portfolio
        ]) ;
    }


}
