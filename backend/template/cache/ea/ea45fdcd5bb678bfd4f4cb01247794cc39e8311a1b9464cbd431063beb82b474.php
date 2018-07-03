<?php

/* empty.twig */
class __TwigTemplate_7a5042f33521bc5711bfd2c8cb5c6f38ce8473659d04e3142a07f91d36cce0d1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "empty.twig";
    }

    public function getDebugInfo()
    {
        return array (  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block content %}
{% endblock %}", "empty.twig", "/Users/phomea/Siti/Echidna2/backend/template/empty.twig");
    }
}
