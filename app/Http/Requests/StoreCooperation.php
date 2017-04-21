<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Appointment;

class StoreCooperation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user();
        //return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'real_name' => 'required|max:25',//姓名
            'contact_phone' => 'required',//联系人电话
            'join_type' => 'required|max:5',//合作类型
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
            'product_id.required' => '产品id不能为空',
            'real_name.required' => '姓名不能为空',
            'contact_phone.required' => '联系电话不能为空',
            'product_id.exists' => '商品id不存在',
            'join_type.required' => '合作类型不能为空,多个类型如: 2,3,4',
        ];
    }

}
