webpackJsonp([6],{

/***/ 12:
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
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#pwd-form').on('submit', function (e) {
		var _this = this;

		e.preventDefault();
		var phone = this.phone,
		    code = this.code,
		    password = this.password,
		    password_confirmation = this.password_confirmation;

		if (!code.value.trim()) {
			return sweetAlert('验证码不能为空');
		}
		if (!password.value.trim()) {
			return sweetAlert('新密码不能为空');
		}
		if (password.value.trim() !== password_confirmation.value.trim()) {
			return sweetAlert('两次密码输入不一致');
		}

		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/personal/pwd-edit',
			method: 'POST',
			data: {
				phone: phone.value.trim(),
				code: code.value.trim(),
				password: password.value.trim(),
				password_confirmation: password_confirmation.value.trim()
			},
			success: function success(data) {
				if (data.status === 1) {
					//sweetAlert()
					_this.reset();
				}
				sweetAlert(data.message);
			}
		});
	});
});

/***/ }),

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(12);


/***/ })

},[63]);