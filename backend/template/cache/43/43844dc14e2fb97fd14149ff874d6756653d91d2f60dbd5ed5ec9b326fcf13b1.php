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
            'content_notification' => array($this, 'block_content_notification'),
            'content' => array($this, 'block_content'),
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
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/themify-icons.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/flag-icon.min.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/cs-skin-elastic.css\">
    <!-- <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/bootstrap-select.less\"> -->
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/scss/style.css\">
    <link href=\"/backend/theme/assets/css/lib/vector-map/jqvmap.min.css\" rel=\"stylesheet\">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <link rel=\"stylesheet\" href=\"/backend/assets/css/custom.css\">

    <!-- <script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js\"></script> -->

</head>
<body>

";
        // line 36
        $this->loadTemplate("parts/left-panel.twig", "base.twig", 36)->display($context);
        // line 37
        echo "
<!-- Right Panel -->

<div id=\"right-panel\" class=\"right-panel\">

    ";
        // line 42
        $this->loadTemplate("parts/header.twig", "base.twig", 42)->display($context);
        // line 43
        echo "
    ";
        // line 44
        $this->loadTemplate("parts/breadcrumbs.twig", "base.twig", 44)->display($context);
        // line 45
        echo "
    <div class=\"content mt-3\">

        ";
        // line 48
        $this->displayBlock('content_notification', $context, $blocks);
        // line 58
        echo "

        ";
        // line 60
        $this->displayBlock('content', $context, $blocks);
        // line 62
        echo "
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

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


<script src=\"/backend/assets/js/forms.js\"></script>

";
        // line 89
        $this->displayBlock('scripts', $context, $blocks);
        // line 91
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

    // line 48
    public function block_content_notification($context, array $blocks = array())
    {
        // line 49
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

    // line 60
    public function block_content($context, array $blocks = array())
    {
        // line 61
        echo "        ";
    }

    // line 89
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
        return array (  187 => 89,  183 => 61,  180 => 60,  168 => 49,  165 => 48,  123 => 91,  121 => 89,  92 => 62,  90 => 60,  86 => 58,  84 => 48,  79 => 45,  77 => 44,  74 => 43,  72 => 42,  65 => 37,  63 => 36,  26 => 1,);
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
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/themify-icons.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/flag-icon.min.css\">
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/cs-skin-elastic.css\">
    <!-- <link rel=\"stylesheet\" href=\"/backend/theme/assets/css/bootstrap-select.less\"> -->
    <link rel=\"stylesheet\" href=\"/backend/theme/assets/scss/style.css\">
    <link href=\"/backend/theme/assets/css/lib/vector-map/jqvmap.min.css\" rel=\"stylesheet\">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <link rel=\"stylesheet\" href=\"/backend/assets/css/custom.css\">

    <!-- <script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js\"></script> -->

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


        {% block content %}
        {% endblock %}

    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

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


<script src=\"/backend/assets/js/forms.js\"></script>

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
", "base.twig", "/Users/phomea/Siti/Echidna2/backend/template/base.twig");
    }
}
