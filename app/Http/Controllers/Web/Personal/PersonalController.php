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

            $logoUrl = \Helper::qiniuUpload($request->file('Filedata'));

echo($logoUrl);exit;

        } else {
            echo(111111);exit;
        }

        exit;
        $file = Input::file('Filedata');

            $extension = $file->getClientOriginalExtension();
            $newName = date('YmdHis').mt_rand(100,999).".".$extension;
            $path = $file->move(base_path()."/uploads",$newName);
            $filepath = 'uploads/'.$newName;
            return $filepath;
            /*//检验上传的文件是否有效
            $clientName = $file->getClientOriginalName();//获取文件名称
            $tmpName = $file->getFileName();  //缓存在tmp文件中的文件名 例如 php9732.tmp 这种类型的
            $realPath = $file->getRealPath();  //这个表示的是缓存在tmp文件夹下的文件绝对路径。
            $entension = $file->getClientOriginalExtension(); //上传文件的后缀
            $mimeType = $file->getMimeType(); //得到的结果是imgage/jpeg
            $path = $file->move('storage/uploads');
            //如果这样写的话,默认会放在我们 public/storage/uploads/php9372.tmp
            //如果我们希望将放置在app的uploads目录下 并且需要改名的话
            $path = $file->move(app_path().'/uploads'.$newName);
            //这里app_path()就是app文件夹所在的路径。$newName 可以是通过某种算法获得的文件名称
            //比如 $newName = md5(date('YmdHis').$clientName).".".$extension;*/


    }

}
