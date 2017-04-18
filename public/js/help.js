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