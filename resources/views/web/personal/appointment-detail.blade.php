@extends('web.layouts.app')

@section('title', '预约详情')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-order-detail.css">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3 nav">
			<div class="item">
				<a class="button" href="{{ url('personal') }}">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button" href="{{ url('personal/collection') }}">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="{{ url('personal/cooperation') }}">
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
				<a class="button" href="{{ url('personal/pwd-edit') }}">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-9">
			<div class="profile-basic">
				<div class="panel">
					<a href="{{ url('personal/appointment') }}">我的预约</a>
					<span> &nbsp;> &nbsp;预约详情</span>
				</div>

				<div class="detail" style="margin-bottom: 80px">
					<div class="state">@if ($order->status===0)
							进行中
						@elseif ($order->status===1)
							已审核
						@elseif ($order->status===2)
							已预约
						@else
							已完成
						@endif</div>
					<div class="title">预约服务详情</div>
					<div class="detail-row">
						<span class="key">产品名称</span>
						<span class="value">{{ $order->product_name }}</span>
					</div>
					<div class="detail-row">
						<span class="key">服务类型</span>
						<span class="value">{{ $service_name }}</span>
					</div>
					<div class="detail-row">
						<span class="key">所在地点</span>
						<span class="value">{{ $order->province.$order->city.$order->area }}</span>
					</div>
					<div class="detail-row">
						<span class="key">服务预约时间</span>
						<span class="value">{{ str_limit($order->appoint_at, $limit = 10, $end = '') }}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script src="/js/profile-order-detail.js"></script>
@endsection