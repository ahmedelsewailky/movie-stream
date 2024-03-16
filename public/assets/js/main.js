$(function () {

    "use strict";

    // Sticky Navbar
    var zero = 0;
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 0) {
            $(".navbar").addClass("wide");
        } else {
            $(".navbar").removeClass("wide");
        }

        $(".navbar").toggleClass("hide", $(window).scrollTop() > zero);
        zero = $(window).scrollTop();
    });


    var btn = $('.back-to-top');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

});
