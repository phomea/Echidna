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
        echo "    <main style=\"padding-top: 150px\">
        <div class=\"container\">
            ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["carrello"] ?? null), "lineitems", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["lineitem"]) {
            // line 7
            echo "            <div class=\"row\">
                <div class=\"col\">


                    <a href=\"";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "frontend.ecommerce.schedaprodotto"), "method"), "build", array(0 => array("slug" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lineitem"], "prodotto", array()), "slug", array()))), "method"), "html", null, true);
            echo "\">
                        ";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lineitem"], "prodotto", array()), "nome", array()), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lineitem"], "variant", array()), "nome", array()), "html", null, true);
            echo "
                    </a>
                </div>
                <div class=\"col\">
                    ";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lineitem"], "quantity", array()), "html", null, true);
            echo "
                </div>
                <div class=\"col\">
                    ";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lineitem"], "single_price", array()), "html", null, true);
            echo "
                </div>

                <div class=\"col\">
                    ";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lineitem"], "price_total", array()), "html", null, true);
            echo "
                </div>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lineitem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "        </div>

        <a href=\"/checkout\" class=\"btn btn-primary\">Checkout</a>
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
        return array (  85 => 27,  75 => 23,  68 => 19,  62 => 16,  53 => 12,  49 => 11,  43 => 7,  39 => 6,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base/template.twig\" %}

{% block content %}
    <main style=\"padding-top: 150px\">
        <div class=\"container\">
            {% for lineitem in carrello.lineitems %}
            <div class=\"row\">
                <div class=\"col\">


                    <a href=\"{{ router_service.getRoute(\"frontend.ecommerce.schedaprodotto\").build({slug:lineitem.prodotto.slug}) }}\">
                        {{ lineitem.prodotto.nome }} - {{ lineitem.variant.nome }}
                    </a>
                </div>
                <div class=\"col\">
                    {{ lineitem.quantity }}
                </div>
                <div class=\"col\">
                    {{ lineitem.single_price }}
                </div>

                <div class=\"col\">
                    {{ lineitem.price_total}}
                </div>
            </div>
            {% endfor %}
        </div>

        <a href=\"/checkout\" class=\"btn btn-primary\">Checkout</a>
    </main>
{% endblock %}", "ecommerce/carrello.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/ecommerce/carrello.twig");
    }
}
