<?php

/* ecommerce/templates/tipologiaprodotto.twig */
class __TwigTemplate_58ca27a165c90c0a57975906d910bff89a0f7e0fe038fbbe536abf502cb2adc7 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("mod.twig", "ecommerce/templates/tipologiaprodotto.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "mod.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    ";
        // line 5
        $this->displayParentBlock("content", $context, $blocks);
        echo "

";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/tipologiaprodotto.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 5,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"mod.twig\" %}

{% block content %}

    {{ parent() }}

{% endblock %}
", "ecommerce/templates/tipologiaprodotto.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/tipologiaprodotto.twig");
    }
}
