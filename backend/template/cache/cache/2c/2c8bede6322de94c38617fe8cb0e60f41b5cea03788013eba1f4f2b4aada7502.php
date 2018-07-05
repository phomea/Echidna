<?php

/* ecommerce/templates/tipologiaprodotto.campi.twig */
class __TwigTemplate_55740079667e794421f34e340fda245b28a381b443e30426e28534ff4679ef7e extends Twig_Template
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
        echo "<div class=\"card\">
    <div class=\"card-body\">


        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["campi"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["campo"]) {
            // line 6
            echo "        <form class=\"form-ajax\" action=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "ecommerce.tipologiaprodotto.campi.update"), "method"), "build", array(), "method"), "html", null, true);
            echo "\" method=\"post\">

            <input type=\"hidden\" name=\"id\" value=\"";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["campo"], "id", array()), "html", null, true);
            echo "\">
            <div class=\"row\">
                <div class=\"col\">
                    <div class=\"form-group\">
                        <label>Nome campo</label>
                        <input class=\"form-control\" name=\"nome\" value=\"";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["campo"], "nome", array()), "html", null, true);
            echo "\">
                    </div>

                </div>

                <div class=\"col\">
                    <div class=\"form-group\">
                        <label>Slug</label>
                        <input class=\"form-control\" name=\"slug\" value=\"";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["campo"], "slug", array()), "html", null, true);
            echo "\">
                    </div>

                </div>

                <div class=\"col\">
                    <div class=\"form-group\">
                        <label>Dato richiesto</label>
                        <select class=\"form-control\" name=\"valore\">
                            <option ";
            // line 30
            echo (((twig_get_attribute($this->env, $this->source, $context["campo"], "valore", array()) == "Numero")) ? ("selected") : (""));
            echo ">Numero</option>
                            <option ";
            // line 31
            echo (((twig_get_attribute($this->env, $this->source, $context["campo"], "valore", array()) == "Testo")) ? ("selected") : (""));
            echo ">Testo</option>
                        </select>
                    </div>
                </div>

                <div class=\"col\">
                    <div class=\"form-group pt-4 mt-2\">
                        <input type=\"submit\" value=\"Salva\" class=\"btn btn-success\">
                        <button type=\"button\" class=\"btn btn-danger\">Elimina</button>
                    </div>
                </div>

            </div>

        </form>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['campo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "
    </div>
</div>



<div class=\"card\">
    <div class=\"card-body\">
        <a href=\"\" class=\"btn btn-primary aggiungi-campo\">Aggiungi campo</a>
    </div>
</div>


<div class=\"modal\" tabindex=\"-1\" role=\"dialog\" id=\"modalInsertContent\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">

                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>

            <div class=\"modal-body\">
                <form class=\"form-ajax form-aggiungi\" action=\"";
        // line 72
        echo twig_escape_filter($this->env, ($context["urlinsert"] ?? null), "html", null, true);
        echo "\" method=\"post\" data-postevent=\"ecommerce.valore.aggiunto\">

                    <input type=\"hidden\" name=\"id_ecommerce_tipologia_prodotto\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", array()), "html", null, true);
        echo "\">
                    <div class=\"form-group\">
                        <label>Nome campo</label>
                        <input class=\"form-control\" name=\"nome\">
                    </div>


                    <div class=\"form-group\">
                        <label>Slug</label>
                        <input class=\"form-control\" name=\"slug\">
                    </div>


                    <div class=\"form-group\">
                        <label>Dato richiesto</label>
                        <select class=\"form-control\" name=\"valore\">
                            <option>Numero</option>
                            <option>Testo</option>
                        </select>
                    </div>

                    <div class=\"form-group\">
                        <input type=\"submit\" class=\"btn btn-success\" value=\"Salva\">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>





";
        // line 110
        $this->displayBlock('scripts', $context, $blocks);
    }

    public function block_scripts($context, array $blocks = array())
    {
        // line 111
        echo "    <script>
        (function(){
            \$(\".aggiungi-campo\").on(\"click\",function( e ){
                e.preventDefault();
                \$(\"#modalInsertContent\").modal();
            })
        })(jQuery)
    </script>
";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/tipologiaprodotto.campi.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 111,  168 => 110,  129 => 74,  124 => 72,  98 => 48,  75 => 31,  71 => 30,  59 => 21,  48 => 13,  40 => 8,  34 => 6,  30 => 5,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"card\">
    <div class=\"card-body\">


        {% for campo in campi %}
        <form class=\"form-ajax\" action=\"{{ router_service.getRoute(\"ecommerce.tipologiaprodotto.campi.update\").build() }}\" method=\"post\">

            <input type=\"hidden\" name=\"id\" value=\"{{ campo.id}}\">
            <div class=\"row\">
                <div class=\"col\">
                    <div class=\"form-group\">
                        <label>Nome campo</label>
                        <input class=\"form-control\" name=\"nome\" value=\"{{ campo.nome }}\">
                    </div>

                </div>

                <div class=\"col\">
                    <div class=\"form-group\">
                        <label>Slug</label>
                        <input class=\"form-control\" name=\"slug\" value=\"{{ campo.slug }}\">
                    </div>

                </div>

                <div class=\"col\">
                    <div class=\"form-group\">
                        <label>Dato richiesto</label>
                        <select class=\"form-control\" name=\"valore\">
                            <option {{ campo.valore == 'Numero' ? \"selected\" : '' }}>Numero</option>
                            <option {{ campo.valore == 'Testo' ? \"selected\" : '' }}>Testo</option>
                        </select>
                    </div>
                </div>

                <div class=\"col\">
                    <div class=\"form-group pt-4 mt-2\">
                        <input type=\"submit\" value=\"Salva\" class=\"btn btn-success\">
                        <button type=\"button\" class=\"btn btn-danger\">Elimina</button>
                    </div>
                </div>

            </div>

        </form>

        {% endfor %}

    </div>
</div>



<div class=\"card\">
    <div class=\"card-body\">
        <a href=\"\" class=\"btn btn-primary aggiungi-campo\">Aggiungi campo</a>
    </div>
</div>


<div class=\"modal\" tabindex=\"-1\" role=\"dialog\" id=\"modalInsertContent\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">

                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>

            <div class=\"modal-body\">
                <form class=\"form-ajax form-aggiungi\" action=\"{{ urlinsert }}\" method=\"post\" data-postevent=\"ecommerce.valore.aggiunto\">

                    <input type=\"hidden\" name=\"id_ecommerce_tipologia_prodotto\" value=\"{{ item.id }}\">
                    <div class=\"form-group\">
                        <label>Nome campo</label>
                        <input class=\"form-control\" name=\"nome\">
                    </div>


                    <div class=\"form-group\">
                        <label>Slug</label>
                        <input class=\"form-control\" name=\"slug\">
                    </div>


                    <div class=\"form-group\">
                        <label>Dato richiesto</label>
                        <select class=\"form-control\" name=\"valore\">
                            <option>Numero</option>
                            <option>Testo</option>
                        </select>
                    </div>

                    <div class=\"form-group\">
                        <input type=\"submit\" class=\"btn btn-success\" value=\"Salva\">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>





{% block scripts %}
    <script>
        (function(){
            \$(\".aggiungi-campo\").on(\"click\",function( e ){
                e.preventDefault();
                \$(\"#modalInsertContent\").modal();
            })
        })(jQuery)
    </script>
{% endblock %}
", "ecommerce/templates/tipologiaprodotto.campi.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/tipologiaprodotto.campi.twig");
    }
}
