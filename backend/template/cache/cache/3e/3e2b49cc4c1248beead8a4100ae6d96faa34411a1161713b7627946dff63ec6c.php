<?php

/* fields/textarea.twig */
class __TwigTemplate_8f1d5168157e16ab993096f04a2fd69cd06ab7d86503e0fb8f59bdac8a80f95e extends Twig_Template
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
        echo "<div class=\"form-group\"><label for=\"company\" class=\" form-control-label\">";
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "</label>
    <textarea class=\"form-control\" name=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()), "html", null, true);
        echo "</textarea>
</div>";
    }

    public function getTemplateName()
    {
        return "fields/textarea.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"form-group\"><label for=\"company\" class=\" form-control-label\">{{ property }}</label>
    <textarea class=\"form-control\" name=\"{{ property }}\">{{ field.value }}</textarea>
</div>", "fields/textarea.twig", "/Users/phomea/Siti/Spagnesi/backend/template/fields/textarea.twig");
    }
}
