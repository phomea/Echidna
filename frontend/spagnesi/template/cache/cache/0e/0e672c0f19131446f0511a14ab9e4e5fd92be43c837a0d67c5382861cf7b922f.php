<?php

/* base/head/head.twig */
class __TwigTemplate_0aab8a76516231835aba545baac36ed0256222fc77e84880f829c9441f4aaa3b extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"it\">
<head>

    ";
        // line 5
        $this->loadTemplate("base/head/meta.twig", "base/head/head.twig", 5)->display($context);
        // line 6
        echo "
    ";
        // line 7
        $this->loadTemplate("base/head/css.twig", "base/head/head.twig", 7)->display($context);
        // line 8
        echo "
    <base href=\"/\">

    ";
        // line 11
        $this->loadTemplate("base/head/scripts.twig", "base/head/head.twig", 11)->display($context);
        // line 12
        echo "
</head>

<body>


<div id=\"outer\">
    <div id=\"outer-canvas\">
        ";
        // line 20
        $this->loadTemplate("base/header/header.twig", "base/head/head.twig", 20)->display($context);
    }

    public function getTemplateName()
    {
        return "base/head/head.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 20,  43 => 12,  41 => 11,  36 => 8,  34 => 7,  31 => 6,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"it\">
<head>

    {% include \"base/head/meta.twig\" %}

    {% include \"base/head/css.twig\" %}

    <base href=\"/\">

    {% include \"base/head/scripts.twig\" %}

</head>

<body>


<div id=\"outer\">
    <div id=\"outer-canvas\">
        {% include 'base/header/header.twig' %}", "base/head/head.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/base/head/head.twig");
    }
}
