<?php

/* base/header/header.twig */
class __TwigTemplate_e3a4976ed828983ce4a2f66a73a443d12193e1f6b3ed5ae71417897f0f43ba83 extends Twig_Template
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

    <section class=\"navbar\">

            <div class=\"row\">
                <div class=\"col\">

                </div>
                <div class=\"text-center\">
                    <div id=\"mainmenu\" class=\"container\">
                        <nav>
                            <a href=\"/divani\">Divani</a>
                            <a href=\"/poltrone\">Poltrone</a>
                            <a href=\"/divani-letto\">Divani letto</a>
                        </nav>

                        <a href=\"/\">
                            <img class=\"logo\" src=\"/assets/img/logo.png\" alt=\"Cartiamo\">
                        </a>

                        <nav>
                            <a href=\"/divani\">Divani</a>
                            <a href=\"/poltrone\">Poltrone</a>
                            <a href=\"/divani-letto\">Divani letto</a>
                        </nav>


                    </div>
                </div>
                <div class=\"col\">

                </div>
            </div>

        <!-- Main menu -->

        <!-- //end Main menu -->

    </section>

    <!-- //end Navbar height -->
</header>
<!-- //end Navbar -->

";
        // line 46
        if (($context["breadcrumbs"] ?? null)) {
            // line 47
            echo "<!-- Breadcrumbs-->
<section class=\"breadcrumbs\">
    <div class=\"container\">
        <a href=\"/\">home</a>

        ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 53
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["value"], "nolink", array())) {
                    // line 54
                    echo "                <span class=\"divider\">&nbsp;</span>
                <a >";
                    // line 55
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "label", array()), "html", null, true);
                    echo "</a>
            ";
                } else {
                    // line 57
                    echo "                <span class=\"divider\">&nbsp;</span>
                <a href=\"";
                    // line 58
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "label", array()), "html", null, true);
                    echo "</a>
            ";
                }
                // line 60
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
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
        return array (  110 => 61,  104 => 60,  97 => 58,  94 => 57,  89 => 55,  86 => 54,  83 => 53,  79 => 52,  72 => 47,  70 => 46,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- Navbar -->
<header class=\"main-header\">

    <section class=\"navbar\">

            <div class=\"row\">
                <div class=\"col\">

                </div>
                <div class=\"text-center\">
                    <div id=\"mainmenu\" class=\"container\">
                        <nav>
                            <a href=\"/divani\">Divani</a>
                            <a href=\"/poltrone\">Poltrone</a>
                            <a href=\"/divani-letto\">Divani letto</a>
                        </nav>

                        <a href=\"/\">
                            <img class=\"logo\" src=\"/assets/img/logo.png\" alt=\"Cartiamo\">
                        </a>

                        <nav>
                            <a href=\"/divani\">Divani</a>
                            <a href=\"/poltrone\">Poltrone</a>
                            <a href=\"/divani-letto\">Divani letto</a>
                        </nav>


                    </div>
                </div>
                <div class=\"col\">

                </div>
            </div>

        <!-- Main menu -->

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
", "base/header/header.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/base/header/header.twig");
    }
}
