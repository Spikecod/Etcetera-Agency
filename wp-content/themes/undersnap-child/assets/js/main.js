(function ($) {
    "use strict";
    $(".navbar-toggler").on("click", function () {
        $(this).toggleClass("active");
    });
    $(".navbar-nav li a").on("click", function () {
        $(".sub-nav-toggler").removeClass("active");
    });
    var subMenu = $(".navbar-nav .sub-menu");
    if (subMenu.length) {
        subMenu
            .parent("li")
            .children("a")
            .append(function () {
                return '<button class="sub-nav-toggler"> <i class="fa fa-angle-down"></i> </button>';
            });
        var subMenuToggler = $(".navbar-nav .sub-nav-toggler");
        subMenuToggler.on("click", function () {
            $(this).parent().parent().children(".sub-menu").slideToggle();
            return false;
        });
    }
    if ($(".search-btn").length) {
        $(".search-btn").on("click", function () {
            $("body").addClass("search-active");
        });
        $(".close-search, .search-back-drop").on("click", function () {
            $("body").removeClass("search-active");
        });
    }
    $(".homepage-slides").owlCarousel({
        items: 1,
        dots: false,
        nav: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        smartSpeed: 2000,
        slideSpeed: 600,
        autoplayHoverPause: true,
        navText: ["<i class='far fa-angle-left'></i>", "<i class='far fa-angle-right'></i>"],
        responsive: { 0: { items: 1, nav: false, dots: false }, 600: { items: 1, nav: false, dots: false }, 768: { items: 1, nav: false, dots: false }, 1100: { items: 1, nav: true, dots: false } },
    });
    $(".homepage-slides").on("translate.owl.carousel", function () {
        $(".single-slide-item h1").removeClass("animated fadeInUp").css("opacity", "1");
        $(".single-slide-item h6").removeClass("animated fadeInDown").css("opacity", "1");
        $(".single-slide-item p").removeClass("animated fadeInDown").css("opacity", "1");
        $(".single-slide-item a.main-btn").removeClass("animated fadeInDown").css("opacity", "1");
    });
    $(".homepage-slides").on("translated.owl.carousel", function () {
        $(".single-slide-item h1").addClass("animated fadeInUp").css("opacity", "1");
        $(".single-slide-item h6").addClass("animated fadeInDown").css("opacity", "1");
        $(".single-slide-item p").addClass("animated fadeInDown").css("opacity", "1");
        $(".single-slide-item a.main-btn").addClass("animated fadeInDown").css("opacity", "1");
    });
    $(".client-carousel").owlCarousel({
        items: 1,
        margin: 30,
        dots: true,
        nav: false,
        loop: true,
        autoplay: true,
        responsiveClass: true,
        responsive: { 575: { items: 1, nav: false, dots: false }, 767: { items: 2, nav: false }, 990: { items: 2, loop: true }, 1200: { items: 2, dots: true, loop: true } },
    });
    $(".logo-carousel").owlCarousel({
        items: 4,
        margin: 30,
        dots: false,
        nav: false,
        loop: true,
        autoplay: false,
        responsive: { 0: { items: 2, nav: false, dots: false }, 600: { items: 2, nav: false, dots: false }, 768: { items: 4, nav: false, dots: false }, 1100: { items: 4, nav: false, dots: true } },
    });
    $(".sticky-area").sticky({ topSpacing: 0 });
    $("#bar1").barfiller({ barColor: "#FFD857", duration: 5000 });
    $("#bar2").barfiller({ barColor: "#FFD857", duration: 6000 });
    $("#bar3").barfiller({ barColor: "#FFD857", duration: 7000 });
    $("#bar4").barfiller({ barColor: "#FFD857", duration: 5000 });
    $("#bar5").barfiller({ barColor: "#FFD857", duration: 6000 });
    $("#bar6").barfiller({ barColor: "#FFD857", duration: 7000 });
    $(".counter-number span").counterUp({ delay: 10, time: 1000 });
    new WOW().init();
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 300) {
            $(".go-top").fadeIn(200);
        } else {
            $(".go-top").fadeOut(200);
        }
    });
    $(".go-top").on("click", function (event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 1500);
    });
    $(".single-price-item").on("mouseover", function () {
        $(".single-price-item").removeClass("active");
        $(this).addClass("active");
    });
    $(".video-btn").magnificPopup({ disableOn: 700, type: "iframe", mainClass: "mfp-fade", removalDelay: 160, preloader: false, fixedContentPos: false });
    var date = new Date().getFullYear();
    $("#date").html(date);
    $(".main-menu .navbar-nav .nav-link").on("mouseover", function () {
        $(".main-menu .navbar-nav .nav-link").removeClass("active");
        $(this).addClass("active");
    });
    setTimeout(function () {
        $("#preloader").fadeOut(600);
    }, 200);
    jQuery(window).on("load", function () {
        jQuery(".site-preloader-wrap, .slide-preloader-wrap").fadeOut(1000);
    });
})(jQuery);
