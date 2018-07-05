<?php

/* ecommerce/templates/tipologiaprodotto.attributi.twig */
class __TwigTemplate_e81b2c93f87de7f5f138799169c59d9306c0d63a541954793a5ee6ce66e86d37 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<div class=\"card\">
    <div class=\"card-body\">


        <form class=\"form-ajax\" action=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.tipologiaprodotto.attributi.save"), "method"), "build", array(), "method"), "html", null, true);
        echo "\" method=\"post\">
            <input type=\"hidden\" name=\"id\"  value=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array()), "html", null, true);
        echo "\">

        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attributiDisponibili"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
            // line 10
            echo "            <div class=\"form-group\">
                <label class=\"border-info\">
                    <input type=\"hidden\" name=\"attributi[";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attributo"], "id", array()), "html", null, true);
            echo "]\" value=\"off\">
                    <input type=\"checkbox\" name=\"attributi[";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attributo"], "id", array()), "html", null, true);
            echo "]\" value=\"on\" ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["attributiAssegnati"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["as"]) {
                // line 14
                echo "
                        ";
                // line 15
                echo (((twig_get_attribute($this->env, $this->source, $context["as"], "id_attributo", array()) == twig_get_attribute($this->env, $this->source, $context["attributo"], "id", array()))) ? ("checked") : (""));
                echo "
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['as'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attributo"], "nome", array()), "html", null, true);
            echo "
                    <p class=\"small\">
                        Possibili valori : ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["attributo"], "possibili_valori", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["valore"]) {
                // line 19
                echo "                            \"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "html", null, true);
                echo "\"
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valore'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "                    </p>
                </label>

            </div>


        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "
            <input type=\"submit\" class=\"btn btn-success\" value=\"Salva\">
        </form>
    </div>
</div>



";
        // line 36
        $this->displayBlock('scripts', $context, $blocks);
    }

    public function block_scripts($context, array $blocks = array())
    {
        // line 37
        echo "    <script>
        (function(){
            var categorieDisponibili;
            var urlAddCategory = \"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.catalogo.prodotto.category.add"), "method"), "build", array(0 => array("id" => ($context["idProdotto"] ?? null))), "method"), "html", null, true);
        echo "\";
            var urlRemoveCategory = \"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.catalogo.prodotto.category.remove"), "method"), "build", array(0 => array("id" => ($context["idProdotto"] ?? null))), "method"), "html", null, true);
        echo "\";
            var urlGetCategoris = \"";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.catalogo.prodotto.category"), "method"), "build", array(0 => array("id" => ($context["idProdotto"] ?? null))), "method"), "html", null, true);
        echo "\";


            function updateSelects( ) {
                \$.get(urlGetCategoris).done(function(d){
                    \$(\".categoria-disponibile\").show();
                    d.forEach(function( o ){
                        \$('.categoria-disponibile[value=\"'+o.categoria.id+'\"]').hide();
                    });

                    \$(\"#categorieAssociate\").empty();

                    d.forEach(function( o ){
                        nc = \$('<option value=\"' + o.categoria.id + '\" name=\"categorieAssociate[]\">' + o.categoria.nome + '</option>')

                        \$(\"#categorieAssociate\").append( nc );
                    });
                });
            }

            updateSelects();

            \$(\"#moveLeft\").on(\"click\",function(){
                daAggiungere = \$(\"#categorieDisponibili\").val();
                console.log(daAggiungere);
                \$.post(urlAddCategory,{
                    ids : daAggiungere
                }).done(updateSelects);
            });

            \$(\"#moveRight\").on(\"click\",function(){
                daRimuovere = \$(\"#categorieAssociate\").val();

                \$.post(urlRemoveCategory,{
                    ids : daRimuovere
                }).done(updateSelects);
            });


            \$(document).ready(function(){
                \$()
            })
        })(jQuery)
    </script>
";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/tipologiaprodotto.attributi.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 42,  125 => 41,  121 => 40,  116 => 37,  110 => 36,  100 => 28,  88 => 21,  79 => 19,  75 => 18,  69 => 16,  61 => 15,  58 => 14,  52 => 13,  48 => 12,  44 => 10,  40 => 9,  35 => 7,  31 => 6,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<div class=\"card\">
    <div class=\"card-body\">


        <form class=\"form-ajax\" action=\"{{ router_service.getRoute(\"ecommerce.tipologiaprodotto.attributi.save\").build() }}\" method=\"post\">
            <input type=\"hidden\" name=\"id\"  value=\"{{ data.id }}\">

        {% for attributo in attributiDisponibili %}
            <div class=\"form-group\">
                <label class=\"border-info\">
                    <input type=\"hidden\" name=\"attributi[{{ attributo.id }}]\" value=\"off\">
                    <input type=\"checkbox\" name=\"attributi[{{ attributo.id }}]\" value=\"on\" {% for as in attributiAssegnati %}

                        {{ as.id_attributo == attributo.id ? \"checked\" : \"\"}}
                    {% endfor %}> {{ attributo.nome }}
                    <p class=\"small\">
                        Possibili valori : {% for valore in  attributo.possibili_valori %}
                            \"{{ valore.valore }}\"
                        {% endfor %}
                    </p>
                </label>

            </div>


        {%  endfor %}

            <input type=\"submit\" class=\"btn btn-success\" value=\"Salva\">
        </form>
    </div>
</div>



{% block scripts %}
    <script>
        (function(){
            var categorieDisponibili;
            var urlAddCategory = \"{{ router_service.getRoute(\"ecommerce.catalogo.prodotto.category.add\").build({id : idProdotto}) }}\";
            var urlRemoveCategory = \"{{ router_service.getRoute(\"ecommerce.catalogo.prodotto.category.remove\").build({id : idProdotto}) }}\";
            var urlGetCategoris = \"{{ router_service.getRoute(\"ecommerce.catalogo.prodotto.category\").build({id : idProdotto}) }}\";


            function updateSelects( ) {
                \$.get(urlGetCategoris).done(function(d){
                    \$(\".categoria-disponibile\").show();
                    d.forEach(function( o ){
                        \$('.categoria-disponibile[value=\"'+o.categoria.id+'\"]').hide();
                    });

                    \$(\"#categorieAssociate\").empty();

                    d.forEach(function( o ){
                        nc = \$('<option value=\"' + o.categoria.id + '\" name=\"categorieAssociate[]\">' + o.categoria.nome + '</option>')

                        \$(\"#categorieAssociate\").append( nc );
                    });
                });
            }

            updateSelects();

            \$(\"#moveLeft\").on(\"click\",function(){
                daAggiungere = \$(\"#categorieDisponibili\").val();
                console.log(daAggiungere);
                \$.post(urlAddCategory,{
                    ids : daAggiungere
                }).done(updateSelects);
            });

            \$(\"#moveRight\").on(\"click\",function(){
                daRimuovere = \$(\"#categorieAssociate\").val();

                \$.post(urlRemoveCategory,{
                    ids : daRimuovere
                }).done(updateSelects);
            });


            \$(document).ready(function(){
                \$()
            })
        })(jQuery)
    </script>
{% endblock %}", "ecommerce/templates/tipologiaprodotto.attributi.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/tipologiaprodotto.attributi.twig");
    }
}
