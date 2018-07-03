<?php

/* fields/title.twig */
class __TwigTemplate_44d27488b7cfaa55e9425ffd6fd929deb65a554f74b3f5ea1849733a2715a699 extends Twig_Template
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
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "</label>

    <div class=\"input-group input-group-lg\">
        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fa fa-font\"></i></span>
        </div>
        <input type=\"text\" id=\"company\" placeholder=\"Enter your company name\" class=\"form-control form-control-lg\" name=\"";
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
        return "fields/title.twig";
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
    <label for=\"company\" class=\" form-control-label\">{{ property }}</label>

    <div class=\"input-group input-group-lg\">
        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fa fa-font\"></i></span>
        </div>
        <input type=\"text\" id=\"company\" placeholder=\"Enter your company name\" class=\"form-control form-control-lg\" name=\"{{ property }}\" value=\"{{ field.value }}\">
    </div>
</div>", "fields/title.twig", "/Users/phomea/Siti/Echidna2/backend/template/fields/title.twig");
    }
}
