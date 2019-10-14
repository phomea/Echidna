<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* pages/default.twig */
class __TwigTemplate_abcc8730b9d81df5f06986c0af1ec49b92635f6ebb364ad89f660a9c9bdca218 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("base.twig", "pages/default.twig", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "
    <div class=\"hh2 bg-dot \"></div>

    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["hooks"] ?? null), "banner", []));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 8
            echo "        ";
            echo $context["hook"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "
    <div class=\"container mt-5\">
        ";
        // line 12
        echo twig_include($this->env, $context, twig_template_from_string($this->env, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "content", [])));
        echo "
    </div>

    <div class=\"bg1\">
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["hooks"] ?? null), "ciao", []));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 17
            echo "            ";
            echo $context["hook"];
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "pages/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 19,  80 => 17,  76 => 16,  69 => 12,  65 => 10,  56 => 8,  52 => 7,  47 => 4,  44 => 3,  34 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("
{% extends \"base.twig\" %}
{% block content %}

    <div class=\"hh2 bg-dot \"></div>

    {% for hook in hooks.banner %}
        {{ hook | raw }}
    {% endfor  %}

    <div class=\"container mt-5\">
        {{ include(template_from_string( content.content))  }}
    </div>

    <div class=\"bg1\">
        {% for hook in hooks.ciao %}
            {{ hook | raw }}
        {% endfor  %}
    </div>

{% endblock %}
", "pages/default.twig", "/var/www/html/frontend/standard/template/pages/default.twig");
    }
}
