import $ from 'jquery'
import Swiper from 'swiper'

new Swiper('.swiper-container', {
	loop: true,
	zoom: true,
	autoplay: 3000,
	pagination: '.swiper-pagination',
	paginationClickable: true,
	effect: 'fade',

})

$('.swiper-slide .container').click(function(){
	var asd = $(this).data('href')
	console.log(asd)
	if(asd){
		window.open(asd)
	}
})