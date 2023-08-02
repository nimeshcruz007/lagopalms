(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/romancy_elementor_blog_slide_show.default', function(){
	       
	        /* Add your code here */
	    	
	    	$(".blog-slide-show").each(function(){

	        	//add arrow + prev to dots        	
	     
		        var owlsl = $(this) ;
		        var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

		        var responsive_value = {
		            0:{
		                items:1,
		          		slideBy: 1,
		          		nav: false,
		           		dots: owlsl_ops.dots,
		            },
		            767:{
		              	items:2,
		              	slideBy: 1,
		           		nav: false,
		           		dots: owlsl_ops.dots,
		            },
		            1024:{
		              	items:owlsl_ops.items,
		              	slideBy: owlsl_ops.slideBy,
		              	nav: owlsl_ops.nav,
		          		dots: false,
		            }
		        };
		        
		        owlsl.owlCarousel({
		          autoWidth: owlsl_ops.autoWidth,
		          margin: owlsl_ops.margin,
		          items: owlsl_ops.items,
		          loop: owlsl_ops.loop,
		          autoplay: owlsl_ops.autoplay,
		          autoplayTimeout: owlsl_ops.autoplayTimeout,
		          center: owlsl_ops.center,
		          nav: owlsl_ops.nav,
		          dots: false,
		          thumbs: owlsl_ops.thumbs,
		          autoplayHoverPause: owlsl_ops.autoplayHoverPause,
		          slideBy: owlsl_ops.slideBy,
		          smartSpeed: owlsl_ops.smartSpeed,
		          rtl: owlsl_ops.rtl,
		          navText:[
		          '<i class="ovaicon ovaicon-back" ></i>',
		          '<i class="ovaicon ovaicon-next" ></i>'
		          ],

		          responsive: responsive_value,
		        });

		      	/* Fixed WCAG */
				owlsl.find(".owl-nav button.owl-prev").attr("title", "Previous");
				owlsl.find(".owl-nav button.owl-next").attr("title", "Next");
				owlsl.find(".owl-dots button").attr("title", "Dots");

				
		    });
	      

        });


   });

})(jQuery);
