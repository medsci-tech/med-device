webpackJsonp([13],{

/***/ 11:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

$(document).ready(function () {

	//tabs切换
	$('.tabset-tab').on('mouseover', function () {
		if ($(this).hasClass('focus')) {
			return;
		}

		$('.content').hide();
		$('.tabset-tab').removeClass('focus');
		$(this).addClass('focus');

		$('.content').eq($('.tabset-tab').index($(this))).show();
	});

	//隐藏面板
	$('#btn-submit,.shielder,#cancel').on('click', function () {
		$('.shielder,#panel').hide();
	});

	//弹出面板
	$('.btn-business').on('click', function () {
		$('.shielder,#panel').show();
	});

	//收藏按钮效果
	$('#save').on('click', function (event) {
		event.stopPropagation()
		$(this).toggleClass('save-focus');
	});

	var index = 0;
	for (var i = 0; i < $('.thumbnail').length; i++){
		$('.thumbnail').eq(i).data('index', i);
		$('.thumbnail').eq(i).on('click', (function(i){
			return function(){
				index = i;
				refresh(i);
			}
		})(i))
	}

	$('.tab').eq(0).on('click', function(){
		if (index > 0) {
			index--
			refresh(index)
		}
	})
	$('.tab').eq(1).on('click', function(){
		if (index < $('.thumbnail').length - 1) {
			index++
			refresh(index)
		}
	})

	function refresh(index){
		$('.big img').attr('src', $('.thumbnail').eq(index).attr('style').substring(17));
	}


});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),

/***/ 37:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 73:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(11);
module.exports = __webpack_require__(37);


/***/ })

},[73]);
//# sourceMappingURL=product-detail.js.map