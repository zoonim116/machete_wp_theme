jQuery(document).ready(function($) {
	$('#mainslider .owl-carousel').owlCarousel({
        items: 1,
        nav: false,
        mouseDrag: false,
        dots: true
    });

    $('#new .owl-carousel').owlCarousel({
        items: 4,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        mouseDrag: false,
        dots: true,
        responsive : {
            0 : {
                items: 1,
            },
            480 : {
                items: 2,
            },
            768 : {
                items: 3,
            }
        }
    });

    $('.icon-block').on('click', function (e) {
        $(this).toggleClass('block-open');
    });

    $('.fa-times').on('click', function (e) {
        $('.icon-block').toggleClass('block-open');
    });
	


	// init Isotope after all images have loaded
	var $grid = $('.grid').imagesLoaded( function() {
	  $grid.isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
		  columnWidth: '.grid-sizer'
		}
	  });
	});

});