import $ from 'jquery'

$(function () {

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

	//点击注册
	$('#submit').click(function(){

		var name = $('#name').val()
		var password = $('#password').val()
		var password_confirmation = $('#password_confirmation').val()
		var phone = $('#phone').val()
		var code = $('#code').val()

		if (name === ''){
			alert('请填写用户名')
			return
		}
		if (password === ''){
			alert('请填写密码')
			return
		}
		if (password_confirmation === ''){
			alert('请填写密码确认')
			return
		}
		if (phone === ''){
			alert('请填写手机号')
			return
		}
		if (code === ''){
			alert('请填写验证码')
			return
		}
		if (password !== password_confirmation){
			alert('密码与密码确认不一致！')
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
				name : name,
				password : password,
				password_confirmation : password_confirmation,
				phone : phone,
				code : code,
				real_name :real_name,
				email : email,
				agree : agree,
				birthday : birthday,
				sex : sex
			},
			success : function(data){
				if (data.message){
				alert(data.message)}
				console.log(data)
			}
		})
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
			}).appendTo($('.email-dropdown'))
		}
	}
	var data = [
		'@163.com',
		'@sina.com',
		'@qq.com',
		'@126.com',
		'@vip.sina.com',
		'@gmail.com',
		'@hotmail.com',
		'@sohu.com',
		'@139.com',
	]
	initDom(data);
	$('body').click(function(){
		$('.email-dropdown').hide();
		$('item-email').text('');
	})

});