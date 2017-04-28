@extends('web.layouts.app')

@section('title', '帮助')

@section('page_css')
<link rel="stylesheet" type="text/css" href="style/help.css">
@endsection

@section('page_js')
<script src="/js/help.js"></script>
@endsection


@section('content')
<div class="container">
	<div class="row mid">
		<div class="col-md-10">
			<div class="nav">
				<div id="problems" class="nav-item focus">常见问题</div>
				<div id="buy" class="nav-item">购买流程</div>
				<div id="about" class="nav-item">关于我们</div>
				<div id="contact" class="nav-item">联系方式</div>
			</div>
			<div class="content problems">
				<div class="item">
					<div class="question">如何注册成为会员</div>
					<p class="answer">未登录账号时，点击主站顶部注册。<br>注册成功的账号请及时进行激活验证。</p>
				</div>
				<div class="item">
					<div class="question">我的没有收到激活怎么办？</div>
					<p class="answer">发送具有一定的延迟请等待一段时间后再次查询。</p>
				</div>
				<div class="item">
					<div class="question">如何更改填写错误怎么办？</div>
					<p class="answer">未激活账号可以在个人中心更改</p>
				</div>
				<div class="item">
					<div class="question">如何进行手动激活账号？</div>
					<p class="answer"></p>
				</div>
			</div>
			<div class="content buy">2</div>
			<div class="content about">
				<h3>公司介绍</h3>
				<p>施康培医疗科技（武汉）有限公司是一家专业致力于慢性病领域的进口医疗器械代理销售及医疗器械生产研发企业。隶属于迈德同信集团控股子公司。公司成立于2014年10月，员工数量为55人，其注册资本为1000万人民币。占地约为1000平方米。公司位于武汉市高新大道666号光谷生物创新园C2-4栋。在2015年施康培医疗与迈德同信(武汉)科技股份有限公司强强联合，将迈德成熟的线上医疗信息服务移动平台，以及迈德在慢性病领域积累的全国性的医学专家客户资源和广大的患友客户，与施康培医疗传统而强大的全国经销商网络结合，共同制订了致力于慢性病领域的发展目标。我们希望以更专业的产品和服务造福中国慢性疾病医生及患者。</p>
				<h3>我们的团队</h3>
				<div>
					<span>用心客户服务团队</span>
					<span>全球最新科研成果</span>
					<span>国际医疗技术团队</span>
				</div>
				<h3>为什么选择我们？</h3>
				<div>
					<span>科技全球领先</span>
					<span>服务百分百满意</span>
					<span>超亿万客户信任</span>
					<span>用心做好每个产品</span>
				</div>
			</div>
			<div class="content contact">
				<h3>我们的地址</h3>
				<div></div>
				<h3>联系方式</h3>
				<div>
					<p>专业致力于慢性病医疗领域 以更专业的产品和服务 造福中国慢性疾病医生及患者</p>
					<p>公司名称：施康培医疗科技（武汉）有限公司</p>
					<p>联系人：王总：13871421166 孙经理：18971092353</p>
					<p>座机：027-82819567、027-82800666</p>
					<p>E-mail：paul@shikangpei.com</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
