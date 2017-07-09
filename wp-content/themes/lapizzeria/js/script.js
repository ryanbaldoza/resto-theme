$ = jQuery.noConflict();

$(document).ready(function() {

	boxAdjustment();

	// MENU BUTTON
	$('.mobile-menu a').on('click', function(e){
		$('nav.site-nav').toggle('slow');
		e.preventDefault();
	});

	if ( window.location.pathname == '/' || window.location.pathname == '/index.php'){ 
		$('#menu-header-menu').css({'border-bottom': '8px solid #a61206'});
		
	}

	// SHOW MOBILE MENU
	$(window).resize(function(){
		boxAdjustment(); 

		var breakpoint_1 = 768;
		var breakpoint_2 = 480;
		var div1 = $('#second-content').detach();
		var div2 = $('.socials').detach();
		
		if($(document).width() >= breakpoint_1) {
			$('nav.site-nav').show();
			$('#second-box').prepend(div1);
			$('.header-information').prepend(div2);
		} else {
			$('nav.site-nav').hide();
				$('#second-box').append(div1);
				$('.header-information').append(div2);
		}

	});

	//FLUIDBOX PLUGIN
	$('.gallery a').each(function(){
		$(this).attr({'data-fluidbox': ''});
	});

	if($('[data-fluidbox]').length > 0) {
		$('[data-fluidbox]').fluidbox();
	}

	//DATETIME PICKER PLUGIN
	jQuery('#datetimepicker').datetimepicker({

	});
	
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