webpackJsonp([17],{

/***/ 33:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 69:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(7);
module.exports = __webpack_require__(33);


/***/ }),

/***/ 7:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
$(document).ready(function(){

	$('#submit').click(function(){
		var name = $('#name').val()
		var password = $('#password').val()
		var remember = $('#remember')[0].checked
		$.ajax({
			url : '/login',
			data : {
				name : name,
				password : password,
				remember : remember
			},
			success : function(data){
				
			}
		})
	})

})

/***/ })

},[69]);
//# sourceMappingURL=login.js.map