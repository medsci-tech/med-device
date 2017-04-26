@extends('web.layouts.app2')

@section('title','注册')

@section('page_css')
<link rel="stylesheet" type="text/css" href="style/register.css">
@endsection

@section('page_js')
<script src="/js/register.js"></script>
@endsection

@section('content')
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">默认Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="row line"></div>
<div class="row">
  <div class="form-area">
    <h2 class="title">欢迎注册</h2>
    <form class="form">
      <div>
        <div class="required">*</div>
        <label>用户名</label>
        <input id="name" type="text" name="name" placeholder="您的账户名和登录名" required>
      </div>
      <div>
        <div class="required">*</div>
        <label>设置密码</label>
        <input id="password" type="password" name="password" placeholder="请输入密码" required>
      </div>
      <div>
        <div class="required">*</div>
        <label>确认密码</label>
        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="请再次输入密码" required>
      </div>
      <div>
        <div class="required">*</div>
        <label>手机号</label>
        <input id="phone" type="text" name="phone" placeholder="建议使用常用手机" required>
      </div>
      <div class="captcha">
        <div class="required">*</div>
        <label>验证码</label>
        <input id="code" type="text" name="code" placeholder="请输入手机验证码" required>
        <div id="getCaptcha">获取验证码</div>
      </div>
      <div>
        <label>真实姓名</label>
        <input id="real_name" type="text" name="real_name" placeholder="请输入真实姓名">
      </div>
      <div class="no-border">
        <label>性别</label>
        <input class="sex-radio" type="radio" name="sex" value="男"><span>男</span>
        <input class="sex-radio" type="radio" name="sex" value="女"><span>女</span>
      </div>
      <div>
        <label>电子邮箱</label>
        <input id="email" type="text" name="email" placeholder="请输入电子邮箱">
        <div class="email-dropdown"></div>
      </div>
      <div>
        <label>工作区域</label>
      </div>
      <div class="no-border">
        <input id="agree" class="confirm-agree" type="checkbox" name="agree" checked>
        <span>我同意</span><a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">药械通用户服务协议</a>
      </div>
      <div id="submit" class="submit" style="cursor: pointer;">注册</div>
      <p>已有账号？ <a href="login">请登录</a></p>
    </form>
  </div>
</div>
@endsection

@section('panel')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
          药械通用户服务协议
        </h4>
      </div>
      <div class="modal-body">
        药械通用户服务协议<br>
        药械通用户服务协议<br>
        药械通用户服务协议<br>
        药械通用户服务协议<br>
        药械通用户服务协议<br>
        药械通用户服务协议<br>
        药械通用户服务协议<br>
        药械通用户服务协议<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
      </div>
    </div>
  </div>
</div>
@endsection