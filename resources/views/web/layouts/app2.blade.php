<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="style/vendor.css">
@yield('page_css')
</head>
<body>
<div class="container-fluid">
    <div class="row header">
        <div class="col-md-6">
            <img src="img/home/u61.jpg">
            <h1>药械通</h1>
            <h2>个人中心</h2>
        </div>
        <div class="col-md-3 col-md-offset-3">
            <a class=" link-header" href="/">药械通首页</a>
            <a class=" link-header" href="helper">帮助中心</a>
        </div>
    </div>
    @yield('content')
    <div class="row footer">
        <div class="col-md-5 col-md-offset-1 info-footer">
            <a href="">关于我们</a>
            <a href="">联系我们</a>
            <a href="">购买方式</a>
            <a href="">常见问题</a>
            <p>Copyright@2017 施康培科技（武汉）有限公司版权所有，保留所有权利</p>
            <p>互联网药品信息服务资格证书编号（鄂）</p>
            <p>鄂ICP备 15021002号</p>
        </div>
        <div class="col-md-3 col-md-offset-2 qr-code">
            <div class="row">
                <div class="col-md-6">
                    <img width="100%" src="img/home/u101.png">
                    <p>药械通官方微信</p>
                </div>
                <div class="col-md-6">
                    <img width="100%" src="img/home/u192.png">
                    <p>药械通企业号</p>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('panel')
<script src="js/vendor.js"></script>
@yield('page_js')
</body>
</html>