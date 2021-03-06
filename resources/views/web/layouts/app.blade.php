<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="description" content="施康培科技（武汉）有限公司版权所有!">
<meta name="Keywords" content="药械通">
<meta name="baidu-site-verification" content="Xq1291mV7Z">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="/style/common.css">
<link rel="stylesheet" type="text/css" href="/js/sweetalert/sweetalert.css">
@yield('page_css')
<script>
window.$User = {!! Auth::user() ? Auth::user() : 'null' !!}
window.$CSRFTOKEN = '{!! csrf_token() !!}'
</script>
</head>
<body>
<header>
	<div class="top-nav">
		<div class="container">
				@if (Auth::guest())
					<a class="btn-login" href="{{ url('login') }}">登录</a>
					<a class="btn-register" href="{{ url('register') }}">注册</a>
				@else
					<a class="btn-login">{{ Auth::user()->name }}</a>
					<a class="btn-register" href="/logout"><i class="fa fa-btn fa-sign-out"></i>退出</a></a>
				@endif
				<span class="common pull-right">
					<a class="btn btn-link icon icon-161" href="/personal">个人中心</a>
					<a class="btn btn-link icon icon-163" href="/personal">我的消息</a>
					<a class="btn btn-link icon icon-165" href="/helper">帮助中心</a>
				</span>
				<span class="personal hide pull-right">
					<a class="btn btn-link icon icon-home" href="/">药械通首页</a>
					<a class="btn btn-link icon icon-165" href="/helper">帮助中心</a>
				</span>
				<span class="helper hide pull-right">
					<a class="btn btn-link icon icon-home" href="/">药械通首页</a>
					<a class="btn btn-link icon icon-161" href="/personal">个人中心</a>
				</span>
		</div>
	</div>

	<div class="container">
		<div class="row search" style="border: none;">
			<div class="col-md-3">
				<a class="logo-link" href="/">
					<img class="logo" src="/img/home/u61.jpg">
					<h1 style="margin-top: 30px" class="h1">药械通</h1>
				</a>
			</div>
			<div class="col-md-6 search-wrapper">
				<form  method="get" action="{{url('search')}}" name="searchForm">
				<div class="searcher">
					<div class="input">
						<input type="text" id="keyword" name="keyword" placeholder="输入产品名称">
					</div>
					<button class="button" type="submit" style="cursor: pointer;border: 0 none;">搜索</button>
				</div>
				</form>
				<p class="hot" style="text-align: center;padding-right: 0">
					热门搜索词：
				@foreach ($keywords as $data)
						<a href="{{ url('search/'.$data['id']) }}">{{$data['name']}}</a>
				@endforeach
				</p>
			</div>
			<div class="col-md-3 contect" style="padding: 14px 0 0 60px">
				<span>药械小助手 400-8648883</span>
				<div class="wechat">
					<img class="wechat-logo" src="/img/home/wechat.png" style="width: 24px;height: 19px">
					<img class="wechat-code" src="/img/home/u101.jpg" style="z-index: 9;width: 200px;height: 200px">
				</div>
			</div>
		</div>
	</div>
</header>

@yield('content')

<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-8 info-footer">
				<a href="/helper#about">关于我们</a>
				<a href="/helper#contact">联系我们</a>
				<a href="/helper#buy">购买方式</a>
				<a href="/helper#problems">常见问题</a>
				<p>&copy; 2017 施康培医疗科技（武汉）有限公司版权所有，保留所有权利</p>
				<p>互联网药品信息服务资格证书编号（鄂）经营性-2016-0011</p>
				<p>鄂ICP备15021002号-3</p>
			</div>
			<div class="col-md-4 qr-code">
				<div class="row">
					<div class="col-md-6">
						<img width="100%" src="/img/home/u101.jpg">
						<p>药械通官方微信</p>
					</div>
					<div class="col-md-6">
						<img width="100%" src="/img/home/u191.jpg">
						<p>药械通企业号</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

@yield('panel')
<!--<script src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/common.js"></script>
<script src="/js/sweetalert/sweetalert.min.js"></script>
@yield('page_js')
</body>
</html>
