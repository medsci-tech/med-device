webpackJsonp([2],{

/***/ 22:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

$(document).ready(function () {

	//隐藏下拉框
	$('body').on('click', function () {
		$('.drop-down').slideUp(200);
	});

	//绑定下拉框显示事件
	function bindShowEvent(triggerId, targetId) {

		$('#' + triggerId).on('click', function (event) {
			event.stopPropagation();
			if ($('#' + targetId).css('display') === 'block') {
				$('.drop-down').slideUp(200);
			} else {
				$('.drop-down').slideUp(200);
				$('#' + targetId).toggle(200);
			}
		});
	}
	bindShowEvent('btn-dropdown-type', 'drop-type');
	bindShowEvent('btn-dropdown-province', 'drop-province');
	bindShowEvent('btn-dropdown-city', 'drop-city');
	bindShowEvent('btn-dropdown-county', 'drop-county');

	//填值
	function autoValue(triggerId, targetId) {
		$('#' + triggerId + ' li').on('click', function (e) {
			$('#' + targetId).text($(e.target).text());
		});
	}
	autoValue('drop-province', 'value-province');
	autoValue('drop-city', 'value-city');
	autoValue('drop-county', 'value-county');
	$('#drop-type li').on('click', function (e) {
		$('#service-type').val($(e.target).text());
	});
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),

/***/ 48:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 84:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(22);
module.exports = __webpack_require__(48);


/***/ })

},[84]);
//# sourceMappingURL=register.js.map