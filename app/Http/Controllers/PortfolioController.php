<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Models\Article;
use Models\Category;
use Models\Menus;
use Models\Setting;

class PortfolioController extends Controller
{
    public function getWeb(){
        $setting = Setting::first();
        $menu = Menus::where('slug', 'web')->select('id')->first();
        $category = Category::where('menu_id', $menu->id)->where('publish',1)->orderBy('order_by')->select('id')->get();
        $port_web = array();
        foreach ($category as $item){
            $port_web[] = Category::getById($item->id);
        }

        return view('frontend.pages.port')->with([
            'page'          => 'port',
            'setting'       => $setting,
            'port'          => $port_web,
            'web_title'     => 'Portfolio | '.$setting->name,
            'type'          => 'web'
        ]);
    }

    public function getPrint(){
        $setting = Setting::first();
        $menu = Menus::where('slug', 'print')->select('id')->first();
        $category = Category::where('menu_id', $menu->id)->where('publish',1)->orderBy('order_by')->select('id')->get();
        $port_print = array();
        foreach ($category as $item){
            $port_print[] = Category::getById($item->id);
        }

        return view('frontend.pages.port')->with([
            'page'          => 'port',
            'setting'       => $setting,
            'port'          => $port_print,
            'web_title'     => 'Portfolio | '.$setting->name,
            'type'          => 'print'
        ]);
    }

    public function getApp(){
        $setting = Setting::first();
        $menu = Menus::where('slug', 'app')->select('id')->first();
        $category = Category::where('menu_id', $menu->id)->where('publish',1)->orderBy('order_by')->select('id')->get();
        $port_web = array();
        foreach ($category as $item){
            $port_app[] = Category::getById($item->id);
        }

        return view('frontend.pages.port')->with([
            'page'          => 'port',
            'setting'       => $setting,
            'port'          => $port_app,
            'web_title'     => 'Portfolio | '.$setting->name,
            'type'          => 'app'
        ]);
    }

    public function getBrand(){
        $setting = Setting::first();
        $menu = Menus::where('slug', 'brand')->select('id')->first();
        $category = Category::where('menu_id', $menu->id)->where('publish',1)->orderBy('order_by')->select('id')->get();
        $port_brand = array();
        foreach ($category as $item){
            $port_brand[] = Category::getById($item->id);
        }

        return view('frontend.pages.port')->with([
            'page'          => 'port',
            'setting'       => $setting,
            'port'          => $port_brand,
            'web_title'     => 'Portfolio | '.$setting->name,
            'type'          => 'brand'
        ]);
    }

    public function getPortDetail($cate, $slug){
        $setting = Setting::first();
        $menu = Menus::where('slug', $cate)->select('id')->first();
        $content = Category::where('slug',$slug)->where('menu_id',$menu->id)->first();
        $parent = Menus::where('slug',$cate)->select('id','name')->first();
        $port_related = Category::where('publish',1)->where('menu_id',$parent->id)->where('slug','<>',$slug)->where('featured',1)->orderBy('order_by')->get();
        return view('frontend.pages.port-detail')->with([
            'page'          => 'port',
            'content'       => $content,
            'port_related'  => $port_related,
            'setting'       => $setting,
            'web_title'     => 'Portfolio | '.$setting->name,
            'type'          => $cate
        ]);
    }

}
