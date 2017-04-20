<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="/style/vendor.css">
@yield('page_css')
</head>
<body>
<div class="container-fluid">
    <div class="row header">
        @if (Auth::guest())
        <div class="col-md-4 col-md-offset-1">
            <a class="btn-login" href="{{ url('login') }}">登录</a>
            <a class="btn-register" href="{{ url('register') }}">注册</a>
        </div>
        @else
        <div class="col-md-4 col-md-offset-1">
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('logout') }}"><i class="fa fa-btn fa-sign-out"></i>退出</a></li>
                    </ul>
            </li>
        </div>
        @endif
        <div class="col-md-6 links-header">
            <a href="/personal"><img src="/img/home/u161.png">个人中心</a>
            <a href=""><img src="/img/home/u163.png">我的消息</a>
            <a href="/helper"><img src="/img/home/u165.png">帮助中心</a>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row search">
        <div class="col-md-2 col-md-offset-1">
            <img class="logo" src="/img/home/u61.jpg">
            <h1 class="h1">药械通</h1>
            <p>互联网医药信息服务证：9982561</p>
        </div>
        <div class="col-md-6">
            <div class="searcher">
                <div class="input">
                    <input type="text" name="product" placeholder="输入产品名称">
                </div>
                <div class="button">搜索</div>
            </div>
            <p class="hot" style="text-align: center;">
                热门搜索词：
                <a href="search">外科器材</a>
                <a href="search">基础器材</a>
            </p>
        </div>
        <div class="col-md-3 contect">
            <span>药械小助手 400-8648883</span>
            <div class="wechat">
                <img class="wechat-logo" src="/img/home/u103.png">
                <img class="wechat-code" src="/img/home/u101.png" >
            </div>
            <!--
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
            -->
                <!-- Left Side Of Navbar -->
                <!--
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">首页</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('product/') }}">药械产品招商</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('market/') }}">药械营销服务</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('agent/') }}">药械经纪人</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('search/') }}">搜索</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('personal/') }}">个人中心</a></li>
                </ul>
                -->
                <!-- Right Side Of Navbar -->
                <!--
                <ul class="nav navbar-nav navbar-right">
                -->
                    <!-- Authentication Links -->
                    <!--
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">登录</a></li>
                        <li><a href="{{ url('/register') }}">注册</a></li>
                        <li><a href="{{ url('/forget') }}">忘记密码</a></li>
                        <li><a href="{{ url('/helper') }}">帮助</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            -->
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
@yield('panel')
<script src="/js/vendor.js"></script>
@yield('page_js')
</body>
</html>
