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
            },
            992 : {
                items: 4,
            }
        }
    });

    jQuery('.photo-slider').owlCarousel({
        loop:true,
        navSpeed: 1000,
        dotsSpeed: 1000,
        autoplaySpeed: 1000,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        center: true,
        nav: true,
        items: 1,
        margin: 0,
        navText: ['', ''],
        dots: true,
        responsive : {

            640: {
                items: 1
            },
            768: {
                items: 2
            },
            1200: {
                items: 2
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

    $('.items-filter').on( 'click', 'a', function(e) {
        var filterValue = $(this).attr('data-filter');
        $('.items-filter a').removeClass('active');
        $(this).addClass('active');
        $grid.isotope({ filter: filterValue });
        e.preventDefault();
    });
    
    jQuery('.mdwn a').click(function() {
      var target = jQuery(this.hash);
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    });

});