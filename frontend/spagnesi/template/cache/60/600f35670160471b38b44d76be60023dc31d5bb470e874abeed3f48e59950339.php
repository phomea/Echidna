<?php

/* base/header/header.twig */
class __TwigTemplate_c02829282466016fe2344522103617d04e9c9c093442313a6e96a4360c08b9d6 extends Twig_Template
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
        echo "<!-- Navbar -->
<header class=\"main-header\">
    <!-- Search -->
    <!-- Back to top -->
    <!--<div class=\"back-to-top\">
        <span class=\"arrow-up\"><img src=\"images/icon-scroll-arrow.png\" alt=\"\"></span><img src=\"images/icon-scroll-mouse.png\" alt=\"\">
    </div>-->


    <!-- //end Back to top -->
    <section class=\"navbar stop-scroll\">
        <div class=\"container\">
            <div class=\"row\">
                <!-- Logo -->
                <div class=\"col-6 offset-3 text-center\">
                    <a href=\"/\"><img class=\"logo\" src=\"/assets/img/logo.png\" alt=\"Cartiamo\"></a>
                </div>
            </div>
        </div>
        <!-- Main menu -->

        ";
        // line 22
        $this->loadTemplate("base/header/menu/mainmenu.twig", "base/header/header.twig", 22)->display($context);
        // line 23
        echo "

        <!-- //end Main menu -->

    </section>

    <!-- //end Navbar height -->
</header>
<!-- //end Navbar -->


";
        // line 34
        if (($context["breadcrumbs"] ?? null)) {
            // line 35
            echo "

<!-- Breadcrumbs-->
<section class=\"breadcrumbs\">
    <div class=\"container\">
        <a href=\"/\">home</a>

        ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 43
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["value"], "nolink", array())) {
                    // line 44
                    echo "                <span class=\"divider\">&nbsp;</span>
                <a >";
                    // line 45
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "label", array()), "html", null, true);
                    echo "</a>
            ";
                } else {
                    // line 47
                    echo "                <span class=\"divider\">&nbsp;</span>
                <a href=\"";
                    // line 48
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "label", array()), "html", null, true);
                    echo "</a>
            ";
                }
                // line 50
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "
    </div>
</section>
<!-- //end Breadcrumbs -->
";
        }
    }

    public function getTemplateName()
    {
        return "base/header/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 51,  97 => 50,  90 => 48,  87 => 47,  82 => 45,  79 => 44,  76 => 43,  72 => 42,  63 => 35,  61 => 34,  48 => 23,  46 => 22,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- Navbar -->
<header class=\"main-header\">
    <!-- Search -->
    <!-- Back to top -->
    <!--<div class=\"back-to-top\">
        <span class=\"arrow-up\"><img src=\"images/icon-scroll-arrow.png\" alt=\"\"></span><img src=\"images/icon-scroll-mouse.png\" alt=\"\">
    </div>-->


    <!-- //end Back to top -->
    <section class=\"navbar stop-scroll\">
        <div class=\"container\">
            <div class=\"row\">
                <!-- Logo -->
                <div class=\"col-6 offset-3 text-center\">
                    <a href=\"/\"><img class=\"logo\" src=\"/assets/img/logo.png\" alt=\"Cartiamo\"></a>
                </div>
            </div>
        </div>
        <!-- Main menu -->

        {% include 'base/header/menu/mainmenu.twig' %}


        <!-- //end Main menu -->

    </section>

    <!-- //end Navbar height -->
</header>
<!-- //end Navbar -->


{% if breadcrumbs%}


<!-- Breadcrumbs-->
<section class=\"breadcrumbs\">
    <div class=\"container\">
        <a href=\"/\">home</a>

        {% for value in breadcrumbs %}
            {% if value.nolink %}
                <span class=\"divider\">&nbsp;</span>
                <a >{{ value.label }}</a>
            {% else %}
                <span class=\"divider\">&nbsp;</span>
                <a href=\"{{ value.url }}\">{{ value.label }}</a>
            {% endif%}
        {% endfor %}

    </div>
</section>
<!-- //end Breadcrumbs -->
{% endif %}
", "base/header/header.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/base/header/header.twig");
    }
}
