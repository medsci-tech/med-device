@extends('web.layouts.left')

@section('title', '修改密码')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-change-password.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2 nav">
			<div class="item">
				<a class="button" href="/personal">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button" href="collection">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button" href="appointment">
					<span class="img4"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的预约
				</a>
			</div>
			<div class="item">
				<a class="button focus">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-8">
			<div class="modify">
				<div class="panel">修改密码</div>
			</div>

			<form class="form" action="" method="POST">
				<div>
					<label for="">手机号</label>
					<input type="text" name="phone" placeholder="建议使用常用手机" value="{{ \Auth::user()->phone }}">
				</div>
				<div class="captcha">
					<label for="">验证码</label>
					<input type="text" name="captcha" placeholder="请输入手机验证码">
					<div id="getCaptcha">获取验证码</div>
				</div>
				<div>
					<label for="">设置密码</label>
					<input type="password" name="password" placeholder="请输入密码">
				</div>
				<div>
					<label for="">确认密码</label>
					<input type="password" name="confirm" placeholder="请再次输入密码">
				</div>
				<input class="submit" type="submit" name="submit" value="确认">
			</form>
		</div>
	</div>
@endsection

@section('page_js')
<script src="/js/profile-change-passwordjs"></script>
@endsection