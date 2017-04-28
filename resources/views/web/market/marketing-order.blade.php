@extends('web.layouts.app')

@section('title', '营销服务预约')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="/style/marketing-order.css">
@endsection

@section('content')
<section style="border-bottom: 2px solid #01a4e4">
	<div class="container">
		<div class="nav" style="border-bottom: none;">
			<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a href="/product">药械产品招商</a>
			<a class="focus" href="/market">
				药械营销服务
				<div class="strip"></div>
			</a>
			<a href="/agent">药械经纪人</a>
		</div>
	</div>
</section>
<div style="background-color: #f2f2f2">
	<div class="container nav2">
		<a href="/market">药械营销服务</a>
		<a>></a>
		<a>营销服务预约</a>
	</div>
</div>

<div class="form-area">
	<h2 class="title">营销服务预约</h2>

	<!-- 下拉框 -->
	<ul id="drop-type" class="drop-down">
		@foreach ($data as $val)
		<li type="{{ $val->id }}">{{ $val->name }}</li>
		@endforeach
	</ul>
	<ul id="drop-province" class="drop-down">
		<li>湖北省</li>
		<li>湖南省</li>
		<li>湖东省</li>
	</ul>
	<ul id="drop-city" class="drop-down">
		<li>市一</li>
		<li>市二</li>
		<li>市三</li>
	</ul>
	<ul id="drop-county" class="drop-down">
		<li>一县</li>
		<li>二县</li>
		<li>三县</li>
	</ul>
	<!-- 下拉框结束 -->
	
	<form class="form">
		<div>
			<div class="required">*</div>
			<label class="normal-label" for="product-name">产品名称</label>
			<input id="product-name" class="normal-input" type="text" name="name" placeholder="输入产品名称" @if ($product)value="{{ $product->	name }}" @endif>
		</div>
		<div>
			<div class="required">*</div>
			<label class="normal-label" for="service-type">服务类型</label>
			<input id="service-type" class="normal-input" type="text" name="type" placeholder="选择服务类型" readonly style="background-color: 	white">
			<div id="btn-dropdown-type" class="btn-dropdown"></div>
		</div>
		<div>
			<div class="required">*</div>
			<label class="normal-label" for="area">预约区域</label>
			<input id="area" data-type="area" class="normal-input" type="text" name="phone" placeholder="选择地区">
		</div>
		<div>
			<label class="normal-label" for="hospital">医院</label>
			<input id="hospital"  class="normal-input" type="text" name="phone" placeholder="可填写多家医院">
		</div>
		<div>
			<label class="normal-label" for="department">科室</label>
			<input id="department"  class="normal-input" type="text" name="phone" placeholder="可填写多家科室">
		</div>
		<div>
			<div class="required">*</div>
			<label class="normal-label" for="datetimepicker">预约日期</label>
			<input id="datetimepicker" class="normal-input" type="text" name="phone" placeholder="年/月/日" data-date-format="yyyy-mm-dd">
		</div>
		<div>
			<div class="required">*</div>
			<label class="normal-label" for="contact">联系人</label>
			<input id="contact" class="normal-input" type="text" name="realname" placeholder="请输入联系人姓名">
		</div>
		<div>
			<div class="required">*</div>
			<label class="normal-label" for="tel">联系电话</label>
			<input id="tel" class="normal-input" type="text" name="email" placeholder="请输入联系电话">
		</div>
		<div class="desc">
			<label class="normal-label" for="desc">要求描述</label>
			<textarea id="desc" placeholder="请填写详细的要求"></textarea>
		</div>
		<div class="submit" id="submit">立刻预约</div>
	</form>
</div>
@endsection


@section('page_js')
<script src="/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/js/marketing-order.js"></script>
@endsection
