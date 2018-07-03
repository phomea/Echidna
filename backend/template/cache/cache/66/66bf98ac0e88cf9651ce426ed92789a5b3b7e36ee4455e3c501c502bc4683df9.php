<?php

/* ecommerce/templates/catalogo.twig */
class __TwigTemplate_8af94f06a03066b20a6977bc0506a65213aad5a26d7f6686132c6186126956e2 extends Twig_Template
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
        return $this->loadTemplate(($context["template_extend"] ?? null), "ecommerce/templates/catalogo.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "


    <div class=\"row\">
        <div class=\"col-md-6\">
            <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, ($context["entita"] ?? null), "categoria", array()) . ".list")), "method"), "build", array(), "method"), "html", null, true);
        echo "\" class=\"btn btn-primary\">Gestisci Categorie</a>
        </div>

        <div class=\"col-md-6\">
            <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, ($context["entita"] ?? null), "prodotto", array()) . ".list")), "method"), "build", array(), "method"), "html", null, true);
        echo "\" class=\"btn btn-primary\">Gestisci Categorie</a>
        </div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/catalogo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 12,  41 => 8,  34 => 3,  31 => 2,  22 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends template_extend %}
{% block content %}



    <div class=\"row\">
        <div class=\"col-md-6\">
            <a href=\"{{ router_service.getRoute(entita.categoria ~ \".list\").build() }}\" class=\"btn btn-primary\">Gestisci Categorie</a>
        </div>

        <div class=\"col-md-6\">
            <a href=\"{{ router_service.getRoute(entita.prodotto ~ \".list\").build() }}\" class=\"btn btn-primary\">Gestisci Categorie</a>
        </div>

    </div>
{% endblock %}", "ecommerce/templates/catalogo.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/catalogo.twig");
    }
}
