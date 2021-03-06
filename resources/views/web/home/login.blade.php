@extends('web.layouts.app')

@section('title', '登录')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/login.css">
@endsection

@section('page_js')
<script src="/js/login.js"></script>
@endsection


@section('content')
    <div class="row mid">
        <div class="shielder"></div>
        <div class="panel">
            <h2>欢迎登录</h2>
            <form method="POST" action="">
                <div class="id">
                    <img src="/img/login/u1294.png">
                    <input id="name" class="input" type="text" name="id" placeholder="请输入用户名或手机号">
                </div>
                <div class="password">
                    <img src="/img/login/u1296.png">
                    <input id="password" class="input" type="text" name="password" placeholder="请输入密码">
                </div>
                <div class="password-option">
                    <input id="remember" class="checkbox" type="checkbox" name="remember-password">
                    <span class="remember-password">记住密码</span>
                    <a href="forget">忘记密码？</a>
                </div>
                <input id="submit" type="submit" name="submit" value="登录">
                <p>
                    <span>还没有账户？</span>
                    <a href="register">立即注册</a>
                </p>
            </form>
        </div>
    </div>
@endsection
