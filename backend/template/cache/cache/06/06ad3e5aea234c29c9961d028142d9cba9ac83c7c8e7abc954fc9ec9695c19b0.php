<?php

/* fields/slug.twig */
class __TwigTemplate_de3838dfe6ecef00296d5bb1748645e00a5fdb32ce86a0d644b2144b9fec570b extends Twig_Template
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
        echo "<div class=\"form-group\">
    <label for=\"company\" class=\" form-control-label small\">";
        // line 2
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "</label>

    <div class=\"input-group\">
        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fa fa-link\"></i></span>
        </div>
    <input type=\"text\" id=\"company\" placeholder=\"Enter your company name\" class=\"form-control form-control-sm\" slug-from=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "templateVar", array()), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()), "html", null, true);
        echo "\">
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "fields/slug.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 8,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"form-group\">
    <label for=\"company\" class=\" form-control-label small\">{{ property }}</label>

    <div class=\"input-group\">
        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fa fa-link\"></i></span>
        </div>
    <input type=\"text\" id=\"company\" placeholder=\"Enter your company name\" class=\"form-control form-control-sm\" slug-from=\"{{ field.templateVar }}\" name=\"{{ property }}\" value=\"{{ field.value }}\">
    </div>
</div>", "fields/slug.twig", "/Users/phomea/Siti/Echidna2/backend/template/fields/slug.twig");
    }
}
