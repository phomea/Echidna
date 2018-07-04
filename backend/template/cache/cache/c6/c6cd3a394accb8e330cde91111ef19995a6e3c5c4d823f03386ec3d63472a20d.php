<?php

/* ecommerce/templates/prodotto.gestione.twig */
class __TwigTemplate_68f3fa64b7e8402560fb8071edad491e39365736eff6461d1651b041b6260431 extends Twig_Template
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
        return $this->loadTemplate(($context["template_extend"] ?? null), "ecommerce/templates/prodotto.gestione.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"card\">
        <div class=\"card-body\">
            asdas
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/prodotto.gestione.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  31 => 3,  22 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends template_extend %}

{% block content %}

    <div class=\"card\">
        <div class=\"card-body\">
            asdas
        </div>
    </div>

{% endblock %}", "ecommerce/templates/prodotto.gestione.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/prodotto.gestione.twig");
    }
}
