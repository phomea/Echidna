<?php

/* base/template.twig */
class __TwigTemplate_0e881f79e99ae2886288f72a0d2dd277318ced85d662c3d7deae3c0ff721a3f5 extends Twig_Template
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
        $this->loadTemplate("base/head/head.twig", "base/template.twig", 1)->display($context);
        // line 2
        echo "

";
        // line 4
        $this->displayBlock('content', $context, $blocks);
        // line 5
        echo "
";
        // line 6
        $this->loadTemplate("base/footer/footer.twig", "base/template.twig", 6)->display($context);
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base/template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 4,  35 => 6,  32 => 5,  30 => 4,  26 => 2,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% include \"base/head/head.twig\" %}


{% block content %}{% endblock content %}

{% include \"base/footer/footer.twig\" %}", "base/template.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/base/template.twig");
    }
}
