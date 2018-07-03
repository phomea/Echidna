<?php

/* fields/tinymce.twig */
class __TwigTemplate_1c21974f4674ed6a709cbc9a9c73e45c20559c41912bb59106e081d674b52d3c extends Twig_Template
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
    <textarea class=\"form-control tinymce\" name=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()), "html", null, true);
        echo "</textarea>
</div>";
    }

    public function getTemplateName()
    {
        return "fields/tinymce.twig";
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
    <textarea class=\"form-control tinymce\" name=\"{{ property }}\">{{ field.value }}</textarea>
</div>", "fields/tinymce.twig", "/Users/phomea/Siti/Echidna2/backend/template/fields/tinymce.twig");
    }
}
