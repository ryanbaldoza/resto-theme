$ = jQuery.noConflict();

$(document).ready(function(){

	// MENU BUTTON
	$('.mobile-menu a').on('click', function(e){
		$('nav.site-nav').toggle('slow');
		e.preventDefault();
	});

	// SHOW MOBILE MENU
	var breakpoint_1 = 768;
	var breakpoint_2 = 480;
	$(window).resize(function(){
		boxAdjustment(); 
		var div2 = $('#second-content').detach();
		if($(document).width() >= breakpoint_1) {
			$('nav.site-nav').show();
			$('#second-box').prepend(div2);
		} else {
			$('nav.site-nav').hide();
 			$('#second-box').append(div2);
		}

		if($(document).width() <= breakpoint_2) {
			
		}
	});

	boxAdjustment();
});

function boxAdjustment() {

	//ADAPT HEIGHT OF IMAGES FOR ABOUT US BOXES
	var images = $('.box-img');
	if (images.length > 0) {
		var imageHeight = images[0].height;
		var boxes = $('.content-box');
		$(boxes).each(function(index, element){
			$(element).css({'height': imageHeight + 'px'});
		});
	}
}