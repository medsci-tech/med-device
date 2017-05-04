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

	$('#choose-icon').uploadify({
		'debug'    : false,
		'method'   : 'post',
		'formData'     : {
			'_token': $CSRFTOKEN
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
		console.log(arguments)
		if(data.status==1){
			$('img[name=head]').attr('src',data.data.head_img);
		}
		else{
			sweetAlert('上传失败!');
		}
	}
	$('#profile-form').on('submit', function(e){
		e.preventDefault()
		let { name, phone, area,
				real_name, sex,
				email
			} = this
			
		let province = area.value.split('-')[0] || '',
			city = area.value.split('-')[1] || ''

		$.ajax({
			url: '/personal/info-edit',
			method: 'POST',
			data: {
				name: name.value,
				phone: phone.value,
				province, city,
				area: area.value.split('-')[2] || '',
				real_name: real_name.value,
				sex: sex.value,
				email: email.value
			}
		}).then(data => {
			if(data.status === 1){
				sweetAlert(data.message)
			}
		})

	})


	function checkRight($ele){
		$ele.children('.note').remove()
		$ele.css('position', 'relative')
		$('<img src="/img/home/u44.png">').addClass('note').appendTo($ele).css({
			position : 'absolute',
			top : '14px',
			right : '-40px',
			width : '20px',
			whiteSpace : 'nowrap'
		})
		$ele.css('border-color','#d7d7d7')
	}
	function checkWrong($ele, message){
		$ele.children('.note').remove()
		$ele.css('position', 'relative')
		$('<div class="note"><img src="/img/home/u46.png"> ' + message + '</div>').addClass('note').appendTo($ele).css({
			position : 'absolute',
			width : '20px',
			top: '12px',
			left : '440px',
			color : 'red',
			zIndex : 99,
			whiteSpace : 'nowrap'
		})
		$ele.css('border-color','red')
	}
	$('#name').on('blur', function(){
		$.ajax({
			url : '/check-username',
			type : 'post',
			data : {
				name : $(this).val()
			},
			success : function(data){
				if (data.status === 1){
					checkRight($('#name-box'))
				} else {
					checkWrong($('#name-box'), data.message)
				}
			}
		})
	})
	$('#password_confirmation').on('blur', function(){
		if ($(this).val() !== $('#password').val()){
			checkWrong($('#confirm'), '两次密码输入不一致，请重新设置密码')
		} else {
			checkRight($('#confirm'))
		}
	})
	$('#email').on('blur', function(){
		checkEmail($(this))
	})
	function checkEmail($ele){
		var value = $ele.val()
		var index = value.indexOf('@')
		if (index === -1){
			checkWrong($('#email-box'), '邮箱格式不正确，请重新输入')
			return
		}
		var suffix = value.substring(index + 1)
		// for (var i = 0; i < data.length; i++) {
		// 	if (data[i] === suffix){
		// 		checkRight($('#email-box'))
		// 		return
		// 	}
		// }
		if (suffix.substring(suffix.length-4) === '.com' || suffix.substring(suffix.length-3) === '.cn'){
			checkRight($('#email-box'))
			return
		}
		checkWrong($('#email-box'), '邮箱格式不正确，请重新输入')
	}




	//邮箱后缀
	$('#email').on('keyup', function(){
		$('.email-dropdown').show();

		var value = $('#email').val();
		var $items = $('.item-email');
		$items.each(function(){
			var index = value.indexOf('@');
			if (index !== -1){
				var str = value.substring(index);
				if ($(this).data('value').indexOf(str) === -1){
					$(this).hide();
				}
			} else {
				$(this).show();
				$(this).text(value + $(this).data('value'));
			}
		})
	})
	function initDom(data){
		for (var i = 0;i < data.length; i++){
			$('<div></div>').addClass('item-email').data('value', data[i]).css({
				width : '100%',
				height : '40px',
				lineHeight : '40px',
				paddingLeft : '10px',
				borderBottom : '1px solid #f2f2f2',
				overflow : 'hidden'
			}).click(function(){
				$('#email').val($(this).text());
				checkEmail($('#email'))
			}).appendTo($('.email-dropdown'))
		}
	}
	var data = [
		'@qq.com',
		'@163.com',
		'@126.com',
		'@sina.com',
		'@hptmail.com',
		'@gmail.com',
		'@hotmail.com',
		'@sohu.com',
		'@21cn.com'
	]
	initDom(data);
	$('body').click(function(){
		$('.email-dropdown').hide();
		$('item-email').text('');
	})

});