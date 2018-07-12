(function($){$(document).ready(function(){
	
	$('.hiifps-slide').each(function(){
		var slideBackground = $(this).data("background");
		var slidebgColor = $(this).data("bgcolor");
		if (slideBackground != null) {
			$(this).css('background-image', 'url(' + slideBackground + ')');
		} else {
			$(this).css('background', slidebgColor);
		}
	});
	
	if ($('.hiifps-wrap').parents('.text-block').length) {
		$('.hiifps-wrap').parent('.text-block').css('padding', 0);
	}
	
	$( ".hiifps-slide1 .fa-chevron-circle-right" ).click(function() {
	$( ".hiifps" ).animate({
    	left: '-100vw'
  	}, 500, function() {
    // Animation complete. Slide 1 > Slide 2
  	});
	});
	$( ".hiifps-slide1 .fa-chevron-circle-left" ).click(function() {
	$( ".hiifps" ).animate({
    	left: '-200vw'
  	}, 500, function() {
    // Animation complete. Slide 1 > Slide 3
  	});
	});
	
	$( ".hiifps-slide2 .fa-chevron-circle-right" ).click(function() {
	$( ".hiifps" ).animate({
    	left: '-200vw'
  	}, 500, function() {
    // Animation complete. Slide 2 > Slide 3
  	});
	});
	$( ".hiifps-slide2 .fa-chevron-circle-left" ).click(function() {
	$( ".hiifps" ).animate({
    	left: '0'
  	}, 500, function() {
    // Animation complete. Slide 2 > Slide 1
  	});
	});

	$( ".hiifps-slide3 .fa-chevron-circle-right" ).click(function() {
	$( ".hiifps" ).animate({
    	left: '0'
  	}, 500, function() {
    // Animation complete. Slide 3 > Slide 1
  	});
	});
	$( ".hiifps-slide3 .fa-chevron-circle-left" ).click(function() {
	$( ".hiifps" ).animate({
    	left: '-100vw'
  	}, 500, function() {
    // Animation complete. Slide 3 > Slide 2
  	});
	});

});})(jQuery);