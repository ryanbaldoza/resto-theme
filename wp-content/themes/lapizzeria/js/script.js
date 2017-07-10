var map;
function initMap() {
	var latitude = options.latitude;
	var latLng = {
		lat: parseFloat(options.latitude),
		lng: parseFloat(options.longitude)
	}

	map = new google.maps.Map(document.getElementById('map'), {
	  center: latLng,
	  zoom: parseFloat(options.zoom)
	});

	var marker = new google.maps.Marker({
		position: latLng,
		map: map,
		title: 'La Pizzeria'
	});
}


$ = jQuery.noConflict();

$(document).ready(function() {

	boxAdjustment();

	// MENU BUTTON
	$('.mobile-menu a').on('click', function(e){
		$('nav.site-nav').toggle('slow');
		e.preventDefault();
	});



	// SHOW MOBILE MENU
	$(window).on("load resize",function(e){
		boxAdjustment(); 
		var gmap = $('#map');
		var breakpoint_1 = 768;
		var breakpoint_2 = 480;
		var div1 = $('#second-content').detach();
		var div2 = $('.socials').detach();
		
		if($(document).width() >= breakpoint_1) {
			$('nav.site-nav').show();
			$('nav.site-nav ul li:first-of-type').hide();
			$('#second-box').prepend(div1);
			$('.header-information').prepend(div2);
		
		
		} else {
			$('nav.site-nav ul li:first-of-type').show();
			$('nav.site-nav').hide();
			$('#second-box').append(div1);
			$('.header-information').append(div2);
	
		}


		if(gmap.length > 0) {
			if($(document).width() >= breakpoint_1) {
				displayMap(0);
			} else {
				displayMap(300);
			}
		}

	});
	if ( window.location.pathname == '/' || window.location.pathname == '/index.php'){ 
		// $('#menu-header-menu').css({'border-bottom': '8px solid #a61206'});
	
	}
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

	//adjust size of google map

	
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

function displayMap(val) {
	if(val == 0) {
		var locationSec = $('.location-reservation');
		var locationHeight = locationSec.height();
		$('#map').css({'height': locationHeight + 'px'});
	} else {
		$('#map').css({'height': val + 'px'});
	}

}