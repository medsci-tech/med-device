<?php

namespace App\Http\Requests\Interfaces;
use App\Http\Requests\Request;
use App\User;

/**
 * Class RequestHasTargetUser
 * @mixin Request
 */
trait SendCode
{
    /**
     * 短信发送
     * @author      lxhui<772932587@qq.com>
     * $phone 接收手机号
     * @since 1.0
     * @return array
     */
    public function send($phone)
    {
        $validator = \Validator::make(['phone'=>$phone], [
            'phone'=>'required|digits:11|regex:/^1[34578][0-9]{9}$/',
        ]);
        if ($validator->fails())
            return response()->json([ 'code' => 200, 'status' => 0, message => $validator->errors()->first('phone') ]);

        try {
            $code   = \MessageSender::generateMessageVerify();
            \MessageSender::sendMessageVerify($phone, $code);
            \Cache::put($phone, $code,1);
        } catch (\Exception $e) {
            return response()->json([ 'code' => 200, 'status' => 0, 'message' => $e->getMessage()]);
        }

        return response()->json([ 'code' => 200, 'status' => 1, 'message' => '发送成功' ]);
    }


}