<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interfaces\SendCode;
class HomeController extends Controller
{
    //use SendCode;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.home.index');
    }
    public function forget()
    {
        return view('web.home.forget');
    }
    public function helper()
    {
        return view('web.home.helper');
    }
    public function my_page(){
        return view('web.home.my_page');
    }

    /**
     * 发送验证码
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function sendCode(Request $request)
    {
        return $this->send($request->phone);
    }
}
