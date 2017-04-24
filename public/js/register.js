webpackJsonp([2],{

/***/ 22:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

$(document).ready(function () {

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
	$('#getCaptcha').click(function(){
		$.ajax({
			url : '/send-code',
			type : 'post',
			data : {
				phone : $('#phone').val()
			},
			success : function(data){
				alert(data.message)
			}
		})
	})

	//点击注册
	$('#submit').click(function(){
		var name = $('#name').val()
		var password = $('#password').val()
		var password_confirmation = $('#password_confirmation').val()
		var phone = $('#phone').val()
		var code = $('#code').val()
		var real_name = $('#real_name').val()
		var email = $('#email').val()
		var agree = $('#agree')[0].checked
		$.ajax({
			url : '/register',
			type : 'post',
			data : {
				name : name,
				password : password,
				password_confirmation : password_confirmation,
				phone : phone,
				code : code,
				real_name :real_name,
				email : email,
				agree : agree
			},
			success : function(data){
				if (data.message){
				alert(data.message)}
				console.log(data)
			}
		})
	})

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