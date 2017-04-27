webpackJsonp([8],{

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(9);


/***/ }),

/***/ 9:
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

	//点击提交
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#submit').click(function () {
		var phone = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone').val();
		var code = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#code').val();
		var password = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#password').val();
		var password_confirmation = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#password_confirmation').val();

		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/forget',
			type: 'post',
			data: {
				phone: phone,
				code: code,
				password: password,
				password_confirmation: password_confirmation
			},
			success: function success(data) {
				if (data.status === 1) {
					//sweetAlert()
				}
				sweetAlert(data.message);
			}
		});
	});
});

/***/ })

},[59]);