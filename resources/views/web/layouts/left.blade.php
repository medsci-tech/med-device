<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="//apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/js/sweetalert/sweetalert.css">
@yield('page_css')
</head>
<body>
<div class="container-fluid">
	<div class="row header">
		<div class="col-md-6">
			<img src="/img/home/u61.jpg">
			<h1>药械通</h1>
			<h2>个人中心</h2>
		</div>
		<div class="col-md-3 col-md-offset-3">
			<a class=" link-header" href="/">药械通首页</a>
			<a class=" link-header" href="/helper">帮助中心</a>
		</div>
	</div>

	<div class="row line"><div></div></div>
	@yield('content')
</div>
@yield('panel')
<script src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/js/sweetalert/sweetalert.min.js"></script>
<!--script src="/js/vendor.js"></script-->
@yield('page_js')
</body>
</html>



