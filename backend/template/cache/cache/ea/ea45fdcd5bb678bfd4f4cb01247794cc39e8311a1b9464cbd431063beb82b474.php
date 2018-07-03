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
            'beforeContent' => array($this, 'block_beforeContent'),
            'content' => array($this, 'block_content'),
            'afterContent' => array($this, 'block_afterContent'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 2
        $this->displayBlock('beforeContent', $context, $blocks);
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 7
        echo "
";
        // line 8
        $this->displayBlock('afterContent', $context, $blocks);
    }

    // line 2
    public function block_beforeContent($context, array $blocks = array())
    {
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
    }

    // line 8
    public function block_afterContent($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "empty.twig";
    }

    public function getDebugInfo()
    {
        return array (  53 => 8,  48 => 5,  43 => 2,  39 => 8,  36 => 7,  34 => 5,  31 => 4,  29 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% block beforeContent %}
{% endblock %}

{% block content %}
{% endblock %}

{% block afterContent %}
{% endblock %}", "empty.twig", "/Users/phomea/Siti/Spagnesi/backend/template/empty.twig");
    }
}
