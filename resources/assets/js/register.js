import $ from 'jquery'

$(function () {

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

	//点击注册
	$('#submit').click(function(){

		var name = $('#name').val()
		var password = $('#password').val()
		var password_confirmation = $('#password_confirmation').val()
		var phone = $('#phone').val()
		var code = $('#code').val()
		var birthday = $('input[name="birthday"]').val()

		if (name === ''){
			sweetAlert('请填写用户名')
			return
		}
		if (password === ''){
			sweetAlert('请填写密码')
			return
		}
		if (password_confirmation === ''){
			sweetAlert('请填写密码确认')
			return
		}
		if (phone === ''){
			sweetAlert('请填写手机号')
			return
		}
		if (phone.length !== 11){
			sweetAlert('请填写正确的手机号')
			return
		}
		if (code === ''){
			sweetAlert('请填写验证码')
			return
		}
		if (password !== password_confirmation){
			sweetAlert('密码与密码确认不一致！')
			return
		}

		var real_name = $('#real_name').val()
		var email = $('#email').val()
		var agree = $('#agree')[0].checked
		var sex = $('input:radio[name="sex"]:checked').val()

		$.ajax({
			url : '/register',
			type : 'post',
			data : {
				name,
				password,
				password_confirmation,
				phone,
				code,
				real_name,
				email,
				agree,
				birthday,
				sex
			},
			success : function(data){
				if (data.status === 1){
					swal({
						title: '',
						html:true,
						text:`注册成功，<a href="/">前往首页</a>`,
						type:'success'
					})
				} else {
					sweetAlert(data.message)
				}
			}
		})
	})

	function checkRight($ele){
		$ele.children('.note').remove()
		$ele.css('position', 'relative')
		$('<img src="/img/home/u44.png">').addClass('note').appendTo($ele).css({
			position : 'absolute',
			top : '14px',
			right : '-40px',
			width : '20px',
			whiteSpace : 'nowrap'
		})
		$ele.css('border-color','#d7d7d7')
	}
	function checkWrong($ele, message){
		$ele.children('.note').remove()
		$ele.css('position', 'relative')
		$('<div class="note"><img src="/img/home/u46.png"> ' + message + '</div>').addClass('note').appendTo($ele).css({
			position : 'absolute',
			width : '20px',
			top: 0,
			left : '440px',
			color : 'red',
			zIndex : 99,
			whiteSpace : 'nowrap'
		})
		$ele.css('border-color','red')
	}
	$('#name').on('blur', function(){
		$.ajax({
			url : '/check-username',
			type : 'post',
			data : {
				name : $(this).val()
			},
			success : function(data){
				if (data.status === 1){
					checkRight($('#name-box'))
				} else {
					checkWrong($('#name-box'), data.message)
				}
			}
		})
	})
	$('#password_confirmation').on('blur', function(){
		if ($(this).val() !== $('#password').val()){
			checkWrong($('#confirm'), '两次密码输入不一致，请重新设置密码')
		} else {
			checkRight($('#confirm'))
		}
	})
	$('#email').on('blur', function(){
		checkEmail($(this))
	})
	function checkEmail($ele){
		var value = $ele.val()
		var index = value.indexOf('@')
		if (index === -1){
			checkWrong($('#email-box'), '邮箱格式不正确，请重新输入')
			return
		}
		var suffix = value.substring(index)
		// for (var i = 0; i < data.length; i++) {
		// 	if (data[i] === suffix){
		// 		checkRight($('#email-box'))
		// 		return
		// 	}
		// }
		if (suffix.substring(suffix.length-4) === '.com' || suffix.substring(suffix.length-3) === '.cn'){
			checkRight($('#email-box'))
			return
		}
		checkWrong($('#email-box'), '邮箱格式不正确，请重新输入')
	}
	$('#phone').on('blur', function(){
		var reg = /^1[35678]\d{9}$/
		if (!reg.test($(this).val())){
			checkWrong($('#phone-box'), '手机号格式不正确，请重新输入')
		} else {
			checkRight($('#phone-box'))
		}
	})




	//邮箱后缀
	$('#email').on('keyup', function(){
		$('.email-dropdown').show();

		var value = $('#email').val();
		var $items = $('.item-email');
		$items.each(function(){
			var index = value.indexOf('@');
			if (index !== -1){
				var str = value.substring(index);
				if ($(this).data('value').indexOf(str) === -1){
					$(this).hide();
				}
			} else {
				$(this).show();
				$(this).text(value + $(this).data('value'));
			}
		})
	})
	function initDom(data){
		for (var i = 0;i < data.length; i++){
			$('<div></div>').addClass('item-email').data('value', data[i]).css({
				width : '100%',
				height : '40px',
				lineHeight : '40px',
				paddingLeft : '10px',
				borderBottom : '1px solid #f2f2f2',
				overflow : 'hidden'
			}).click(function(){
				$('#email').val($(this).text());
				checkEmail($('#email'))
			}).appendTo($('.email-dropdown'))
		}
	}
	var data = [
		'@qq.com',
		'@163.com',
		'@126.com',
		'@sina.com',
		'@hptmail.com',
		'@gmail.com',
		'@hotmail.com',
		'@sohu.com',
		'@21cn.com'
	]
	initDom(data);
	$('body').click(function(){
		$('.email-dropdown').hide();
		$('item-email').text('');
	})

	//datetimepicker
	$('#datetimepicker').datetimepicker({
	    minView: "month", //选择日期后，不会再跳转去选择时分秒 
		format: "yyyy-mm-dd", //选择日期后，文本框显示的日期格式 
		language: 'zh-CN', //汉化 
　　	autoclose:true, //选择日期后自动关闭
	});

});