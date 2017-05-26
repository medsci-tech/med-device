webpackJsonp([7],{

/***/ 11:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {

	//隐藏下拉框
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('body').on('click', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.drop-down').slideUp(200);
	});

	//绑定下拉框显示事件
	function bindShowEvent(triggerId, targetId) {

		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + triggerId).on('click', function (event) {
			event.stopPropagation();
			if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + targetId).css('display') === 'block') {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.drop-down').slideUp(200);
			} else {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.drop-down').slideUp(200);
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + targetId).toggle(200);
			}
		});
	}
	bindShowEvent('btn-dropdown-type', 'drop-type');
	bindShowEvent('btn-dropdown-province', 'drop-province');
	bindShowEvent('btn-dropdown-city', 'drop-city');
	bindShowEvent('btn-dropdown-county', 'drop-county');

	//填值
	function autoValue(triggerId, targetId) {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + triggerId + ' li').on('click', function (e) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + targetId).text(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(e.target).text());
		});
	}
	autoValue('drop-province', 'value-province');
	autoValue('drop-city', 'value-city');
	autoValue('drop-county', 'value-county');
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#drop-type li').on('click', function (e) {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#service-type').val(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(e.target).text());
	});

	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#choose-icon').uploadify({
		'debug': false,
		'method': 'post',
		'formData': {
			'_token': $CSRFTOKEN
		},
		'onInit': function onInit(instance) {//初始化加载
			//$('#choose-icon-queue').hide();
		},
		'buttonText': '上传图像',
		'fileSizeLimit': '2MB',
		'fileTypeExts': '*.gif; *.jpg; *.png',
		'fileTypeDesc': '只能上传图片', //选择文件的时候的提示信息
		'swf': "/js/uploadify/uploadify.swf",
		'buttonImage': '', //重载按钮图片
		'buttonClass': '', //重载按钮样式
		'uploader': "/personal/upload-head",
		'width': 80,
		'onSelect': function onSelect(file) {
			if (file.size > 1024000 * 2) {
				//文件太大，取消上传该文件
				sweetAlert("文件大小超过限制！");
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#choose-icon').uploadify('cancel', file.id);
			}
		},
		'onUploadSuccess': uploadFile,
		'onUploadError': function onUploadError(file, errorCode, errorMsg, errorString) {
			sweetAlert('The file ' + file.name + ' could not be uploaded: ' + errorString);
		}
		//            'onUploadSuccess' : function(file, data, response) {
		//                sweetAlert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
		//            }
	});
	function uploadFile(file, data) {
		var data = __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.parseJSON(data);
		console.log(arguments);
		if (data.status == 1) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('img[name=head]').attr('src', data.data.head_img);
		} else {
			sweetAlert('上传失败!');
		}
	}
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#profile-form').on('submit', function (e) {
		e.preventDefault();
		var name = this.name,
		    phone = this.phone,
		    area = this.area,
		    real_name = this.real_name,
		    sex = this.sex,
		    email = this.email;


		var province = area.value.split('-')[0] || '',
		    city = area.value.split('-')[1] || '';

		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/personal/info-edit',
			method: 'POST',
			data: {
				name: name.value,
				phone: phone.value,
				province: province, city: city,
				area: area.value.split('-')[2] || '',
				real_name: real_name.value,
				sex: sex.value,
				email: email.value
			}
		}).then(function (data) {
			if (data.status === 1) {
				swal({
					title: '',
					text: '\u4FEE\u6539\u6210\u529F\uFF0C<a href="/">\u8FD4\u56DE\u9996\u9875</a>',
					html: true,
					type: 'success',
					showConfirmButton: false
				});
			}
		});
	});

	function checkRight($ele) {
		$ele.children('.note').remove();
		$ele.css('position', 'relative');
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('<img src="/img/home/u44.png">').addClass('note').appendTo($ele).css({
			position: 'absolute',
			top: '14px',
			right: '-40px',
			width: '20px',
			whiteSpace: 'nowrap'
		});
		$ele.css('border-color', '#d7d7d7');
	}
	function checkWrong($ele, message) {
		$ele.children('.note').remove();
		$ele.css('position', 'relative');
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="note"><img src="/img/home/u46.png"> ' + message + '</div>').addClass('note').appendTo($ele).css({
			position: 'absolute',
			width: '20px',
			top: '12px',
			left: '440px',
			color: 'red',
			zIndex: 99,
			whiteSpace: 'nowrap'
		});
		$ele.css('border-color', 'red');
	}
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#name').on('blur', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/check-username',
			type: 'post',
			data: {
				name: __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).val()
			},
			success: function success(data) {
				if (data.status === 1) {
					checkRight(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#name-box'));
				} else {
					checkWrong(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#name-box'), data.message);
				}
			}
		});
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#password_confirmation').on('blur', function () {
		if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).val() !== __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#password').val()) {
			checkWrong(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#confirm'), '两次密码输入不一致，请重新设置密码');
		} else {
			checkRight(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#confirm'));
		}
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').on('blur', function () {
		checkEmail(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this));
	});
	function checkEmail($ele) {
		var value = $ele.val();
		var index = value.indexOf('@');
		if (index === -1) {
			checkWrong(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email-box'), '邮箱格式不正确，请重新输入');
			return;
		}
		var suffix = value.substring(index + 1);
		// for (var i = 0; i < data.length; i++) {
		// 	if (data[i] === suffix){
		// 		checkRight($('#email-box'))
		// 		return
		// 	}
		// }
		if (suffix.substring(suffix.length - 4) === '.com' || suffix.substring(suffix.length - 3) === '.cn') {
			checkRight(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email-box'));
			return;
		}
		checkWrong(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email-box'), '邮箱格式不正确，请重新输入');
	}

	//邮箱后缀
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').on('keyup', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown').show();

		var value = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').val();
		var $items = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.item-email');
		$items.each(function () {
			var index = value.indexOf('@');
			if (index !== -1) {
				var str = value.substring(index);
				if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('value').indexOf(str) === -1) {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).hide();
				}
			} else {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).show();
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text(value + __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('value'));
			}
		});
	});
	function initDom(data) {
		for (var i = 0; i < data.length; i++) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div></div>').addClass('item-email').data('value', data[i]).css({
				width: '100%',
				height: '40px',
				lineHeight: '40px',
				paddingLeft: '10px',
				borderBottom: '1px solid #f2f2f2',
				overflow: 'hidden'
			}).click(function () {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').val(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text());
				checkEmail(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email'));
			}).appendTo(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown'));
		}
	}
	var data = ['@qq.com', '@163.com', '@126.com', '@sina.com', '@hptmail.com', '@gmail.com', '@hotmail.com', '@sohu.com', '@21cn.com'];
	initDom(data);
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('body').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown').hide();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('item-email').text('');
	});

	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#datetimepicker').datetimepicker({
		minView: "month", //选择日期后，不会再跳转去选择时分秒 
		format: "yyyy-mm-dd", //选择日期后，文本框显示的日期格式 
		language: 'zh-CN', //汉化 
		autoclose: true });
});

/***/ }),

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(11);


/***/ })

},[62]);