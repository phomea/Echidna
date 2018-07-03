<?php

/* fields/hidden.twig */
class __TwigTemplate_e5d58f23d92de244b5ea672760a766d2488d05054c5fde3bfa1a28b45861d07b extends Twig_Template
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
        echo "<input type=\"hidden\" id=\"company\" placeholder=\"Enter your company name\" class=\"form-control\" name=\"";
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()), "html", null, true);
        echo "\">";
    }

    public function getTemplateName()
    {
        return "fields/hidden.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<input type=\"hidden\" id=\"company\" placeholder=\"Enter your company name\" class=\"form-control\" name=\"{{ property }}\" value=\"{{ field.value }}\">", "fields/hidden.twig", "/Users/phomea/Siti/Echidna2/backend/template/fields/hidden.twig");
    }
}
