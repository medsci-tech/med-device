@extends('web.layouts.app')

@section('title', '首页')

@section('page_css')
<link rel="stylesheet" href="/style/index.css">
@endsection

@section('page_js')
<script src="/js/index.js"></script>
@endsection

@section('content')
<div class="row nav">
	<div class="container">
		<a class="focus">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;<div class="strip"></div></a>
		<a href="product">药械产品招商</a>
		<a href="market">药械营销服务</a>
		<a href="agent">药械经纪人</a>
	</div>
</div>

@if($banners)
<div class="swiper-container">
	<div class="swiper-wrapper">
		@foreach($banners as $banner)
		<div class="swiper-slide" data-href="{{ $banner->href_url }}" style="background-image:url({{ $banner->image_url }})">
			<div class="container"></div>
		</div>
		@endforeach
	</div>
	<div class="swiper-pagination"></div>
</div>
@endif

<div class="container">
	<div class="row products">
			<div>
				<h2>热销产品</h2>
				<span class="link-all"><a href="{{ url('product') }}"> 所有产品 <i class="glyphicon glyphicon-menu-right"></i></a></span>
			</div>
		@if($data)
			@foreach ($data as $val)
			<div class="col-md-2 item">

				<a href="{{ url('product/detail/'.$val->id) }}" target="_blank"><img src="{{ $val->logo }}?imageView2/1/w/220/h/220/q/90"></a><p>{{ $val->name }}</p>
				<div class="price-tab">
					<span class="price-type">零售价格</span>
					<span class="price-num">{{ $val->price }}</span>
				</div>
				<p>{{ $val->name }}</p>
			</div>
			@endforeach
		@endif
	</div>
</div>
<div class="appointment">
	<h2>药械营销服务预约</h2>
	<a href="@if (Auth::guest()) {{ url('login') }} @else {{ url('market/marketing-order/') }} @endif" target="_blank">查看详情></a>
</div>
@endsection
