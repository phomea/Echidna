<?php

/* base/template.twig */
class __TwigTemplate_9861ea831c297722285c782338da0c3dea11955850fde64ed03bd74910163f4e extends Twig_Template
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
        // line 3
        $this->displayBlock('content', $context, $blocks);
        // line 4
        echo "
";
        // line 5
        $this->loadTemplate("base/footer/footer.twig", "base/template.twig", 5)->display($context);
    }

    // line 3
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
        return array (  38 => 3,  34 => 5,  31 => 4,  29 => 3,  26 => 2,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% include \"base/head/head.twig\" %}

{% block content %}{% endblock content %}

{% include \"base/footer/footer.twig\" %}", "base/template.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/base/template.twig");
    }
}
