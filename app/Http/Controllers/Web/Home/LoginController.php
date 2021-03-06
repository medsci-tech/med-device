<?php

namespace App\Http\Controllers\Web\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\WebController;

/**
 * Class LoginController
 * @package App\Http\Controllers\Home
 */
class LoginController extends WebController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('web.home.login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        $messages = [
            'phone.required' => '手机号未填写',
            'phone.digits' => '收获格式不正确',
            'password.required' => '密码未填写'
        ];

        $rules = [
            'phone' => 'required|digits:11',
            'password' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } /*if>*/

        $student = Student::where('phone', '=', $request->input('phone'))->first();
        if (!$student) {
            $validator->errors()->add('phone', '电话号未注册');
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } /*if>*/

        if (!\Hash::check($request->input('password'), $student->password)) {
            $validator->errors()->add('password', '密码错误');
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } /*if>*/


        if ($student->name
            && $student->sex
            && $student->email
            && $student->birthday
            && $student->office
            && $student->title
            && $student->province
            && $student->city
            && $student->area
            && $student->hospital_name
        ) {
            \Session::set('replenished', true);
        }

        \Session::set('studentId', $student->id);

        if (\Session::has('return_referer')) {
            $returnUrl = \Session::get('return_referer');
            \Session::remove('return_referer');
            return redirect($returnUrl);
        } else {
            return redirect('/');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        \Session::clear();
        return redirect('/');
    }

} /*class*/
