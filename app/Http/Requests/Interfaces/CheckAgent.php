<?php

namespace App\Http\Requests\Interfaces;
use App\Http\Requests\Request;

/**
 * @mixin Request
 */
trait CheckAgent
{
    /**
     * 经纪人登记验证
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function checkAgent(array $data=[])
    {
        if (!\Auth::check())
            return ['code'=>200, 'status' => 0,'message' => '请先登录!' ];

        $rules = [
            'real_name' => 'required|max:25',//真实姓名
            'sex' => "required",//类型
            'email' => 'required|email',
            'province' => 'required',
            'city' => 'required',
           // 'depart_ids' => 'required',//科室
            //'service_type_ids' => 'required',//服务类型
           // 'hospitals' => 'required',//省市区医院
        ];
        $messages = [
            'real_name.required' => '真实姓名不能为空',
            'sex.required' => '性别不能为空',
            'email.required' => '邮箱不能为空',
            'province.required' => 'province省不能为空',
            'city.required' => 'city市不能为空',
           // 'depart_ids.required' => '科室id不能为空',
           // 'service_type_ids.required' => '服务类型id不能为空',
           // 'hospitals.required' => '省市区医院不能为空',
        ];
        $validator = \Validator::make($data, $rules, $messages);
        $validator->after(function($validator) use ($data) {
            if (!$this->is_json($data['depart_ids']) && $data['depart_ids'])
                $validator->errors()->add('depart_ids', 'depart_ids无效的json');
            if (!$this->is_json($data['service_type_ids'])  && $data['service_type_ids'])
                $validator->errors()->add('service_type_ids', 'service_type_ids无效的json');
            if (!$this->is_json($data['hospitals']) && $data['hospitals'])
                $validator->errors()->add('hospitals', 'hospitals无效的json');
    });
        $validator_error_first = $validator->errors()->first();
        if($validator_error_first)
            return ['code'=>200, 'status' => 0,'message' => $validator_error_first ];

        return ['code'=>200, 'status' => 1,'message' => '验证成功!' ];
    }
    /**
     * json字符串验证
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function is_json($string)
    {
         json_decode($string);
         return (json_last_error() == JSON_ERROR_NONE);
    }

}