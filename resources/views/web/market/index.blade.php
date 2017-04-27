@extends('web.layouts.app')

@section('title', '药械营销服务')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/service.css">
@endsection
@section('content')
<div class="row nav">
	<div class="container">
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
			<p></p>
			<a style="margin-top: 110px;border-radius: 6px" class="reserve" href="@if (Auth::guest()) {{ url('login') }} @else {{ url('market/marketing-order/') }} @endif" >预约营销服务</a>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script src="/js/service.js"></script>
@endsection