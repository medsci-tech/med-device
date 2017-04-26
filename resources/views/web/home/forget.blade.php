@extends('web.layouts.app2')

@section('title','找回密码')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/password.css">
@endsection

@section('content')
    <div class="row line"></div>

    <div class="row">
        <div class="form-area">
            <h2 class="title">找回密码</h2>
            <form class="form">
                <div>
                    <div class="required">*</div>
                    <label>手机号</label>
                    <input id="phone" type="text" name="phone" placeholder="建议使用常用手机">
                </div>
                <div class="captcha">
                    <div class="required">*</div>
                    <label>验证码</label>
                    <input id="code" type="text" name="captcha" placeholder="请输入手机验证码">
                    <div id="getCaptcha">获取验证码</div>
                </div>
                <div>
                    <div class="required">*</div>
                    <label>修改密码</label>
                    <input id="password" type="password" name="password" placeholder="请输入密码">
                </div>
                <div>
                    <div class="required">*</div>
                    <label>确认密码</label>
                    <input id="password_confirmation" type="password" name="confirm" placeholder="请再次输入密码">
                </div>
                <div class="submit" id="submit" style="cursor: pointer;">确定</div>
            </form>
        </div>
    </div>
@endsection

@section('page_js')
<script src="/js/password.js"></script>
@endsection
