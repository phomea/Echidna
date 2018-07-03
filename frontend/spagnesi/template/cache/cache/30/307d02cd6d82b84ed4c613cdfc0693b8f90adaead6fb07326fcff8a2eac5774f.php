<?php

/* contenuti/carousel-descrizione-prodotti.twig */
class __TwigTemplate_fdaa0f95b58f3ba01c6a55dc5d56b126e5c93d596ae103b92dcd002d6fc86a20 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<section class=\"container content slider-products ";
        echo twig_escape_filter($this->env, ((($context["class"] ?? null)) ? (($context["class"] ?? null)) : ("")), "html", null, true);
        echo " \">
    <div class=\"row\">
        <div class=\"col-md-6 ";
        // line 3
        echo ((twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "right", array())) ? ("pull-right") : (""));
        echo " \">
        <div class=\"subtitle\">
            <br>
            <div>
                <span>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "titolo", array()), "html", null, true);
        echo "</span>
            </div>
        </div>
        <p>";
        // line 10
        echo twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "descrizione", array());
        echo "</p>
        <br><br>

            ";
        // line 13
        if (twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "link", array())) {
            // line 14
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "link", array()), "html", null, true);
            echo "\" class=\"btn-default\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "testolink", array()), "html", null, true);
            echo "</a>
            ";
        }
        // line 16
        echo "    </div>

    <div class=\"col-md-6\">
        <div class=\"general-carousel owl-carousel owl-theme nav-in\" data-n=\"2\">
            ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["prodotti"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["prodotto"]) {
            // line 21
            echo "                ";
            $this->loadTemplate("parti/shop/product-thumb.twig", "contenuti/carousel-descrizione-prodotti.twig", 21)->display(array_merge($context, $context["prodotto"]));
            // line 22
            echo "            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prodotto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "        </div>
    </div>
    </div>
    <div class=\"pull-left carousel_outer\">
        <!-- product view ajax container -->
        <div class=\"product-view-ajax-container\">
        </div>
        <!-- //end product view ajax container -->
    </div>
    <!-- //end Products list -->
    <div class=\"clearfix\">
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "contenuti/carousel-descrizione-prodotti.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 23,  84 => 22,  81 => 21,  64 => 20,  58 => 16,  50 => 14,  48 => 13,  42 => 10,  36 => 7,  29 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"container content slider-products {{ class ? class }} \">
    <div class=\"row\">
        <div class=\"col-md-6 {{ contenuto.right ? 'pull-right' }} \">
        <div class=\"subtitle\">
            <br>
            <div>
                <span>{{ contenuto.titolo }}</span>
            </div>
        </div>
        <p>{{ contenuto.descrizione | raw }}</p>
        <br><br>

            {% if contenuto.link %}
                <a href=\"{{ contenuto.link }}\" class=\"btn-default\">{{ contenuto.testolink }}</a>
            {% endif %}
    </div>

    <div class=\"col-md-6\">
        <div class=\"general-carousel owl-carousel owl-theme nav-in\" data-n=\"2\">
            {%  for prodotto in prodotti %}
                {% include 'parti/shop/product-thumb.twig' with prodotto %}
            {% endfor %}
        </div>
    </div>
    </div>
    <div class=\"pull-left carousel_outer\">
        <!-- product view ajax container -->
        <div class=\"product-view-ajax-container\">
        </div>
        <!-- //end product view ajax container -->
    </div>
    <!-- //end Products list -->
    <div class=\"clearfix\">
    </div>
</section>", "contenuti/carousel-descrizione-prodotti.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/contenuti/carousel-descrizione-prodotti.twig");
    }
}
