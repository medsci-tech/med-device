@extends('web.layouts.app')

@section('title', '药械产品招商')

@section('page_css')
<link rel="stylesheet" type="text/css" href="../style/products.css">
@endsection

@section('content')
	<div class="row search">
		<div class="col-md-2 col-md-offset-1">
			<img class="logo" src="img/home/u61.jpg">
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
			<p class="hot">
				热门搜索词： 
				<a href="">外科器材</a>
				<a href="">基础器材</a>
			</p>
		</div>
		<div class="col-md-3 contect">
			<span>药械小助手 400-8648883</span>
			<div class="wechat">
				<img class="wechat-logo" src="img/home/u103.png">
				<img class="wechat-code" src="img/home/u101.png" >
			</div>
		</div>
	</div>

	<div class="row nav">
		<div class="col-md-offset-1 col-md-11">
			<a href="index.html">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a class="focus">
				药械产品招商
				<div class="strip"></div>
			</a>
			<a href="service.html">药械营销服务</a>
			<a href="broker.html">药械经纪人</a>
		</div>
	</div>

	<div class="row products">
		<div class="col-md-offset-1 col-md-10">
			<h3>所有产品</h3>
			<div class="panel">
				<span>分类：</span>
				<a href="">所有</a>
				<a href="">A类</a>
				<a href="">B类</a>
				<a href="">C类</a>
			</div>
			<div class="col-md-2 item">
				<img src="img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>怡成血糖仪家用电子血糖仪JPS系列 华鸿一次性无菌采血针 </p>
			</div>
			<div class="col-md-2 item">
				<img src="img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<ul class="pagination">
				<li><a href="">上一页</a></li>
				<li><a href="">1</a></li>
				<li><a href="">下一页</a></li>
			</ul>
		</div>
	</div>
@endsection

@section('page_js')
<script src="../js/products.js"></script>
@endsection