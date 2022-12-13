//jQuery(document).ready(function ($) {
//    $('.postFilter').change(function (e) {
//        console.log($(this).val());
//        location.href = $(this).val();
//    });

//    $(".mos-menu-list li:has('ul')").prepend("<span class='down-arrow'></span>");
//    $('body').on('click', '.down-arrow', function () {
//        //console.log($(window).width());
//        $(this).parent().toggleClass('open-below');
//        $(this).siblings("ul").slideToggle();
//        //$(".down-arrow").click(function () {
//        //        if ($(window).width() < 1183) {
//        //        }
//    });
//    $(".megamenu > .sub-menu > li").wrapInner('<div class="mega-menu-unit"></div>');
//    $('.mos-main-menu .dropdown-toggle').click(function (e) {
//        e.preventDefault();
//        $(this).toggleClass('show');
//        $(this).siblings('.dropdown-menu').toggleClass('show');
//    });
//        new WOW().init();
//        $('.slick-slider').slick();
//    Fancybox
//        Fancybox.bind(".slick-active .slick-fancybox", {
//            Thumbs: {
//                autoStart: true,
//            },
//        });
//
//        Fancybox.bind('[data-fancybox="dialog"]', {
//    Fancybox.bind('.block-fancybox-advanced, .slick-active .slider-fancybox-advanced', {
//        groupAttr: false,
//    });
//
//    Fancybox.bind(".block-fancybox, .slick-active .slider-fancybox", {
//        animated: false,
//        showClass: false,
//        hideClass: false,
//
//        click: false,
//
//        dragToClose: true,
//
//        closeButton: "top",
//
//        Thumbs: false,
//        Toolbar: false,
//
//        Carousel: {
//            Dots: true,
//            Navigation: false,
//        },
//
//        Image: {
//            zoom: false,
//            fit: "contain-w",
//        },
//    });
//});
document.querySelector(".mos-main-menu .dropdown-toggle").addEventListener("click", function(e) {
    e.preventDefault();
    this.classList.toggle("show");
    this.nextElementSibling.classList.toggle("show");
});
var videoBanner = document.querySelector(".video-banner");
if(typeof(videoBanner) != 'undefined' && videoBanner != null){
    videoBanner.addEventListener("click", function(e) {
        //e.preventDefault();
        //this.nextElementSibling.style.display='block';
        this.nextElementSibling.classList.toggle("show");
        //this.style.display='none';
    });  
}
document.addEventListener('scroll', (e) => {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
//    if (scrollTop > 100) document.querySelector('#btt-btn').style.display = "block";
//    else document.querySelector('#btt-btn').style.display = "none"
    if (scrollTop > 100) {
        document.querySelector('#header').classList.add("tiny");
        document.querySelector('#btt-btn').classList.add("active");
    }
    else {
        document.querySelector('#header').classList.remove("tiny");
        document.querySelector('#btt-btn').classList.remove("active");
    }
})

// When the user clicks on the button, scroll to the top of the document
function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();