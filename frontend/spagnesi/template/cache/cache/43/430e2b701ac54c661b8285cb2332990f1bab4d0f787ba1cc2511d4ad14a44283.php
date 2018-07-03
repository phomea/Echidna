<?php

/* contenuti/griglia-slug-prodotti.twig */
class __TwigTemplate_4d9593ec502f6087ea6660875798cab13fe83f5ddc52509d654e5d81c8de889d extends Twig_Template
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
        echo "<div class=\"container\">
    <div class=\"row\">
        ";
        // line 3
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
            // line 4
            echo "
            <div class=\"col-md-";
            // line 5
            echo twig_escape_filter($this->env, ($context["classe"] ?? null), "html", null, true);
            echo "\">

                ";
            // line 7
            $this->loadTemplate("parti/shop/product-thumb.twig", "contenuti/griglia-slug-prodotti.twig", 7)->display(array_merge($context, array("prodotto" => $context["prodotto"])));
            // line 8
            echo "
            </div>
                    ";
            // line 10
            if ((((twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) % ($context["n"] ?? null)) == 0) && (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) > 0))) {
                // line 11
                echo "                        </div>
                        <br>
                        <div class=\"row\">

                    ";
            }
            // line 16
            echo "                ";
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
        // line 17
        echo "
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "contenuti/griglia-slug-prodotti.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 17,  67 => 16,  60 => 11,  58 => 10,  54 => 8,  52 => 7,  47 => 5,  44 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container\">
    <div class=\"row\">
        {% for prodotto in prodotti  %}

            <div class=\"col-md-{{ classe }}\">

                {% include 'parti/shop/product-thumb.twig' with  {'prodotto' : prodotto} %}

            </div>
                    {% if loop.index % n == 0 and loop.index > 0  %}
                        </div>
                        <br>
                        <div class=\"row\">

                    {% endif %}
                {% endfor %}

    </div>
</div>", "contenuti/griglia-slug-prodotti.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/contenuti/griglia-slug-prodotti.twig");
    }
}
