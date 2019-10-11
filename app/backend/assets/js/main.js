
(function( $ ){
    $(document).ready(function( e ){
        //$('[data-toggle="tooltip"]').tooltip()

        var menuclosed = localStorage.getItem("menustatus");


        $('.navbar-brand').on('click', function(event) {
            event.preventDefault();
            $('body').removeClass('open');
            localStorage.setItem("menustatus","open");
        });

        //$('#menuToggle').off('click');
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


    window.onbeforeunload = function(event) {
        $("body").addClass("loading");
    }





    $(document).on("click",".pagination a",function (e) {
        e.preventDefault();
        $(this).closest(".card-body-table").load($(this).attr("href") + "&template_extend=empty.twig&onlyBody=true");
    })

    $(document).on("click",".table-header-order a",function (e) {
        e.preventDefault();
        $(this).closest(".card-body-table").load($(this).attr("href") + "&template_extend=empty.twig&onlyBody=true");
    })


    $(document).on("change",".table-filtered",function () {

        $(this).submit();
    });


    $(document).on("submit",".table-filtered",function (e) {
        e.preventDefault();


        $(this).closest(".list-container").find(".loader-container").addClass("loading");


        $(this).closest(".list-container").find(".table-responsive").load( $(this).attr("action") ? $(this).attr("action") : "" , $(this).serialize(),function () {
            $(this).removeClass("loading");
        });
    })

    $(document).on("click",".top-notice .close",function (e) {
        $(this).closest(".top-notice").remove();
    })



    $(document).on("change",".form-filters",function(){
        let where = [];

        $(this).find(".search-group").each(function(){
            let field = $(this).find(".select-property").val();
            let relation = $(this).find(".select-relation").val();
            let value = $(this).find(".value").val();

            if( value ) {
                if (relation == "=") {
                    where.push(field + '="' + value + '"');
                }

                if (relation == "!=") {
                    where.push(field + '!="' + value + '"');
                }

                if (relation == "like") {
                    where.push(field + ' like "%' + value + '%"');
                }
            }
        })

        let conditions =$(this).find(".conditions");
        conditions.empty();

        $(where).each(function(){
            let input = $("<input>");
            input.attr("type","hidden");
            input.attr("name","where[and][]");
            input.val(this);
            conditions.append(input)
        })
    });
   // $(".table-filtered").submit();


});