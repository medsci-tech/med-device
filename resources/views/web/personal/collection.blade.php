@extends('web.layouts.left')

@section('title', '我的收藏')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-collect.css">
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
				<a class="button focus">
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
				<a class="button" href="pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-8">
			<div class="mycollect">
				<div class="panel">我的收藏</div>
				<div class="collect-item">
					<a class="pic" href="/product/detail" target="_blank"><img src="/img/home/u150.jpg"></a>
					<a class="link" href="/product/detail">怡成血糖仪家用电子血糖仪JPS系列 华鸿一次性无菌采血针</a>
					<div class="btn-cancle">取消收藏</div>
				</div>

				<div class="collect-item">
					<a class="pic" href="/product/detail" target="_blank"><img src="/img/home/u150.jpg"></a>
					<a class="link" href="/product/detail">怡成血糖仪家用电子血糖仪JPS系列 华鸿一次性无菌采血针</a>
					<div class="btn-cancle">取消收藏</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="/js/profile-collect.js"></script>
@endsection