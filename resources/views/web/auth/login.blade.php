@extends('web.layouts.app2')

@section('title', '登录')

@section('page_css')
<link rel="stylesheet" type="text/css" href="style/login.css">
@endsection

@section('page_js')
<script src="js/login.js"></script>
@endsection

@section('content')
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">默认Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="/forget">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="row mid">
    <div class="shielder"></div>
    <div class="panel">
        <h2>欢迎登录</h2>
        <div class="id">
            <img src="img/login/u1294.png">
            <input class="input" type="text" name="name" placeholder="请输入用户名或手机号">
        </div>
        <div class="password">
            <img src="img/login/u1296.png">
            <input class="input" type="text" name="password" placeholder="请输入密码">
        </div>
        <div class="password-option">
            <input class="checkbox" type="checkbox" name="remember">
            <span class="remember-password">记住密码</span>
            <a href="{{ url('forget') }}">忘记密码？</a>
        </div>
        <div id="submit" class="submit">登录</div>
        <p>
            <span>还没有账户？</span>
            <a href="{{ url('register') }}">立即注册</a>
        </p>
    </div>
</div>
@endsection
