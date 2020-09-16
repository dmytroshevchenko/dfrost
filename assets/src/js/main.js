import $ from 'jquery';
import 'jquery-visible';
import 'bootstrap';
import 'owl.carousel';

import { Animate } from './modules/animate';
import { Subscription } from './modules/subscribe';
import { Brands } from './modules/brands';
import './modules/expertises/expertises.controller';

import './modules/ajax';
$(document).ready(function () {


	$('.navbar .hamburger').on('click', function (event) {
		$('#headerNavDropdown').toggleClass('show');
		//$('#headerNavDropdown').animate({"top":"0"}, 1000);
	});

	// animations
	Animate.prepare('.toAnimate:not(.flipper-line)');
	Animate.prepareText('section.citation .container p');
	Animate.flipper('.heading ul.flipper-line');
	Animate.start('.toAnimate .in');
	$(document).on('scroll', function(event) {
	  Animate.start('.toAnimate .in');

	  // disable loop (infinite) animation for now
	  // Animate.reset('.toAnimate .out');
	});

	AOS.init({ delay: 100 });

	// Subscription in footer and forms with API
	const subsription = new Subscription('form.subscribe-form', '[data-subscribe-toggle]');
	subsription.init();


	$('.subscribe_marquee .marquee_content').each(function(){

		$(this).marquee({
    		duration: 5000,
    		gap: 100,
			delayBeforeStart: 0,
			direction: 'left',
			duplicated: true,
			startVisible: true
		});

	});



    $('a[data-subscribe-toggle]').on('click', function (event) {
      event.preventDefault();
      var $form = $($(this).data('subscribe-toggle'));
      $(this).remove();
      $form.removeClass('d-sm-none').show();
      $form.find('input:first').focus();
    });




	// brands 
	//const brands = Brands('section.brands');
	const brands_blocks = [];
	$('section.brands').each(function(){
		brands_blocks.push( $(this) );
	});
	if( typeof brands_blocks !== 'undefined' && brands_blocks.length > 0 ){
		Brands( brands_blocks );
	}

	if( $('.counts').length ){
		var a = 0;
		$(window).scroll(function() {

		  var oTop = $('.counts').offset().top - window.innerHeight;
		  if (a == 0 && $(window).scrollTop() > oTop) {
		    $('.one_count_count').each(function() {
		      var $this = $(this),
		        countTo = $this.text();
		      $({
		        countNum: 0
		      }).animate({
		          countNum: countTo
		        },

		        {

		          duration: 2000,
		          easing: 'swing',
		          step: function() {
		            $this.text(Math.floor(this.countNum));
		          },
		          complete: function() {
		            $this.text(this.countNum);
		            //alert('finished');
		          }

		        });
		    });
		    a = 1;
		  }

		});
	}

	function calc_image_height(){
		if ( $('.all_stories .masonry_grid').length ){
			$('.masonry_grid').find('.one-story-image').each(function(i){
				if( (i+1) % 9 == 1 ){
					var height_coef = 16/9;
				} else if ( (i+1) % 9 == 2 ){
					var height_coef = 4/5;
				} else if ( (i+1) % 9 == 3 ){
					var height_coef = 2/3;
				} else if ( (i+1) % 9 == 4 ){
					var height_coef = 4/5;
				} else if ( (i+1) % 9 == 5 ){
					var height_coef = 3/2;
				} else if ( (i+1) % 9 == 6 ){
					var height_coef = 2/3;
				} else if ( (i+1) % 9 == 7 ){
					var height_coef = 16/9;
				} else if ( (i+1) % 9 == 8 ){
					var height_coef = 3/2;
				} else {
					var height_coef = 16/9;
				}
				var width = $(this).width();
				var height = width / height_coef
				$(this).height( height );
			});
		} else if( $('.all_works .masonry_grid').length ){
			$('.masonry_grid').find('.one-work-image').each(function(i){
				if( (i+1) % 4 == 1 ){
					var height_coef = 16/9;
				} else if ( (i+1) % 4 == 2 ){
					var height_coef = 4/5;
				} else if ( (i+1) % 4 == 3 ){
					var height_coef = 2/3;
				} else if ( (i+1) % 9 == 0 ){
					var height_coef = 2/3;
				} else {
					var height_coef = 16/9;
				}
				var width = $(this).width();
				var height = width / height_coef
				$(this).height( height );
			});
		} else if ( $('.two_col_gallery .masonry_grid').length ){
			$('.masonry_grid').find('.one-gallery_item-image').each(function(i){
				if( (i+1) % 5 == 1 ){
					var height_coef = 5/4;
				} else if ( (i+1) % 5 == 2 ){
					var height_coef = 2/3;
				} else if ( (i+1) % 5 == 3 ){
					var height_coef = 16/9;
				} else if ( (i+1) % 5 == 4 ){
					var height_coef = 4/5;
				} else {
					var height_coef = 3/2;
				}
				var width = $(this).width();
				var height = width / height_coef
				$(this).height( height );
			});

		} else if ( $('.masonry_grid_mob_slider').length && window.matchMedia('(min-width: 768px)').matches ){
			$('.masonry_grid_mob_slider').find('.one-team_member-image').each(function(i){
				if( (i+1) % 10 == 1 ){
					var height_coef = 16/9;
				} else if ( (i+1) % 10 == 2 ){
					var height_coef = 4/5;
				} else if ( (i+1) % 10 == 3 ){
					var height_coef = 2/3;
				} else if ( (i+1) % 10 == 4 ){
					var height_coef = 4/5;
				} else if ( (i+1) % 10 == 5 ){
					var height_coef = 3/2;
				} else if ( (i+1) % 10 == 6 ){
					var height_coef = 4/5;
				} else if ( (i+1) % 10 == 7 ){
					var height_coef = 16/9;
				} else if ( (i+1) % 10 == 8 ){
					var height_coef = 3/2;
				} else if ( (i+1) % 10 == 9 ){
					var height_coef = 2/3;
				} else {
					var height_coef = 4/5;
				}
				var width = $(this).width();
				var height = width / height_coef
				$(this).height( height );
			});

		} else if ( $('.press_block').length ){
			$('.press_block').find('.one-story-image').each(function(i){
				var height_coef = 16/9;
				var width = $(this).width();
				var height = width / height_coef
				$(this).height( height );
			});
		}
	}

	calc_image_height();
	$(window).on('resize', function(){
		calc_image_height();
	});





//	$('.magnify').magnify();

	function change_team(){
		if ( window.team_array ){

			if(window.matchMedia('(min-width: 992px)').matches){
				var max_place_number = 15;
			} else{
				var max_place_number = 7;
			}
			$('.one-team_member').each(function(){
				if( $(this).data('number') > max_place_number ){
					$(this).hide();
					if(window.matchMedia('(max-width: 767px)').matches){
						$('.masonry_grid_mob_slider').slick('slickRemove', $(this).data('number')-1 );
					}
				}
			});




			setInterval(function(){
				var member_number = randomInteger(0, team_array.length-1);
				var place_number = randomInteger(0, max_place_number);
				var change_it = 1;

				$('.one-team_member').each(function(){
					var member_name = $(this).find('.team_member-title-title').text();
					if( member_name == team_array[member_number]['name'] ){
						change_it = 0;
					}
				});
				if( change_it ){
					var place_block = $('.one-team_member').eq(place_number);
					if( !place_block.hasClass('one-team_member_item') ){
						return;
					}
					place_block.css('opacity', 0);
					setTimeout(function(){
						place_block.find('.one-team_member-image').css('background-image', 'url(' + team_array[member_number]['image_url'] + ')' );
						place_block.find('.team_member-title-title').text( team_array[member_number]['name'] );
						place_block.find('.team_member-cat').text( team_array[member_number]['position'] );
					}, 400);

					setTimeout(function(){
						place_block.css('opacity', 1);
					}, 800);
				}
			}, 1000);

		}
	}

	function randomInteger(min, max) {
		let rand = min + Math.random() * (max + 1 - min);
		return Math.floor(rand);
	}



	$('.masonry_grid').masonry({
		itemSelector: '.grid-item',
		gutter : 30,
		horizontalOrder: true,
		fitWidth: true
	});

	function masonry_grid_mob_slider(){

		if(window.matchMedia('(max-width: 767px)').matches){
			$('.masonry_grid_mob_slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 3500,
				centerMode: true,
				arrows: false,
				fade: false,
				infinite: true,
			});
		} else{
			console.log( '------masonry_grid_mob_slider------------' );
			console.log( $('.masonry_grid_mob_slider').children().first().find('.one-team_member-image').height() );
			$('.masonry_grid_mob_slider').masonry({
				itemSelector: '.grid-item',
				gutter : 30,
				horizontalOrder: true,
				fitWidth: true
			});
		}
	}



	if( $('.masonry_grid_mob_slider').length ){
		masonry_grid_mob_slider();
		change_team();
			
		$(window).on('resize', function(){

			if(window.matchMedia('(max-width: 767px)').matches){
				$('.masonry_grid_mob_slider').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 3500,
					centerMode: true,
					arrows: false,
					fade: false,
				});
				$('.masonry_grid_mob_slider').slick('reinit');
				$('.masonry_grid_mob_slider').masonry('destroy');
			} else{
				$('.masonry_grid_mob_slider').slick('unslick');

				$('.masonry_grid_mob_slider').masonry({
					itemSelector: '.grid-item',
					gutter : 30,
					horizontalOrder: true,
					fitWidth: true
				});
				$('.masonry_grid_mob_slider').masonry( 'reloadItems' );
				$('.masonry_grid_mob_slider').masonry( 'layout' );
			}




			if(!window.matchMedia('(min-width: 992px)').matches){
				
				var max_place_number = 7;
				$('.one-team_member').each(function(){
					if( $(this).data('number') > max_place_number ){
						$(this).hide();
						if(window.matchMedia('(max-width: 767px)').matches){
							$('.masonry_grid_mob_slider').slick('slickRemove', $(this).data('number')-1 );
						}
					}
				});
			}



		} );
	}



	$('.cats_list .close_button').on('click', function () {
		$(this).parents('.cats_list').slideUp();
	});

	$('.clients_list .close_button').on('click', function () {
		$(this).parents('.clients_list').slideUp();
	});

	$('.open_cats').on('click', function () {
		$('.cats_list').slideDown();
	});

	$('.open_clients').on('click', function () {
		$('.clients_list').slideDown();
	});


	$('.scroll-link').click(function(e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $(this.hash).offset().top
		}, 500);
	});


	$('.share_button').click(function(e) {
		e.preventDefault();
		$('.popup_share_bg').first().fadeIn();
	});



	$('.close_popup_button').click(function(e) {
		e.preventDefault();
		$(this).parents('.popup_bg').fadeOut();
	});





	$('#headerNavDropdown li').hover( function(){
		var bg_image = $(this).find('img').attr('src');
		if( bg_image ){
			$('#headerNavDropdown').css('background-image', 'url(' + bg_image + ')' );
		}
	});


	$("form.contact_form").submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var formData = new FormData();
		formData.append('action', 'send_form');

		if( $(this).find('input#fileInput').length ){
			formData.append('cv_file', $('input#fileInput')[0].files[0]);
		}

		formData.append('your_name', form.find('input[name="your_name"]').val());
		formData.append('email', form.find('input[name="email"]').val());
		formData.append('message', form.find('textarea[name="message"]').val());
		formData.append('form_type', form.find('input[name="form_type"]').val());
		formData.append('form_title', form.find('input[name="form_title"]').val());



		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'POST',
			data:   formData,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(data){
			},
			success: function(data){
		 		if( data.success ){
		 			$('.popup_contact_bg').fadeIn();
		 			form.find('input').val('');
		 			form.find('textarea').val('');

		 		}
			},
			error: function(data){
		 		alert( 'Sorry. Error. Try again later!' );
			}
		});
	});



	$("form.subscribe-form").submit(function(e){
		e.preventDefault();
		var form = $(this);

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'POST',
			data: 'action=subscribe_form&email=' + form.find('input[name="email"]').val(), //  formData,
			beforeSend: function(data){
		 		console.log( 'beforeSend' );
			},
			success: function(data){
		 		if( data.success ){
		 			form.parent().children('.popup_subscribe_bg').fadeIn();
		 			form.find('input').val('');
		 		}
			},
			error: function(data){
		 		alert( 'Sorry. Error. Try again later!' );
			}
		});
	});




	// stories slider in old fashion way
	$(function($) {
		var owls = $('.stories-carousel .owl-carousel');

		owls.each(function(){
			owl = $(this);
			owl.on('initialized.owl.carousel', function () {
				owl.find('.owl-item').addClass('sliding');
			});

			if( owl.hasClass('single') ){
				var items_number = 1;
				var items_number_0 = 1;
				var items_number_768 = 1;
				var items_number_1024 = 1;
			} else{
				var items_number = 2;
				var items_number_0 = 1.2;
				var items_number_768 = 1.5;
				var items_number_1024 = 2;
			}
			owl.owlCarousel({
				margin: 30,
				loop: true,
				items: items_number,
				touchDrag: true,
				autoplay: true,
				autoplayTimeout: 5000,
				autoplayHoverPause: true,
				autoplaySpeed: 2000,
				nav: true,
				dotsEach: 2,
				responsive: {
				  0: {
				    items: items_number_0,

				  },
				  768: {
				    items: items_number_768,
				  },
				  1024: {
				    items: items_number_1024
				  }
				},
				navText: ['<i class="icon-arrow-left-circle"></i>', '<i class="icon-arrow-right-circle"></i>'],
				animateOut: 'slideOutDown',
				animateIn: 'flipInX'
			});
			owl.on('translate.owl.carousel', function () {
				owl.find('.owl-item:not(.active)').removeClass('slided').addClass('sliding-left');
			});
			owl.on('translated.owl.carousel', function () {
				owl.find('.owl-item.active').addClass('slided');
			});
		});

		$(document).on('ready scroll', function(event) {
			owls.each(function(){
				var this_owl = $(this);
				if (!$(this).visible()) {
					return;
				}
				this_owl.find('.owl-item.active').addClass('sliding-left');
				setTimeout(function () {
					this_owl.find('.sliding-left').addClass('slided');
				}, 100);
			});
		});

	});


	if ( $('#dropContainer').length ){

		var isAdvancedUpload = function() {
		  var div = document.createElement('div');
		  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
		}();

		if (isAdvancedUpload) {
			var $form = $('#dropContainer');
			var droppedFiles = false;

			var $input    = $form.find('input[type="file"]'),
				$label    = $('.dropContainer_content').children('p').last(),
				showFiles = function(files) {
					$label.text(files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace( '{count}', files.length ) : files[ 0 ].name);
				};

			$form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
				e.preventDefault();
				e.stopPropagation();
			})
			.on('dragover dragenter', function() {
				$form.addClass('is-dragover');
			})
			.on('dragleave dragend drop', function() {
				$form.removeClass('is-dragover');
			})
			.on('drop', function(e) {
				droppedFiles = e.originalEvent.dataTransfer.files;
				$form.find('input[type="file"]').prop('files', droppedFiles);
				$input = $form.find('input[type="file"]');
				showFiles( droppedFiles );
				$form.addClass('added_file');
			});


			$input.on('change', function(e) {
			  showFiles(e.target.files);
			});

		}



	}

	const $fullScreenHeroImage = $('.fullscreen-hero.image');

	if( $fullScreenHeroImage.length ) {
		const $images = $fullScreenHeroImage.find('.fullscreen-hero__image');

		$(document).on('scroll', function() {
			$images.each((_, image) => {
				const boundingClientRect = image.getBoundingClientRect();

				if (boundingClientRect.bottom < 0) {
					return;
				}

				const $image = $(image);

				if (boundingClientRect.top > 0) {
					$image.css('transform', `scale(1)`);
					return
				}

				const scale = (boundingClientRect.y / boundingClientRect.height) * 0.3 + 1;
				$image.css('transform', `scale(${1 / scale})`);
			})
		});
	}


	// aos animation
//	if (undefined !== window.AOS) {
	  AOS.init({ delay: 100 });
//	}






});


$(function($) {
	var prevScrollpos = window.pageYOffset;
	window.onscroll = function() {
	  	var currentScrollPos = window.pageYOffset;
	  	var navbar = $('#navbar');
	  	var headerNavDropdown = $('#headerNavDropdown');
	  	if( !headerNavDropdown.hasClass('show') ){
			if ( prevScrollpos > currentScrollPos || currentScrollPos < 75 ) {
				navbar.css('top', '0');
				$('.close_page_button').css('top', '100px');
				$('.close_vacancy_button').css('top', '100px');
			} else {
				navbar.css('top', '-75px');
				$('.close_page_button').css('top', '25px');
				$('.close_vacancy_button').css('top', '25px');
			}
			prevScrollpos = currentScrollPos;
		}
		
	}

});
