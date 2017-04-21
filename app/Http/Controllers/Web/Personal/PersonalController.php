<?php

namespace App\Http\Controllers\Web\Personal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interfaces\CheckResetPwd;
use App\User;
class PersonalController extends Controller
{
    use CheckResetPwd;
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
    public function infoEdit()
    {

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

}
