@extends('web.layouts.app')

@section('title', '企业信息修改')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-enterprise.css">
<link rel="stylesheet" type="text/css" href="/js/uploadify/uploadify.css">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3 nav">
			<div class="item">
				<a class="button focus">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/collection">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/appointment">
					<span class="img4"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的预约
				</a>
			</div>
			<div class="item">
				<a class="button" href="/personal/pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-9">
			<div class="infomanager">
				<div class="panel">
					<a href="/personal">信息管理</a>
					<span> &nbsp;> &nbsp;企业认证</span>
				</div>
				<div id="choose-icon">上传头像</div>
				<div class="items">
					@foreach(config('params')['cimpany_image'] as $key =>$val)
						<div class="info-item">
							<h4>{{ $val }}  {{ $key }}</h4>
							<img src="{{ config('params')['default_image'] }}?imageView2/1/w/215/h/145/q/90" alt="上传照片">
							<div>
								<p><span>要求：</span><br>上传图片分辨最小为1200X800，图片大小不得超过1M，图片上文字及内容必须清晰可见。</p>
								<div class="btn-upload" id="file_upload_{{ $key }}" file_id="{{ $key }}">上传照片{{$key}}</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script src="/js/profile-enterprise.js"></script>
<script src="/js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#choose-icon').uploadify({
            'debug'    : false,
            'method'   : 'post',
            'formData'     : {
                'file_id' : 5,
                '_token'     : '{{ csrf_token() }}'
            },
            'onInit'   : function(instance) { //初始化加载
                //$('#choose-icon-queue').hide();
            },
            'buttonText' : '上传图像',
            'fileSizeLimit' : '2MB',
            'fileTypeExts' : '*.gif; *.jpg; *.png',
            'fileTypeDesc' : '只能上传图片',//选择文件的时候的提示信息
            'swf'      : '{{ asset('js/uploadify/uploadify.swf') }}',
            'buttonImage' : '',//重载按钮图片
            'buttonClass' : '',//重载按钮样式
            'uploader' : '{{ url('personal/enterprise') }}',
            'width'    : 80,
            'onSelect' : function(file) {
                if(file.size>1024000*2){//文件太大，取消上传该文件
                    alert("文件大小超过限制！");
                    $('#choose-icon').uploadify('cancel',file.id);
                }

            },
            'onUploadSuccess' : uploadFile,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            }
//            'onUploadSuccess' : function(file, data, response) {
//                alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
//            }
        });
        function uploadFile(file, data) {
            var data = $.parseJSON(data);
            if(data.status==1){
                $('img[name=head]').attr('src',data.data.head_img);
            }
            else{
                alert('上传失败!');
            }
        }

    });
</script>
@endsection