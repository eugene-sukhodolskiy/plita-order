$(document).ready(function(){
	console.log("custom ready");
	$('button.menu').on('click', function(){
		if($('.header').hasClass('active-menu')){
			$('.header').removeClass('active-menu');
		}else{
			$('.header').addClass('active-menu');
		}
	});

	$('.aside-menu').on('click', function(){
		if($('.side-main .side-left').hasClass('active-menu')){
			$('.side-main .side-left').removeClass('active-menu');
			$('.aside-menu .dots').show();
			$('.aside-menu .cross').hide();
		}else{
			$('.side-main .side-left').addClass('active-menu');
			$('.aside-menu .cross').show();
			$('.aside-menu .dots').hide();
		}
	});
});