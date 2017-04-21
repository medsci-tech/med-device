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

Route::group(['middleware' => 'web'], function () {
    //Auth::routes();
    Route::any('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');
    Route::any('register', 'Auth\AuthController@register');
    Route::get('home',function(){
        return redirect('/');
    });
});
Route::group(['middleware' => 'web', 'namespace' => 'Web'], function () {

    Route::get('/', 'HomeController@index');//首页
    Route::any('/forget', 'HomeController@forget'); // 忘记密码
    Route::any('/helper', 'HomeController@helper'); // 忘记密码
    Route::get('/my_page', 'HomeController@my_page');

    Route::group(['prefix'=>'','middleware'=>'throttle:20'],function(){
        Route::post('/send-code', 'HomeController@sendCode');//发送验证码
    });


    Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
        Route::get('/', 'ProductController@index'); // 药械产品招商导航页
        Route::get('/detail/{id}', 'ProductController@detail');# 产品宣传页
        Route::post('collect', 'ProductController@collect');# 产品收藏
        Route::post('join', 'ProductController@join');# 合作意向
    });

    Route::group(['prefix' => 'market', 'namespace' => 'Market'], function () {
        Route::get('/', 'MarketController@index'); // 药械营销服务
        Route::get('/marketing-order', 'MarketController@marketingOrder'); // 药械营销服务
        Route::post('/store', 'MarketController@store'); // 预约服务提交

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
        Route::get('/agent-sign', 'AgentController@agentSign'); // 等记经纪人
    });
    Route::group(['prefix' => 'search', 'namespace' => 'Search'], function () {
        Route::get('/', 'SearchController@index'); // 搜索相关

    });
	
    Route::group(['prefix' => 'personal', 'namespace' => 'Personal','middleware' => 'auth'], function () {

        Route::get('/', 'PersonalController@index');
        Route::get('/collection', 'PersonalController@collection');

        Route::get('/cooperation', 'PersonalController@cooperation');//我的合作
        Route::get('/appointment', 'PersonalController@appointment');//我的预约
        Route::any('/appointment-detail', 'PersonalController@appointmentDetail');//我的预约
        Route::get('/info-edit', 'PersonalController@infoEdit');// 资料修改
        Route::any('/pwd-edit', 'PersonalController@pwdEdit');// 密码修改
        Route::get('/expertise', 'PersonalController@expertise');// 个人专长
        Route::get('/enterprise', 'PersonalController@enterprise');// 企业信息
        Route::get('/about-us', 'PersonalController@aboutUs');
        Route::post('/upload-head', 'PersonalController@uploadHead');// 个人图像上传
    });

});

// 后台相关路由
Route::group(['prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {
        Route::resource('category', 'CategoryController'); // 产品分类
        Route::resource('product', 'ProductController'); //产品
        Route::resource('supplier', 'SupplierController');
        Route::resource('activity', 'ActivityController');
        Route::resource('user', 'UserController');
        Route::resource('specification', 'SpecificationController');
        Route::resource('video', 'VideoController');
        Route::resource('banner', 'BannerController');
        Route::resource('product-banner', 'ProductBannerController');
        Route::get('down-order-excel', 'OrderController@downOrderExcel');
        Route::get('order-2-excel', 'OrderController@order2Excel');
        Route::any('/excel', 'ProductController@excel');
        Route::any('/update-puan-id', 'ProductController@updatePuanId');

        Route::any('/product/search', 'ProductController@search');
        Route::any('/category/search', 'CategoryController@search');
        Route::any('/order/search', 'OrderController@search');
        Route::get('/order/set-ems-num', 'OrderController@setEMSNum');
        Route::get('/order/ems-print', 'OrderController@printEMSOrder');
        Route::get('/order/print-data', 'OrderController@printData');
        Route::resource('order', 'OrderController');
        //后台管理员
        Route::any('logout', 'AuthController@logout');
        Route::get('/', function () {
            return view('admin.index');
        });
//        Route::get('logout', function () {
//            Auth::logout();
//            return Redirect::to('/admin/login');
//        });


    });

    Route::group(['namespace' => 'Admin'], function () {
        Route::group(['middleware' => 'admin'], function () {
            Route::get('password/change', 'PasswordController@showChangePasswordForm')->name('auth.password.change');
            Route::post('password/change', 'PasswordController@changePassword')->name('auth.password.update');
        });
        Route::group(['middleware' => 'guest'], function () {
            Route::get('login', 'AuthController@showLoginForm')->name('auth.login');
            Route::post('login', 'AuthController@login');
        });
    });
});


//Route::group(['prefix' => 'admin' ,'middleware' => 'web'], function () {
//    Route::get('login', 'Admin\AuthController@getLogin');
//
//    Route::post('login', 'Admin\AuthController@postLogin');
//
//    Route::get('register', 'Admin\AuthController@register');
//
//    Route::post('register', 'Admin\AuthController@register');
//
//    Route::get('logout', 'Admin\AuthController@logout');
//
//    Route::get('/', 'Admin\AdminController@index');
//});
