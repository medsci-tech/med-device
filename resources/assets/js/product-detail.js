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
	var $btn_save = $('#save'),action = 1
	if ($btn_save.hasClass('save-focus')){
		$btn_save.text('已收藏')
		action = 0
	} else {
		$btn_save.text('收藏')
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
				console.log(data)
				if (data.status === 1){
					$btn_save.text(action === 0 ? '收藏' : '已收藏').toggleClass('save-focus');
				} else {
					alert(data.message)
				}
			}
		})

	});

	//缩略图切换
	var index = 0;
	$('.thumbnail').eq(0).css('border', '2px solid #01a4e4')
	for (var i = 0; i < $('.thumbnail').length; i++){
		$('.thumbnail').eq(i).data('index', i);
		$('.thumbnail').eq(i).on('click', (function(i){
			return function(){
				index = i;
				refresh(i);
			}
		})(i))
	}

	$('.tab').eq(0).on('click', function(){
		if (index > 0) {
			index--
			refresh(index)
		}
	})
	$('.tab').eq(1).on('click', function(){
		if (index < $('.thumbnail').length - 1) {
			index++
			refresh(index)
		}
	})

	function refresh(index){
		$('.big img').attr('src', $('.thumbnail').eq(index).attr('style').substring(17));
		$('.thumbnail').css('border', 'none')
		$('.thumbnail').eq(index).css('border', '2px solid #01a4e4')
	}

	//提交合作
	$('.btn-submit').click(function(){
		var phone = $('#phone').val()
		var name = $('#name').val()
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
				alert(data.message)
			}
		})

	})


});