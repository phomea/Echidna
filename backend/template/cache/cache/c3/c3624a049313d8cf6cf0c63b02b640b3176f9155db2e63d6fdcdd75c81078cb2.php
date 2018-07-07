<?php

/* ecommerce/templates/prodotto.edit.campi.twig */
class __TwigTemplate_e694275fd89c789fe97c739c066c6fa6492c52a5716b47734cfa0952f3b6fdb0 extends Twig_Template
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
        echo "<div class=\"card\">


    <div class=\"card-body\">
        <form class=\"form-ajax\" method=\"post\" action=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.catalogo.prodotto.saveproperties"), "method"), "build", array(0 => array("id" => ($context["idProdotto"] ?? null))), "method"), "html", null, true);
        echo "\">
            ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["campi"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["campo"]) {
            // line 7
            echo "
                ";
            // line 8
            $this->loadTemplate("fields/default.twig", "ecommerce/templates/prodotto.edit.campi.twig", 8)->display(array_merge($context, array("label" => twig_get_attribute($this->env, $this->source,             // line 9
$context["campo"], "nome", array()), "property" => twig_get_attribute($this->env, $this->source,             // line 10
$context["campo"], "slug", array()), "field" => array("value" => twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source,             // line 12
($context["prodotto"] ?? null), "valoriCampi", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[twig_get_attribute($this->env, $this->source, $context["campo"], "slug", array())] ?? null) : null), "valore", array())))));
            // line 16
            echo "
            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['campo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "

            <div class=\"form-group\">
                <input type=\"submit\" class=\"btn btn-success\" value=\"Salva\">
            </div>
        </form>

    </div>

</div>";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/prodotto.edit.campi.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 18,  58 => 16,  56 => 12,  55 => 10,  54 => 9,  53 => 8,  50 => 7,  33 => 6,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"card\">


    <div class=\"card-body\">
        <form class=\"form-ajax\" method=\"post\" action=\"{{ router_service.getRoute(\"ecommerce.catalogo.prodotto.saveproperties\").build({id:idProdotto}) }}\">
            {% for campo in campi %}

                {% include \"fields/default.twig\" with {
                    label : campo.nome,
                    property : campo.slug,
                    field:{
                        value : prodotto.valoriCampi[campo.slug].valore
                    }

                }%}

            {% endfor %}


            <div class=\"form-group\">
                <input type=\"submit\" class=\"btn btn-success\" value=\"Salva\">
            </div>
        </form>

    </div>

</div>", "ecommerce/templates/prodotto.edit.campi.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/prodotto.edit.campi.twig");
    }
}