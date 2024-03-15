$(function() {

    "use strict";

    // Sticky Navbar
    var zero = 0;
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 0) {
            $(".navbar").addClass("wide");
        } else {
            $(".navbar").removeClass("wide");
        }

        $(".navbar").toggleClass("hide", $(window).scrollTop() > zero);
        zero = $(window).scrollTop();
    });

});
