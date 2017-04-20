@extends('web.layouts.app')

@section('title', '药械产品招商')

@section('page_css')
<link rel="stylesheet" type="text/css" href="../style/products.css">
@endsection

@section('content')
	<div class="row nav">
		<div class="col-md-offset-1 col-md-11">
			<a href="/">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a class="focus">
				药械产品招商
				<div class="strip"></div>
			</a>
			<a href="market">药械营销服务</a>
			<a href="agent">药械经纪人</a>
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
				<img src="/img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>怡成血糖仪家用电子血糖仪JPS系列 华鸿一次性无菌采血针 </p>
			</div>
			<div class="col-md-2 item">
				<img src="/img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="/img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="/img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="/img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="/img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="/img/home/u148.jpg">
				<span class="price-type">￥</span>
				<span class="price-num">12.80</span>
				<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
			</div>
			<div class="col-md-2 item">
				<img src="/img/home/u148.jpg">
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