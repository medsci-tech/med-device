@extends('web.layouts.app')

@section('title', '经纪人登记')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="/style/broker-sign.css">
@endsection

@section('content')
<div class="container">
	<div class="row nav" style="border-bottom: none;">
		<div class="col-md-12">
			<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a href="/product">药械产品招商</a>
			<a href="/market">药械营销服务</a>
			<a class="focus">
				药械经纪人
				<div class="strip"></div>
			</a>
		</div>
	</div>
</div>
<div style="border-bottom: 1px solid #01a4e4"></div>
<div class="nav2">
	<div class="container">
		<a href="/agent">药械经纪人</a>
		<a>></a>
		<a>经纪人登记</a>
	</div>
</div>
<div class="container">
	<div class="row">

		<form class="form" id="sign-form">
			<h2>经纪人登记</h2>
			<div class="separate-line"></div>

			<h4>基础信息</h4>
			<div class="input-box">
        		<div class="required">*</div>
				<label class="normal-label">真实姓名</label>
				<input id="name" class="normal-input" type="text" name="realname" placeholder="请输入真实姓名" @if (Auth::check()) value="{{ \Auth::user()->real_name }}" @endif>
			</div>
			<div class="no-border input-box">
        		<div class="required">*</div>

<!-- 				<label>性别</label>
				<input class="sex-radio" type="radio" name="sex" value="男" @if (Auth::check() && \Auth::user()->sex=='男') checked @endif><span>男</span>
				<input class="sex-radio" type="radio" name="sex" value="女" @if (Auth::check() && \Auth::user()->sex=='女') checked @endif><span>女</span> -->

				<label for="sex" class="control-label input-group" style="margin: 7px 45px 4px 8px">性别</label>
    			<div class="btn-group" data-toggle="buttons">
    			    
    			    <label class="btn btn-default active">
    			        <input type="radio" name="sex" value="男" @if (Auth::check() && \Auth::user()->sex=='男') checked @endif>男</label>
    			    <label class="btn btn-default">
    			        <input type="radio" name="sex" value="女" @if (Auth::check() && \Auth::user()->sex=='女') checked @endif>女</label>
    			</div>

			</div>
			<div class="input-box" id="birthday-box">
        		<div class="required">*</div>
				<label class="normal-label">出生日期</label>
				<input id="datetimepicker" class="normal-input" type="text" name="date" placeholder="年/月/日" data-date-format="yyyy-mm-dd">
			</div>
			<div class="input-box" id="email-box">
        		<div class="required">*</div>
				<label class="normal-label">电子邮箱</label>
				<input id="email" class="normal-input" type="text" name="email" placeholder="请输入电子邮箱" @if (Auth::check()) value="{{ \Auth::user()->email }}" @endif>
				<div class="email-dropdown"></div>
			</div>
			<div class="input-box">
        		<div class="required">*</div>
				<label class="normal-label">工作区域</label>
				
				<div id="loc-wrapper">
					<input class="normal-input" data-type="area" style="display: block" readonly type="text" name="area" placeholder="请选择省市地区">
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

			<button id="submit" type="submit" class="submit" style="cursor: pointer;">成为经纪人</button>

		</form>
	</div>
</div>
@endsection


@section('page_js')
<script src="/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/js/broker-sign.js"></script>
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
	<!-- 弹出面板结束 -->
@endsection

