<?php

/* base/head/scripts.twig */
class __TwigTemplate_5996fbb2378d256ed864f775a3ab6c6b6a4231e5d5cdc1c1b423ae181170624e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((($context["host"] ?? null) != "localhost")) {
            // line 2
            echo "
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-103112484-1', 'auto');
    ga('send', 'pageview');

</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P4QTTFD');</script>
<!-- End Google Tag Manager -->

<script type=\"text/javascript\">
    adroll_adv_id = \"PPOIWMULH5FXNIWBD3WDGC\";
    adroll_pix_id = \"6CTV3BVKRZAMJJOZULHU4R\";
    /* OPTIONAL: provide email to improve user identification */
    /* adroll_email = \"username@example.com\"; */
    (function () {
        var _onload = function(){
            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
            var scr = document.createElement(\"script\");
            var host = ((\"https:\" == document.location.protocol) ? \"https://s.adroll.com\" : \"http://a.adroll.com\");
            scr.setAttribute('async', 'true');
            scr.type = \"text/javascript\";
            scr.src = host + \"/j/roundtrip.js\";
            ((document.getElementsByTagName('head') || [null])[0] ||
            document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        };
        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        else {window.attachEvent('onload', _onload)}
    }());
</script>

<!-- End Google Tag Manager -->

";
        }
    }

    public function getTemplateName()
    {
        return "base/head/scripts.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if host != \"localhost\" %}

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-103112484-1', 'auto');
    ga('send', 'pageview');

</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P4QTTFD');</script>
<!-- End Google Tag Manager -->

<script type=\"text/javascript\">
    adroll_adv_id = \"PPOIWMULH5FXNIWBD3WDGC\";
    adroll_pix_id = \"6CTV3BVKRZAMJJOZULHU4R\";
    /* OPTIONAL: provide email to improve user identification */
    /* adroll_email = \"username@example.com\"; */
    (function () {
        var _onload = function(){
            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
            var scr = document.createElement(\"script\");
            var host = ((\"https:\" == document.location.protocol) ? \"https://s.adroll.com\" : \"http://a.adroll.com\");
            scr.setAttribute('async', 'true');
            scr.type = \"text/javascript\";
            scr.src = host + \"/j/roundtrip.js\";
            ((document.getElementsByTagName('head') || [null])[0] ||
            document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        };
        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        else {window.attachEvent('onload', _onload)}
    }());
</script>

<!-- End Google Tag Manager -->

{% endif %}", "base/head/scripts.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/base/head/scripts.twig");
    }
}
