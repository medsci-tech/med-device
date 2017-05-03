import $ from 'jquery'

$(function(){

	//获取手机验证码 
	var count = 60
	$('#getCaptcha').click(function(){
		if (count < 60){
			return
		}
		var phone = $('#phone').val()
		if (phone === ''){
			sweetAlert('请填写手机号')
			return
		}
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
					var t = setInterval(function(){
						if (count <= 0){
							self.text('获取验证码')
							clearInterval(t)
							count = 60
						} else {
							count --
							self.text(count + '秒后重新获取')
						}
					}, 1000)
				} else {
					self.text('获取验证码')
					sweetAlert(data.message)
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
			url : '/forget',
			type : 'post',
			data : {
				phone : phone,
				code : code,
				password : password,
				password_confirmation : password_confirmation
			},
			success : function(data){
				if (data.status !== 1){
					sweetAlert(data.message)
				} else {
					swal({
						title: "密码修改成功",
        			    closeOnConfirm: false,
        			    confirmButtonColor: "green",
        			    confirmButtonText:"返回首页"
        			}, function() {
        			    location.href = '/'
        			})
				}
			}
		})

	})

})