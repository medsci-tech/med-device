<?php

namespace App\Http\Controllers\Web\Personal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interfaces\CheckResetPwd;
use App\Http\Requests\Interfaces\CheckResetInfo;
use App\User;
class PersonalController extends Controller
{
    use CheckResetPwd,CheckResetInfo;
    public function index()
    {

        return view('web.personal.index', ['data' => null]);
    }

    public function collection()
    {
        $res = \App\User::find(\Auth::id())->collections;
        foreach ($res as $role) {

        }

        return view('web.personal.collection', ['data' => null]);
    }

    public function cooperation()
    {

        return view('web.personal.cooperation', ['data' => null]);
    }

    public function appointment()
    {

        return view('web.personal.appointment', ['data' => null]);
    }
    public function appointmentDetail()
    {

        return view('web.personal.appointment-detail', ['data' => null]);
    }
    /**
     * 个人资料修改
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function infoEdit(Request $request)
    {
        if ($request->isMethod('post')) {
            $result =$this->CheckResetInfo($request->all());
            if($result['status'] ==1)
            {
                $user = \Auth::user();
                $user->real_name =$request->real_name;
                $user->province =$request->province;
                $user->city =$request->city;
                $user->area =$request->area;
                $user->sex =$request->sex;
                $user->email =$request->email;
                $user->save();
                return response()->json(['code'=>200, 'status' => 1,'message' => '修改成功' ]);
            }
            else
                return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);
        }

        return view('web.personal.info-edit', ['data' => null]);
    }

    /**
     * 修改密码
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function pwdEdit(Request $request)
    {
        if ($request->isMethod('post')) {
            $result =$this->checkPhoneCode($request->all());
            if($result['status'] ==1)
            {
                $user = \Auth::user();
                $user->password = bcrypt($request->password);
                $user->save();
                return response()->json(['code'=>200, 'status' => 1,'message' => '修改成功' ]);
            }
            else
                return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);
        }

        return view('web.personal.pwd-edit', ['data' => null]);
    }

    public function expertise()
    {

        return view('web.personal.expertise', ['data' => null]);
    }
    public function enterprise()
    {

        return view('web.personal.enterprise', ['data' => null]);
    }
    /**
     * 个人图像上传
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function uploadHead(Request $request)
    {
        $file = $request->file('Filedata');
        if ($file->isValid()) {
            $url = \Helper::qiniuUpload($request->file('Filedata'));
            $user = \Auth::user();
            $user->head_img = $url;
            $user->save();
            return response()->json(['code'=>200, 'status' => 1,'message' => '上传成功成功','data'=>['head_img'=>$url.'?imageView2/1/w/150/h/150/q/90'] ]);
        } else
            return response()->json(['code'=>200, 'status' => 0,'message' => '上传失败' ]);
    }

}
