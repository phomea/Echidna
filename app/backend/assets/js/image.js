


    var Uploader = function( file ,folder ){
        this.uploadUrl = "/backend/media/upload";
        this.file = file;
        this.thumbnail = null;
        this.folder = folder == undefined ? "" : folder;

        this.dropper = null;

        var me=this;

        this.createThumbnail = function(){
            var reader = new FileReader();
            this.thumbnail = document.createElement("figure");
            this.thumbnail.classList.add("thumbnail");
            this.thumbnail.classList.add("uploading");

            reader.onload = function(e) {
                var img = document.createElement("img");
                img.file = file;

                img = $('<img src="'+e.target.result+'">');
                $(me.thumbnail).append(img);

            };

            me.dropper.append(me.thumbnail);
            reader.readAsDataURL(this.file);

        }

        this._finish = null;

        this.finish = function( callback ){
            this._finish = callback;
        }
        this.start = function(){


            this.createThumbnail();



            var me = this;

            var formData = new FormData();
            formData.append('folder', me.folder);
            formData.append('image', this.file );

            $.ajax({
                url: this.uploadUrl,
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,

                complete : function( e ){

                    if( me._finish != null){
                        me._finish( e );
                    }
                }
            });

            return;

            var xhr = new XMLHttpRequest();

            // Update progress bar
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    //progressBar.style.width = (evt.loaded / evt.total) * 100 + "%";
                }
                else {
                    // No data to calculate on
                }
            }, false);

            // File uploaded
            xhr.addEventListener("load", function (evt) {

                console.log(xhr.responseText);
                /*r = JSON.parse(xhr.responseText);
                if (r && r.id!=undefined) {

                    $(xhr.li).wrapInner('<a href="/admin/media/mod/'+r.id+'" data-id="' + r.id + '"></a>');
                    ajaxify(xhr.li);
                }
                progressBarContainer.className += " uploaded";*/

            }, false);
            xhr.onreadystatechange = function () {


                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {


                    // progressBarContainer.className += " uploaded";
                }

            }
            xhr.open("put", this.uploadUrl, true);

            // Set appropriate headers
            xhr.setRequestHeader('Cache-Control', 'no-cache');
            filename = this.file.name || this.file.fileName;
            xhr.setRequestHeader("X-File-Name", filename);
            xhr.setRequestHeader("X-File-Size", this.file.size);
            if ('getAsBinary' in this.file) {
                // Firefox 3.5
                xhr.sendAsBinary(this.file.getAsBinary());
            }
            else {
                // W3C-blessed interface
                xhr.send(this.file);
            }

        }
    }


    var FileDropper = function( selettore, folder ){
        var $dropper = $( selettore );
        var folder = folder == undefined ? "" : folder;
        var me = this;

        $dropper.off('drag dragstart dragend dragover dragenter dragleave drop');
        $dropper.off('dragover dragenter');
        $dropper.off('dragleave dragend drop');

        $dropper.on('dragend dragover dragenter dragleave drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
        })
        $dropper
        .on('dragover dragenter', function() {
            $dropper.addClass('is-dragover');
        })
        .on('dragleave dragend drop', function() {
            $dropper.removeClass('is-dragover');
        })
        .on('drop', function(e) {
            droppedFiles = e.originalEvent.dataTransfer.files;


            for(i =0; i<droppedFiles.length; i++){
                o = droppedFiles[i];
                upload = new Uploader( o , folder );
                upload.finish(me._finish);
                upload.dropper = me;
                upload.start();
            }

        });
        this._finish = null;
        this.finish = function(c){
            this._finish=c;
        }



        this.append = function( e ){
            $dropper.append(e);
        }
    }





    var MediaBrowser = function(){
        var mediaUrl = "/backend/media/";
        var baseUrl = "/backend/media/fileBrowser/";
        var moveUrl = "/backend/media/moveFile";
        var currentUrl ="";

        var me = this;

        this.overlay = null;
        this.window = null;
        this.list = null;
        this.navigation = null;


        this.accept = [];

        this.getDirectory = function(){
            return $.get(baseUrl + currentUrl);
        }

        this.newDirectory = function(e){
            e.preventDefault();
            n = prompt("Nome della nuova cartella da creare");

            $.get(mediaUrl + "makeDir?dir="+currentUrl + "/" + n).success(me.refresh);
            //return $.get(baseUrl + currentUrl);
        }

        this.moveFile = function (from,to) {
            return $.ajax({
                url : moveUrl,
                data : {
                    from : from,
                    to : to
                },
                method : "POST"
            });
        }

        this.calculateBackurl=function(){
            spezzato = currentUrl.split("/");
            slice  = spezzato.pop();

            return spezzato.join("/");
        }
        this.back = function( e ){
            e.preventDefault();

            currentUrl =me.calculateBackurl()


            me.navigate( currentUrl );
        }

        this.home = function( e ){
            e.preventDefault();



            me.navigate( "" );
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
                "height"    :"1200px",
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

            this.navigation.append(home);
            this.navigation.append(indietro);
            this.navigation.append(creacartella);
            this.navigation.append(close);
            this.navigation.append(trash);

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

            this.navigate( currentUrl );
        }

        this.close = function( e ){
            if( e != undefined ){
                e.preventDefault();
            }
            me.overlay.css("display","none");
        }



        this.navigate = function( u ){
            currentUrl = u;



            me.getDirectory().success( this.parseTree );
        }

        this.refresh = function(){

            me.getDirectory().success( me.parseTree);
        }
        this.parseTree = function( result ){
            me.list.empty();

            for(i=0; i<result.directories.length;i++){
                me.list.append( me.createDirectory(result.directories[i]) );
            }

            for(i=0; i<result.files.length;i++){
                var file =me.createFile(result.files[i]);
                if(file)
                me.list.append( file );
            }

            (new FileDropper(me.list,currentUrl)).finish(me.refresh);
        }



        this.createDirectory = function( d ){

            var dir = $("<figure data-src='"+currentUrl+"/"+d.name+"'></figure>").addClass("fileBrowser-directory").addClass("fileBroswer-entry");

            dir.append('<h5>'+d.name+'</h5>')

            dir.on("dblclick",function( e ){

                e.preventDefault();

                me.navigate( currentUrl + "/" + d.name);
            });

            dir.on("dragleave",function (e) {
                $(this).removeClass("drag-over")
            })
            dir.on("dragover dragenter",function (e) {
                e.preventDefault();
                $(this).addClass("drag-over")
            })
            dir.on("drop",function ( e ) {
                e.preventDefault();
                console.log(e.originalEvent);
                var path = $(this).attr("data-src");
                var data = e.originalEvent.dataTransfer.getData("text");

                me.moveFile( data , path ).success(function (e) {
                    console.log(e);
                    me.refresh();
                });

            })
            return dir;
        }

        this.createFile = function( d ){

            extension = d.name.split(".").pop();

            if( me.accept.indexOf(extension) == -1 && me.accept.length > 0 ){
                return false;
            }


            var div = $("<div draggable='true' data-src='"+currentUrl + "/" + d.name+"'></div>").addClass("fileBrowser-file").addClass("fileBroswer-entry");
            var file = null;

            if( ["jpg","png","gif"].indexOf(extension) > -1 ){
                //immagine
                file = $("<figure></figure>");
                console.log(d);
                var img = $("<img/>").attr("src","/media/" + currentUrl + "/" + d.name);
                file.append(img);
            }else if(["pdf","ods","txt"].indexOf(extension) > -1){
                //documento
                file = $("<figure></figure>");
                var img = $("<i/>").addClass("fa").addClass("fa-file-text");
                file.append(img);
            }else if( extension=='pdf'){
                //pdf
                file = $("<figure></figure>");
                var img = $("<i/>").addClass("fa").addClass("fa-pdf-o");
                file.append(img);
            }
            div.append('<h5>'+d.name+'</h5>');

            if( file == null ) return false;

            file.on("dblclick", function ( e ) {
                e.preventDefault();
                me.fileClick( d );
            });
            div.append(file);



            div.on("dragstart",function (e) {
                var ee=$(this).attr("data-src");
                e.originalEvent.dataTransfer.setData("text", ee);

            })

            return div;
        }

        this.fileClick = function( f ){
            var file = {
                name : f.name,
                permalink : "/media" + currentUrl + "/" + f.name
            }
            this.fileChooseCallback( file );
            this.close();
        }

        this.fileChooseCallback = null;

        this.fileChoose = function( f ){
            this.fileChooseCallback = f;
        }



    }