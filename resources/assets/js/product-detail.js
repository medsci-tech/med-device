import $ from 'jquery'

$(function () {

	//tabs切换
	$('.tabset-tab').on('mouseover', function () {
		if ($(this).hasClass('focus')) {
			return;
		}

		$('.content').hide();
		$('.tabset-tab').removeClass('focus');
		$(this).addClass('focus');

		$('.content').eq($('.tabset-tab').index($(this))).show();
	});

	//隐藏面板
	$('#btn-submit,.shielder,#panel img').on('click', function () {
		$('.shielder,#panel').hide();
	});

	//弹出面板
	$('.btn-business').on('click', function () {
		$('.shielder,#panel').show();
	});

	//收藏按钮效果及数据上传
	var $btn_save = $('#save'), action = 1
	if ($btn_save.hasClass('save-focus')){
		$btn_save.find('span').text('已收藏')
		action = 0
	} else {
		$btn_save.find('span').text('收藏')
		action = 1
	}

	$btn_save.on('click', function () {
		$.ajax({
			url : '/product/collect',
			type : 'post',
			data : {
				product_id : $product_id,
				action : action
			},
			success : function(data){
				if (data.status === 1){
					$btn_save.find('span').text(action === 0 ? '收藏' : '已收藏')
					if(action === 1){
						$btn_save.addClass('save-focus')
						action = 0
					}
					else{
						$btn_save.removeClass('save-focus')
						action = 1
					}
				} else {
					sweetAlert(data.message)
				}
			}
		})
	});

	//缩略图切换
	let thumbs = $('.thumbnail')
	function setActive(thumb){
		thumbs.removeClass('active')
		thumb.addClass('active')
		$('.big img').attr('src', thumb.data('url') + '?imageView2/1/w/450/h/450/q/90')
	}
	thumbs.on('mouseover', function(e){
		setActive($(this))
	})
	$('.tab').eq(0).on('click', () => {
		let active = $('.thumbnail.active').prev()
		if(active.hasClass('thumbnail')){
			setActive(active)
		}
		else{
			setActive(thumbs.last())
		}
	})
	$('.tab').eq(1).on('click', () => {
		let active = $('.thumbnail.active').next()
		if(active.hasClass('thumbnail')){
			setActive(active)
		}
		else{
			setActive(thumbs.first())
		}
	})

	//提交合作
	$('.btn-submit').click(function(){
		var phone = $('#phone').val()
		var name = $('#name').val()
		if (name === ''){
			sweetAlert('请填写姓名')
			return
		}
		if (phone === ''){
			sweetAlert('请填写联系电话')
			return
		}
		var join_type = ''
		$('.checkboxs input').each(function(){
			if (this.checked){
				join_type += ',' + $(this).attr('value')
			}
		})
		if (join_type != ''){
			join_type = join_type.substring(1)
		}

		$.ajax({
			url : '/product/join',
			type : 'post',
			data : {
				contact_phone : phone,
				real_name : name,
				product_id : $product_id,
				join_type : join_type
			},
			success : function(data){
				$('.shielder,#panel').hide()
				sweetAlert(data.message)
			}
		})
	})
});