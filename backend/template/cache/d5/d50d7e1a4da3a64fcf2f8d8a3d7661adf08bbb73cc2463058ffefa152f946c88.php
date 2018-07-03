<?php

/* fields/media.twig */
class __TwigTemplate_78fc196a84e9057684bbf04c2377f0009a426a71252574d61b6a2b3dc12e384b extends Twig_Template
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
        echo "<div class=\"form-group field-media\">
    <label for=\"company\" class=\" form-control-label\">";
        // line 2
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "</label>
    <input type=\"hidden\" class=\"field-media-id\" placeholder=\"Enter your company name\" class=\"form-control\" name=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()), "html", null, true);
        echo "\">

    <figure>
        <img src=\"\" class=\"field-media-img\">
    </figure>
</div>";
    }

    public function getTemplateName()
    {
        return "fields/media.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"form-group field-media\">
    <label for=\"company\" class=\" form-control-label\">{{ property }}</label>
    <input type=\"hidden\" class=\"field-media-id\" placeholder=\"Enter your company name\" class=\"form-control\" name=\"{{ property }}\" value=\"{{ field.value }}\">

    <figure>
        <img src=\"\" class=\"field-media-img\">
    </figure>
</div>", "fields/media.twig", "/Users/phomea/Siti/Echidna2/backend/template/fields/media.twig");
    }
}
