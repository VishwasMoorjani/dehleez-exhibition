﻿( function($) {
  'use strict';

$(function(e) {
	
	$(window).scroll(function(){
	  var sticky = $('#header'),
		  scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('sticky');
	  else sticky.removeClass('sticky');
	});
	
	/*-------------------------------------------------------------------------------
	  Smooth scroll to anchor
	-------------------------------------------------------------------------------*/
	var navbar=$('.js-navbar');
	var navbarAffixHeight=90
	$('.js-target-scroll').on('click', function(e) {
		var target = $(this.hash);
		if (target.length) {
			$('html,body').animate({
				scrollTop: (target.offset().top - navbarAffixHeight + 1)
			}, 1000);
			return false;
		}
	});
	// $('body').scrollspy({
	// 		offset:  navbarAffixHeight + 1
	// });
	$('.navbar-nav a ').on('click', function(){
	  if($('#navigation').removeClass('shownav')) {
	  }
    });
	
	/*-------------------------------------------------------------------------------
		Navigation
	-------------------------------------------------------------------------------*/
	$('#menu-toggle-bar').on('click', function(e) {
		   $("#navigation").toggleClass("shownav");
	});
	$('#menu-toggle-close').on('click', function(e) {
		   $("#navigation").removeClass("shownav");
	});

	/*-------------------------------------------------------------------------------
	 Timer
	-------------------------------------------------------------------------------*/
 	var austDay = new Date();
	austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	$('#defaultCountdown').countdown({until: austDay});
	$('#year').text(austDay.getFullYear());
 
	/*-------------------------------------------------------------------------------
	  Tab li Add Class
	-------------------------------------------------------------------------------*/
$('.conf-close').on('click', function(e) {
	if ( $(this).hasClass('menu-down') ) {
		$(this).removeClass('menu-down');
	} else {
		$(this).addClass('menu-down');    
	}
});	
	
/*-------------------------------------------------------------------------------
  Background slider
-------------------------------------------------------------------------------*/
   
  $("#slideshow").owlCarousel({
	autoPlay : 5000,
	dots: false,
	stopOnHover : false,
	navigation:false,
	paginationSpeed : 1000,
	goToFirstSpeed : 2000,
	singleItem : true,
	autoHeight : true,
	transitionStyle:"fadeUp"
  });
 
 /*-------------------------------------------------------------------------------
	  Sponsors-Slider
	-------------------------------------------------------------------------------*/
	var owl = $("#sponsors-slider");
	owl.owlCarousel({
	  itemsCustom : [
		[0, 1],
		[450, 2],
		[550, 2],
		[767, 3],
		[991, 4],
	  ],
	  loop: true,
	  nav : true,
	  navigation : false,
	  autoPlay  : 3000
	});
 

/*------------------------------------------------------------------
	Testimonial
-------------------------------------------------------------------*/
    
	var owl = $("#testimonial_slider");
	owl.owlCarousel({
	  itemsCustom : [
		[0, 1],
		[450, 1],
		[550, 1],
		[700, 2],
	  ],
	  loop: true,
	  navigation : false,
	  autoPlay  : 3000
	});

 
 /*------------------------------------------------------------------
	Countdown
	-------------------------------------------------------------------*/
 
	// var endDate = "December 22, 2023";
	// $('.countdown.styled').countdown({
	//   date: endDate,
	//   render: function(data) {
	// 	$(this.el).html("<div class='countdown-amount'>" + this.leadingZeros(data.days, 2) + " <span class='countdown-period'>Days</span></div><div class='countdown-amount'>" + this.leadingZeros(data.hours, 2) + " <span class='countdown-period'>Hours</span></div><div class='countdown-amount'>" + this.leadingZeros(data.min, 2) + " <span class='countdown-period'>Minutes</span></div><div class='countdown-amount'>" + this.leadingZeros(data.sec, 2) + " <span class='countdown-period'>Seconds</span></div>");
	//   }
	// });	
  
  
  /*------------------------------------------------------------------
	back to top
	-------------------------------------------------------------------*/
 var top = $('#back-top');
	top .hide();
	 
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				top .fadeIn();
			} else {
				top .fadeOut();
			}
		});
		$('#back-top a').on('click', function(e) {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	 
 
 
 /*-------------------------------------------------------------------------------
  Google map
	-------------------------------------------------------------------------------*/

	function initMap() {
	  const myLatLng = { lat: -23.976215, lng: 133.769531 };
	  const map = new google.maps.Map(document.getElementById("js-gmap"), {
	    scrollwheel:false,
			zoom: 4,
			zoomControl : true,
			panControl : false,
			streetViewControl : false,
			mapTypeControl: false,
			overviewMapControl: false,
			clickable: false,
	    center: myLatLng,
	  });
		const image = 'assets/images/map-label.png';
	  const contentString = '<div class="map-info">PO Box 1025MNO Collins Street<br>West Victoria 8007 Australia</div>';
	  const infowindow = new google.maps.InfoWindow({
	    content: contentString,
	  });
	  const marker = new google.maps.Marker({
	    position: myLatLng,
	    map,
	    icon: image,
	    animation: google.maps.Animation.DROP,
	    verticalAlign: 'bottom',
			horizontalAlign: 'center',
			backgroundColor: '#d3cfcf',
	    title: "Uluru (Ayers Rock)",
	  });
	  
	  marker.addListener("click", () => {
	    infowindow.open({
	      anchor: marker,
	      map,
	      shouldFocus: false,
	    });
	  });
	}

	if ($('#js-gmap').length > 0){
		initMap();
	}
  
  /*-------------------------------------------------------------------------------
  Google map Style 2
	-------------------------------------------------------------------------------*/
 	
 	function initMap1() {
	  const myLatLng = { lat: -23.976215, lng: 133.769531 };
	  const map = new google.maps.Map(document.getElementById("js-gmap-2"), {
	    scrollwheel:false,
			zoom: 4,
			zoomControl : true,
			panControl : false,
			streetViewControl : false,
			mapTypeControl: false,
			overviewMapControl: false,
			clickable: false,
	    center: myLatLng,
	  });
		const image = 'assets/images/map-label.png';
	  const contentString = '<div class="map-info">PO Box 1025MNO Collins Street<br>West Victoria 8007 Australia</div>';
	  const infowindow = new google.maps.InfoWindow({
	    content: contentString,
	  });
	  const marker = new google.maps.Marker({
	    position: myLatLng,
	    map,
	    icon: image,
	    animation: google.maps.Animation.DROP,
	    verticalAlign: 'bottom',
			horizontalAlign: 'center',
			backgroundColor: '#d3cfcf',
	    title: "Uluru (Ayers Rock)",
	  });
	  
	  marker.addListener("click", () => {
	    infowindow.open({
	      anchor: marker,
	      map,
	      shouldFocus: false,
	    });
	  });
	}

	if ($('#js-gmap-2').length > 0){
		initMap1();
	}
 
 /*-------------------------------------------------------------------------------
  Google map Style 3
	-------------------------------------------------------------------------------*/
 	
	function initMap2() {
	  const myLatLng = { lat: -23.976215, lng: 133.769531 };
	  const map = new google.maps.Map(document.getElementById("js-gmap-3"), {
	    scrollwheel:false,
			zoom: 4,
			zoomControl : true,
			panControl : false,
			streetViewControl : false,
			mapTypeControl: false,
			overviewMapControl: false,
			clickable: false,
	    center: myLatLng,
	  });
		const image = 'assets/images/map-label.png';
	  const contentString = '<div class="map-info">PO Box 1025MNO Collins Street<br>West Victoria 8007 Australia</div>';
	  const infowindow = new google.maps.InfoWindow({
	    content: contentString,
	  });
	  const marker = new google.maps.Marker({
	    position: myLatLng,
	    map,
	    icon: image,
	    animation: google.maps.Animation.DROP,
	    verticalAlign: 'bottom',
			horizontalAlign: 'center',
			backgroundColor: '#d3cfcf',
	    title: "Uluru (Ayers Rock)",
	  });
	  
	  marker.addListener("click", () => {
	    infowindow.open({
	      anchor: marker,
	      map,
	      shouldFocus: false,
	    });
	  });
	}

	if ($('#js-gmap-3').length > 0){
		initMap2();
	}
 
 
 /*-------------------------------------------------------------------------------
  Ajax Form
	-------------------------------------------------------------------------------*/
 
	if ($('#js-ajax-form').length) {
		$('#js-ajax-form').each(function(){
			$(this).validate({
				errorClass: 'error wobble-error',
				submitHandler: function(form){
					$.ajax({
						type: "POST",
						url:"mail.php",
						data: $(form).serialize(),
						success: function() {
							$('.modal').modal('hide');
							$('#success').modal('show');
						},
	
						error: function(){
							$('.modal').modal('hide');
							$('#error').modal('show');
						}
					});
				}
			});
		});
	}
/*-------------------------------------------------------------------------------
  Paypal Form
	-------------------------------------------------------------------------------*/
	
	if ($('#paypal-form').length) {
		$('#paypal-form').each(function(){
			$(this).validate({
				errorClass: 'error wobble-error',
			});
		});
	}	
 
});

})(jQuery);