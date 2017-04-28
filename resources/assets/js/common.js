import $ from 'jquery'
window.$ = window.jQuery = $
import './loc'


$('form[name="searchForm"]').on('submit', function(e){
	if(this.keyword.value.trim()){
		this.keyword.value = this.keyword.value.trim()
	}
	else{
		sweetAlert("请输入搜索关键词!")
		e.preventDefault()
	}
})

$('input[data-type="area"]').locationSelector({
	a: 123
})
if(location.pathname.indexOf('/personal') === 0){
	$('.top-nav .common').addClass('hide')
	$('.top-nav .personal').removeClass('hide')
	$('.search-wrapper, .contect').addClass('hide')
}
else if(location.pathname.indexOf('/helper') === 0){
	$('.top-nav .common').addClass('hide')
	$('.top-nav .helper').removeClass('hide')
	$('.search-wrapper, .contect').addClass('hide')
}

function inputCheckEmpty(id, message){
	$('#' + id).on('blur', function(){
		if ($(this).val() === ''){
			$(this).parent('div').css('border-color', 'red')
		}
		var css = {
			color : 'red'
		}
		$('<div>' + message + '</div>').css(css).appendTo($(this).parent())
	})
}

$('#password_confirmation').on('blur', function(){
	if ($(this).val() !== $('#password').val()){
		sweetAlert('密码与密码确认不一致！')
	}
})