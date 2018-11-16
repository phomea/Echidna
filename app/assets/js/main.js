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