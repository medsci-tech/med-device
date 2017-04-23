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
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
			<a class="reserve" @if (!Auth::guest()) href="{{ url('agent/agent-sign') }}" @endif>成为药械经纪人</a>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script src="/js/broker.js"></script>
<script>
    //弹出面板
    $('.reserve').on('click', function () {
        @if (Auth::guest())
        sweetAlert("您还没有登录!");
		@endif
    });
    </script>
@endsection

