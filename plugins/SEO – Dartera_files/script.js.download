jQuery(document).ready(function ($) {
    //            $(document).ready(function () {
    if ($("#projects-slider").length) {
        $("#projects-slider").owlCarousel({
            loop: true,
            center: true,
            items: 5,
            margin: 30,
            autoplay: true,
            nav: false,
            autoplayTimeout: 2500,
            animateOut: "fadeOut",
            smartSpeed: 2500,
            //navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
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
    if ($("#webDesign-portfolio-slider").length) {
        $("#webDesign-portfolio-slider").owlCarousel({
            loop: true,
            center: true,
            items: 5,
            margin: 30,
            autoplay: true,
            nav: false,
            autoplayTimeout: 2500,
            animateOut: "fadeOut",
            smartSpeed: 2500,
            //navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
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
    if ($("#arbeit-slider").length) {
        $("#arbeit-slider").owlCarousel({
            loop: true,
            center: true,
            items: 3,
            margin: 30,
            autoplay: true,
            nav: false,
            autoplayTimeout: 3500,
            animateOut: "fadeOut",
            smartSpeed: 2500,
            //navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
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
    if ($("#common-slider").length) {
        $("#common-slider").owlCarousel({
            loop: true,
            center: true,
            items: 3,
            margin: 30,
            autoplay: false,
            nav: true,
            autoplayTimeout: 3500,
            animateOut: "fadeOut",
            smartSpeed: 2500,
            //navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right.svg' class='img-fluid' />"],
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

    if ($('.accordion-list').length) {
        $('.accordion-list').on('click', '.accordion-title', function (e) {
            e.preventDefault();
            // remove siblings activities
            $(this).closest('.accordion-list-item').siblings().removeClass('open').find('.accordion-desc').slideUp();
            $(this).closest('.accordion-list-item').siblings().find('.ni').addClass('ni-sort-down-fill').removeClass('ni-sort-up-fill');

            // add slideToggle into this
            $(this).closest('.accordion-list-item').toggleClass('open').find('.accordion-desc').slideToggle();
            $(this).find('.ni').toggleClass('ni-sort-down-fill ni-sort-up-fill');
        });
    }

    if ($('.so-accordion-list').length) {
        $('.so-accordion-list').on('click', '.accordion-title', function (e) {
            e.preventDefault();
            // remove siblings activities
            $(this).closest('.accordion-list-item').siblings().removeClass('open').find('.accordion-desc').slideUp();
            $(this).closest('.accordion-list-item').siblings().find('.ni').addClass('ni-chevron-down').removeClass('ni-chevron-up');

            // add slideToggle into this
            $(this).closest('.accordion-list-item').toggleClass('open').find('.accordion-desc').slideToggle();
            $(this).find('.ni').toggleClass('ni-chevron-down ni-chevron-up');
        });
    }

    if ($('.so-accordion-list-2').length) {
        $('.so-accordion-list-2').on('click', '.accordion-title', function (e) {
            e.preventDefault();
            // remove siblings activities
            $(this).closest('.accordion-list-item').siblings().removeClass('open').find('.accordion-desc').slideUp();
            $(this).closest('.accordion-list-item').siblings().find('.ni').addClass('ni-chevron-down').removeClass('ni-chevron-up');

            // add slideToggle into this
            $(this).closest('.accordion-list-item').toggleClass('open').find('.accordion-desc').slideToggle();
            $(this).find('.ni').toggleClass('ni-chevron-down ni-chevron-up');
        });
    }




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
});
