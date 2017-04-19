@extends('web.layouts.app')

@section('title', '药械营销服务')

@section('page_css')
<link rel="stylesheet" type="text/css" href="../style/service.css">
@endsection
@section('content')
	<div class="row nav">
		<div class="col-md-offset-1 col-md-11">
			<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a href="product">药械产品招商</a>
			<a class="focus">
				药械营销服务
				<div class="strip"></div>
			</a>
			<a href="agent">药械经纪人</a>
		</div>
	</div>

	<div class="row mid">
		<div class="shielder"></div>
		<div class="mid-content">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
			<a class="reserve" href="market/marketing-order">预约营销服务</a>
		</div>
	</div>
@endsection

@section('page_js')
<script src="../js/service.js"></script>
@endsection