<?php

namespace App\Http\Requests\Interfaces;
use App\Http\Requests\Request;

/**
 * @mixin Request
 */
trait CheckResetPwd
{
    /**
     * 重置密码验证
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function checkPhoneCode(array $data=[])
    {
        if(!isset($data['phone']) || !isset($data['code']) || !isset($data['password']))
            return ['code'=>200, 'status' => 0,'message' => '无效的参数请求' ];

        $rules = [
            'phone' => 'required|digits:11|exists:users,phone',
            'code' => 'required|digits:6',
            'password'=>'required|between:6,12|confirmed|regex:/^[\w\.-]{6,12}$/',
        ];
        $messages = [
            'phone.required' => '电话号码不能为空',
            'phone.exists' => '该电话号码尚未注册',
            'code.required' => '验证码不能为空',
            'password.required' => '密码不能为空',
            'password.between' => '密码必须是6~12位之间',
            'confirmed' => '新密码和确认密码不匹配'
        ];
        $validator = \Validator::make($data, $rules, $messages);
        $validator->after(function($validator) use ($data) {
            /* 验证码验证 */
            $auth_code = \Cache::get($data['phone']);
            if (!$auth_code || $auth_code!==$data['code'])
                $validator->errors()->add('code', '无效的验证码');
    });
        $validator_error_first = $validator->errors()->first();
        if($validator_error_first)
            return ['code'=>200, 'status' => 0,'message' => $validator_error_first ];

        return ['code'=>200, 'status' => 1,'message' => '验证成功!' ];
    }

}