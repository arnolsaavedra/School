
	
$(document).ready(function(){
	var altura = $('.menux').offset().top;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.menux').addClass('menu-fixed');
		} else {
			$('.menux').removeClass('menu-fixed');
		}
	});
 
});