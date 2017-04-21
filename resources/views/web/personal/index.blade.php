@extends('web.layouts.left')

@section('title', '个人中心')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2 nav">
			<div class="item">
				<a class="button focus">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button" href="personal/collection">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="personal/cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button" href="personal/appointment">
					<span class="img4"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的预约
				</a>
			</div>
			<div class="item">
				<a class="button" href="personal/pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-8">
			<div class="infomanager">
				<div class="panel">信息管理</div>
				<img src="{{ isset(\Auth::user()->head_img) ? \Auth::user()->head_img.'?imageView2/1/w/120/h/120/q/90' : '' }}">
				<div class="welcome">
					<p>尊敬的&nbsp;<span id="name" class="name">{{ \Auth::user()->name }}</span>&nbsp;您好，欢迎您回来!</p>
					<a href="/personal/info-edit">基本信息</a><span>（未完善）</span>
					<a href="/personal/expertise">个人专长</a><span>（未完善）</span>
					<a href="/personal/enterprise">企业信息</a><span>（未完善）</span>
				</div>
			</div>
			<div class="mymessage">
				<div class="panel">我的消息</div>
				<div class="item-message">
					<span class="time">2017-3-31 12：00</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="/js/profile.js"></script>
@endsection