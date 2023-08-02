(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        
		elementorFrontend.hooks.addAction('frontend/element_ready/romancy_elementor_testimonial.default', function(){

			$(".slider-version_1").each(function(){
		        var slk = $(this) ;
		        var slk_ops = slk.data('options') ? slk.data('options') : {};
		        
		        slk.slick({
		            dots: slk_ops.dots,
		            autoplay : slk_ops.autoplay,
		            autoplaySpeed : slk_ops.autoplay_speed, 
		            speed: slk_ops.smartSpeed,
				    centerPadding: 0,
				    slidesToShow: slk_ops.items,
				    infinite: slk_ops.loop,
				    arrows: slk_ops.arrows,
		            variableWidth: false,
				    centerMode: true,
				    asNavFor: slk_ops.navfor,
				    responsive: [
				    {
				      breakpoint: 800,
				      settings: {
				        arrows: false,
				        centerMode: true,
				        variableWidth: false,
				        dots: true,
				      }
				    },
				    {
				      breakpoint: 0,
				      settings: {
				        arrows: false,
				        dots: true,
				      }
				    }

				  ]
				});

		      	/* Fixed WCAG */
				slk.find(".slick-prev").attr("title", "Previous");
				slk.find(".slick-next").attr("title", "Next");
				slk.find(".slick-dots button").attr("title", "Dots");

		    });

		    //slide syncing
		    $(".slide-for").each(function(){
		        var slk2 = $(this) ;
		        
		        // slider syncing
			    slk2.slick({ 
				    slidesToShow: 5,
				    slidesToScroll: 1,
				    arrows: false,
				    dots: false,
				    variableWidth: true,
				    // centerPadding: 0,
				    // fade: true,
                    focusOnSelect: true,
                    // centerMode: true,
				    asNavFor: '.slide-testimonials'
				});

		    });

		    $(".slider-version_2").each(function(){
		        var slk = $(this) ;
		        var slk_ops = slk.data('options') ? slk.data('options') : {};
		        
		        slk.slick({
		            dots: slk_ops.dots,
		            autoplay : slk_ops.autoplay,
		            autoplaySpeed : slk_ops.autoplay_speed, 
		            speed: slk_ops.smartSpeed,
				    centerPadding: slk_ops.padding,
				    slidesToShow: slk_ops.items,
				    infinite: slk_ops.loop,
				    arrows: slk_ops.arrows,
		            variableWidth: false,
				    centerMode: true,
				    responsive: [
				    {
				      breakpoint: 1025,
				      settings: {
				        arrows: false,
				        centerMode: true,
				        variableWidth: false,
				        slidesToShow: 2,

				      }
				    },
				    {
				      breakpoint: 767,
				      settings: {
				        arrows: false,
				        centerMode: true,
				        variableWidth: false,
				        slidesToShow: 1,
				        dots: true,
				      }
				    },
				    {
				      breakpoint: 0,
				      settings: {
				        arrows: false,
				        slidesToShow: 1,
				        dots: true,
				      }
				    }

				  ]
				});

		      	/* Fixed WCAG */
				slk.find(".slick-prev").attr("title", "Previous");
				slk.find(".slick-next").attr("title", "Next");
				slk.find(".slick-dots button").attr("title", "Dots");

		    });
		});


   });

})(jQuery);

