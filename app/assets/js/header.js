var Header = new function(){
    var $window = $(window);
    var $header = $("header.main-header");
    var $toggleMenu = $(".toggle-menu");
    var  offsetTop = 0;
    var classToAdd = "fixed";

    this.init = function(){
        $window.on("scroll",function( e ){
            if( $window.scrollTop() >  offsetTop ){
                $header.addClass("fixed");
            }else{
                $header.removeClass("fixed");
            }
        })

        $toggleMenu.on("click",function (e) {
            e.preventDefault();
            $header.toggleClass("open");
        })
    }


}