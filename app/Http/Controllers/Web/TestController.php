<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
class TestController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Redis::publish('user-channel', json_encode(['username' => 'mary','message'=>'miss you']));

        dd('haspushed');
//        $exitCode = \Artisan::call('redis:subscribe',[
//            'user' => 1, '--queue' => 'default'
//        ]);



    }

    public function get()
    {
        ini_set('default_socket_timeout', -1);  //不超时
        Redis::publish('user-channel', json_encode(['username' => 'mary','message'=>'miss you']));

        \Redis::Option(['user-channel'], function($message) {
            echo $message;
        });
    }

    /**
     * 忘记密码
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function forget(Request $request)
    {
        if ($request->isMethod('post')) {
            $result =$this->checkPhoneCode($request->all());
            if($result['status'] ==1)
            {
                $user = User::where(['phone'=>$request->phone])->first();
                $user->password = bcrypt($request->password);
                $user->save();
                \Auth::login($user);
                return response()->json(['code'=>200, 'status' => 1,'message' => '修改成功' ]);
            }
            else
                return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);
        }

        return view('web.home.forget');
    }
    public function helper()
    {
        return view('web.home.helper');
    }
    public function my_page(){
        return view('web.home.my_page');
    }


}
