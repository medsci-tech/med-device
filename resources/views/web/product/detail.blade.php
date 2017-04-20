@extends('web.layouts.app')

@section('title', '产品详情')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/../style/vendor.css">
<link rel="stylesheet" type="text/css" href="/../../style/product-detail.css">
@endsection

@section('content')
	<div class="row nav">
		<div class="col-md-offset-1 col-md-11">
			<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a href="/product">药械产品招商</a>
			<a class="focus" href="/market">
				药械营销服务
				<div class="strip"></div>
			</a>
			<a href="/agent">药械经纪人</a>
		</div>
	</div>

	<div class="row nav2">
		<div class="col-md-offset-1 col-md-11">
			<a href="/product">所有产品</a>
			<a>></a>
			<a>胰岛素</a>
			<a>></a>
			<a id="product-name">诺和笔5胰岛素笔式数显注射器</a>
		</div>
	</div>

	<div class="row detail">
		<div class="col-md-4 col-md-offset-1">
			<div class="preview">
				<div class="big">
					<img src="{{ $data->logo  }}?imageView2/1/w/450/h/450/q/90">
				</div>
				<div class="thumbnails">
					<div class="tab"></div>
					<!-- 缩略图前端请更新这里 -->
					@if($data->banners)
						@foreach($data->banners as $banner)
					<div class="thumbnail" style="background-image:{{$banner->image_url }}?imageView2/1/w/60/h/60/q/90"></div>
						@endforeach
					@endif
					<div class="tab"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="product-info">
				<h2>{{ $data->name  }}</h2>
				<div class="info-row">
					<div class="key">产品规格</div>
					<div class="value">{{ $data->default_spec  }}</div>
				</div>
				<div class="info-row">
					<div class="key">生产企业</div>
					<div class="value">{{ $data->enterprise  }}</div>
				</div>
				<div class="info-row">
					<div class="key">生产标准</div>
					<div class="value">{{ $data->standard  }}</div>
				</div>
				<div class="info-row">
					<div class="key">注册证号</div>
					<div class="value">{{ $data->registration  }}</div>
				</div>
				<div class="info-row">
					<div class="key">适用科室</div>
					<div class="value">{{ $data->office  }}</div>
				</div>
				<div class="info-row">
					<div class="key">适用范围</div>
					<div class="value">{{ $data->scope  }}</div>
				</div>
				<div class="info-row">
					<div class="key">使用注意</div>
					<div class="value">{{ $data->attention  }}</div>
				</div>
				<div class="info-row">
					<div class="key">价格</div>
					<div class="value">{{ $data->price  }}</div>
				</div>
				<div class="info-row">
					<div class="key">库存</div>
					<div class="value">{{ $data->stock  }}</div>
				</div>
				<div class="btn-business">我要合作</div>
				<div class="save">&nbsp;&nbsp;&nbsp;收藏</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row">
		<div class="order-now col-md-offset-1 col-md-10"><a href="{{ url('market/marketing-order',['id'=>222]) }}">立刻预约></a></div>
	</div>

	<div class="row">
		<div class="details col-md-offset-1 col-md-10">
			<div class="tabset">
				<div class="tabset-tab focus">产品详情</div>
				<div class="tabset-tab">招商信息</div>
				<div class="tabset-tab">教育视频</div>
				<div class="tabset-tab">同类产品</div>
			</div>
			<div class="content product-detail">
				{!! $data->detail !!}
			</div>
			<div class="content business">
				{!! $data->description !!}
			</div>
			<div class="content video"></div>
			<div class="content similar">
				<div class="col-md-2 item">
					<img src="/../img/home/u148.jpg">
					<p>怡成血糖仪家用电子血糖仪JPS系列 华鸿一次性无菌采血针 </p>
				</div>
				<div class="col-md-2 item">
					<img src="/../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="/../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="/../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="/../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="/../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="/../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="/../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="/../js/vendor.js"></script>
<script src="/../js/product-detail.js"></script>
@endsection

@section('panel')
	<div class="shielder"></div>
	<div id="panel" class="panel">
		<div class="btn-submit">提交</div>
		<img src="/../img/broker-sign/u899.png">
		<p>合作意向</p>
		<form>
			<div>
				<label>姓名</label>
				<input type="text" name="name" value="@if (Auth::check()){{ \Auth::user()->real_name }}@endif">
			</div>
			<div>
				<label>电话</label>
				<input type="text" name="phone" value="@if (Auth::check()){{ \Auth::user()->phone }}@endif">
			</div>
			<div class="checkboxs">
				@foreach(config('params')['work_option'] as $key =>$val)
				<input type="checkbox" name="work_type" value="{{ $key }}"><span>{{ $val }}</span>
				@endforeach
			</div>
		</form>
	</div>
@endsection