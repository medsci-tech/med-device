@extends('web.layouts.app')

@section('title', '经纪人登记')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/broker-sign.css">
@endsection

@section('content')
	<div class="row nav">
		<div class="col-md-offset-1 col-md-11">
			<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a href="/product">药械产品招商</a>
			<a href="/market">药械营销服务</a>
			<a class="focus">
				药械经纪人
				<div class="strip"></div>
			</a>
		</div>
	</div>

	<div class="row nav2">
		<div class="col-md-offset-1 col-md-11">
			<a href="/agent">药械经纪人</a>
			<a>></a>
			<a>经纪人登记</a>
		</div>
	</div>

	<div class="row">

		<form class="form">
			<h2>经纪人登记</h2>
			<div class="separate-line"></div>

			<h4>基础信息</h4>
			<div class="input-box">
        		<div class="required">*</div>
				<label for="">真实姓名</label>
				<input type="text" name="realname" placeholder="请输入真实姓名">
			</div>
			<div class="no-border input-box">
        		<div class="required">*</div>
				<label>性别</label>
				<input class="sex-radio" type="radio" name="sex" value="男"><span>男</span>
				<input class="sex-radio" type="radio" name="sex" value="女"><span>女</span>
			</div>
			<div class="input-box">
        		<div class="required">*</div>
				<label for="">电子邮箱</label>
				<input type="text" name="email" placeholder="请输入电子邮箱">
			</div>
			<div class="input-box">
        		<div class="required">*</div>
				<label for="">工作区域</label>
				
				<div id="loc-wrapper">
					<input id="area" style="display: block" readonly type="text" name="area" placeholder="请选择省市地区">
				</div>
			</div>
			<div class="separate-line"></div>

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

			<input class="submit" type="submit" name="submit" value="立刻预约">

		</form>
	</div>
@endsection


@section('page_js')
<script src="/js/broker-sign.js"></script>
<script src="/js/loc.js"></script>
@endsection


@section('panel')
	<!-- 弹出面板 -->
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
		<div class="province"></div>
		<div class="city"></div>
		<input class="search-box" type="text" name="hospital" placeholder="请输入医院名字">
		<div class="items">
			<div class="item">
				<span class="name">武汉同济医院</span>
				<input type="checkbox">
			</div>
			<div class="item">
				<span class="name">武汉大学医院</span>
				<input type="checkbox">
			</div>
		</div>
	</div>
	<div id="panel3" class="panel panel3">
		<div class="btn-panel">选择</div>
		<img src="/img/broker-sign/u899.png">
		<p>选择服务类型(可添加多个）</p>
	</div>
	<!-- 弹出面板结束 -->
@endsection

