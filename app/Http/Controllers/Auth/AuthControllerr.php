<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use App\Http\Requests;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests\Interfaces\CodeRequest;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $_user;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * 登录
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->name; // 登录用户名
            if(preg_match("/^1[34578][0-9]{9}$/",$username))
                $login_sign ='phone';
            else
                $login_sign ='name';

            $data = $request->input();
            if(mb_strlen($data['password'])>=20) //密文
                $data['password'] = \Helper::authcode($data['password'],'DECODE',config('params')['salt_key'],0);//解密

            $validator = $this->validateLogin($data,$login_sign);
            if ($validator->fails())
                return response()->json(['code'=>200, 'status' => 0,'message' => $validator->errors()->first() ]);

            if (Auth::guard('web')->attempt($this->validateUser($data,$login_sign),(boolean)$request->remember)) {
                if($request->remember=='true') //记住我
                {
                    $user_info = array('name'=>$data['name'],'password'=> \Helper::authcode($data['password'],'ENCODE',config('params')['salt_key'],0));
                    \Cookie::queue('user_info', $user_info);
                }
                else
                    \Cookie::queue(\Cookie::forget('user_info'));
                   // \setcookie('user_info', '', -1, '/');

                return response()->json(['code'=>200, 'status' => 1,'message' => '登录成功' ]);
            }else {
                return response()->json(['code'=>200, 'status' => 0,'message' => '账号或密码错误' ]);
            }
        }
        return view('web.auth.login');
    }

    //登录页面验证
    protected function validateLogin(array $data,$login_sign)
    {
        $rules = [
            'password' => 'required',
        ];
        if($login_sign=='phone')
            $rules['name']='required|regex:/^1[34578][0-9]{9}$/|exists:users,phone';
        else
            $rules['name']='required|exists:users,name';

        return Validator::make($data, $rules, [
            'required' => ':attribute为必填项',
            'exists' => ':attribute不存在',
            'min' => ':attribute长度不符合要求'
        ], [
            'name' => '账号',
            'phone' => '手机号',
            'password' => '密码'
        ]);
    }

    /**
     * 验证用户字段
     * @author      lxhui<772932587@qq.com>
     * $login_sign 登录标识
     * @since 1.0
     * @return array
     */
    protected function validateUser(array $data,$login_sign)
    {
        return [
            $login_sign => $data['name'],
            'password' => $data['password']
        ];
    }

    //退出登录
    public function logout()
    {
        if(Auth::guard('web')->user()){
            Auth::guard('web')->logout();
        }
        return Redirect::to('/');
    }

    /**
     * 注册
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = $this->validateRegister($request->input());
            if ($validator->fails()) {
                $validator_error_first = $validator->errors()->first();
                return response()->json(['code'=>200, 'status' => 0,'message' => $validator_error_first ]);
            }
            /* 验证码验证 */
           if(!\Helper::checkCode($request->code,$request->phone))
               return response()->json(['code'=>200, 'status' => 0,'message' => '无效的验证码' ]);

            $data = $request->all();
            $data['password'] = bcrypt($request->password);
            $result = User::create($data);

            if($result)
            {
                Auth::attempt(['name' => $data['name'], 'password' => $request->password]);
                return response()->json([ 'code' => 200, 'status' => 1, 'message' => '注册成功' ]);
            }
            else
                return response()->json([ 'code' => 200, 'status' => 0, 'message' => '注册失败' ]);

        }
        return view('web.auth.register');
    }

    /**
     * 注册验证
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    protected function validateRegister(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:12|unique:users',
            'phone'=>'required|regex:/^1[34578][0-9]{9}$/|unique:users',
            //'email' => 'required|email|max:255|unique:users',
            'code' => 'required|min:6',
            'password' => 'required|min:6|max:12|confirmed',
            'password_confirmation' => 'required|min:6|',
            'agree' => 'accepted',
        ], [
            'required' => ':attribute为必填项',
            'in' => ':attribute无效',
            'regex' => ':attribute不是合法项',
            'min' => ':attribute长度不符合要求',
            'confirmed' => '两次输入的密码不一致',
            'name.unique' => '该用户名已经被注册',
            'phone.unique' => '该手机号已经被注册',
           // 'alpha_num' => ':attribute必须为字母或数字',
            "accepted" => "The :attribute 必须同意条款.",
        ], [
            'name' => '用户名',
            'phone' => '手机号',
            //'email' => '邮箱',
            'code' => '验证码',
            'password' => '密码',
            'password_confirmation' => '确认密码'
        ]);
    }

}