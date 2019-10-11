

(function ($) {

    $(document).on('keypress', 'form ', function(e) {
        /*
        if(e.which == 13) {
            e.preventDefault();
            console.log(e.target);
            let form = $(e.target).closest("form");
            console.log(form[0].elements);
            next = false;
            for(let item of form[0].elements){
                if(next){
                    next = false;
                    $(item).focus();
                }
                if( $(item).is(e.target) ){
                    next=true;
                }

            }

            return false;
        }
        */
    });


    $(document).on("submit",".form-return, .form-ajax",function (e) {


        e.preventDefault();



        $(this).addClass("loading");
        var url = $(this).attr("action");
        var form = this;
        var redirect = $(this).attr("data-redirect");
        var postevent = $(this).attr("data-postevent");
        var check = true;

        if( check ) {
            (function (form) {
                $.ajax({
                    url: url,
                    method: $(form).attr("method"),
                    dataType: "json",
                    data: $(form).serialize()
                })
                    .success(function (o) {


                        console.log( $('[data-event="datareturn"]'));
                       $('[data-event="datareturn"]').trigger("datareturn",o.data);
                    })
                    .complete(function (o) {

                        console.log(o);
                        $(form).removeClass("loading");

                        return;

                    });
            })(form);
        }else{
            $(this).removeClass("loading");
            Alerts.simple("Attenzione!","Controlla i campi inseriti e riprova");
        }
    });

    $(document).on("submit",".form-mod, .form-ajax",function (e) {
        e.preventDefault();


        $('.datapicker').each(function() {
            d = $(this).datepicker('getDate');
        })

        $(this).addClass("loading");
        var url = $(this).attr("action");
        var form = this;
        var redirect = $(this).attr("data-redirect");
        var postevent = $(this).attr("data-postevent");


        var check = true;

       /* $(form).find("[data-check]").each(function () {
            debugger;
            if( check ) {
                check = $(this).triggerHandler("check", form);
            }
        })*/


        //debugger;
        if( check ) {
            (function (form) {
                $.ajax({
                    url: url,
                    method: $(form).attr("method"),
                    dataType: "json",
                    data: $(form).serialize()
                })
                    .success(function (o) {


                        if (o.type !== undefined && o.type == 'redirect') {

                            if(typeof o.to ===  "string")
                            {
                                window.location = o.to;
                                /*
                                Alerts.oneAction("Salvato", "Salvataggio avvenuto. Vuoi andare alla lista?", function () {
                                    window.location = o.to;
                                });*/
                                return;
                            }else{
                                let labels = [];
                                let callbacks = [];
                                o.to.forEach((o)=>{
                                    labels.push(o.label);
                                    callbacks.push(o.url)

                                });
                                debugger;
                                Alerts.actions("Salvato", "Salvataggio avvenuto. Cosa vuoi fare?", labels,callbacks);
                                return;
                            }

                            return;
                        }
                        if (o.type != undefined && o.type == "error") {
                            error(o);
                        }

                        Alerts.simple("Salvato", "Salvataggio avvenuto con successo");


                    })
                    .complete(function (o) {

                        console.log(o);
                        $(form).removeClass("loading");

                        return;
                        if (redirect != undefined) {
                            window.location = redirect;
                            return;
                        }

                        if (postevent != undefined)
                            $(form).trigger(postevent);
                    });
            })(form);
        }else{
            $(this).removeClass("loading");
            Alerts.error("Attenzione!","Controlla i campi inseriti e riprova");
        }

        //$('#cp2').colorpicker();

    });



})(jQuery);

function init_tinymce(){
    tinymceplugins = [


        "print",
        "preview",
        "searchreplace",
        "autolink",
        "directionality",
        "visualblocks",
        "visualchars",
        "fullscreen",
        "image",

        "code",
        "link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help"
    ]

    tinymce.init({ selector:'.tinymce',
        plugins: tinymceplugins.join(" "),
        valid_children : 'p[strong|a|#text|span]'
        /*
         plugins : "code",
         toolbar: "code image",
         menubar:"tools"*/
    });
}

(function ($) {

    init_tinymce();






/*

    $(window).ready(function () {

        $(".tinymce").each(function(){


            var editor  = grapesjs.init({
                avoidInlineStyle: 1,
                height: '100%',
                container : $(this)[0],


                plugins: [
                    //'gjs-preset-webpage',
                    //'grapesjs-lory-slider',
                   // 'grapesjs-tabs',
                    //'grapesjs-custom-code',
                    //'grapesjs-touch',
                    //'grapesjs-parser-postcss',
                    //'grapesjs-tooltip',
                    //'grapesjs-tui-image-editor',
                ],
                blockManager: {
                    appendTo: '#blocks'


                },


            });

            editor.BlockManager.add('row', {
                // ...
                label: "<b>Row</b>",
                content: '<div class="row" style="min-height: 200px" data-gjs-droppable=".col" ></div>',
            })

            editor.BlockManager.add('column', {
                // ...
                label: "<b>Col</b>",
                content: '<div class="col"   data-gjs-draggable=".row"></div>'

            })

        })


        //$('select').select2()
    })*/
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
                //alert(link);
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




(function ($) {

    $(window).ready(function(){


        $(document).on("click",'[data-event="datareturn"]',function ( o ) {

            console.log($(o.target));
            $(o.target).on("datareturn",function (ev,data) {


               $(ev.target).data("popup").close();

                select = $(ev.target).closest(".select-entity").find("select");
                labelf = select.attr("data-fieldlabel");
                idf = select.attr("data-fieldid");


                label="";


                if( labelf.indexOf("|") > -1 ) {
                    ex = labelf.split("|");
                    aa = [];

                    ex.forEach(function (a) {

                            aa.push(data[a]);
                    });

                    label = aa.join(" ");


                }else {

                    label = data[labelf];
                }



                var newOption = new Option(label, data[idf], false, false);
                newOption.selected = true;
                $(select).append(newOption).trigger('change');

            })
        })
    })
})(jQuery);
(function ($) {
    $(window).ready(function(){
        $(document).on("check",'[data-check="cap"]',function (e) {
            //ToDo: Controlli sull'input CAP
            debugger;
            return true;
        })
        $(document).on("check",'[data-check="email"]',function (e) {
            //ToDo: Controlli sull'input Email

            return true;
        })
        $('[data-check="int"]').on("check",function (e) {
            //Mi serve per il check finale del form
            return true;
        })
        $('[data-check="float"]').on("check",function (e) {
            //Mi serve per il check finale del form

            /*
            console.log("err:");
            console.log($(this).val());
            return false;
            */

            return true;
        })

        $('[data-check="int"]').keypress(function(e){
            // allowed char: 0 1 2 3 4 5 6 7 8 9 . ,
            let allow_char = [48,49,50,51,52,53,54,55,56,57];
            if(allow_char.indexOf(e.which) === -1 ){
                return false;
            }
            return true;
        })
        $('[data-check="float"]').keypress(function(e){
            // allowed char: 0 1 2 3 4 5 6 7 8 9 . ,
            let allow_char = [48,49,50,51,52,53,54,55,56,57,46,44];
            if(allow_char.indexOf(e.which) !== -1 ){
                if(e.which==44){
                    inputbox = $(this).find("input");
                    e.preventDefault();
                    inputbox.val(inputbox.val() + '.');
                }
            }
            else{
                return false;
            }
            return true;
        });
        /*
        $('[data-check="float"]').change(function(){
//            $(this).val($(this).val().replace(",","."));
            console.log("c"+$(this).val()+"d");
            $(this).val("cane");
            return true;
        });
        */
    })

})(jQuery);




(function ($) {
    $(window).ready(function(){

        function checkHideSelectors(objToHide,obj,value){



            let objValue = $(obj).val();

            if( $(obj).is(":checkbox") ){
                objValue = $(obj).is(":checked") ? "1" : "0";
            }


            if( value.indexOf( objValue ) > -1 ){
                $(objToHide).hide();
                $(objToHide).find("select,input,textarea,button").prop("disabled",true);
            }else{
                $(objToHide).show();
                $(objToHide).find("select,input,textarea,button").prop("disabled",false);
            }
        }


        $("[data-hideselectors]").each(function () {
            let me = this;

            (function(me){


            let selectors = $(me).attr("data-hideselectors").slice(0, -1).split("|");
            let values = $(me).attr("data-hidevalues").slice(0, -1).split("|");



            selectors.forEach(function (o,index) {
                let value = values[index].split("]");

                $('[name="'+o+'"]').on("change",function () {

                    console.log(me,$(this).val(),value);

                    checkHideSelectors(me,this,value)
                })

                checkHideSelectors(me,$('[name="'+o+'"]'),value);

            })


            })(me);




        })



    });


})(jQuery);
