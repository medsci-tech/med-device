@extends('web.layouts.app')

@section('title', '药械产品招商')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/products.css">
@endsection

@section('content')
	<div class="row nav">
		<div class="col-md-offset-1 col-md-11">
			<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a class="focus">
				药械产品招商
				<div class="strip"></div>
			</a>
			<a href="/market">药械营销服务</a>
			<a href="/agent">药械经纪人</a>
		</div>
	</div>

	<div class="row products">
		<div class="col-md-offset-1 col-md-10">
			<h3>所有产品</h3>
			<div class="panel">
				<span>分类：</span>
				<a href="{{ url('product/') }}">所有</a>
				@if($catogary)
					@foreach ($catogary as $val)
				<a href="{{ url('product/category/'.$val->id) }}">{{ $val->name }}</a>
					@endforeach
				@endif
			</div>
			@if($product)
				@foreach ($product as $val)
			<div class="col-md-2 item">
				<a href="{{ url('product/detail/'.$val->id) }}" target="_blank"><img src="{{ $val->logo }}?imageView2/1/w/220/h/220/q/90"></a>
				<span class="price-type">￥</span>
				<span class="price-num">{{ $val->price }}</span>
				<p>{{ $val->name }}</p>
			</div>
				@endforeach
			@endif

			{{$product->appends(['keyword'=>$keyword])->links()}}

		</div>
	</div>
@endsection

@section('page_js')
<script src="/js/products.js"></script>
@endsection