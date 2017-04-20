<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use App\Http\Requests;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin/product';
//    protected $guard = 'admin';
//    protected $loginView = 'admin.login';
//    protected $registerView = 'admin.register';

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }
    //登录
    public function getLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = $this->validateLogin($request->input());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            if (Auth::guard('admin')->attempt(['account_number'=>$request->account_number, 'password'=>$request->password])) {
                return Redirect::to('admin')->with('success', '登录成功！');     //login success, redirect to admin
            } else {
                return back()->with('error', '账号或密码错误')->withInput();
            }
        }
        return view('admin.login');
    }

    //登录页面验证
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect()->intended($this->redirectPath());
        }
        return \Redirect::to('/admin/login')->withInput()->with('message', array('type' => 'danger', 'content' => '账号或密码错误'));

    }
    //退出登录
    public function logout()
    {
        if(Auth::guard('admin')->user()){
            Auth::guard('admin')->logout();
        }
        return Redirect::to('admin/login');
    }


    //注册
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = $this->validateRegister($request->input());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user = new Admin();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            if($user->save()){
                return redirect('admin/login')->with('success', '注册成功！');
            }else{
                return back()->with('error', '注册失败！')->withInput();
            }
        }
        return view('admin.register');
    }
    protected function validateRegister(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|alpha_num|max:255',
           // 'email' => 'required|alpha_num|unique:admins',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|'
        ], [
            'required' => ':attribute 为必填项',
            'min' => ':attribute 长度不符合要求',
            'confirmed' => '两次输入的密码不一致',
            'unique' => '该账户已存在',
            'alpha_num' => ':attribute 必须为字母或数字',
            'max' => ':attribute 长度过长'
        ], [
            'name' => '昵称',
           // 'email' => '邮箱',
            'password' => '密码',
            'password_confirmation' => '确认密码'
        ]);
    }

    /**
     * Show the form for login.
     *
     * @return Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

}