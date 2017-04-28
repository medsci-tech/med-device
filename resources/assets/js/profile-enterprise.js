import $ from 'jquery'

$(function() {
	$('.btn-upload').each(function(i, upload){
		$(upload).uploadify({
			'debug'    : false,
			'method'   : 'post',
			'formData'     : {
				'file_id' : 5,
				'_token'     : $CSRFTOKEN
			},
			'onInit'   : function(instance) { //初始化加载
				//$('#choose-icon-queue').hide();
			},
			'buttonText' : '上传图像',
			'fileSizeLimit' : '2MB',
			'fileTypeExts' : '*.gif; *.jpg; *.png',
			'fileTypeDesc' : '只能上传图片',//选择文件的时候的提示信息
			'swf'      : '/js/uploadify/uploadify.swf',
			'buttonImage' : '',//重载按钮图片
			'buttonClass' : '',//重载按钮样式
			'uploader' : '/personal/enterprise',
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
		});
		function uploadFile(file, data) {
			var data = $.parseJSON(data);
			console.log(arguments)
			if(data.status==1){
				$('img[name=head]').attr('src',data.data.head_img);
			}
			else{
				alert('上传失败!');
			}
		}
	})

});