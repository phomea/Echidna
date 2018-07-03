<?php

/* prova.twig */
class __TwigTemplate_cd14f04d2944f858ae916bd736fad123049dae1dade05948d5a3c793943fa55b extends Twig_Template
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
        echo "<div>
    <h2>";
        // line 2
        echo twig_escape_filter($this->env, ($context["titolo"] ?? null), "html", null, true);
        echo "</h2>
    <img src=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["model"] ?? null), "html", null, true);
        echo "\">
    <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["snap"] ?? null), "html", null, true);
        echo "\">

    <span>";
        // line 6
        echo twig_escape_filter($this->env, ($context["prezzo"] ?? null), "html", null, true);
        echo "</span>
    ";
        // line 7
        if (($context["oldprice"] ?? null)) {
            // line 8
            echo "    <span>";
            echo twig_escape_filter($this->env, ($context["oldprice"] ?? null), "html", null, true);
            echo "</span>
    ";
        }
        // line 10
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "prova.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 10,  45 => 8,  43 => 7,  39 => 6,  34 => 4,  30 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div>
    <h2>{{ titolo }}</h2>
    <img src=\"{{ model }}\">
    <img src=\"{{ snap }}\">

    <span>{{ prezzo }}</span>
    {% if oldprice  %}
    <span>{{ oldprice }}</span>
    {% endif %}
</div>", "prova.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/prova.twig");
    }
}
