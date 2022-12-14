/**
 * @Script js for (Template/Project Name)
 *
 * @project     - Project Name
 * @author      - 
 * @created_by  - 
 * @created_at  - 
 * @modified_by -
 */


/**
 * ========================================================
 * this function execute when window properly loaded
 * ===========================================================
 */

$(window).on('load', function () {

    // code should be execute here
    // $(function () {
    //     $("#header").load("header.html");
    //     $("#footer").load("footer.html");
    // });

});



/**
 * ========================================================
 * this function execute when DOM element ready 
 * ===========================================================
 */



$(document).ready(function () {
    $(function () {
        if ($("#portfolio-slider").length) {
            $("#portfolio-slider").owlCarousel({
                items: 3,
                margin: 30,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
                dots: false,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    767: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    });

    // testimonial-slider
    $(function () {
        if ($("#testimonial-slider").length) {
            $("#testimonial-slider").owlCarousel({
                loop: true,
                items: 3,
                margin: 30,
                autoplay: true,
                nav: true,
                autoplayTimeout: 2500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
                dots: false,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    767: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    });

    // Projects-slider
    $(function () {
        if ($("#projects-slider").length) {
            $("#projects-slider").owlCarousel({
                loop: true,
                items: 5,
                margin: 30,
                autoplay: true,
                nav: false,
                autoplayTimeout: 2500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
                dots: false,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    767: {
                        items: 3,
                    },
                    1200: {
                        items: 5,
                    },
                },
            });
        }
    });

    // Web Design Portfolio -slider
    $(function () {
        if ($("#webDesign-portfolio-slider").length) {
            $("#webDesign-portfolio-slider").owlCarousel({
                loop: true,
                items: 5,
                margin: 30,
                autoplay: true,
                nav: false,
                autoplayTimeout: 2500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
                dots: false,
                autoplayHoverPause: true,
                stagePadding: 400,
                responsive: {
                    0: {
                        items: 1,
                    },
                    767: {
                        items: 1,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    });

    // Projects-slider
    $(function () {
        if ($("#arbeit-slider").length) {
            $("#arbeit-slider").owlCarousel({
                loop: true,
                items: 3,
                margin: 30,
                autoplay: true,
                nav: false,
                autoplayTimeout: 3500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
                dots: false,
                autoplayHoverPause: true,
                stagePadding: 120,
                responsive: {
                    0: {
                        items: 1,
                    },
                    767: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    });

    // Common Slider

    $(function () {
        if ($("#common-slider").length) {
            $("#common-slider").owlCarousel({
                loop: true,
                items: 3,
                margin: 30,
                autoplay: false,
                nav: true,
                autoplayTimeout: 3500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
                dots: true,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    767: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    });




    // process2
    $(function () {
        if ($("#process2").length) {
            $("#process2").owlCarousel({
                loop: false,
                items: 3,
                margin: 30,
                center: true,
                autoplay: true,
                rewindNav: true,
                nav: true,
                autoplayTimeout: 2500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<i class='ni ni-arrow-long-left text-cyan fs-4'></i>", "<i class='ni ni-arrow-long-right text-cyan fs-4'></i>"],
                dots: false,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    });
    // process2 -end

    // process3
    $(function () {
        if ($("#process3").length) {
            $("#process3").owlCarousel({
                loop: true,
                items: 3,
                margin: 30,
                center: true,
                autoplay: true,
                rewindNav: true,
                nav: false,
                autoplayTimeout: 3500,
                animateOut: "fadeOut",
                smartSpeed: 1500,
                navText: ["<i class='ni ni-arrow-long-left text-cyan fs-4'></i>", "<i class='ni ni-arrow-long-right text-cyan fs-4'></i>"],
                dots: false,
                autoplayHoverPause: true,
                stagePadding: 90,
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    });
    // process3 -end



    // process Slider
    $(function () {
        if ($(".process-slider-active").length) {
            $(".process-slider-active").owlCarousel({
                loop: true,
                items: 3,
                margin: 30,
                autoplay: false,
                nav: true,
                stagePadding: 90,
                autoplayTimeout: 2500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<i class='ni ni-arrow-long-left text-cyan fs-4'></i>", "<i class='ni ni-arrow-long-right text-cyan fs-4'></i>"],
                dots: false,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    575: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    });




    // "blog-carousel
    $(function () {
        if ($(".blog-slide-active").length) {
            $(".blog-slide-active").owlCarousel({
                loop: true,
                items: 1,
                margin: 0,
                autoplay: true,
                nav: true,
                autoplayTimeout: 2500,
                animateOut: "fadeOut",
                smartSpeed: 2500,
                navText: ["<i class='ni ni-arrow-long-left text-cyan fs-4'></i>", "<i class='ni ni-arrow-long-right text-cyan fs-4'></i>"],
                dots: true,
                autoplayHoverPause: true,
            });
        }
    });




    // searchBar
    $('.search-btn').click(function (e) {
        e.stopPropagation();
        $('.searchBar').slideToggle(500);
    });
    $('.searchBar').click(function (e) {
        e.stopPropagation();
    });
    $('body,html').click(function (e) {
        $('.searchBar').slideUp(500);
    });
    // searchBar -end







    // wow js init
    // $(function () {
    //   var wow = new WOW({
    //     animateClass: "animated",
    //     mobile: true,
    //   });
    //   wow.init();
    // });
});


// Custom Js 


// custom accordion// custom accordion
$(function () {
    if ($('.accordion-list').length) {
        $('.accordion-list').on('click', '.accordion-title', function (e) {
            e.preventDefault();
            // remove siblings activities
            $(this).closest('.accordion-list-item').siblings().removeClass('open').find('.accordion-desc').slideUp();
            $(this).closest('.accordion-list-item').siblings().find('.ni').addClass('ni-plus-sm').removeClass('ni-minus');

            // add slideToggle into this
            $(this).closest('.accordion-list-item').toggleClass('open').find('.accordion-desc').slideToggle();
            $(this).find('.ni').toggleClass('ni-plus-sm ni-minus');
        });
    }
});



//counter

if ($('.price-counter').length) {
    $(".price-counter").counterUp({
        delay: 10,
        time: 1500
    })
};




// back to top
if ($('#back-to-top').length) {

    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}
