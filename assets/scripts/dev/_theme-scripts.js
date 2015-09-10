/*
* 	@dev/_theme-scripts.js
*	- ALTIJD dit bestand gebruiken om libraries of plugin te initialiseren, of kleine snippets toe te voegen.
*	- Heb je echt specifieke custom code (WooCommerce bijvoorbeeld)? Maak _theme-{function}.js en include via gulpfile.js
*	- Code conventions: http://make.wordpress.org/core/handbook/coding-standards/javascript/
*/

jQuery( document ).ready( function () {

	// @init strict modus
	// Waarom? http://www.nczonline.net/blog/2012/03/13/its-time-to-start-using-javascript-strict-mode/
	'use strict';

	var flag = false;

	// @plugin init: slick
	if( 'function' === typeof jQuery.fn.slick ){

		if( jQuery('html').hasClass('lt-ie9') ) {
			
			setTimeout( function() {

				jQuery('.section-slider .slider').slick({
				  centerMode: true,
				  centerPadding: '0',
				  slidesToShow: 1,
				  slide: '.slide',
				  speed: 600
				});

			}, 1000);
			
		} else {

			jQuery('.section-slider .slider').slick({
			  centerMode: true,
			  centerPadding: '0',
			  slidesToShow: 1,
			  slide: '.slide',
			  speed: 600
			});

		}

	}


	// MagnificPopup zoom
	
	jQuery( '.zoom' ).magnificPopup( {
		type: 'image'			
	});	
    
    
    // MagnificPopup gallery
	
    if ( jQuery( '.cols-gallery' ).length > 0 ) {

    	// Init popup
		jQuery( '.cols-gallery' ).each( function() {
			
			jQuery(this).magnificPopup( {
				delegate: '.gallery-link', 
				type: 'image',
				//mainClass: 	'mfp-fade',
				gallery: {
					
					enabled:	true,
					navigateByImgClick:	true,
					preload:	[0,1]
					
				},
				image : {
					titleSrc : function(item) {
						return item.el.find( 'img' ).attr('alt');
					}
				}			
			});	
			
		});
		 
    }


    // Equal heights: Cols section
	if ( ! jQuery( 'html' ).hasClass( 'lt-ie9' ) ) {

		jQuery( '.section-cols .cols .two-cols.box' ).responsiveEqualHeightGrid();
		jQuery( '.section-cols .cols .three-cols.box' ).responsiveEqualHeightGrid();
		jQuery( '.section-cols .cols .four-cols.box' ).responsiveEqualHeightGrid();

	}

	var $body = jQuery('body');

	jQuery('.nav-primary')
      // test the menu to see if all items fit horizontally
      .bind('testfit', function() {
            var nav = jQuery(this),
                items = nav.find('ul.menu > li');

            $body.removeClass('toggle-menu');
            $body.removeClass('full-menu');

            // when the first list item has a lower offset than the last one
            if ( jQuery(items[items.length-1]).offset().top > jQuery(items[0]).offset().top ) {
            
               // add a class for scoping menu styles
               $body.addClass('toggle-menu').removeAttr( 'style' );
               jQuery( '#navigation' ).removeClass( 'fixed' );
               
            } else {

            	$body.addClass('full-menu');


            	// Remove toggled inline styles

            	jQuery( '.nav-primary ul.sub-menu' ).removeAttr( 'style' );


            	// Fixed Navi

			   	var header_height = jQuery( '#header' ).innerHeight();
			   	var navigation_height = jQuery( '#navigation' ).innerHeight();

			   	if( jQuery( window ).scrollTop() > header_height ) {

					jQuery( '#navigation' ).addClass( 'fixed' );
					$body.css( 'padding-top', navigation_height );

				} else {

					jQuery( '#navigation' ).removeClass( 'fixed' );
					$body.css( 'padding-top', '0' );

				}

				jQuery(window).scroll( function( e ) {

					if( jQuery( window ).scrollTop() > header_height ) {

						jQuery( '#navigation' ).addClass( 'fixed' );
						$body.css( 'padding-top', navigation_height );

					} else {

						jQuery( '#navigation' ).removeClass( 'fixed' );
						$body.css( 'padding-top', '0' );

					}

				});

            };

         })
      
      // toggle the menu items' visiblity
      .prev('#navigation-toggle')
         .bind('click focus', function(){
            $body.toggleClass('navigation-expanded')
         });   
   
   // ...and update the nav on window events
   jQuery(window).bind('load resize orientationchange', function(){
      jQuery( '.nav-primary' ).trigger( 'testfit' );
   });


   // Toggle mobile sub menu

   jQuery( '.toggle-sub-menu' ).on( 'touchstart click', function() {
	
		if (!flag) {
	  
			flag = true;
			
			setTimeout( function() { 
			flag = false; 
			}, 100);
			
			jQuery( this ).toggleClass( 'openend' ).next( 'ul.sub-menu' ).slideToggle();
	    
		}
	
	  return false;

   });


   // Submenu position offscreen fix

   jQuery( 'li.menu-item-has-children' ).each(function () {

	   	jQuery( this ).hover( function () {

	   		var submenu = jQuery( this ).children( 'ul.sub-menu' ),
	   			viewport = jQuery( window ).width();

			if ( submenu.offset().left + submenu.width() > viewport ) {
				submenu.addClass( 'position-left' );
			} else {
				submenu.removeClass( 'position-left' );
			}

		});

   });


   // Responsive video

	var $allVideos = jQuery("iframe[src*='vimeo'], iframe[src*='youtube'], video");

	$allVideos.each( function() {

		var $video_height = jQuery( this ).height(),
			$video_width = jQuery( this ).width();

		if ( $video_height / $video_width < 0.6 ) {

			//jQuery( this ).wrap('<div class="video-holder-16-9" style="max-width: ' + $video_width + 'px;"></div>');
			jQuery( this ).wrap('<div class="video-container" style="max-width: ' + $video_width + 'px;"><div class="video-holder video-holder-16-9"></div></div>');

		} else {

			jQuery( this ).wrap('<div class="video-container" style="max-width: ' + $video_width + 'px;"><div class="video-holder video-holder-4-3"></div></div>');

		}

	});
	
	
	// Translate Y fallback
	if ( !Modernizr.csstransforms ) {
		
		jQuery( window ).load( function() {
			
			jQuery( '.translate-y' ).each( function() {
				
				var $this = jQuery( this );
				
				$this.css( 'top', '-' + ( $this.height() / 2 ) + 'px' );
				
				console.log( $this.height() );
				
			});
		
		});
		
	}
	
	
	// Placeholder for WordPress search widget
	
	jQuery( '#searchform  #s' ).attr( 'placeholder', 'Zoeken naar...' );


	// Delete comment, but do it with Ajax to not interfere with user behaviour
	// There is a video playing, that's why!
	jQuery( '.delete-comment' ).click( function( e ){

		e.preventDefault();

		var sure_to_remove = confirm( 'Wilt u deze reactie verwijderen?' );
		var $this = jQuery( this );

		if( sure_to_remove ){

			var comment_id = $this.data( 'comment-id' );

			var data = {
				'action': 'ecs_delete_comment',
				'comment_id' : comment_id
			};

			jQuery( this ).parent().parent().parent().block({ 
				message: null,
				overlayCSS:  { 
	        		backgroundColor: '#121214'
	        	}
			}); 

			// Remove it via an ajax script
			jQuery.post( ecs_ajax.ajaxurl, data, function( response ) {

				// alert( response );
				
				if( response == 'true' ){

					var comment_element = $this.parent().parent().parent();

					comment_element.fadeOut( '400', function() {

						comment_element.remove();
						comment_element.unblock();

						// Adjust number of comments
						var comments_number = parseInt( jQuery( '.comments-title span' ).text() );
						comments_number = comments_number - 1;

						jQuery( '.comments-title span' ).text( comments_number.toString() );

					});

				} else {

					alert( 'Something went wrong. Please try again!' );

				}

			});


		}

	});

});


