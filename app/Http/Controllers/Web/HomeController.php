<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interfaces\CheckResetPwd;
use App\Models\Product;
use App\User;

class HomeController extends Controller
{
    use CheckResetPwd;
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
        $model = new Product();
        $data = $model->products(['is_hot'=>1],0,8);
        return view('web.home.index')->with([
            'data' => $data
        ]);
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

    /**
     * 发送验证码
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function sendCode(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'phone'   => 'required|digits:11|regex:/^1[34578][0-9]{9}$/'
            ]);
            if ($validator->fails())
                return ['code' => 200, 'status' => 0, 'message' => $validator->errors()->first('phone')];

            $code = \Helper::generateMessageVerify();
            $phone = $request->phone;
            //$res = \Helper::sendCode($phone,$code);

            $res=['msg'=>'ok'];//临时
            if($res['msg']=='ok')
            {
                \Cache::put($phone, $code,2);
                return response()->json(['code'=>200, 'status' => 1,'message' => '发送成功!','code'=>$code ]);
            }
            else
                return response()->json(['code'=>200, 'status' => 0,'message' => '发送失败!' ]);

        } catch (\Exception $e) {
            return ['code' => 200, 'status' => 0, 'message' => $e->getMessage()];
        }
    }

    /**
     * 服务类型
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getService(Request $request)
    {
        return $this->getServices();
    }
    /**
     * 科室列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getDepart(Request $request)
    {
        return $this->getDeparts();
    }
    /**
     * 科室列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getHospital(Request $request)
    {
        return $this->getHospitals($request->all());
    }
}
