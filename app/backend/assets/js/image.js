


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
        this.start = function(){


            this.createThumbnail();




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
                    console.log( e );
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



        $dropper.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
        })
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
                upload.dropper = me;
                upload.start();
            }

        });

        this.append = function( e ){
            $dropper.append(e);
        }
    }





    var MediaBrowser = function(){
        var baseUrl = "/backend/media/fileBrowser/";
        var currentUrl ="";

        var me = this;

        this.overlay = null;
        this.window = null;
        this.list = null;
        this.navigation = null;


        this.getDirectory = function(){

            return $.get(baseUrl + currentUrl);
        }

        this.back = function( e ){
            e.preventDefault();


            spezzato = currentUrl.split("/");
            slice  = spezzato.pop();

            currentUrl = spezzato.join("/");


            me.navigate( currentUrl );
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
            var indietro = $('<a href="" class="btn btn-primaaru">Indietro</a>').on("click",me.back)

            this.navigation.append(indietro);

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

        this.close = function(){
            this.overlay.css("display","none");
        }



        this.navigate = function( u ){
            currentUrl = u;



            me.getDirectory().success( this.parseTree );
        }

        this.parseTree = function( result ){
            me.list.empty();

            for(i=0; i<result.directories.length;i++){
                me.list.append( me.createDirectory(result.directories[i]) );
            }

            for(i=0; i<result.files.length;i++){
                me.list.append( me.createFile(result.files[i]) );
            }
        }

        this.createDirectory = function( d ){

            var dir = $("<figure></figure>").addClass("fileBrowser-directory").addClass("fileBroswer-entry");

            dir.append('<h5>'+d.name+'</h5>')

            dir.on("dblclick",function( e ){

                e.preventDefault();

                me.navigate( currentUrl + "/" + d.name);
            });

            return dir;
        }

        this.createFile = function( d ){

            var div = $("<div></div>").addClass("fileBrowser-file").addClass("fileBroswer-entry");
            var file = $("<figure></figure>");
            var img = $("<img/>").attr("src","/media/" + currentUrl + "/" + d.name);
            file.append(img);

            div.append('<h5>'+d.name+'</h5>')

            file.on("dblclick", function ( e ) {
                e.preventDefault();
                me.fileClick( d );
            });



            div.append(file);
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