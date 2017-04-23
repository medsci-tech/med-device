@extends('web.layouts.left')

@section('title', '个人专长')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-expertise.css">
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
				<a class="button" href="pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-8">
			<div class="infomanager">
				<div class="ipanel">
					<a href="/personal">信息管理</a>
					<span> &nbsp;> &nbsp;个人专长</span>
				</div>

				<div class="form">
					
					<h4>覆盖科室（可添加多个）</h4>
			<div id="item-container1" class="item-container"></div>
			<div id="department" class="btn-choose">选择科室</div>
			<div class="separate-line"></div>

			<h4>覆盖医院（可添加多个）</h4>
			<div id="item-container2" class="item-container"></div>
			<div id="hospital" class="btn-choose">选择医院</div>
			<div class="separate-line"></div>

			<h4>擅长服务类型（可添加多个）</h4>
			<div id="item-container3" class="item-container"></div>
			<div id="service" class="btn-choose">选择服务</div>
			<div class="separate-line"></div>

			<input class="submit" type="submit" name="submit" value="确定">

				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="/js/profile-expertise.js"></script>
@endsection

@section('panel')
<div class="shielder"></div>
<div id="panel1" class="panel panel1">
	<div class="btn-panel">选择</div>
	<img src="/img/broker-sign/u899.png">
	<p>选择科室(可添加多个）</p>
</div>
<div id="panel2" class="panel panel2">
	<div class="btn-panel">选择</div>
	<img src="/img/broker-sign/u899.png">
	<p>选择覆盖区域</p>
	<div class="province"><span>请选择</span><div class="drop-item"></div></div>
	<div class="city"><span>请选择</span><div class="drop-item"></div></div>
	<input class="search-box" type="text" name="hospital" placeholder="请输入医院名字">
	<div class="items"></div>
</div>
<div id="panel3" class="panel panel3">
	<div class="btn-panel">选择</div>
	<img src="/img/broker-sign/u899.png">
	<p>选择服务类型(可添加多个）</p>
</div>
@endsection