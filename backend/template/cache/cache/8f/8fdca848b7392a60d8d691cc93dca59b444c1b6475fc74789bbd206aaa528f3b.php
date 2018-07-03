<?php

/* ecommerce/templates/ordini.twig */
class __TwigTemplate_c803be21430c84c1b56e576af9f1b119ffb4a969d721f8e786c6751c7bf64b36 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(($context["template_extend"] ?? null), "ecommerce/templates/ordini.twig", 1);
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


";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/ordini.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 3,  31 => 2,  22 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends template_extend %}
{% block content %}



{% endblock %}", "ecommerce/templates/ordini.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/ordini.twig");
    }
}
