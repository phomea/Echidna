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

        <div class=\"row\">
            <div class=\"col-md-4\">
                <div class=\"form-group\">
                    <label>Categorie associate</label>
                    <select size=\"10\" class=\"form-control\" multiple id=\"categorieAssociate\">
                        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categorieAssociate"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 11
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "categoria", array()), "id", array()), "html", null, true);
            echo "\" name=\"categorieAssociate[]\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "categoria", array()), "nome", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "                    </select>
                </div>
            </div>

            <div class=\"col-md-4\" style=\"align-items: center;
    justify-items: center;
    justify-content: center;
    align-content: center;
    display: flex;
    flex-direction: column;\">
                <div>
                    <button type=\"button\" id=\"moveRight\"> > </button>
                </div>
                <div>
                    <button type=\"button\" id=\"moveLeft\"> < </button>
                </div>
            </div>

            <div class=\"col-md-4\">
                <div class=\"form-group\">
                    <label>Categorie disponibili</label>
                    <select size=\"10\" class=\"form-control\" id=\"categorieDisponibili\" multiple>
                        ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categorieDisponibili"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 36
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "id", array()), "html", null, true);
            echo "\" class=\"categoria-disponibile\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "nome", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                    </select>
                </div>
            </div>


        </div>
    </div>
</div>



";
        // line 49
        $this->displayBlock('scripts', $context, $blocks);
    }

    public function block_scripts($context, array $blocks = array())
    {
        // line 50
        echo "    <script>
        (function(){
            var categorieDisponibili;
            var urlAddCategory = \"";
        // line 53
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.catalogo.prodotto.category.add"), "method"), "build", array(0 => array("id" => ($context["idProdotto"] ?? null))), "method"), "html", null, true);
        echo "\";
            var urlRemoveCategory = \"";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.catalogo.prodotto.category.remove"), "method"), "build", array(0 => array("id" => ($context["idProdotto"] ?? null))), "method"), "html", null, true);
        echo "\";
            var urlGetCategoris = \"";
        // line 55
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
        return array (  121 => 55,  117 => 54,  113 => 53,  108 => 50,  102 => 49,  89 => 38,  78 => 36,  74 => 35,  50 => 13,  39 => 11,  35 => 10,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<div class=\"card\">
    <div class=\"card-body\">

        <div class=\"row\">
            <div class=\"col-md-4\">
                <div class=\"form-group\">
                    <label>Categorie associate</label>
                    <select size=\"10\" class=\"form-control\" multiple id=\"categorieAssociate\">
                        {% for cat in categorieAssociate %}
                            <option value=\"{{ cat.categoria.id }}\" name=\"categorieAssociate[]\">{{ cat.categoria.nome }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>

            <div class=\"col-md-4\" style=\"align-items: center;
    justify-items: center;
    justify-content: center;
    align-content: center;
    display: flex;
    flex-direction: column;\">
                <div>
                    <button type=\"button\" id=\"moveRight\"> > </button>
                </div>
                <div>
                    <button type=\"button\" id=\"moveLeft\"> < </button>
                </div>
            </div>

            <div class=\"col-md-4\">
                <div class=\"form-group\">
                    <label>Categorie disponibili</label>
                    <select size=\"10\" class=\"form-control\" id=\"categorieDisponibili\" multiple>
                        {% for cat in categorieDisponibili %}
                            <option value=\"{{ cat.id }}\" class=\"categoria-disponibile\">{{ cat.nome }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>


        </div>
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
