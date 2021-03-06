@extends('web.layouts.app')

@section('title', '我的收藏')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-collect.css">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3 nav">
			<div class="item">
				<a class="button" href="/personal">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button focus">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/appointment">
					<span class="img4"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的预约
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-9">
			<div class="mycollect">
				<div class="panel">我的收藏</div>
				@if($list)
					@foreach($list as $order)
						@foreach($order->products as $product)
				<div class="collect-item">
					<a class="pic" href="{{ url('product/detail/'.$product->id) }}" target="_blank"><img src="{{ $product->logo }}?imageView2/1/w/220/h/220/q/90"></a>
					<a class="link" href="{{ url('product/detail/'.$product->id) }}" target="_blank">{{ $product->name }}</a>
					<div class="btn-cancel" product_id="{{ $product->id }}">取消收藏</div>

				</div>
						@endforeach
					@endforeach
				@endif
				{{$list->links()}}
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script src="/js/profile-collect.js"></script>
@endsection