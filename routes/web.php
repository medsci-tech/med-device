<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web', 'namespace' => 'Web'], function () {

    Route::get('/', 'HomeController@index');//首页
    Route::any('/forget', 'HomeController@forget'); // 忘记密码

    Route::group(['prefix' => '', 'namespace' => 'Home'], function () {
        Route::get('/logins', 'LoginController@showLoginForm'); // 登录
        Route::any('/logout', 'LoginController@logout');
        Route::post('/login', 'LoginController@login');
        Route::get('/registers', 'RegisterController@create'); // 注册页面
        Route::any('/store', 'RegisterController@store'); // 注册保存
    });

    Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
        Route::get('/', 'ProductController@index'); // 药械产品招商导航页
        Route::get('/detail/{id}', 'ProductController@detail');# 产品宣传页
    });

    Route::group(['prefix' => 'market', 'namespace' => 'Market'], function () {
        Route::get('/', 'MarketController@index'); // 药械营销服务

        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'OrderController@index');
            Route::post('generate-config', 'OrderController@generateConfig');
            Route::post('create', 'OrderController@create');
            Route::get('/{id}', 'OrderController@detail');
        });

        // Route::get('/yiyuan-commodity/{id}', 'CommodityController@yiyuanShow');
        // Route::resource('/commodity', 'CommodityController');

    });

    Route::group(['prefix' => 'agent', 'namespace' => 'Agent'], function () {
        Route::get('/', 'AgentController@index'); // 药械经纪人
    });
    Route::group(['prefix' => 'search', 'namespace' => 'Search'], function () {
        Route::get('/', 'SearchController@index'); // 搜索相关

    });
    Route::group(['prefix' => 'personal', 'namespace' => 'Personal'], function () {
        Route::get('/', 'PersonalController@index');
        Route::get('/collection', 'PersonalController@collection');

        Route::get('/cooperation', 'PersonalController@cooperation');//我的合作
        Route::get('/appointment', 'PersonalController@appointment');//我的预约
        Route::get('/info-edit', 'PersonalController@infoEdit');// 资料修改
        Route::get('/pwd-edit', 'PersonalController@infoEdit');// 面修改
        Route::get('/expertise', 'PersonalController@expertise');// 个人专长
        Route::get('/enterprise', 'PersonalController@enterprise');// 企业信息
        Route::get('/about-us', 'PersonalController@aboutUs');
    });


});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

