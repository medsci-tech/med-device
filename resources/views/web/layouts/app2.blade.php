<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script src="/js/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/style/vendor.css">
<meta name="description" content="施康培科技（武汉）有限公司版权所有!" />
<meta name="Keywords" content="药械通" />
@yield('page_css')
</head>
<body>
<div class="page-wrapper">
<div class="container">
    <div class="row header">
        <div class="col-md-6">
            <img src="/img/home/u61.jpg" style="margin-left: 0">
            <h1>药械通</h1>
            <h2>个人中心</h2>
        </div>
        <div class="col-md-3 col-md-offset-3" style="padding-left: 80px">
            <a class=" link-header" href="/">药械通首页</a>
            <a class=" link-header" href="helper">帮助中心</a>
        </div>
    </div>
</div>
@yield('content')
<div class="container-fulid">
        <div class="row footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 info-footer">
                        <a class="footer-link" data-target="about" href="/helper#about">关于我们</a>
                        <a class="footer-link" data-target="contact" href="/helper#contact">联系我们</a>
                        <a class="footer-link" data-target="buy" href="/helper#buy">购买方式</a>
                        <a class="footer-link" data-target="problems" href="/helper#problems">常见问题</a>
                        <p>Copyright@2017 施康培科技（武汉）有限公司版权所有，保留所有权利</p>
                        <p>互联网药品信息服务资格证书编号（鄂）</p>
                        <p>鄂ICP备 15021002号</p>
                    </div>
                    <div class="col-md-4 qr-code">
                        <div class="row">
                            <div class="col-md-6">
                                <img width="100%" src="/img/home/u101.png">
                                <p>药械通官方微信</p>
                            </div>
                            <div class="col-md-6">
                                <img width="100%" src="/img/home/u192.png">
                                <p>药械通企业号</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('panel')
<script src="/js/vendor.js"></script>
@yield('page_js')
</body>
</html>