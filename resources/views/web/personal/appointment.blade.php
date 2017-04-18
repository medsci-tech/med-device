@extends('web.layouts.left')

@section('title', '我的预约')

@section('css_child')

@endsection

@section('page_css')
<link rel="stylesheet" type="text/css" href="../style/profile-orders.css">
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
				<a class="button" href="cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button focus">
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
			<div class="content-orders">
				<div class="panel">我的预约</div>
				<div class="tabs">
					<span>全部预约<span id="order-all"> ( 3 )</span></span>
					<span>已完成<span id="order-done"> ( 1 )</span></span>
					<span>未完成<span id="order-undone"> ( 2 )</span></span>
				</div>
				<div class="strip"></div>
				<div class="orders">
					<div class="order-item">
						<div>
							<span class="title">怡成血糖仪家用电子血糖仪JPS系列</span>
							<span class="type">临床反馈</span>
							<span class="state">（未完成）</span>
						</div>
						<div>
							<span class="location">湖北省武汉市洪山区高新大道</span>
							<span class="time">2017-3-30</span>
						</div>
						<a class="btn-detail" href="appointment-detail">详情</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script src="js/profile-orders.js"></script>
@endsection