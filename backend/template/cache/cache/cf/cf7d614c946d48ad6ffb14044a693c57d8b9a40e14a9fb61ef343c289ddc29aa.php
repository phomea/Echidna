<?php

/* main/widgets/views/widget_base.twig */
class __TwigTemplate_59d9f8971e238362ec94a861416588dc582c0f96fcb612cc014780c84a2eff48 extends Twig_Template
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
        echo "<div class=\"col-sm-";
        echo (((($context["dimension"] ?? null) == 3)) ? ("col-sm-12") : ((((($context["dimensione"] ?? null) == 2)) ? ("col-xl-6") : ("col-lg-3 col-md-6"))));
        echo "\">

   ";
        // line 3
        $this->displayBlock('content', $context, $blocks);
        // line 6
        echo "</div>";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
   ";
    }

    public function getTemplateName()
    {
        return "main/widgets/views/widget_base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 4,  36 => 3,  32 => 6,  30 => 3,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"col-sm-{{ dimension == 3 ? \"col-sm-12\" : ( dimensione == 2 ? \"col-xl-6\" : \"col-lg-3 col-md-6\" ) }}\">

   {% block content %}

   {% endblock %}
</div>", "main/widgets/views/widget_base.twig", "/Users/phomea/Siti/Echidna2/applications/main/widgets/views/widget_base.twig");
    }
}
