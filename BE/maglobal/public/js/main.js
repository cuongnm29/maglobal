
(function ($) {
    
    /*=============================================================
        Banner slider
    =========================================================================*/
	if ($('.banner-slider').length > 0) {
        var bannerSlider = $(".banner-slider");
        bannerSlider.owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            nav: true,
            navText: ['<i class="icon icon-chevron-left"></i>', '<i class="icon icon-chevron-right"></i>'],
            autoplay: true,
            autoplayTimeout: 5000,
            animateIn: 'pulse',
            animateOut: 'fadeOut',
            smartSpeed: 250,
            responsive: {
                // breakpoint from 0 up
                0: {
                    nav: false,
                },
                // breakpoint from 480 up
                600: {
                    nav: false,
                },
                // breakpoint from 768 up
                1000: {
                    nav: true,
                }
            }
        });
        // Header Slide items with animate.css
        var owl = $('.banner-slider');
        owl.owlCarousel();
        owl.on('translate.owl.carousel', function(event) {
            $('.banner-slider-item h3').removeClass('animated').hide();
            $('.banner-slider-item h1').removeClass('animated').hide();
            $('.banner-slider-item p').removeClass('animated').hide();
            $('.banner-slider-item .btn').removeClass('animated').hide();
        });

        owl.on('translated.owl.carousel', function(event) {
            $('.banner-slider-item h3').addClass('animated fadeInUp').show();
            $('.banner-slider-item h1').addClass('animated fadeInUp').show();
            $('.banner-slider-item p').addClass('animated fadeInDown').show();
            $('.banner-slider-item .btn').addClass('animated fadeInUp').show();
        });
    }

    /*=============================================================
        partner carousel
    =========================================================================*/

    if ( $( '.partner-carousel' ).length > 0 ) {
        var owl2 = $( ".partner-carousel" );
            owl2.owlCarousel( {
                loop: true,
                dots: true,
                nav: false,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 2
                    },
                    700: {
                        items: 4,
                    },
                    991: {
                        item: 4,
                    },
                    1000: {
                        items: 6
                    }
                }
        } );
    }

    /*=============================================================
        testimonial carousel
    =========================================================================*/
    
    if ($('.testimonial-carousel').length > 0) {
        var testimonialcarousel = $(".testimonial-carousel");
        testimonialcarousel.owlCarousel({
            items: 1,
            mouseDrag: true,
            touchDrag: true,
            dots: true,
            margin: 30,
            nav: true,
            autoplay: true,
            navText: ['<i class="icon icon-chevron-left"></i>', '<i class="icon icon-chevron-right"></i>'],
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 800,
            responsive: {
                0: {
                    items: 1
                },
                700: {
                    items: 1,
                },
                1000: {
                    items: 1
                }
            }
        });
    }

    // Product Carousel
    if ( $( '.product-carousel' ).length > 0 ) {
        var owl3 = $( ".product-carousel" );
            owl3.owlCarousel( {
                loop: false,
                dots: true,
                nav: true,
                margin: 20,
                autoplay: true,
                navText: ['<i class="icon icon-chevron-left"></i>', '<i class="icon icon-chevron-right"></i>'],
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
        } );
    }
//Tab


    /*=============================================================
    Booking form select field focus
    =========================================================================*/

    $( '#appointment-date ,#appointment-service, #appointment-time' ).on( 'focus', function( ) {
    $( this ).parent( ).addClass( 'actives' );
        } );
        $( '#appointment-date, #appointment-service, #appointment-time' ).on( 'blur', function( ) {
    $( this ).parent( ).removeClass( 'actives' );
        } );

    //  Testimonial one function by = owl.carousel.js ========================== //
	if ($('.testimonial-one').length > 0) {
        $('.testimonial-one').owlCarousel({
            dots: true,
            nav: false,
            margin: 30,
            loop: true,
            navText: ['<i class="icon icon-chevron-left"></i>', '<i class="icon icon-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                    margin: 0
                },
                767: {
                    items: 1,
                    center: false
                },
                991: {
                    items: 2,
                    center: false,
                    margin: 30,
                },
                1024: {
                    items: 3,
                    center: true,
                    margin: 30,
                }
            }
        })
    }

     //  Testimonial two function by = owl.carousel.js ========================== //
    if ($('.testimonial-two').length > 0) {
        $('.testimonial-two').owlCarousel({
            items: 1,
            dots: false,
            nav: true,
            loop: true,
            margin: 30,
            navText: ['<i class="icon icon-chevron-left"></i>', '<i class="icon icon-chevron-right"></i>'],
            responsive: {
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 2
                    },
                    1400: {
                        items: 3
                    }
                }
            }
            
        })
        $(e).parents('.fullwidth-slider-area').find('.prev-1').on('click', function () {
            $(e).trigger('prev.owl.carousel');
        });
        $(e).parents('.fullwidth-slider-area').find('.next-1').on('click', function () {
            $(e).trigger('next.owl.carousel');
        });
    }
    
	
})(jQuery);