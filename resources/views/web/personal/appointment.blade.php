@extends('web.layouts.left')

@section('title', '我的预约')

@section('css_child')

@endsection

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-orders.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2 nav">
			<div class="item">
				<a class="button" href="/personal">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button" href="collection">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button focus">
					<span class="img4"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的预约
				</a>
			</div>
			<div class="item">
				<a class="button" href="pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-8">
			<div class="content-orders">
				<div class="panel">我的预约</div>
				<div class="tabs">
					<span>全部预约<span id="order-all"> ( {{ $count }} )</span></span>
					<span><a href="">已预约</a><span id="order-ordered"> ( {{ isset($count_list[2]) ? $count_list[2] : 0 }} )</span></span>
					<span><a href="">已审核</a><span id="order-audit"> ( {{ isset($count_list[1]) ? $count_list[1] : 0 }} )</span></span>
					<span><a href="">进行中</a><span id="order-on"> ( {{ isset($count_list[0]) ? $count_list[0] : 0 }} )</span></span>
					<span><a href="">已完成</a><span id="order-done"> ( {{ isset($count_list[3]) ? $count_list[3] : 0 }} )</span></span>
				</div>
				<div class="strip"></div>
				<div class="orders">
					@if($list)
						@foreach($list as $order)
					<div class="order-item">
						<div>
							<span class="title">{{ $order->product_name }}</span>
							<span class="type">{{ isset(\App\Models\Appointment::find($order->id)->service->name) ? \App\Models\Appointment::find($order->id)->service->name : '' }}</span>
							<span class="state">（未完成）</span>
						</div>
						<div>
							<span class="location">{{ $order->province.$order->city.$order->area }}</span>
							<span class="time">{{ $order->appoint_at }}</span>
						</div>
						<a class="btn-detail" href="{{ url('personal/appointment-detail/'.$order->id) }}">详情</a>
					</div>
						@endforeach
					@endif
						{{$list->appends(['status'=>$status])->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script src="/js/profile-orders.js"></script>
@endsection