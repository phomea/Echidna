(function ($) {

    $('.slider-full').owlCarousel({
        //loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });


    $('.general-carousel').each(function(){
        var n = $(this).attr("data-n");
        if(n == undefined ) n =1;

        $(this).owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            items:n
        });
    });



})(jQuery);