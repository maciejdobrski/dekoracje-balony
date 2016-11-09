$(function () {
    'use strict';

    $('a.scrollto').on('click', function (event) {

        // Domyślne zachowanie po kliknięciu
        event.preventDefault();
        $('html, body').stop();

        // Store hash
        var hash = this.hash;

        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 2000, function () {

            // Dodaje (#) do URL kiedy skończy scrollować (default click behavior)
            window.location.hash = hash;
        });

        $('.navbar-collapse ul li').on("click", function(){
            $('#navbar-collapse').removeClass('in');
            $("button.navbar-toggle").attr("aria-expanded","false");
        });
    });


    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
});