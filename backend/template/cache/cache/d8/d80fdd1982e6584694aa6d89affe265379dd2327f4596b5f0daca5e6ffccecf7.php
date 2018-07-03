<?php

/* ecommerce/templates/prodotto.edit.twig */
class __TwigTemplate_1ef757083c9a51bc2569331a97512ae707b55fc1a002bda8ad4143dcb63d6bac extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("mod.twig", "ecommerce/templates/prodotto.edit.twig", 1);
        $this->blocks = array(
            'additionalFields' => array($this, 'block_additionalFields'),
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

    // line 4
    public function block_additionalFields($context, array $blocks = array())
    {
        // line 5
        echo "

";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/prodotto.edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 5,  32 => 4,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"mod.twig\" %}


{% block additionalFields %}


{% endblock %}
", "ecommerce/templates/prodotto.edit.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/prodotto.edit.twig");
    }
}
