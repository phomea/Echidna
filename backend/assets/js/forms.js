(function ($) {
    $(".form-mod, .form-ajax").on("submit",function (e) {
        e.preventDefault();
        $(this).addClass("loading");
        var url = $(this).attr("action");
        var form = this;
        (function (form) {
            $.ajax({
                url : url,
                method : $(form).attr("method"),
                dataType : "json",
                data :$(form).serialize()
            })
                .success(function ( o ) {
                    if(o.type!== undefined && o.type == 'redirect'){
                        window.location = o.to;
                    }
                })
                .complete(function(o){
                    $(form).removeClass("loading");
                });
        })(form);

    });
})(jQuery);


(function ($) {
    tinymce.init({ selector:'.tinymce' });
})(jQuery);



(function ($) {
    $(".field-media").each(function () {
        var id = $(this).find(".field-media-id").val();
        (function(field) {
            $.ajax({
                url : "/backend/media/" + id,
                method : "GET",
                dataType : "json"
            }).success(function (dati) {
                console.log(dati);
                $(field).find(".field-media-img").attr("src",dati.permalink);
            });
        })(this)

    })
})(jQuery);

(function ($) {
    window.slugify = function ( t ) {
      return t.replace(
          /(['" ]+)/g
          ,"-").toLowerCase();
    };
    $('[slug-from]').each(function () {
        var me = $(this);
        var form = $(this).closest("form");
        var slugFrom = form.find('[name="'+$(this).attr("slug-from")+'"]');

        slugFrom.on("keyup",function () {
            me.val( slugify($(this).val()) );
        })

    })
})(jQuery)