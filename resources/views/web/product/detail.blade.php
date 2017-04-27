@extends('web.layouts.app')

@section('title', '产品信息')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/product-detail.css">
@endsection

@section('content')
<section style="border-bottom: 2px solid rgb(1, 164, 228)">
	<div class="container">
		<div class="row nav">
			<div class="col-md-12">
				<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
				<a class="focus">
					药械产品招商
					<div class="strip"></div>
				</a>
				<a href="/market">药械营销服务</a>
				<a href="/agent">药械经纪人</a>
			</div>
		</div>
	</div>
</section>

<section style="background-color: #f2f2f2;">
	<div class="container">
		<div class="row nav2">
			<div class="col-md-12">
				<a href="/product">所有产品</a>
				<a>></a>
				<a>{{ $data->category->name or '全部' }}</a>
				<a>></a>
				<a id="product-name">{{ $data->name }}</a>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="row detail">
		<div class="col-md-5">
			<div class="preview">
				<div class="big">
					<img src="{{ $data->logo  }}?imageView2/1/w/450/h/450/q/90">
				</div>
				<div class="thumbnails">
					<div class="tab"><i class="glyphicon glyphicon-chevron-left"></i></div>
					<!-- 缩略图前端请更新这里,切换主图域请加载大图显示,宽度参数为：?imageView2/1/w/450/h/450/q/90 -->
					<div class="thumbnail active"
						data-url="{{ $data->logo }}"
						style="background-image: url({{ $data->logo }}?imageView2/1/w/60/h/60/q/90)"></div><!-- 加载主图 -->
					@if($data->banners)
						@foreach($data->banners as $banner)
					<div class="thumbnail"
						data-url="{{ $banner->image_url }}"
						style="background-image: url({{ $banner->image_url }}?imageView2/1/w/60/h/60/q/90)"></div>
						@endforeach
					@endif
					<div class="tab"><i class="glyphicon glyphicon-chevron-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="product-info">
				<h2>{{ $data->name  }}</h2>
				<div class="info-row">
					<div class="key">产品组成</div>
					<div class="value">{{ $data->attention  }}</div>
				</div>
				<div class="info-row">
					<div class="key">适用范围</div>
					<div class="value">{{ $data->scope  }}</div>
				</div>
				<div class="info-row">
					<div class="key">适用科室</div>
					<div class="value">{{ $data->office  }}</div>
				</div>
				<div class="info-row">
					<div class="key">适用部位</div>
					<div class="value">{{ $data->standard  }}</div>
				</div>
				<div class="info-row">
					<div class="key">产品规格</div>
					<div class="value">{{ $data->default_spec  }}</div>
				</div>
				<div class="info-row">
					<div class="key">注册证号</div>
					<div class="value">{{ $data->registration  }}</div>
				</div>
				<div class="info-row">
					<div class="key">生产企业</div>
					<div class="value">{{ $data->enterprise  }}</div>
				</div>
				<div class="info-row">
					<div class="key">零售价格</div>
					<div class="value">{{ $data->price  }}</div>
				</div>
				<div class="info-row">
					<div class="key">库存</div>
					<div class="value">{{ $data->stock  }}</div>
				</div>
				<div class="btn-business">我要合作</div>
				@if (Auth::guest())
					<div class="save" data-href="{{ url('login') }}"><i class="glyphicon glyphicon-heart"></i>&nbsp;&nbsp;收藏</div>
				@else
					<div class="save @if ($is_collect == 1) save-focus @endif"
						id="save"
					><i class="glyphicon glyphicon-heart"></i>&nbsp;&nbsp;<span></span></div>
				@endif
			</div>
		</div>
	</div>

	<div class="row">
		<div class="order-now col-md-12">
			<a href="@if (Auth::guest()) {{ url('login') }} @else {{ url('market/marketing-order?id='.$id) }} @endif">立刻预约></a>
		</div>
	</div>

	<div class="row">
		<div class="details col-md-12">
			<div class="tabset">
				<div class="tabset-tab focus">产品详情</div>
				<div class="tabset-tab">招商信息</div>
				<div class="tabset-tab">教育视频</div>
				<div class="tabset-tab">相关产品</div>
			</div>
			<div class="content product-detail">
				{!! $data->detail !!}
			</div>
			<div class="content business">
				{!! $data->description !!}
			</div>
			<div class="content video">
				<!-- 视频加载 -->
				@if($data->videos)
					@foreach($data->videos as $video)
						<div id="id_video_container_{{ $loop->index }}" style="width:100%;height:360px;"></div>
					@endforeach
				@endif
			</div>
			<div class="content similar">
				@if($data_similar)
					@foreach ($data_similar as $val)
						<div class="col-md-2 item">
							<a href="{{ url('product/detail/'.$val->id) }}" target="_blank"><img src="{{ $val->logo }}?imageView2/1/w/220/h/220/q/90"></a>
							<span class="price-type">零售价格</span>
							<span class="price-num" style="left: 82px">￥</span>
							<span class="price-num">{{ $val->price }}</span>
							<p>{{ $val->name }}</p>
						</div>
					@endforeach
				@endif

			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script>var $product_id = {{ $id }}</script>
<script src="/js/product-detail.js"></script>
<script src="//qzonestyle.gtimg.cn/open/qcloud/video/h5/h5connect.js"></script>
<script type="text/javascript">
	(function(){
		@if($data->videos)
			@foreach($data->videos as $video)
	    var option_{{ $loop->index }} ={"auto_play":"0","file_id":"{{ $video->qcloud_file_id }}","app_id":"{{ $video->qcloud_app_id }}","width":1024,"height":576,"https":1, "remember": 1};
	     /*调用播放器进行播放*/
		new qcVideo.Player( "id_video_container_{{ $loop->index }}", option_{{ $loop->index }});
			@endforeach
		@endif
	})()
</script>
<script>
    //弹出面板
    $('.btn-business').on('click', function () {
        @if (Auth::guest())
        window.location.href='/login';
		@endif
    });
</script>


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
				<input id="name" type="text" name="name" value="@if (Auth::check()){{ \Auth::user()->real_name }}@endif">
			</div>
			<div>
				<label>电话</label>
				<input id="phone" type="text" name="phone" value="@if (Auth::check()){{ \Auth::user()->phone }}@endif">
			</div>
			<div class="checkboxs">
				@foreach(config('params')['join_type'] as $key =>$val)
				<input type="checkbox" name="join_type" value="{{ $key }}"><span>{{ $val }}</span>
				@endforeach
			</div>
		</form>
	</div>
@endsection