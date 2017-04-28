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
	$('#pwd-form').on('submit', function(e){
		e.preventDefault()
		let { phone, code, password, password_confirmation } = this
		if(!code.value.trim()){
			return sweetAlert('验证码不能为空')
		}
		if(!password.value.trim()){
			return sweetAlert('新密码不能为空')
		}
		if(password.value.trim() !== password_confirmation.value.trim()){
			return sweetAlert('两次密码输入不一致')
		}

		$.ajax({
			url : '/personal/pwd-edit',
			method : 'POST',
			data : {
				phone : phone.value.trim(),
				code : code.value.trim(),
				password : password.value.trim(),
				password_confirmation : password_confirmation.value.trim()
			},
			success : data => {
				if (data.status === 1){
					//sweetAlert()
					this.reset()
				}
				sweetAlert(data.message)
			}
		})

	})

})