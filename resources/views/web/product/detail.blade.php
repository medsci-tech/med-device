@extends('web.layouts.app')

@section('title', '产品详情')

@section('page_css')
<link rel="stylesheet" type="text/css" href="../../style/vendor.css">
<link rel="stylesheet" type="text/css" href="../../../style/product-detail.css">
@endsection

@section('content')
	<div class="row nav">
		<div class="col-md-offset-1 col-md-11">
			<a href="index.html">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;</a>
			<a href="products.html">药械产品招商</a>
			<a class="focus" href="service.html">
				药械营销服务
				<div class="strip"></div>
			</a>
			<a href="broker.html">药械经纪人</a>
		</div>
	</div>

	<div class="row nav2">
		<div class="col-md-offset-1 col-md-11">
			<a href="products.html">所有产品</a>
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
					<img src="../../img/product-detail/u717.jpg">
				</div>
				<div class="thumbnails">
					<div class="tab"></div>
					<div class="thumbnail"></div>
					<div class="tab"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="product-info">
				<h2>怡成血糖仪家用电子血糖仪JPS系列 华鸿一次性无菌采血针</h2>
				<div class="info-row">
					<div class="key">产品规格</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="info-row">
					<div class="key">生产企业</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="info-row">
					<div class="key">生产标准</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="info-row">
					<div class="key">注册证号</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="info-row">
					<div class="key">适用科室</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="info-row">
					<div class="key">适用范围</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="info-row">
					<div class="key">使用注意</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="info-row">
					<div class="key">价格</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="info-row">
					<div class="key">库存</div>
					<div class="value">血糖仪器</div>
				</div>
				<div class="btn-business">我要合作</div>
				<div class="save">&nbsp;&nbsp;&nbsp;收藏</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row">
		<div class="order-now col-md-offset-1 col-md-10"><a href="service.html">立刻预约></a></div>
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
				<p>本产品是一种极高频治疗设备，是通过极高频电磁波直接照射病灶部位后，与细胞、分子产生的一种共振作用；此作用也可选择照射生物活性点即穴位，通过生物功能系统传导与放大，到达远端组织或器官效应部位。这种作用可改善血液循环增加血流量，促进毛细血管及淋巴管的回流，改善组织微循环促进组织营养及新陈代谢，增加白细胞的吞噬作用，从而达到消炎、止疼、化瘀消肿、促进伤口愈合等。</p>
			</div>
			<div class="content business">
				<table class="table table-bordered">
					<tr>
						<th>省份</th>
						<th>招投标价格</th>
						<th>收费标准</th>
						<th>医保信息</th>
					</tr>
					<tr>
						<td>北京</td>
						<td>1000元</td>
						<td>XX  1200元  /  YY  50元</td>
						<td>医保B档</td>
					</tr>
					<tr class="active">
						<td>北京</td>
						<td>1000元</td>
						<td>XX  1200元  /  YY  50元</td>
						<td>医保B档</td>
					</tr>
					<tr>
						<td>北京</td>
						<td>1000元</td>
						<td>XX  1200元  /  YY  50元</td>
						<td>医保B档</td>
					</tr>
					<tr class="active">
						<td>北京</td>
						<td>1000元</td>
						<td>XX  1200元  /  YY  50元</td>
						<td>医保B档</td>
					</tr>
				</table>
			</div>
			<div class="content video"></div>
			<div class="content similar">
				<div class="col-md-2 item">
					<img src="../../img/home/u148.jpg">
					<p>怡成血糖仪家用电子血糖仪JPS系列 华鸿一次性无菌采血针 </p>
				</div>
				<div class="col-md-2 item">
					<img src="../../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="../../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="../../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="../../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="../../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="../../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
				<div class="col-md-2 item">
					<img src="../../img/home/u148.jpg">
					<p>雅思 雅斯血糖仪家用GLM-76 电子血糖仪试纸</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="../../js/vendor.js"></script>
<script src="../../js/product-detail.js"></script>
@endsection

@section('panel')
	<div class="shielder"></div>
	<div id="panel" class="panel">
		<div class="btn-submit">提交</div>
		<img src="../../img/broker-sign/u899.png">
		<p>合作意向</p>
		<form>
			<div>
				<label>姓名</label>
				<input type="text" name="name">
			</div>
			<div>
				<label>电话</label>
				<input type="text" name="tel">
			</div>
			<div class="checkboxs">
				<input type="checkbox" name="agent"><span>代理产品</span>
				<input type="checkbox" name="academic"><span>提供学术服务</span>
				<input type="checkbox" name="others"><span>其他</span>
			</div>
		</form>
	</div>
@endsection