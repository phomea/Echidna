<?php

/* ecommerce/templates/prodotto.list.twig */
class __TwigTemplate_7703ba7eaa70f6ef73f3f1e9a51cb6504385185fc9eb10a635eeb4dfa3284fcd extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("list.twig", "ecommerce/templates/prodotto.list.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "list.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <h2>Gestione prodotti</h2>
    <br>
    <div class=\"card\">
        <div class=\"card-body\">
            <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.catalogo.prodotto.gestione"), "method"), "build", array(), "method"), "html", null, true);
        echo "\" class=\"btn btn-primary\">Impostazioni prodotto</a>
        </div>
    </div>
    ";
        // line 12
        $this->displayParentBlock("content", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/prodotto.list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 12,  41 => 9,  35 => 5,  32 => 4,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"list.twig\" %}


{% block content %}
    <h2>Gestione prodotti</h2>
    <br>
    <div class=\"card\">
        <div class=\"card-body\">
            <a href=\"{{ router_service.getRoute(\"ecommerce.catalogo.prodotto.gestione\").build() }}\" class=\"btn btn-primary\">Impostazioni prodotto</a>
        </div>
    </div>
    {{ parent()}}
{% endblock %}", "ecommerce/templates/prodotto.list.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/prodotto.list.twig");
    }
}
