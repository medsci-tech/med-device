import $ from 'jquery'

var url = document.referrer;
$(function(){
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
                    swal("登录提醒!", data.message, "error");
				}
			}
		})
	})

	// function submit(e){
	// 	if (e.keyCode === 13){
	// 		$('#submit').click()
	// 	}
	// }

	// $('#name,#password').on('focus', function(){
	// 	document.addEventListener('keydown', submit)
	// })
	// .on('blur', function(){
	// 	document.removeEventListener('keydown', submit)
	// })

})