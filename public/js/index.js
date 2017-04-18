webpackJsonp([18],{

/***/ 32:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

$(document).ready(function () {
	var $buttons = $('.btn-banner');
	var index = 1;

	function interval() {
		change(index);

		index++;
		if (index >= 5) {
			index = 1;
		}
	}

	$('#buttonset').on('click', function (e) {
		var $target = $(e.target);

		if ($target.hasClass('btn-banner')) {
			clearInterval(t);
			t = setInterval(interval, 2000);

			index = Number($target.data('index'));
			change(index);
		}
	});

	var t = setInterval(interval, 2000);

	function change(index) {
		for (var i = 0; i < $buttons.length; i++) {
			$buttons.eq(i).css('background-color', '#cccccc');
		}
		$buttons.eq(index - 1).css('background-color', '#01a4e4');
		$('#banner').css('background-image', 'url(img/home/' + index + '.jpg)');
	}
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),

/***/ 68:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(6);
module.exports = __webpack_require__(32);


/***/ })

},[68]);
//# sourceMappingURL=index.js.map