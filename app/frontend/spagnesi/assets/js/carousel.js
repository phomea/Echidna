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

        var nav =false;
        if( $(this).attr("data-nav")!== undefined ){
            nav = true;
        }
        $(this).owlCarousel({
            loop:false,
            margin:10,
            nav:nav,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:n
                }
            }
        });
    });



})(jQuery);