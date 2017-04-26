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
//"use strict";
 var url = document.referrer;
$(document).ready(function(){
	$('#submit').click(function(){
		var name = $('#name').val()
		var password = $('#password').val()
		if (name === '') {
            swal("登录提醒!", "请输入用户名或手机号", "error");
			return
		}
		if (password === '') {
            swal("登录提醒!", "请输入密码", "error");
			return
		}

		var remember = $('#remember')[0].checked
		var data = {
            url : url,
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