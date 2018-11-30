

(function ($) {

    $(document).on("submit",".form-mod, .form-ajax",function (e) {
        e.preventDefault();
        $(this).addClass("loading");
        var url = $(this).attr("action");
        var form = this;


        var redirect = $(this).attr("data-redirect");

        var postevent = $(this).attr("data-postevent");

        (function (form) {
            $.ajax({
                url : url,
                method : $(form).attr("method"),
                dataType : "json",
                data :$(form).serialize()
            })
                .success(function ( o ) {

                    Alerts.oneAction("Salvato","Salvataggio avvenuto. Vuoi andare alla lista?");
                    return;

                    if(o.type!== undefined && o.type == 'redirect'){
                        window.location = o.to;
                        return;
                    }
                    if(o.type != undefined && o.type == "error"){
                        error(o);
                    }



                })
                .complete(function(o){

                    console.log(o);
                    $(form).removeClass("loading");

return;
                    if(redirect != undefined ){
                        window.location = redirect;
                        return;
                    }

                    if(postevent != undefined )
                        $(form).trigger(postevent);
                });
        })(form);

    });
})(jQuery);


(function ($) {
    tinymce.init({ selector:'.tinymce',
        plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help code'
        /*
        plugins : "code",
        toolbar: "code image",
        menubar:"tools"*/
    });
})(jQuery);


function error( error ){
    Alerts.simple("Errore",error.msg);
    return;
}


(function ($) {
    $(".field-media").each(function () {
        var id = $(this).find(".field-media-id").val();
        (function(field) {
            $.ajax({
                url : "/backend/media/" + id,
                method : "GET",
                dataType : "json"
            }).success(function d(dati) {
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

    $(window).ready(function() {

        $('[slug-from]').each(function () {
            var me = $(this);
            var form = $(this).closest("form");
            var slugFrom = form.find('[name="' + $(this).attr("slug-from") + '"]');

            slugFrom.on("keyup", function () {
                me.val(slugify($(this).val()));
            })

        })
    });
})(jQuery);


(function ($) {
    $(window).ready(function(){
        $("a.confirm").on("click",function( e ){
            e.preventDefault();
            link = $(this).attr("href");
            Alerts.confrm("Elimina","Sicuro di volerlo eliminare? Questa azione è irreversibile.",function(){
                alert(link);
                window.location = link;
            })
            /*
            link = $(this).attr("href");
            if( confirm("Confermi?") ){
                window.location = link;
            }*/
        })
    })

})(jQuery);
