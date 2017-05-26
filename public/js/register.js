webpackJsonp([2],{

/***/ 16:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {

	//获取手机验证码
	var count = 60;
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#getCaptcha').click(function () {
		if (count < 60) {
			return;
		}
		var phone = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone').val();
		if (phone === '') {
			sweetAlert('请填写手机号');
			return;
		}
		var self = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this);
		setTimeout(function () {
			self.text('发送中...');
		}, 100);

		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/send-code',
			type: 'post',
			data: {
				phone: __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone').val()
			},
			success: function success(data) {
				if (data.status === 1) {
					var t = setInterval(function () {
						if (count <= 0) {
							self.text('获取验证码');
							clearInterval(t);
							count = 60;
						} else {
							count--;
							self.text(count + '秒后重新获取');
						}
					}, 1000);
				} else {
					self.text('获取验证码');
					sweetAlert(data.message);
				}
			}
		});
	});

	//点击注册
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#submit').click(function () {

		var name = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#name').val();
		var password = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#password').val();
		var password_confirmation = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#password_confirmation').val();
		var phone = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone').val();
		var code = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#code').val();
		var birthday = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('input[name="birthday"]').val();

		if (name === '') {
			sweetAlert('请填写用户名');
			return;
		}
		if (password === '') {
			sweetAlert('请填写密码');
			return;
		}
		if (password_confirmation === '') {
			sweetAlert('请填写密码确认');
			return;
		}
		if (phone === '') {
			sweetAlert('请填写手机号');
			return;
		}
		if (phone.length !== 11) {
			sweetAlert('请填写正确的手机号');
			return;
		}
		if (code === '') {
			sweetAlert('请填写验证码');
			return;
		}
		if (password !== password_confirmation) {
			sweetAlert('密码与密码确认不一致！');
			return;
		}

		var real_name = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#real_name').val();
		var email = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').val();
		var agree = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#agree')[0].checked;
		var sex = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.btn.active input[name="gender"]').val();

		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/register',
			type: 'post',
			data: {
				name: name,
				password: password,
				password_confirmation: password_confirmation,
				phone: phone,
				code: code,
				real_name: real_name,
				email: email,
				agree: agree,
				birthday: birthday,
				sex: sex
			},
			success: function success(data) {
				if (data.status === 1) {
					swal({
						title: '',
						html: true,
						text: '\u6CE8\u518C\u6210\u529F\uFF0C<a href="/">\u524D\u5F80\u9996\u9875</a>',
						type: 'success'
					});
				} else {
					sweetAlert(data.message);
				}
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
			top: 0,
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
		var suffix = value.substring(index);
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
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone').on('blur', function () {
		var reg = /^1[35678]\d{9}$/;
		if (!reg.test(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).val())) {
			checkWrong(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone-box'), '手机号格式不正确，请重新输入');
		} else {
			checkRight(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone-box'));
		}
	});

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

	//datetimepicker
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#datetimepicker').datetimepicker({
		minView: "month", //选择日期后，不会再跳转去选择时分秒 
		format: "yyyy-mm-dd", //选择日期后，文本框显示的日期格式 
		language: 'zh-CN', //汉化 
		autoclose: true });
});

/***/ }),

/***/ 67:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(16);


/***/ })

},[67]);