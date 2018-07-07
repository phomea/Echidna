<?php

/* ecommerce/scheda-prodotto.twig */
class __TwigTemplate_a61029e4f2fa706a9bbd1b7e9f9544c4c30c9ec1c6471390a51270571a99fa47 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base/template.twig", "ecommerce/scheda-prodotto.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
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
        echo "    <main style=\"padding-top: 130px;\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-6\">

                </div>
                <div class=\"col-6\">
                    <h2>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "nome", array()), "html", null, true);
        echo "</h2>
                    <p>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "descrizione", array()), "html", null, true);
        echo "</p>

                    ";
        // line 14
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array())) > 1)) {
            // line 15
            echo "
                        <form class=\"variante\" method=\"post\" action=\"/carrello/aggiungi\">
                            ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["variante"]) {
                // line 18
                echo "

                                <input type=\"radio\" name=\"id_variante\" value=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variante"], "id", array()), "html", null, true);
                echo "\"
                                ";
                // line 21
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variante"], "attributi", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                    // line 22
                    echo "                                    data-attribute";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "valore", array()), "id", array()), "html", null, true);
                    echo "\"



                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 26
                echo ">
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variante'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "



                                    <span class=\"prezzo\">";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "prezzo", array()), "html", null, true);
            echo "</span>

                            <input type=\"text\" name=\"quantita\">
                                    <input type=\"submit\" value=\"aggiungi\">




                        </form>



                        <form class=\"scelta-attributi\">
                            ";
            // line 61
            echo "

                            ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["attributi"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                // line 64
                echo "                                <label>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "nome", array()), "html", null, true);
                echo "</label>
                                <select name=\"";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                echo "\" class=\"form-control\">

                                    <option value=\"\">...scegli</option>

                                    ";
                // line 69
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["attributo"], "valori", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["valore"]) {
                    // line 70
                    echo "
                                        <option value=\"";
                    // line 71
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "id", array()), "html", null, true);
                    echo "\"
                                                ";
                    // line 72
                    if (twig_get_attribute($this->env, $this->source, $context["valore"], "parents", array())) {
                        // line 73
                        echo "                                                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["valore"], "parents", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                            // line 74
                            echo "                                                        data-attribute";
                            echo twig_escape_filter($this->env, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = $context["p"]) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null), "html", null, true);
                            echo "=\"";
                            echo twig_escape_filter($this->env, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = $context["p"]) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[1] ?? null) : null), "html", null, true);
                            echo "\"
                                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 76
                        echo "                                                ";
                    }
                    // line 77
                    echo "

                                                ";
                    // line 79
                    if (twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedentevalore", array())) {
                        // line 80
                        echo "                                            data-idprec=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedenteid", array()), "html", null, true);
                        echo "\" data-valueprec=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedentevalore", array()), "html", null, true);
                        echo "\"
                                                ";
                    }
                    // line 81
                    echo ">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "valore", array()), "html", null, true);
                    echo "</option>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valore'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 83
                echo "
                                </select>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            echo "                        </form>


                    ";
        } else {
            // line 90
            echo "                        ";
            $context["variante"] = (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array())) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[0] ?? null) : null);
            // line 91
            echo "                        <form class=\"variante\">
                            <div class=\"prezzo\">
                                ";
            // line 93
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "prezzo", array()), "html", null, true);
            echo "
                            </div>
                        </form>
                    ";
        }
        // line 97
        echo "
                </div>
            </div>
        </div>
    </main>
";
    }

    // line 105
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 106
        echo "
    ";
        // line 107
        $this->displayParentBlock("javascript_footer", $context, $blocks);
        echo "
    <script>
    (function( \$ ){


        \$('.scelta-attributi [data-idprec]').hide();

        \$(document).on(\"change\",\"form.scelta-attributi\",function () {

            console.log( \$(this).serializeArray());

            selettore = [];
            selettoreVariante = [];

            selettoreAttributi = [];
            selettoreNot =[];
            variante = null;
            \$('.scelta-attributi [data-idprec]').hide();


            \$(this).serializeArray().forEach(function( o , index){

                var s = '[data-attribute' + o.name +'=\"'+ o.value +'\"]';

                selettoreVariante.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );

                if(o.value !=\"\") {
                    selettoreAttributi.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );
                    selettoreNot.push('[data-attribute' + o.name+'][data-attribute' + o.name +'!=\"'+ o.value +'\"]' );
                    selettore.push('[data-idprec=\"' + o.name + '\"][data-valueprec=\"' + o.value + '\"]');
                }
                \$(selettoreAttributi.join(\"\")).show();
                \$(selettoreNot.join(\"\")).hide();
                \$( '[data-attribute' + o.name+'][data-attribute' + o.name +'!=\"'+ o.value +'\"]' ).hide();

                /*
                selettoreVariante.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );
                if(o.value !=\"\") {
                    selettoreAttributi.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );
                    selettore.push('[data-idprec=\"' + o.name + '\"][data-valueprec=\"' + o.value + '\"]');
                }*/

            });


            \$(selettoreAttributi.join(\"\")).show();


            \$(selettoreVariante.join(\"\")).prop(\"checked\",true);






        })
    })(jQuery);
    </script>
";
    }

    public function getTemplateName()
    {
        return "ecommerce/scheda-prodotto.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 107,  234 => 106,  231 => 105,  222 => 97,  215 => 93,  211 => 91,  208 => 90,  202 => 86,  194 => 83,  185 => 81,  177 => 80,  175 => 79,  171 => 77,  168 => 76,  157 => 74,  152 => 73,  150 => 72,  146 => 71,  143 => 70,  139 => 69,  132 => 65,  127 => 64,  123 => 63,  119 => 61,  103 => 32,  97 => 28,  90 => 26,  76 => 22,  72 => 21,  68 => 20,  64 => 18,  60 => 17,  56 => 15,  54 => 14,  49 => 12,  45 => 11,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base/template.twig\" %}

{% block content %}
    <main style=\"padding-top: 130px;\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-6\">

                </div>
                <div class=\"col-6\">
                    <h2>{{ prodotto.nome }}</h2>
                    <p>{{ prodotto.descrizione }}</p>

                    {% if prodotto.varianti|length > 1 %}

                        <form class=\"variante\" method=\"post\" action=\"/carrello/aggiungi\">
                            {% for variante in prodotto.varianti %}


                                <input type=\"radio\" name=\"id_variante\" value=\"{{ variante.id }}\"
                                {% for attributo in variante.attributi %}
                                    data-attribute{{ attributo.attributo.id }}=\"{{ attributo.valore.id }}\"



                            {% endfor %}>
                            {% endfor  %}




                                    <span class=\"prezzo\">{{ variante.prezzo }}</span>

                            <input type=\"text\" name=\"quantita\">
                                    <input type=\"submit\" value=\"aggiungi\">




                        </form>



                        <form class=\"scelta-attributi\">
                            {#{% for attributo in attributi %}
                                <label>{{ attributo.attributo.nome }}</label>
                                <select name=\"{{ attributo.attributo.id }}\" class=\"form-control\">

                                    <option value=\"\">...scegli</option>

                                    {% for valore in attributo.valori %}

                                        <option value=\"{{ valore.valore.id }}\" {% if valore.attributoprecedentevalore %}
                                            data-idprec=\"{{ valore.attributoprecedenteid }}\" data-valueprec=\"{{ valore.attributoprecedentevalore }}\"
                                        {% endif %}>{{ valore.valore.valore }}</option>
                                    {% endfor %}

                                </select>
                            {% endfor %}
                            #}


                            {% for attributo in attributi %}
                                <label>{{ attributo.attributo.nome }}</label>
                                <select name=\"{{ attributo.attributo.id }}\" class=\"form-control\">

                                    <option value=\"\">...scegli</option>

                                    {% for valore in attributo.valori %}

                                        <option value=\"{{ valore.valore.id }}\"
                                                {% if valore.parents %}
                                                    {% for p in valore.parents %}
                                                        data-attribute{{ p[0] }}=\"{{ p[1] }}\"
                                                    {% endfor  %}
                                                {% endif %}


                                                {% if valore.attributoprecedentevalore %}
                                            data-idprec=\"{{ valore.attributoprecedenteid }}\" data-valueprec=\"{{ valore.attributoprecedentevalore }}\"
                                                {% endif %}>{{ valore.valore.valore }}</option>
                                    {% endfor %}

                                </select>
                            {% endfor %}
                        </form>


                    {% else %}
                        {% set variante = prodotto.varianti[0] %}
                        <form class=\"variante\">
                            <div class=\"prezzo\">
                                {{ variante.prezzo }}
                            </div>
                        </form>
                    {% endif %}

                </div>
            </div>
        </div>
    </main>
{% endblock %}


{% block javascript_footer %}

    {{ parent() }}
    <script>
    (function( \$ ){


        \$('.scelta-attributi [data-idprec]').hide();

        \$(document).on(\"change\",\"form.scelta-attributi\",function () {

            console.log( \$(this).serializeArray());

            selettore = [];
            selettoreVariante = [];

            selettoreAttributi = [];
            selettoreNot =[];
            variante = null;
            \$('.scelta-attributi [data-idprec]').hide();


            \$(this).serializeArray().forEach(function( o , index){

                var s = '[data-attribute' + o.name +'=\"'+ o.value +'\"]';

                selettoreVariante.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );

                if(o.value !=\"\") {
                    selettoreAttributi.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );
                    selettoreNot.push('[data-attribute' + o.name+'][data-attribute' + o.name +'!=\"'+ o.value +'\"]' );
                    selettore.push('[data-idprec=\"' + o.name + '\"][data-valueprec=\"' + o.value + '\"]');
                }
                \$(selettoreAttributi.join(\"\")).show();
                \$(selettoreNot.join(\"\")).hide();
                \$( '[data-attribute' + o.name+'][data-attribute' + o.name +'!=\"'+ o.value +'\"]' ).hide();

                /*
                selettoreVariante.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );
                if(o.value !=\"\") {
                    selettoreAttributi.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );
                    selettore.push('[data-idprec=\"' + o.name + '\"][data-valueprec=\"' + o.value + '\"]');
                }*/

            });


            \$(selettoreAttributi.join(\"\")).show();


            \$(selettoreVariante.join(\"\")).prop(\"checked\",true);






        })
    })(jQuery);
    </script>
{% endblock %}", "ecommerce/scheda-prodotto.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/ecommerce/scheda-prodotto.twig");
    }
}
