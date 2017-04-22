webpackJsonp([19],{

/***/ 31:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 5:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

$(document).ready(function () {

	for (var i = 0; i < $('.nav-item').length; i++) {

		$('.nav-item').eq(i).on('click', function (i) {
			return function () {
				if (!$(this).hasClass('focus')) {
					$('.nav-item').removeClass('focus');
					$(this).addClass('focus');
				}

				$('.content').hide();
				$('.content').eq(i).show();
			};
		}(i));
	}

	$('.nav-item:target').click()

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
	$('.footer-link').click(function(){
		$('#' + $(this).data('target')).click()
	})
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),

/***/ 67:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(5);
module.exports = __webpack_require__(31);


/***/ })

},[67]);
//# sourceMappingURL=help.js.map