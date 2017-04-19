<?php

namespace App\Http\Requests\Interfaces;

use App\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;
class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return $this->getApiAuthedUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|unique:users',
            'email' => 'nullable|unique:users'
        ];
    }
}
