import $ from 'jquery'

$(function(){

	//获取手机验证码
	$('#getCaptcha').click(function(){
		var self = $(this)
		setTimeout(function(){
			self.text('发送中...')
		},100)

		$.ajax({
			url : '/send-code',
			type : 'post',
			data : {
				phone : $('#phone').val()
			},
			success : function(data){
				if (data.status === 1){
					self.text('已发送')
				} else {
					self.text('获取验证码')
					alert(data.message)
				}
			}
		})
	})

	//点击提交
	$('#submit').click(function(){
		var phone = $('#phone').val()
		var code = $('#code').val()
		var password = $('#password').val()
		var password_confirmation = $('#password_confirmation').val()

		$.ajax({
			url : '/personal/pwd-edit',
			type : 'post',
			data : {
				phone : phone,
				code : code,
				password : password,
				password_confirmation : password_confirmation
			},
			success : function(data){
				if (data.status === 1){
					//alert()
				}
				alert(data.message)
			}
		})

	})

})