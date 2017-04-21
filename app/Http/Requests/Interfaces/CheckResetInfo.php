<?php

namespace App\Http\Requests\Interfaces;
use App\Http\Requests\Request;

/**
 * @mixin Request
 */
trait CheckResetInfo
{
    /**
     * 重置个人信息验证
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function CheckResetInfo(array $data=[])
    {
        if(!isset($data['phone']) || !isset($data['name']))
            return ['code'=>200, 'status' => 0,'message' => '无效的参数请求' ];

        $rules = [
            'name' => 'required|exists:users,name',
            'phone' => 'required|digits:11|exists:users,phone',
        ];
        $messages = [
            'phone.required' => '电话号码不能为空',
            'phone.exists' => '该电话号码尚未注册',
            'name.required' => '用户名不能为空',
            'name.exists' => '账号不存在',
        ];
        $validator = \Validator::make($data, $rules, $messages);

        $validator_error_first = $validator->errors()->first();
        if($validator_error_first)
            return ['code'=>200, 'status' => 0,'message' => $validator_error_first ];

        return ['code'=>200, 'status' => 1,'message' => '验证成功!' ];
    }

}