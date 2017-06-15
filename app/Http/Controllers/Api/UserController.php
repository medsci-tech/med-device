<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userHead(Request $request)
    {
        if ($request->isMethod('post')) {
            $uid = $request->uid;
            $file = $request->file;//本地文件
            if(!User::find($uid) || !$file)
                return response()->json(['code'=>200, 'status' => 0,'message' => '找不到该用户or 图像不能为空' ]);
            else
            {
                $newName = md5(date('ymdhis')).".".'jpg';
                $disk = \Storage::disk('qiniu');
                $contents = file_get_contents($file);
                $disk->put($newName, $contents);
                $imageUrl = $disk->getDriver()->downloadUrl($newName);
                User::where(['id'=>$uid])->update(['head_img'=>$imageUrl]);
            }
            return response()->json(['code'=>200, 'status' => 1,'message' => '修改成功' ]);
        }

    }

}
