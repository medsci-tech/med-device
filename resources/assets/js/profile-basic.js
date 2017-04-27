import $ from 'jquery'

$(function () {

	//隐藏下拉框
	$('body').on('click', function () {
		$('.drop-down').slideUp(200);
	});

	//绑定下拉框显示事件
	function bindShowEvent(triggerId, targetId) {

		$('#' + triggerId).on('click', function (event) {
			event.stopPropagation();
			if ($('#' + targetId).css('display') === 'block') {
				$('.drop-down').slideUp(200);
			} else {
				$('.drop-down').slideUp(200);
				$('#' + targetId).toggle(200);
			}
		});
	}
	bindShowEvent('btn-dropdown-type', 'drop-type');
	bindShowEvent('btn-dropdown-province', 'drop-province');
	bindShowEvent('btn-dropdown-city', 'drop-city');
	bindShowEvent('btn-dropdown-county', 'drop-county');

	//填值
	function autoValue(triggerId, targetId) {
		$('#' + triggerId + ' li').on('click', function (e) {
			$('#' + targetId).text($(e.target).text());
		});
	}
	autoValue('drop-province', 'value-province');
	autoValue('drop-city', 'value-city');
	autoValue('drop-county', 'value-county');
	$('#drop-type li').on('click', function (e) {
		$('#service-type').val($(e.target).text());
	});

console.log($)

	$('#choose-icon').uploadify({
		'debug'    : false,
		'method'   : 'post',
		'formData'     : {
			'_token'     : '{{ csrf_token() }}'
		},
		'onInit'   : function(instance) { //初始化加载
			//$('#choose-icon-queue').hide();
		},
		'buttonText' : '上传图像',
		'fileSizeLimit' : '2MB',
		'fileTypeExts' : '*.gif; *.jpg; *.png',
		'fileTypeDesc' : '只能上传图片',//选择文件的时候的提示信息
		'swf'      : "/js/uploadify/uploadify.swf",
		'buttonImage' : '',//重载按钮图片
		'buttonClass' : '',//重载按钮样式
		'uploader' : "/personal/upload-head",
		'width'    : 80,
		'onSelect' : function(file) {
			if(file.size>1024000*2){//文件太大，取消上传该文件
				sweetAlert("文件大小超过限制！");
				$('#choose-icon').uploadify('cancel',file.id);
			}

		},
		'onUploadSuccess' : uploadFile,
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
			sweetAlert('The file ' + file.name + ' could not be uploaded: ' + errorString);
		}
//            'onUploadSuccess' : function(file, data, response) {
//                sweetAlert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
//            }
	});
	function uploadFile(file, data) {
		var data = $.parseJSON(data);
		if(data.status==1){
			$('img[name=head]').attr('src',data.data.head_img);
		}
		else{
			sweetAlert('上传失败!');
		}
	}

});