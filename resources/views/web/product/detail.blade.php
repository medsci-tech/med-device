@extends('web.layouts.app')

@section('title', '产品详情')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/../style/vendor.css">
<link rel="stylesheet" type="text/css" href="/../../style/product-detail.css">
<link rel="stylesheet" type="text/css" href="/js/sweetalert/sweetalert.css">
@endsection
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script src="/js/sweetalert/sweetalert.min.js"></script>
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
			<div class="content video"><div id="id_video_container" style="width:100%; height:auto;"></div>;
				@if($data->videos)
					@foreach($data->videos as $video)

					@endforeach
				@endif
			</div>
			<div class="content similar">
				@if($data_similar)
					@foreach ($data_similar as $val)
						<div class="col-md-2 item">
							<a href="{{ url('product/detail/'.$val->id) }}" target="_blank"><img src="{{ $val->logo }}?imageView2/1/w/220/h/220/q/90"></a>
							<p>{{ $val->name }}</p>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="/../js/vendor.js"></script>
<script src="/../js/product-detail.js"></script>
<script src="http://qzonestyle.gtimg.cn/open/qcloud/video/h5/h5connect.js"></script>
<script>
    //弹出面板
    $('.btn-business').on('click', function () {
        @if (Auth::guest())
        sweetAlert("您还没有登录!");
		@endif
    });

    // 视频播放
    $(function () {
        // 腾讯视频
        var option = {
            "auto_play": "0",
            "file_id": "1253586357",
            "app_id": "9031868222912344050",
            "width": 700,
            "height": 500,
            "remember": 1,
            "stretch_patch": true,
        };
		/*调用播放器进行播放*/
        new qcVideo.Player("id_video_container", option);
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
				<input type="text" name="name" value="@if (Auth::check()){{ \Auth::user()->real_name }}@endif">
			</div>
			<div>
				<label>电话</label>
				<input type="text" name="phone" value="@if (Auth::check()){{ \Auth::user()->phone }}@endif">
			</div>
			<div class="checkboxs">
				@foreach(config('params')['join_type'] as $key =>$val)
				<input type="checkbox" name="join_type" value="{{ $key }}"><span>{{ $val }}</span>
				@endforeach
			</div>
		</form>
	</div>
@endsection