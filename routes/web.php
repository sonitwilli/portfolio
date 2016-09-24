<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function (){

    Route::get('/', 'UsersController@getIndex');
    Route::get('dashboard', 'UsersController@getIndex');

    Route::group(['prefix' => 'language'],function (){
        Route::get('list', 'LanguageController@getList');
        Route::get('create', 'LanguageController@getCreate');
        Route::get('edit/{id}','LanguageController@getEdit');
        Route::get('delete/{id}','LanguageController@getDelete');
        Route::post('create','LanguageController@postCreate');
        Route::post('delete','LanguageController@postDelete');
    });

    Route::group(['prefix' => 'products'], function (){
        Route::get('list','ProductsController@getIndex');
        Route::get('create','ProductsController@getCreate');
        Route::get('edit/{id}','ProductsController@getEdit');
        Route::get('delete/{id}','ProductsController@getDelete');
        Route::get('check-link','ProductsController@getCheckLink');
        Route::get('check-status/{type}/{id}','ProductsController@getCheckStatus');
        Route::get('update-order/{id}','ProductsController@getUpdateOrder');
        Route::post('create','ProductsController@postCreate');
        Route::post('meta-data','ProductsController@postMetaData');
        Route::post('delete','ProductsController@postDelete');
        Route::post('delete-image','ProductsController@postDeleteImage');
        Route::post('images','ProductsController@postAvatar');
        Route::post('multiple-images','ProductsController@postMultipleImages');
        Route::group(['prefix' => 'category'], function (){
            Route::get('/', 'ProductCategoryController@getIndex');
            Route::get('create','ProductCategoryController@getCreate');
            Route::get('edit/{id}','ProductCategoryController@getEdit');
            Route::get('update-order/{id}','ProductCategoryController@getUpdateOrder');
            Route::get('delete/{id}','ProductCategoryController@getDelete');
            Route::get('check-link','ProductCategoryController@getCheckLink');
            Route::get('check-status/{id}','ProductCategoryController@getCheckStatus');
            Route::post('create','ProductCategoryController@postCreate');
            Route::post('meta-data','ProductCategoryController@postMetaData');
            Route::post('delete','ProductCategoryController@postDelete');
        });
        Route::group(['prefix' => 'orders'], function (){
            Route::get('/', 'OrdersController@getIndex');
            Route::get('delete/{id}', 'OrdersController@getDelete');
            Route::get('edit/{id}', 'OrdersController@getEdit');
            Route::get('update-status', 'OrdersController@getUpdateStatus');
            Route::post('delete', 'OrdersController@postDelete');
        });
    });

    Route::group(['prefix' => 'user'], function (){
        Route::get('logout','UsersController@getLogout');
        Route::get('list','UsersController@getListUser');
        Route::get('change-group/{id}','UsersController@getChangeGroup');
        Route::get('create','UsersController@getCreate');
        Route::get('edit/{id}','UsersController@getCreate');
        Route::get('delete/{id}','UsersController@getDelete');
        Route::get('export-pdf','UsersController@exportPDF');
        Route::get('export-xls','UsersController@exportXLS');
        Route::post('create','UsersController@postCreate');
        Route::post('edit-profile','UsersController@postEditProfile');
        Route::post('login','UsersController@postLogin');
        Route::post('delete','UsersController@postDelete');
        Route::post('images','UsersController@postAvatar');
        Route::post('delete-image','UsersController@postDeleteImage');
    });

    Route::group(['prefix' => 'setting'], function (){
        Route::get('edit','SettingController@getIndex');
        Route::post('avatar','SettingController@postAvatar');
        Route::post('meta-data','SettingController@postMetaData');
        Route::post('content','SettingController@postContent');
        Route::post('delete-image','SettingController@postDeleteImage');
    });

    Route::group(['prefix' => 'menu'],function (){
        Route::get('/','MenuController@getIndex');
        Route::get('create','MenuController@getCreate');
        Route::get('edit/{id}','MenuController@getEdit');
        Route::get('update-order/{id}','MenuController@getUpdateOrder');
        Route::get('delete/{id}','MenuController@getDelete');
        Route::get('check-link','MenuController@getCheckLink');
        Route::get('check-status/{id}','MenuController@getCheckStatus');
        Route::post('create','MenuController@postCreate');
        Route::post('meta-data','MenuController@postMetaData');
        Route::post('delete','MenuController@postDelete');
    });

    Route::group(['prefix' => 'contact'],function (){
        Route::get('list','ContactController@getIndex');
        Route::get('index','ContactController@getIndex');
        Route::get('edit/{id}','ContactController@getEdit');
        Route::get('export-pdf','ContactController@exportPDF');
        Route::get('export-xls','ContactController@exportXLS');
        Route::get('delete/{id}','ContactController@getDelete');
        Route::post('delete','ContactController@postDelete');
    });

    Route::group(['prefix' => 'article'], function (){
        Route::get('list','ArticleController@getIndex');
        Route::get('create','ArticleController@getCreate');
        Route::get('edit/{id}','ArticleController@getEdit');
        Route::get('delete/{id}','ArticleController@getDelete');
        Route::get('check-link','ArticleController@getCheckLink');
        Route::get('check-status/{type}/{id}','ArticleController@getCheckStatus');
        Route::get('update-order/{id}','ArticleController@getUpdateOrder');
        Route::post('create','ArticleController@postCreate');
        Route::post('meta-data','ArticleController@postMetaData');
        Route::post('delete','ArticleController@postDelete');
        Route::post('delete-image','ArticleController@postDeleteImage');
        Route::post('images','ArticleController@postAvatar');
        Route::post('multiple-images','ArticleController@postMultipleImages');
    });

    Route::group(['prefix' => 'banner'],function (){
        Route::get('list','BannerController@getIndex');
        Route::get('create','BannerController@getCreate');
        Route::get('edit/{id}','BannerController@getEdit');
        Route::get('delete/{id}','BannerController@getDelete');
        Route::get('check-link','BannerController@getCheckLink');
        Route::get('check-status/{type}/{id}','BannerController@getCheckStatus');
        Route::get('update-order/{id}','BannerController@getUpdateOrder');
        Route::post('create','BannerController@postCreate');
        Route::post('meta-data','BannerController@postMetaData');
        Route::post('delete','BannerController@postDelete');
        Route::post('delete-image','BannerController@postDeleteImage');
        Route::post('images','BannerController@postAvatar');
        Route::post('multiple-images','BannerController@postMultipleImages');
    });

    Route::group(['prefix' => 'block'],function (){
        Route::get('list','BlockController@getIndex');
        Route::get('create','BlockController@getCreate');
        Route::get('edit/{id}','BlockController@getEdit');
        Route::get('delete/{id}','BlockController@getDelete');
        Route::get('check-link','BlockController@getCheckLink');
        Route::get('check-status/{type}/{id}','BlockController@getCheckStatus');
        Route::get('update-order/{id}','BlockController@getUpdateOrder');
        Route::post('create','BlockController@postCreate');
        Route::post('meta-data','BlockController@postMetaData');
        Route::post('delete','BlockController@postDelete');
        Route::post('delete-image','BlockController@postDeleteImage');
        Route::post('images','BlockController@postAvatar');
        Route::post('multiple-images','BlockController@postMultipleImages');
    });

    Route::group(['prefix' => '{type}/category'], function (){
        Route::get('/','CategoryController@getIndex');
        Route::get('create','CategoryController@getCreate');
        Route::get('edit/{id}','CategoryController@getEdit');
        Route::get('update-order/{id}','CategoryController@getUpdateOrder');
        Route::get('delete/{id}','CategoryController@getDelete');
        Route::get('check-link','CategoryController@getCheckLink');
        Route::get('check-status/{id}','CategoryController@getCheckStatus');
        Route::post('create','CategoryController@postCreate');
        Route::post('meta-data','CategoryController@postMetaData');
        Route::post('delete','CategoryController@postDelete');
        Route::post('delete-image','CategoryController@postDeleteImage');
        Route::post('images','CategoryController@postAvatar');
        Route::post('multiple-images','CategoryController@postMultipleImages');
    });

    Route::group(['prefix' => 'media'],function (){
        Route::post('delete-image','SettingController@postDeleteMediaImage');
        Route::post('update-name','SettingController@postUpdateNameMedia');
        Route::post('update-order','SettingController@postUpdateOrderMedia');
    });


});
Route::get('/kr', function () {
    return view('korea');
});
Route::get('admin/login', 'Admin\UsersController@getLogin');
Route::post('admin/sign-in', 'Admin\UsersController@postLogin');
Route::post('admin/forgot-password', 'Admin\UsersController@postForgotPassword');
Route::post('admin/register', 'Admin\UsersController@postRegister');
Route::resource('test','TestController');

Route::group(['prefix' => 'users'],function (){
    Route::get('active', 'UsersController@getActive');
    Route::get('login', 'UsersController@getLogin');
    Route::get('logout', 'UsersController@getLogout');
    Route::post('login', 'UsersController@postLogin');
});
Route::get('products', 'ProductController@getIndex');
Route::get('products/add-to-cart/{id}', 'ProductController@getAddToCart');
Route::get('products/shopping-cart', 'ProductController@getCart');
Route::get('products/checkout', 'ProductController@getCheckOut');

//**************Demon Dragon******************//
Route::group(['prefix' => 'vi'], function (){
    Route::get('/', ['as'=>'home','uses'=>'HomeController@index']);
    Route::get('portfolio', ['as'=>'portfolio', 'uses'=>'PortfolioController@getWeb']);
    Route::get('portfolio/web', ['as'=>'portfolio/web', 'uses'=>'PortfolioController@getWeb']);
    Route::get('portfolio/print', ['as'=>'portfolio/print', 'uses'=>'PortfolioController@getPrint']);
    Route::get('portfolio/app', ['as'=>'portfolio/app', 'uses'=>'PortfolioController@getApp']);
    Route::get('portfolio/brand', ['as'=>'portfolio/brand', 'uses'=>'PortfolioController@getBrand']);
    Route::get('portfolio/{cate}/{id}', ['as'=>'portfolio.port', 'uses'=>'PortfolioController@getPortDetail']);
    Route::post('portfolioData', 'PortfolioController@portfolioData');
    Route::get('about', 'HomeController@about');
    Route::get('team', 'HomeController@getTeam');
    Route::get('contact', 'HomeController@getContact');
    Route::post('contact', 'HomeController@postContact');
    Route::get('how-we-work', 'HomeController@getHowwework');
});
Route::get('/', ['as'=>'home','uses'=>'HomeController@index']);
Route::get('portfolio', ['as'=>'portfolio', 'uses'=>'PortfolioController@getWeb']);
Route::get('portfolio/web', ['as'=>'portfolio/web', 'uses'=>'PortfolioController@getWeb']);
Route::get('portfolio/print', ['as'=>'portfolio/print', 'uses'=>'PortfolioController@getPrint']);
Route::get('portfolio/app', ['as'=>'portfolio/app', 'uses'=>'PortfolioController@getApp']);
Route::get('portfolio/brand', ['as'=>'portfolio/brand', 'uses'=>'PortfolioController@getBrand']);
Route::get('portfolio/{cate}/{slug}', ['as'=>'portfolio.port', 'uses'=>'PortfolioController@getPortDetail']);
Route::post('portfolioData', 'PortfolioController@portfolioData');
Route::get('about', 'HomeController@about');
Route::get('team', 'TeamController@getTeam');
Route::get('contact', 'HomeController@getContact');
Route::post('contact', 'HomeController@postContact');
Route::get('how-we-work', 'HomeController@getHowwework');
Route::get('kr',function (){
    return view('frontend.kr.index');
});