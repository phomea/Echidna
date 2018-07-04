<?php

/* base.twig */
class __TwigTemplate_48d5a2828e79c22404d7cdf899c615a0669f84add05e8b2da06d91898f541a27 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'styles' => array($this, 'block_styles'),
            'content_notification' => array($this, 'block_content_notification'),
            'beforeContent' => array($this, 'block_beforeContent'),
            'content' => array($this, 'block_content'),
            'afterContent' => array($this, 'block_afterContent'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\" lang=\"\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\" lang=\"\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"\"> <!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name=\"description\" content=\"Sufee Admin - HTML5 Admin Template\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <link rel=\"apple-touch-icon\" href=\"apple-icon.png\">
    <link rel=\"shortcut icon\" href=\"favicon.ico\">

    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/normalize.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/bootstrap.min.css\">

    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/font-awesome.min.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.13/css/all.css\" integrity=\"sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp\" crossorigin=\"anonymous\">


    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/themify-icons.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/flag-icon.min.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/cs-skin-elastic.css\">
    <!-- <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/bootstrap-select.less\"> -->
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/scss/style.css\">
    <link href=\"/backend/theme/assets/css/lib/vector-map/jqvmap.min.css\" rel=\"stylesheet\">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link href=\"https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i\" rel=\"stylesheet\">

    <link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700\" rel=\"stylesheet\">


    <link rel=\"stylesheet\" href=\"/backend/assets/css/custom.css\">

    <!-- <script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js\"></script> -->


    <script src=\"/backend/theme/assets/js/vendor/jquery-2.1.4.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js\"></script>
    <script src=\"/backend/theme/assets/js/plugins.js\"></script>
    <script src=\"/backend/theme/assets/js/main.js\"></script>

    <script src=\"/backend/theme/assets/js/lib/data-table/datatables.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/dataTables.bootstrap.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/dataTables.buttons.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/buttons.bootstrap.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/jszip.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/pdfmake.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/vfs_fonts.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/buttons.html5.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/buttons.print.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/buttons.colVis.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/datatables-init.js\"></script>
    <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js\"></script>
    <script
            src=\"https://code.jquery.com/ui/1.12.0/jquery-ui.min.js\"
            integrity=\"sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=\"
            crossorigin=\"anonymous\"></script>


    <style>
        ";
        // line 67
        echo ($context["additional_css"] ?? null);
        echo "
    </style>
    ";
        // line 69
        $this->displayBlock('styles', $context, $blocks);
        // line 71
        echo "</head>
<body>

";
        // line 74
        $this->loadTemplate("parts/left-panel.twig", "base.twig", 74)->display($context);
        // line 75
        echo "
<!-- Right Panel -->

<div id=\"right-panel\" class=\"right-panel\">

    ";
        // line 80
        $this->loadTemplate("parts/header.twig", "base.twig", 80)->display($context);
        // line 81
        echo "
    ";
        // line 82
        $this->loadTemplate("parts/breadcrumbs.twig", "base.twig", 82)->display($context);
        // line 83
        echo "
    <div class=\"content mt-3\">

        ";
        // line 86
        $this->displayBlock('content_notification', $context, $blocks);
        // line 96
        echo "

        ";
        // line 98
        $this->displayBlock('beforeContent', $context, $blocks);
        // line 100
        echo "
        ";
        // line 101
        $this->displayBlock('content', $context, $blocks);
        // line 103
        echo "
        ";
        // line 104
        $this->displayBlock('afterContent', $context, $blocks);
        // line 106
        echo "
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->




<script src=\"/backend/assets/js/forms.js\"></script>
<script src=\"/backend/assets/js/main.js\"></script>

";
        // line 118
        $this->displayBlock('scripts', $context, $blocks);
        // line 120
        echo "<script type=\"text/javascript\">
    (function (\$) {
        \$(document).ready(function() {
            \$('#bootstrap-data-table-export').DataTable();
        } );
    })(jQuery);

</script>

<!--
<script src=\"/backend/theme/assets/js/lib/chart-js/Chart.bundle.js\"></script>
<script src=\"/backend/theme/assets/js/dashboard.js\"></script>
<script src=\"/backend/theme/assets/js/widgets.js\"></script>
<script src=\"/backend/theme/assets/js/lib/vector-map/jquery.vmap.js\"></script>
<script src=\"/backend/theme/assets/js/lib/vector-map/jquery.vmap.min.js\"></script>
<script src=\"/backend/theme/assets/js/lib/vector-map/jquery.vmap.sampledata.js\"></script>
<script src=\"/backend/theme/assets/js/lib/vector-map/country/jquery.vmap.world.js\"></script>
<script>
    ( function ( \$ ) {
        \"use strict\";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>
-->
</body>
</html>
";
    }

    // line 69
    public function block_styles($context, array $blocks = array())
    {
        // line 70
        echo "    ";
    }

    // line 86
    public function block_content_notification($context, array $blocks = array())
    {
        // line 87
        echo "        <!--<div class=\"col-sm-12\">
            <div class=\"alert  alert-success alert-dismissible fade show\" role=\"alert\">
                <span class=\"badge badge-pill badge-success\">Success</span> You successfully read this important alert message.
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
        </div>-->
        ";
    }

    // line 98
    public function block_beforeContent($context, array $blocks = array())
    {
        // line 99
        echo "        ";
    }

    // line 101
    public function block_content($context, array $blocks = array())
    {
        // line 102
        echo "        ";
    }

    // line 104
    public function block_afterContent($context, array $blocks = array())
    {
        // line 105
        echo "        ";
    }

    // line 118
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 118,  245 => 105,  242 => 104,  238 => 102,  235 => 101,  231 => 99,  228 => 98,  216 => 87,  213 => 86,  209 => 70,  206 => 69,  164 => 120,  162 => 118,  148 => 106,  146 => 104,  143 => 103,  141 => 101,  138 => 100,  136 => 98,  132 => 96,  130 => 86,  125 => 83,  123 => 82,  120 => 81,  118 => 80,  111 => 75,  109 => 74,  104 => 71,  102 => 69,  97 => 67,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\" lang=\"\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\" lang=\"\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"\"> <!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name=\"description\" content=\"Sufee Admin - HTML5 Admin Template\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <link rel=\"apple-touch-icon\" href=\"apple-icon.png\">
    <link rel=\"shortcut icon\" href=\"favicon.ico\">

    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/normalize.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/bootstrap.min.css\">

    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/font-awesome.min.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.13/css/all.css\" integrity=\"sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp\" crossorigin=\"anonymous\">


    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/themify-icons.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/flag-icon.min.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/cs-skin-elastic.css\">
    <!-- <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/bootstrap-select.less\"> -->
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/scss/style.css\">
    <link href=\"/backend/theme/assets/css/lib/vector-map/jqvmap.min.css\" rel=\"stylesheet\">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link href=\"https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i\" rel=\"stylesheet\">

    <link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700\" rel=\"stylesheet\">


    <link rel=\"stylesheet\" href=\"/backend/assets/css/custom.css\">

    <!-- <script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js\"></script> -->


    <script src=\"/backend/theme/assets/js/vendor/jquery-2.1.4.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js\"></script>
    <script src=\"/backend/theme/assets/js/plugins.js\"></script>
    <script src=\"/backend/theme/assets/js/main.js\"></script>

    <script src=\"/backend/theme/assets/js/lib/data-table/datatables.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/dataTables.bootstrap.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/dataTables.buttons.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/buttons.bootstrap.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/jszip.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/pdfmake.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/vfs_fonts.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/buttons.html5.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/buttons.print.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/buttons.colVis.min.js\"></script>
    <script src=\"/backend/theme/assets/js/lib/data-table/datatables-init.js\"></script>
    <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js\"></script>
    <script
            src=\"https://code.jquery.com/ui/1.12.0/jquery-ui.min.js\"
            integrity=\"sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=\"
            crossorigin=\"anonymous\"></script>


    <style>
        {{ additional_css|raw }}
    </style>
    {% block styles %}
    {% endblock %}
</head>
<body>

{% include \"parts/left-panel.twig\" %}

<!-- Right Panel -->

<div id=\"right-panel\" class=\"right-panel\">

    {% include \"parts/header.twig\" %}

    {% include \"parts/breadcrumbs.twig\" %}

    <div class=\"content mt-3\">

        {% block content_notification %}
        <!--<div class=\"col-sm-12\">
            <div class=\"alert  alert-success alert-dismissible fade show\" role=\"alert\">
                <span class=\"badge badge-pill badge-success\">Success</span> You successfully read this important alert message.
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
        </div>-->
        {% endblock %}


        {% block beforeContent %}
        {% endblock %}

        {% block content %}
        {% endblock %}

        {% block afterContent %}
        {% endblock %}

    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->




<script src=\"/backend/assets/js/forms.js\"></script>
<script src=\"/backend/assets/js/main.js\"></script>

{% block scripts %}
{% endblock %}
<script type=\"text/javascript\">
    (function (\$) {
        \$(document).ready(function() {
            \$('#bootstrap-data-table-export').DataTable();
        } );
    })(jQuery);

</script>

<!--
<script src=\"/backend/theme/assets/js/lib/chart-js/Chart.bundle.js\"></script>
<script src=\"/backend/theme/assets/js/dashboard.js\"></script>
<script src=\"/backend/theme/assets/js/widgets.js\"></script>
<script src=\"/backend/theme/assets/js/lib/vector-map/jquery.vmap.js\"></script>
<script src=\"/backend/theme/assets/js/lib/vector-map/jquery.vmap.min.js\"></script>
<script src=\"/backend/theme/assets/js/lib/vector-map/jquery.vmap.sampledata.js\"></script>
<script src=\"/backend/theme/assets/js/lib/vector-map/country/jquery.vmap.world.js\"></script>
<script>
    ( function ( \$ ) {
        \"use strict\";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>
-->
</body>
</html>
", "base.twig", "/Users/phomea/Siti/Spagnesi/backend/template/base.twig");
    }
}
