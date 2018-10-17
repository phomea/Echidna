
(function( $ ){
    $(document).ready(function( e ){
        //$('[data-toggle="tooltip"]').tooltip()

        var menuclosed = localStorage.getItem("menustatus");


        $('.navbar-brand').on('click', function(event) {
            event.preventDefault();
            $('body').removeClass('open');
            localStorage.setItem("menustatus","open");
        });

        $('#menuToggle').off('click');
    })


})(jQuery);


jQuery(document).ready(function($) {

    "use strict";

    [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
        new SelectFx(el);
    } );

    jQuery('.selectpicker').selectpicker;


    $('#menuToggle').on('click', function(event) {
        $('body').addClass('open');
        localStorage.setItem("menustatus","closed");
    });

    $('.search-trigger').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').addClass('open');
    });

    $('.search-close').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').removeClass('open');
    });

    // $('.user-area> a').on('click', function(event) {
    // 	event.preventDefault();
    // 	event.stopPropagation();
    // 	$('.user-menu').parent().removeClass('open');
    // 	$('.user-menu').parent().toggleClass('open');
    // });


});