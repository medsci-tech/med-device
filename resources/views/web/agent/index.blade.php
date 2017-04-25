@extends('web.layouts.app')

@section('title', '药械经纪人')

@section('page_css')
<link rel="stylesheet" type="text/css" href="style/broker.css">
<link rel="stylesheet" type="text/css" href="/js/sweetalert/sweetalert.css">
@endsection
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script src="/js/sweetalert/sweetalert.min.js"></script>
@section('content')
<div class="container-fluid">
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
</div>
<div class="container-fluid">
	<div class="row mid">
		<div class="shielder"></div>
		<div class="mid-content">
			<p></p>
			<a style="margin-top: 110px" class="reserve"  href="@if (Auth::guest()) {{ url('login') }} @else {{ url('agent/agent-sign') }} @endif" >成为药械经纪人</a>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script src="/js/broker.js"></script>

@endsection

