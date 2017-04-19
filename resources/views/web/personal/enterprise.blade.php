@extends('web.layouts.left')

@section('title', '企业信息修改')

@section('page_css')
<link rel="stylesheet" type="text/css" href="../style/profile-enterprise.css">
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
			<div class="infomanager">
				<div class="panel">
					<a href="../personal">信息管理</a>
					<span> &nbsp;> &nbsp;企业认证</span>
				</div>

				<div class="items">
					<div class="info-item">
						<h4>营业执照</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>开户许可证</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>医疗器械经营许可证</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>开票信息</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>受托人身份证复印件（正面）</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>受托人身份证复印件（反面）</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>印章备案表</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>企业法人委托书原件</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>发票和出库单样票</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>企业公示信息</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
					<div class="info-item">
						<h4>质保协议</h4>
						<img src="" alt="上传照片">
						<div>
							<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
							<div class="btn-upload">上传照片</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="../js/profile-enterprise.js"></script>
@endsection