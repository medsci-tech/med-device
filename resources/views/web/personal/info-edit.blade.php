@extends('web.layouts.app')

@section('title', '个人资料修改')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-basic.css">
<link rel="stylesheet" type="text/css" href="/js/uploadify/uploadify.css">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3 nav">
			<div class="item">
				<a class="button focus">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/collection">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/appointment">
					<span class="img4"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的预约
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-9">
			<span class="profile-basic">
				<div class="panel">
					<a href="/personal">信息管理</a>
					<span> &nbsp;> &nbsp;基础信息修改</span>
				</div>
				<div style="text-align: center; margin: 0 338px">
					<div class="icon">
						<img name="head" src="{{ isset(\Auth::user()->head_img) ? \Auth::user()->head_img.'?imageView2/1/w/150/h/150/q/90' : config('params')['default_head'].'?imageView2/1/w/150/h/150/q/90' }}">
					</div>
					<div id="choose-icon">上传头像</div>
				</div>
				<form class="form" id="profile-form">
					<div id="name-box">
						<label class="normal-label">用户名</label>
						<input class="normal-input" type="text" name="name" placeholder="您的账户名和登录名" value="{{ \Auth::user()->name }}" readonly>
					</div>
					<div>
						<label class="normal-label">手机号</label>
						<input class="normal-input" type="text" name="phone" placeholder="建议使用常用手机" value="{{ \Auth::user()->phone }}" readonly>
					</div>
					<div>
						<label class="normal-label">真实姓名</label>
						<input class="normal-input" type="text" name="real_name" placeholder="请输入真实姓名" value="{{ \Auth::user()->real_name }}">
					</div>
					<div class="no-border">

						<label for="sex" class="control-label input-group" style="margin:8px 61px 0 10px">性别</label>
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default active">
								<input type="radio" name="sex" value="男" @if (\Auth::user()->sex =='男')checked @endif>男</label>
							<label class="btn btn-default">
								<input type="radio" name="sex" value="女" @if (\Auth::user()->sex =='女')checked @endif>女</label>
						</div>
					</div>
					<div id="email-box" style="position: relative;">
						<label class="normal-label">电子邮箱</label>
						<input id="email" class="normal-input" type="text" name="email" placeholder="请输入电子邮箱" value="{{ \Auth::user()->email }}">
						<div class="email-dropdown"></div>
					</div>
					<div>
						<label class="normal-label">工作地址</label>
						<input data-type="area" class="normal-input" type="text" name="area" value="{{ Auth::user()->province }} - {{ Auth::user()->city }} - {{ Auth::user()->area }}">
					</div>

					<button class="submit" type="submit" id="submit">确定</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script src="/js/uploadify/jquery.uploadify.js"></script>
<script src="/js/profile-basic.js"></script>
@endsection