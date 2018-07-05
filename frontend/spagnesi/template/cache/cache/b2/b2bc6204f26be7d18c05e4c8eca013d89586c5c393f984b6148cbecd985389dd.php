<?php

/* ecommerce/carrello.twig */
class __TwigTemplate_d5526b95d8d4ec8124e923aa21361882bc4efeb82795c5ceb5094b8d9fd888bc extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base/template.twig", "ecommerce/carrello.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base/template.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <main>
        <div class=\"container\">

        </div>
    </main>
";
    }

    public function getTemplateName()
    {
        return "ecommerce/carrello.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base/template.twig\" %}

{% block content %}
    <main>
        <div class=\"container\">

        </div>
    </main>
{% endblock %}", "ecommerce/carrello.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/ecommerce/carrello.twig");
    }
}
