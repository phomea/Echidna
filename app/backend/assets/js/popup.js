(function( $ ){
    $(document).ready(function( e ){
       $(document).on("click",'[target="_popup"]',function (e) {
           e.preventDefault();
           popup = new Popup( $(this).attr("href"));
           popup.createWindow();
           popup.open();


           $(e.target).data("popup",popup);

           popup.fetchUrl( ).then(function(e){

               $(popup.list).append(e)
           })
       })
    })


})(jQuery);


var Popup = function(url){
    this.url = url;
    this.overlay = null;
    this.window = null;
    this.list = null;
    this.navigation = null;
    var me = this;


    this.fetchUrl = function () {
        return $.get(this.url);
    }

    this.createWindow = function(){
        this.overlay = $("<div></div>").css({
            position : "fixed",
            top : 0,
            left: 0,
            right: 0,
            bottom:0,
            background : "rgba(255,255,255,0.8)",
            display : "none",
            "justify-content": "center",
            "align-items" :   "center",
            "z-index"   :   "10000000"
        });

        this.window = $("<div></div>").css({
            "max-width" : "80%",
            "max-height" : "80%",
            "width" :   "1600px",
            "min-height" : "300px",
            "min-width" : "300px",
            "background"    : "#fff",
            "box-shadow"    : "0px 0px 30px rgba(0,0,0,0.3)"
        });

        this.overlay.on("click",function ( e ) {
            if( $( e.target).is(me.overlay) ){
                me.close();
            }
        })

        this.overlay.append(this.window);


        this.navigation = $("<div></div>").addClass("fileBrowser-navigation");
        this.navigation.css({
            position: "relative"
        });

        var home = $('<a href="" class="btn btn-primaaru"><i class="fa fa-home"></i> </a>').on("click",me.home);
        home.on("dragleave",function (e) {
            $(this).removeClass("drag-over")
        })
        home.on("dragover dragenter",function (e) {
            e.preventDefault();
            $(this).addClass("drag-over")
        })
        home.on("drop",function ( e ) {
            e.preventDefault();
            console.log(e.originalEvent);
            var path = "/";
            var data = e.originalEvent.dataTransfer.getData("text");

            me.moveFile( data , path ).success(function (e) {
                console.log(e);
                me.refresh();
            });

        });



        var indietro = $('<a href="" class="btn btn-primaaru"><i class="fa fa-chevron-up"></i> </a>').on("click",me.back)
        indietro.on("dragleave",function (e) {
            $(this).removeClass("drag-over")
        })
        indietro.on("dragover dragenter",function (e) {
            e.preventDefault();
            $(this).addClass("drag-over")
        })
        indietro.on("drop",function ( e ) {
            e.preventDefault();
            console.log(e.originalEvent);
            var path = me.calculateBackurl();
            var data = e.originalEvent.dataTransfer.getData("text");

            me.moveFile( data , path ).success(function (e) {
                console.log(e);
                me.refresh();
            });

        });




        var fromurl = $('<a href="" class="btn btn-primaaru"><i class="fa fa-globe"></i> </a>').on("click",me.fromUrl);


        var creacartella = $('<a href="" class="btn btn-primaaru"><i class="fa fa-plus"></i> Cartella </a>').on("click",me.newDirectory)

        var trash = $('<a href="" class="btn btn-danger" style="float:right"><i class="fa fa-trash"></i> </a>').on("click",me.close);
        trash.on("dragleave",function (e) {
            $(this).removeClass("drag-over")
        })
        trash.on("dragover dragenter",function (e) {
            e.preventDefault();
            $(this).addClass("drag-over")
        })
        trash.on("drop",function ( e ) {
            e.preventDefault();

            var data = e.originalEvent.dataTransfer.getData("text");
            $.get(mediaUrl+"delete?path=" + data).success(me.refresh);

        });

        var close = $('<a href="" class="btn btn-danger" style="float:right"><i class="fa fa-close"></i> </a>').on("click",me.close)
        close.css({
            top:0,
            right:0,
            position: "absolute",
            zIndex: 100
        })
        /*this.navigation.append(home);
        this.navigation.append(indietro);
        this.navigation.append(creacartella);
        this.navigation.append(fromurl);*/
        this.navigation.append(close);
        //this.navigation.append(trash);

        this.window.append(this.navigation);

        this.list = $("<div></div>").addClass("fileBrowser-list");

        this.window.append(this.list);

        $("body").append(this.overlay);

    }

    this.open = function () {
        if(this.overlay == null){
            this.createWindow();
        }
        this.overlay.css("display","flex");

    }


    this.close = function( e ){
        if( e != undefined ){
            e.preventDefault();
        }
        me.overlay.css("display","none");
    }
}