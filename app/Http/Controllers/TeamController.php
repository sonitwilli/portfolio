<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Models\Article;
use Models\Menus;
use Models\Setting;

class TeamController extends Controller
{
    public function getTeam(){
        $setting = Setting::first();
        $category_member = Menus::where('slug','member')->first();
        $member = Article::where('category_id',$category_member->id)->where('publish',1)->orderby('order_by')->get();
        $our_culture = Article::where('slug','our-culture')->where('publish',1)->with('mediaData')->first();
        $category_member = Menus::where('slug','position')->first();
        $position = Article::where('category_id',$category_member->id)->where('publish',1)->orderby('order_by')->get();
        return view('frontend.pages.team')->with([
            'page'          => 'team',
            'setting'       => (count($setting) > 0) ? $setting : "",
            'web_title'     => (count($setting) > 0) ? 'Team | '.$setting->name : "",
            'member'        => (count($member) > 0) ? $member : '',
            'our_culture'   => (count($our_culture) > 0) ? $our_culture : '',
            'position'      => (count($position) > 0) ? $position : '',
        ]);
    }
}
