@extends('web.layouts.left')

@section('title', '个人资料修改')

@section('page_css')
<link rel="stylesheet" type="text/css" href="../style/profile-basic.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2 nav">
			<div class="item">
				<a class="button focus">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button" href="collection">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button" href="appointment">
					<span class="img4"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的预约
				</a>
			</div>
			<div class="item">
				<a class="button" href="pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-8">
			<div class="profile-basic">
				<div class="panel">
					<a href="profile.html">信息管理</a>
					<span> &nbsp;> &nbsp;基础信息修改</span>
				</div>

				<form class="form" action="" method="POST">
					<div class="icon"></div>
					<div id="choose-icon">上传头像</div>
					<div>
						<label for="">用户名</label>
						<input type="text" name="name" placeholder="您的账户名和登录名">
					</div>
					<div>
						<label for="">手机号</label>
						<input type="text" name="phone" placeholder="建议使用常用手机">
					</div>
					<div>
						<label for="">真实姓名</label>
						<input type="text" name="realname" placeholder="请输入真实姓名">
					</div>
					<div class="no-border">
						<label>性别</label>
						<input class="sex-radio" type="radio" name="sex" value="男"><span>男</span>
						<input class="sex-radio" type="radio" name="sex" value="女"><span>女</span>
					</div>
					<div>
						<label for="">电子邮箱</label>
						<input type="text" name="email" placeholder="请输入电子邮箱">
					</div>
					<div>
						<label for="">工作地址</label>
						<input id="area" type="text" name="area">
						<div id="province" class="province">
							<div id="value-province">省</div>
							<div id="btn-dropdown-province" class="btn-dropdown"></div>
						</div>
						<div id="city" class="city">
							<div id="value-city">市</div>
							<div id="btn-dropdown-city" class="btn-dropdown"></div>
						</div>
						<div id="county" class="county">
							<div id="value-county">县</div>
							<div id="btn-dropdown-county" class="btn-dropdown"></div>
						</div>
					</div>
					<!-- 下拉框 -->
					<ul id="drop-province" class="drop-down">
						<li>湖北省</li>
						<li>湖南省</li>
						<li>广东省</li>
					</ul>
					<ul id="drop-city" class="drop-down">
						<li>市一</li>
						<li>市二</li>
						<li>市三</li>
					</ul>
					<ul id="drop-county" class="drop-down">
						<li>一县</li>
						<li>二县</li>
						<li>三县</li>
					</ul>
					<!-- 下拉框结束 -->
					<input class="submit" type="submit" name="submit" value="确定">
				</form>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="../js/profile-basic.js"></script>
@endsection