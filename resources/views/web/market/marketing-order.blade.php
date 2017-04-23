@extends('web.layouts.app')

@section('title', '营销服务预约')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="/style/marketing-order.css">
@endsection

@section('content')
	<div class="row nav">
		<div class="col-md-offset-1 col-md-11">
			<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a href="/product">药械产品招商</a>
			<a class="focus" href="/market">
				药械营销服务
				<div class="strip"></div>
			</a>
			<a href="/agent">药械经纪人</a>
		</div>
	</div>

	<div class="row nav2">
		<div class="col-md-offset-1 col-md-11">
			<a href="/market">药械营销服务</a>
			<a>></a>
			<a>营销服务预约</a>
		</div>
	</div>

	<div class="row">
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

			<form class="form" action="" method="POST">

				<div>
					<div class="required">*</div>
					<label for="product-name">产品名称</label>
					<input id="product-name" type="text" name="name" placeholder="输入产品名称" @if ($product)value="{{ $product->name }}" @endif>
				</div>
				<div>
					<div class="required">*</div>
					<label for="service-type">服务类型</label>
					<input id="service-type" type="text" name="type" placeholder="选择服务类型" readonly style="background-color: white">
					<div id="btn-dropdown-type" class="btn-dropdown"></div>
				</div>
				<div>
					<div class="required">*</div>
					<label for="area">预约区域</label>
					<input id="area" type="text" name="area">
					<div id="province" class="province">
						<div id="value-province">省</div>
						<div id="btn-dropdown-province" class="btn-dropdown"></div>
					</div>
					<div id="city" class="city">
						<div id="value-city">市</div>
						<div id="btn-dropdown-city" class="btn-dropdown"></div>
					</div>
					<div id="county" class="county">
						<div id="value-county">县</div>
						<div id="btn-dropdown-county" class="btn-dropdown"></div>
					</div>
				</div>
				<div>
					<label for="hospital">医院</label>
					<input id="hospital" type="text" name="phone" placeholder="可填写多家医院">
				</div>
				<div>
					<label for="department">科室</label>
					<input id="department" type="text" name="phone" placeholder="可填写多家科室">
				</div>
				<div>
					<div class="required">*</div>
					<label for="datetimepicker">预约日期</label>
					<input id="datetimepicker" type="text" name="phone" placeholder="年/月/日" data-date-format="yyyy-mm-dd">
				</div>
				<div>
					<div class="required">*</div>
					<label for="contact">联系人</label>
					<input id="contact" type="text" name="realname" placeholder="请输入联系人姓名">
				</div>
				<div>
					<div class="required">*</div>
					<label for="tel">联系电话</label>
					<input id="tel" type="text" name="email" placeholder="请输入联系电话">
				</div>
				<div class="desc">
					<label for="desc">要求描述</label>
					<textarea id="desc" placeholder="请填写详细的要求"></textarea>
				</div>
				<input class="submit" type="submit" name="submit" value="立刻预约">
			</form>
		</div>
	</div>
@endsection


@section('page_js')
<script src="/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/js/marketing-order.js"></script>
@endsection
