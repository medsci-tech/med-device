import $ from 'jquery'

$(document).ready(function () {

	for (var i = 0; i < $('.nav-item').length; i++) {

		$('.nav-item').eq(i).on('click', function (i) {
			return function () {
				if (!$(this).hasClass('focus')) {
					$('.nav-item').removeClass('focus');
					$(this).addClass('focus');
				}

				$('.content').hide();
				$('.content').eq(i).show();
			};
		}(i));
	}

	$('.nav-item:target').click()

	// $('#link-about').click(function(event){
	// 	$('#about').click();
	// })
	// $('#link-buy').click(function(event){
	// 	$('#buy').click();
	// })
	// $('#link-contact').click(function(event){
	// 	$('#contact').click();
	// })
	// $('#link-problems').click(function(event){
	// 	$('#problems').click();
	// })
	$('.footer-link').click(function(){
		$('#' + $(this).data('target')).click()
	})
});