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
		<a class="reserve" href="{{ url('market/marketing-order/') }}" style="cursor: pointer">预约营销服务</a>
	</div>
</div>
@endsection

@section('page_js')
<script src="/js/service.js"></script>
<script>
    //弹出面板
    $('.reserve').on('click', function () {
        @if (Auth::guest())
        sweetAlert("您还没有登录!");
		@endif
    });
</script>
@endsection