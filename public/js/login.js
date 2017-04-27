webpackJsonp([10],{

/***/ 38:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(7);


/***/ }),

/***/ 7:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


var url = document.referrer;
__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#submit').click(function () {
		var name = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#name').val();
		var password = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#password').val();
		if (name === '') {
			swal("登录提醒!", "请输入用户名或手机号", "error");
			return;
		}
		if (password === '') {
			swal("登录提醒!", "请输入密码", "error");
			return;
		}

		var remember = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#remember')[0].checked;
		var data = {
			url: url,
			name: name,
			password: password,
			remember: remember
		};
		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/login',
			type: 'post',
			data: data,
			success: function success(data) {
				if (data.status === 1) {
					if (!url) {
						location.href = '/';
					} else {
						window.location.href = url;
					}
				} else {
					swal("登录提醒!", data.message, "error");
				}
			}
		});
	});

	__WEBPACK_IMPORTED_MODULE_0_jquery___default()(document).on('keydown', function (e) {
		if (e.keyCode === 13) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#submit').click();
		}
	});
});

/***/ })

},[38]);