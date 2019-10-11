
window.Alerts = new function(){

    $(document).keyup(function(e) {
        if (e.key === "Escape") { // escape key maps to keycode `27`
            $(".alert-wrapper").each(function(){
                window.Alerts.closeAlert($(this).children(".alert"));
            });
        }
    });

    this.closeAlert = function (a) {
        var $body = $("body");
        $body.removeClass("alert-open");
        (function (a) {
            $(a).closest(".alert-wrapper").addClass("closing");
            window.setTimeout(function () {
                $(a).closest(".alert-wrapper").remove();
            }, 500);
        })(a);
    }

    this.error = function(titleText,msg){
        var $body = $("body");
        var wrapper = $("<div class='alert-wrapper'></div>");
        var alert  = $('<div class="alert simple"></div>');


        var title = $("<h2>"+titleText+"</h2>");
        var text = $("<p>"+msg+"</p>");


        var button = $('<a href="" class="btn btn-danger"><i class="fas fa-exclamation"></i></a>');
        (function(alert){
            button.on("click",function (e) {
                e.preventDefault();
                window.Alerts.closeAlert(alert)
            })
        })(alert);

        alert.append(title);
        alert.append(text);
        alert.append(button);

        wrapper.append(alert);
        $body.addClass("alert-open");
        $body.append(wrapper);
    }

    this.simple = function(titleText,msg){
        var $body = $("body");
        var wrapper = $("<div class='alert-wrapper'></div>");
        var alert  = $('<div class="alert simple"></div>');


        var title = $("<h2>"+titleText+"</h2>");
        var text = $("<p>"+msg+"</p>");


        var button = $('<a href="" class="btn btn-success"><i class="fas fa-check"></i></a>');
        (function(alert){
            button.on("click",function (e) {
                e.preventDefault();
                window.Alerts.closeAlert(alert)
            })
        })(alert);

        alert.append(title);
        alert.append(text);
        alert.append(button);

        wrapper.append(alert);
        $body.addClass("alert-open");
        $body.append(wrapper);
    }

    this.oneAction = function(titleText,pText){
        var $body = $("body");
        var wrapper = $("<div class='alert-wrapper'></div>");
        var alert  = $('<div class="alert two-buttons"></div>');


        var title = $("<h2>"+titleText+"</h2>");
        var text = $("<p>"+pText+"</p>");

        var buttons = $('<div class="alert-buttons"></div>');
        var button = $('<a href="" class="btn btn-danger"><i class="fa fa-close"></i></a>');
        var button2 = $('<a href="" class="btn btn-success">Vai alla lista</a>');
        (function(alert){
            button.on("click",function (e) {
                e.preventDefault();
                window.Alerts.closeAlert(alert)
            })
        })(alert);

        alert.append(title);
        alert.append(text);
        buttons.append(button);
        buttons.append(button2);
        alert.append(buttons);

        wrapper.append(alert);
        $body.addClass("alert-open");
        $body.append(wrapper);
    }



    this.actions = function(titleText,pText,labels,callbacks){
        var $body = $("body");
        var wrapper = $("<div class='alert-wrapper'></div>");
        var alert  = $('<div class="alert two-buttons"></div>');


        var title = $("<h2>"+titleText+"</h2>");
        var text = $("<p>"+pText+"</p>");

        var buttons = $('<div class="alert-buttons"></div>');
        labels.forEach((o,i)=>{
            var button = $('<a href="" class="btn btn-light">'+o+'</a>');

            if( typeof callbacks[i] === "function") {
                button.on("click", callbacks[i]);
            }else{
                button.attr("href",callbacks[i])
            }
            buttons.append(button);
        });




        alert.append(title);
        alert.append(text);

        alert.append(buttons);

        wrapper.append(alert);
        $body.addClass("alert-open");
        $body.append(wrapper);
    }


    this.confrm = function(titleText,pText,callback){
        var $body = $("body");
        var wrapper = $("<div class='alert-wrapper'></div>");
        var alert  = $('<div class="alert two-buttons"></div>');


        var title = $("<h2>"+titleText+"</h2>");
        var text = $("<p>"+pText+"</p>");

        var buttons = $('<div class="alert-buttons"></div>');
        var button = $('<a href="" class="btn btn-danger"><i class="fa fa-close"></i></a>');
        var button2 = $('<a href="" class="btn btn-success"><i class="fas fa-check"></i></a>');
        (function(alert,callback){
            button.on("click",function (e) {
                e.preventDefault();
                window.Alerts.closeAlert(alert)
            });

            button2.on("click",function( e ){
                e.preventDefault();
                callback();
                window.Alerts.closeAlert(alert)
            })
        })(alert,callback);

        alert.append(title);
        alert.append(text);
        buttons.append(button);
        buttons.append(button2);
        alert.append(buttons);

        wrapper.append(alert);
        $body.addClass("alert-open");
        $body.append(wrapper);
    }
}