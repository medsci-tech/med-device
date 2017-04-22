@extends('web.layouts.app2')

@section('title', '帮助')

@section('page_css')
<link rel="stylesheet" type="text/css" href="style/help.css">
@endsection

@section('page_js')
<script src="/js/help.js"></script>
@endsection


@section('content')
    <div class="row line"><div></div></div>
	<div class="row mid">
		<div class=" col-md-offset-1 col-md-10">
			<div class="nav">
				<div id="problems" class="nav-item focus">常见问题</div>
				<div id="buy" class="nav-item">购买流程</div>
				<div id="about" class="nav-item">关于我们</div>
				<div id="contact" class="nav-item">联系方式</div>
			</div>
			<div class="content problems">
				<div class="item">
					<div class="question">如何注册成为会员</div>
					<p class="answer">未登录账号时，点击主站顶部注册。<br>注册成功的账号请及时进行激活验证。</p>
				</div>
				<div class="item">
					<div class="question">我的没有收到激活怎么办？</div>
					<p class="answer">发送具有一定的延迟请等待一段时间后再次查询。</p>
				</div>
				<div class="item">
					<div class="question">如何更改填写错误怎么办？</div>
					<p class="answer">未激活账号可以在个人中心更改</p>
				</div>
				<div class="item">
					<div class="question">如何进行手动激活账号？</div>
					<p class="answer"></p>
				</div>
			</div>
			<div class="content buy">2</div>
			<div class="content about">3</div>
			<div class="content contact">4</div>
		</div>
	</div>
@endsection
