(function($){

    Header.init()
})(jQuery);


(function(){
    selectVariante = $(".select-variant");
    if(selectVariante.length == 0 )return;

    function aggiornaScegliColore() {
        $("[data-idvariante]").hide();

        valore = $(selectVariante).val();

        $('[data-idvariante="'+valore+'"]').show();

    }
    aggiornaScegliColore();

    selectVariante.on("change",function () {

        aggiornaScegliColore( );

    })
})();


var Alert = new function(){
    this.simple = function(msg){
        var al = $('<div class="alert"></div>');
        al.append('<img class="logo logo-black" src="/assets/img/logo/logo-lab.png" alt="Cartiamo">')
        al.append('<h1>'+msg+'</h1>')


        var wrapper = $('<div class="alert-wrapper"></div>');
        wrapper.append(al);
        wrapper.appendTo("body");

        var close = $('<a class="close" href=""><i class="fas fa-check"></i></a>');
        al.append(close);
        (function(close,wrapper){
            close.on("click",function( e ){
                e.preventDefault();
                 wrapper.remove();
            });
            wrapper.on("click",function( e ){
                e.preventDefault();
                if( $(e.target).is(wrapper))
                wrapper.remove();
            })
        })(close,wrapper);

    }
}


/*
(function(){
    $('[data-href="popup"]').each(function(){
       $(this).on("click",function(e){
           e.preventDefault();
           href= $(this).attr("href");

           $.get(href,function (data) {
               console.log(data);
           })
       })
    });
})();
    */