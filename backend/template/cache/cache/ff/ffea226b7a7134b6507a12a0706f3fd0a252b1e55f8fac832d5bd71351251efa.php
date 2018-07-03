<?php

/* media/templates/add.twig */
class __TwigTemplate_88e7cae0fc903668b0083d5ff1080799985aa3772761da1ed33ba2cb3e1993bb extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "media/templates/add.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'styles' => array($this, 'block_styles'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"image-dropper\">
        <span>Drop files</span>
    </div>
";
    }

    // line 10
    public function block_styles($context, array $blocks = array())
    {
        // line 11
        echo "    <style>
    .image-dropper {
        border: 0.4em dashed rgba(0,0,0,0.1);
    }
        .image-dropper span{
            text-transform: uppercase;
            font-weight: 900;
            font-size: 5em;
            padding: 0.5em;
            text-align: center;
            display: block;
            color: rgba(0,0,0,0.2);
            pointer-events: none;
        }

        .image-dropper:after{
            content: '';
            clear: both;
        }

        .image-dropper .thumbnail{
            width: 100px;
            height: 100px;
            background: #fff;
            box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
            float: left;
            margin: 0.5em;
        }
        .image-dropper .thumbnail img{
            max-width:100%;
            max-height: 100%;
        }
    </style>
";
    }

    // line 47
    public function block_scripts($context, array $blocks = array())
    {
        // line 48
        echo "
    <script>
        (function(\$){

            var preview = \$(\".image-dropper\");

            function renderThumbnail( file ){

                if (!file.type.startsWith('image/')){ return; }

                var figure = document.createElement(\"figure\");
                figure.classList.add(\"thumbnail\");

                var img = document.createElement(\"img\");
                img.file = file;

                figure.appendChild(img);
                preview.append( figure ); // Assuming that \"preview\" is the div output where the content will be displayed.

                var reader = new FileReader();
                reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
                reader.readAsDataURL(file);
            }

            \$(\".image-dropper\").on(\"dragover\",function ( e ) {
                e.preventDefault();
                e.stopPropagation();



                console.log(\"dragover\");
            });
            \$(\".image-dropper\").on(\"dragenter\",function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                console.log(\"dragenter\");
            });
            \$(\".image-dropper\").on(\"drop\",function ( e ) {
                e.preventDefault();
                e.stopPropagation();

                var dt = e.originalEvent.dataTransfer;
                var files = dt.files;

                var count = files.length;


                for (var i = 0; i < files.length; i++) {
                    renderThumbnail(files[i]);
                }


            })
        })(jQuery);
    </script>

";
    }

    public function getTemplateName()
    {
        return "media/templates/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 48,  85 => 47,  48 => 11,  45 => 10,  37 => 4,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.twig\" %}

{% block content %}

    <div class=\"image-dropper\">
        <span>Drop files</span>
    </div>
{% endblock %}

{% block styles %}
    <style>
    .image-dropper {
        border: 0.4em dashed rgba(0,0,0,0.1);
    }
        .image-dropper span{
            text-transform: uppercase;
            font-weight: 900;
            font-size: 5em;
            padding: 0.5em;
            text-align: center;
            display: block;
            color: rgba(0,0,0,0.2);
            pointer-events: none;
        }

        .image-dropper:after{
            content: '';
            clear: both;
        }

        .image-dropper .thumbnail{
            width: 100px;
            height: 100px;
            background: #fff;
            box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
            float: left;
            margin: 0.5em;
        }
        .image-dropper .thumbnail img{
            max-width:100%;
            max-height: 100%;
        }
    </style>
{% endblock %}


{% block scripts %}

    <script>
        (function(\$){

            var preview = \$(\".image-dropper\");

            function renderThumbnail( file ){

                if (!file.type.startsWith('image/')){ return; }

                var figure = document.createElement(\"figure\");
                figure.classList.add(\"thumbnail\");

                var img = document.createElement(\"img\");
                img.file = file;

                figure.appendChild(img);
                preview.append( figure ); // Assuming that \"preview\" is the div output where the content will be displayed.

                var reader = new FileReader();
                reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
                reader.readAsDataURL(file);
            }

            \$(\".image-dropper\").on(\"dragover\",function ( e ) {
                e.preventDefault();
                e.stopPropagation();



                console.log(\"dragover\");
            });
            \$(\".image-dropper\").on(\"dragenter\",function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                console.log(\"dragenter\");
            });
            \$(\".image-dropper\").on(\"drop\",function ( e ) {
                e.preventDefault();
                e.stopPropagation();

                var dt = e.originalEvent.dataTransfer;
                var files = dt.files;

                var count = files.length;


                for (var i = 0; i < files.length; i++) {
                    renderThumbnail(files[i]);
                }


            })
        })(jQuery);
    </script>

{% endblock  %}", "media/templates/add.twig", "/Users/phomea/Siti/Echidna2/applications/media/templates/add.twig");
    }
}
