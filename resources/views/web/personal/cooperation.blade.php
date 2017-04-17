@extends('web.layouts.left')

@section('title', '我的合作')

@section('page_css')
<link rel="stylesheet" type="text/css" href="../style/profile-business.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2 nav">
			<div class="item">
				<a class="button" href="../personal">
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
				<a class="button focus">
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
			<div class="business">
				<div class="panel">我的收藏</div>
				<div class="business-item">
					<a class="pic" href="product-detail.html" target="_blank"><img src="img/home/u150.jpg"></a>
					<a class="link" href="profile-order-detail.html">怡成血糖仪家用电子血糖仪JPS系列 华鸿一次性无菌采血针</a>
					<span id="contact" class="contact">联系人：小陈</span>
					<span id="tel" class="tel">联系电话：13693858395</span>
					<div class="btn-cancle">详情</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script src="../js/profile-business.js"></script>
@endsection