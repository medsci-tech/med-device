webpackJsonp([2],{

/***/ 15:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {

	//隐藏下拉框
	// $('body').on('click', function () {
	// 	$('.drop-down').slideUp(200);
	// });

	// //绑定下拉框显示事件
	// function bindShowEvent(triggerId, targetId) {

	// 	$('#' + triggerId).on('click', function (event) {
	// 		event.stopPropagation();
	// 		if ($('#' + targetId).css('display') === 'block') {
	// 			$('.drop-down').slideUp(200);
	// 		} else {
	// 			$('.drop-down').slideUp(200);
	// 			$('#' + targetId).toggle(200);
	// 		}
	// 	});
	// }
	// bindShowEvent('btn-dropdown-type', 'drop-type');
	// bindShowEvent('btn-dropdown-province', 'drop-province');
	// bindShowEvent('btn-dropdown-city', 'drop-city');
	// bindShowEvent('btn-dropdown-county', 'drop-county');

	// //填值
	// function autoValue(triggerId, targetId) {
	// 	$('#' + triggerId + ' li').on('click', function (e) {
	// 		$('#' + targetId).text($(e.target).text());
	// 	});
	// }
	// autoValue('drop-province', 'value-province');
	// autoValue('drop-city', 'value-city');
	// autoValue('drop-county', 'value-county');
	// $('#drop-type li').on('click', function (e) {
	// 	$('#service-type').val($(e.target).text());
	// });

	//获取手机验证码
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#getCaptcha').click(function () {
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
					self.text('已发送');
				} else {
					self.text('获取验证码');
					alert(data.message);
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

		if (name === '') {
			alert('请填写用户名');
			return;
		}
		if (password === '') {
			alert('请填写密码');
			return;
		}
		if (password_confirmation === '') {
			alert('请填写密码确认');
			return;
		}
		if (phone === '') {
			alert('请填写手机号');
			return;
		}
		if (code === '') {
			alert('请填写验证码');
			return;
		}
		if (password !== password_confirmation) {
			alert('密码与密码确认不一致！');
			return;
		}

		var real_name = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#real_name').val();
		var email = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').val();
		var agree = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#agree')[0].checked;
		var sex = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('input:radio[name="sex"]:checked').val();

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
				if (data.message) {
					alert(data.message);
				}
				console.log(data);
			}
		});
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
			}).appendTo(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown'));
		}
	}
	var data = ['@163.com', '@sina.com', '@qq.com', '@126.com', '@vip.sina.com', '@gmail.com', '@hotmail.com', '@sohu.com', '@139.com'];
	initDom(data);
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('body').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown').hide();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('item-email').text('');
	});
});

/***/ }),

/***/ 65:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(15);


/***/ })

},[65]);