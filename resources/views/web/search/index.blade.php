@extends('web.layouts.app')

@section('title', '搜索列表')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/search-result.css">
@endsection

@section('content')
<div class="row nav">
	<div class="container">
		<div class="col-md-12">
			<a class="focus" href="/">
				&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;
				<div class="strip"></div>
			</a>
			<a href="/product">药械产品招商</a>
			<a href="/market">药械营销服务</a>
			<a href="/agent">药械经纪人</a>
		</div>
	</div>
</div>

<div style="background-color: #f2f2f2">
	<div class="container nav2">
		关于 &nbsp;<span>{{ $keyword  }}</span> &nbsp;的搜索结果共&nbsp; <span>{{ $count or 0  }}</span> &nbsp;个
	</div>
</div>

<div class="container">
	<div class="row products">
		@if($product)
			@foreach ($product as $val)
				<div class="col-md-2 item">
					<a href="{{ url('product/detail/'.$val->id) }}" target="_blank"><img src="{{ $val->logo }}?imageView2/1/w/220/h/220/q/90"></a>
					<span class="price-type">零售价格</span>
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
<!--script src="/js/search-result.js"></script-->
@endsection