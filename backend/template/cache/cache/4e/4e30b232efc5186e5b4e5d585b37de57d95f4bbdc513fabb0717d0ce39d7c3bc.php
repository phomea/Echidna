<?php

/* tabs.twig */
class __TwigTemplate_7e1f695b044164782da687ab1a1c90603f8bd485dd24b6beae7a2678fa405bc1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(($context["template_extend"] ?? null), "tabs.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "
<!-- Nav tabs -->
<ul class=\"nav nav-tabs\" id=\"myTab\" role=\"tablist\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tabs"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
            // line 7
            echo "        <li class=\"nav-item ";
            echo (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) == 1)) ? ("active") : (""));
            echo "\" >
            <a class=\"nav-link ";
            // line 8
            echo (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) == 1)) ? ("active show") : (""));
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "-tab\" data-toggle=\"tab\" href=\"#";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" role=\"tab\" aria-controls=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" aria-selected=\"true\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "label", array()), "html", null, true);
            echo "</a>
        </li>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "
</ul>

<!-- Tab panes -->
<div class=\"tab-content\">
    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tabs"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
            // line 17
            echo "        <div class=\"tab-pane ";
            echo (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) == 1)) ? ("active show") : (""));
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" role=\"tabpanel\" aria-labelledby=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "-tab\">";
            echo twig_get_attribute($this->env, $this->source, $context["tab"], "content", array());
            echo "</div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "
</div>

";
    }

    // line 25
    public function block_scripts($context, array $blocks = array())
    {
        // line 26
        echo "
";
    }

    public function getTemplateName()
    {
        return "tabs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 26,  141 => 25,  134 => 19,  111 => 17,  94 => 16,  87 => 11,  62 => 8,  57 => 7,  40 => 6,  35 => 3,  32 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends template_extend %}
{% block content %}

<!-- Nav tabs -->
<ul class=\"nav nav-tabs\" id=\"myTab\" role=\"tablist\">
    {% for key,tab in tabs %}
        <li class=\"nav-item {{ loop.index==1 ? \"active\":\"\" }}\" >
            <a class=\"nav-link {{ loop.index==1 ? \"active show\":\"\" }}\" id=\"{{ key }}-tab\" data-toggle=\"tab\" href=\"#{{ key }}\" role=\"tab\" aria-controls=\"{{ key }}\" aria-selected=\"true\">{{ tab.label }}</a>
        </li>
    {% endfor %}

</ul>

<!-- Tab panes -->
<div class=\"tab-content\">
    {% for key,tab in tabs %}
        <div class=\"tab-pane {{ loop.index==1 ? \"active show\":\"\" }}\" id=\"{{ key }}\" role=\"tabpanel\" aria-labelledby=\"{{ key }}-tab\">{{ tab.content|raw }}</div>
    {% endfor %}

</div>

{% endblock %}


{% block scripts %}

{% endblock %}
", "tabs.twig", "/Users/phomea/Siti/Spagnesi/backend/template/tabs.twig");
    }
}
