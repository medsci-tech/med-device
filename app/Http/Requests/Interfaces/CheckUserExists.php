<?php

namespace App\Http\Requests\Interfaces;
use App\Http\Requests\Request;
/**
 * @mixin Request
 */
trait CheckUserExists
{
    /**
     * 用户验证
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function checkExists(array $data=[])
    {
        $rules = [
            'name' => 'required',
        ];
        $messages = [
            'name.required' => '用户名不能为空',
        ];
        try {

            $validator = \Validator::make($data, $rules, $messages);
            $validator_error_first = $validator->errors()->first();
            if($validator_error_first)
                return ['code'=>200, 'status' => 0,'message' => $validator_error_first ];

            $model = \App\User::where(['name'=>$data['name']])->orWhere(['phone'=>$data['name']])->first();
            if($model)
                return ['code'=>200, 'status' => 0,'message' => '该账户已经存在!' ];
            else
                return ['code'=>200, 'status' => 1,'message' => '该账户可以注册!' ];
        }
        catch (\Exception $e) {
            return ['code' => 200, 'status' => 0, 'message' => $e->getMessage()];
        }

    }

}