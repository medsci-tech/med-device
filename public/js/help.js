webpackJsonp([13],{

/***/ 35:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(4);


/***/ }),

/***/ 4:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(document).ready(function () {

	for (var i = 0; i < __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.nav-item').length; i++) {

		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.nav-item').eq(i).on('click', function (i) {
			return function () {
				if (!__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).hasClass('focus')) {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.nav-item').removeClass('focus');
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).addClass('focus');
				}

				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.content').hide();
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.content').eq(i).show();
			};
		}(i));
	}

	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.nav-item:target').click();

	// $('#link-about').click(function(event){
	// 	$('#about').click();
	// })
	// $('#link-buy').click(function(event){
	// 	$('#buy').click();
	// })
	// $('#link-contact').click(function(event){
	// 	$('#contact').click();
	// })
	// $('#link-problems').click(function(event){
	// 	$('#problems').click();
	// })
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.footer-link').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('target')).click();
	});
});

/***/ })

},[35]);