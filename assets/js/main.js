$(function () {
    'use strict';

    $('a.scrollto').on('click', function (event) {

        // Domyślne zachowanie po kliknięciu
        event.preventDefault();
        $('html, body').stop();

        // Store hash
        var hash = this.hash;

        $('html, body').animate({
            scrollTop: $(hash).offset().top -80
        }, 2000, function () {
            
        });

        $('.navbar-collapse ul li').on("click", function(){
            $('#navbar-collapse').removeClass('in');
            $("button.navbar-toggle").attr("aria-expanded","false");
        });
    });

    var colorHeader = 80;
    if (scroll >= colorHeader) {
        $('.transparent').addClass('color');
    } else {
        $('.transparent').removeClass('color');
    }

    $(window).scroll(function () {
        var scroll = getCurrentScroll();
        if (scroll >= colorHeader) {
            $('.header').addClass('opacity');
        } else {
            $('.header').removeClass('opacity');
        }
    });


    $('.carousel').carousel({
        interval: 4500,
        pause: "false"
    });


    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
});