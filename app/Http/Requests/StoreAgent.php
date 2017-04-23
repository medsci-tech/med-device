<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Appointment;

class StoreAgent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|max:255',//产品
            'service_type_id' => 'required|Integer',//类型
            'province' => 'required',
            'city' => 'required',
            'hospital_name' => 'max:30',
            'departments' => 'max:100',
            'appoint_at' => 'required|nullable|date',//时间
            'contact_name' => 'required',//联系人
            'contact_phone' => 'required',//联系电话
            'comment' => 'max:500',
        ];
    }
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'product_name.required' => '产品名称不能为空',
            'service_type_id.required' => '服务类型不能为空',
            'province.required' => '省不能为空',
            'city.required' => '市不能为空',
            'appoint_at.required' => '预约时间不能为空',
            'contact_name.required' => '联系人不能为空',
            'contact_phone.required' => '联系电话不能为空',
        ];
    }

}
