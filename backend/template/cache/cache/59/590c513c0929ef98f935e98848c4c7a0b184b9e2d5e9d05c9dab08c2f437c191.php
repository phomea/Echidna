<?php

/* fields/select.twig */
class __TwigTemplate_feaa9e8187853589a4a910cab3a93d9eaf707337647df66c3b629e7091740a97 extends Twig_Template
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

        <select name=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["property"] ?? null), "html", null, true);
        echo "\" class=\"form-control\" >
            ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 11
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "value", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "label", array()), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "        </select>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "fields/select.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 13,  44 => 11,  40 => 10,  36 => 9,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"form-group\">
    <label for=\"company\" class=\" form-control-label\">{{ label ? label : property }}</label>

    <div class=\"input-group\">
        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fa fa-font\"></i></span>
        </div>

        <select name=\"{{ property }}\" class=\"form-control\" >
            {% for option in options %}
                <option value=\"{{ option.value }}\">{{ option.label }}</option>
            {% endfor %}
        </select>
    </div>
</div>", "fields/select.twig", "/Users/phomea/Siti/Echidna2/backend/template/fields/select.twig");
    }
}
