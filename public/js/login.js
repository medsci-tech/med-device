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
	var url = document.referrer;

	$('#submit').click(function(){
		var name = $('#name').val()
		var password = $('#password').val()
		var remember = $('#remember')[0].checked
		var data = {
			name : name,
			password : password,
			remember : remember
		}
		$.ajax({
			url : '/login',
			type : 'post',
			data : data,
			success : function(data){
				if (data.status === 1){
					if(!url)
					{
                        location.href = '/'
					}
					else
					{
                        window.location.href=url;
					}

				} else{
					alert(data.message)
				}
			}
		})
	})

	$(document).on('keydown', function(e){
		if (e.keyCode === 13){
			$('#submit').click()
		}
	})

})

/***/ })

},[69]);
//# sourceMappingURL=login.js.map