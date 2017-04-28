@extends('web.layouts.app')

@section('title', '我的合作')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-business.css">
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
				<a class="button" href="/personal/collection">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button focus">
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
		<div class="content col-md-9" style="margin-bottom: 80px">
			<div class="business">
				<div class="panel">我的合作</div>
				@if($list)
					@foreach($list as $order)
						@foreach($order->products as $product)
				<div class="business-item">
					<a class="pic" href="{{ url('product/detail/'.$product->id) }}" target="_blank"><img src="{{ $product->logo }}?imageView2/1/w/220/h/220/q/90"></a>
					<a class="link" href="{{ url('product/detail/'.$product->id) }}" target="_blank">{{ $product->name }}</a>
					<span id="contact" class="contact">{{ ($product->contact_name) ? '联系人：'.$product->contact_name : '' }}</span>
					<span id="tel" class="tel">{{ ($product->contact_phone) ? '联系电话：'.$product->contact_phone : '' }}</span>
					<a class="btn-cancle" href="{{ url('product/detail/'.$product->id) }}" target="_blank">详情</a>
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

@section('js')
<script src="/js/profile-business.js"></script>
@endsection