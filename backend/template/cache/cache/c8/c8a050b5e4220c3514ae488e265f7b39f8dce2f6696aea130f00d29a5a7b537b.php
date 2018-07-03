<?php

/* fields/default.twig */
class __TwigTemplate_2cd2af506c0a82adc998835b4362b3b93e9748fe21e5ba41bc2e55596658356a extends Twig_Template
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
    <label for=\"company\" class=\" form-control-label\">";
        // line 2
        echo twig_escape_filter($this->env, ((($context["label"] ?? null)) ? (($context["label"] ?? null)) : (($context["property"] ?? null))), "html", null, true);
        echo "</label>

    <div class=\"input-group\">
        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fa fa-font\"></i></span>
        </div>
        <input type=\"text\" id=\"company\" placeholder=\"Enter your company name\" class=\"form-control\" name=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()), "html", null, true);
        echo "\">
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "fields/default.twig";
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
    <label for=\"company\" class=\" form-control-label\">{{ label ? label : property }}</label>

    <div class=\"input-group\">
        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fa fa-font\"></i></span>
        </div>
        <input type=\"text\" id=\"company\" placeholder=\"Enter your company name\" class=\"form-control\" name=\"{{ property }}\" value=\"{{ field.value }}\">
    </div>
</div>", "fields/default.twig", "/Users/phomea/Siti/Echidna2/backend/template/fields/default.twig");
    }
}
