@extends('web.layouts.app')

@section('title', '药械经纪人')

@section('page_css')
<link rel="stylesheet" type="text/css" href="style/broker.css">
<link rel="stylesheet" type="text/css" href="/js/sweetalert/sweetalert.css">
@endsection

@section('content')
<div class="container">
	<div class="row nav">
		<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
		<a href="/product">药械产品招商</a>
		<a href="/market">药械营销服务</a>
		<a class="focus">
			药械经纪人
			<div class="strip"></div>
		</a>
	</div>
</div>
<div class="mid">
	<div class="shielder"></div>
	<div class="mid-content">
		<p></p>
		<a style="margin-top: 110px;border-radius: 6px" class="reserve"  href="@if (Auth::guest()) {{ url('login') }} @elseif (\Auth::user()->is_agent==1) {{ url('personal/expertise') }} @else  {{ url('agent/agent-sign') }} @endif" >成为药械经纪人</a>
	</div>
</div>
@endsection

