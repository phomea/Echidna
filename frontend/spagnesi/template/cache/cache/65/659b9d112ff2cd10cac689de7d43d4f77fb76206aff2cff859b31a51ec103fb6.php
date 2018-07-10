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
        echo "
    <figure class=\"product-top-bg\">
        <img src=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "images", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[1] ?? null) : null), "permalink", array()), "html", null, true);
        echo "\">
    </figure>
    <main id=\"scheda-prodotto\">
        <div class=\"container\">
            <div class=\"row mt-5\">
                <div class=\"col-8\">
                    <div class=\"owl-carousel owl-theme general-carousel\" data-nav>
                    ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "images", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["immagine"]) {
            // line 14
            echo "                        <img src=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["immagine"], "permalink", array()), "html", null, true);
            echo "\">
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['immagine'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "                    </div>
                </div>
                <div class=\"col-4\">
                    <h2 class=\"product-name\">";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "nome", array()), "html", null, true);
        echo "</h2>
                    Codice prodotto : ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["variante"]) {
            // line 21
            echo "                        <span class=\"product-sku\" style=\"display: none;\" ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variante"], "attributi", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                // line 22
                echo "                            data-attribute";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "valore", array()), "id", array()), "html", null, true);
                echo "\"
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variante"], "sku", array()), "html", null, true);
            echo "</span>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variante'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "

                    <p class=\"product-description\">";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "descrizione", array()), "html", null, true);
        echo "</p>

                    ";
        // line 29
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array())) > 1)) {
            // line 30
            echo "
                        <form id=\"form-add-variant\" class=\"variante\" method=\"post\" action=\"/carrello/aggiungi\">
                            ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["variante"]) {
                // line 33
                echo "

                                <input type=\"radio\" name=\"id_variante\" value=\"";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variante"], "id", array()), "html", null, true);
                echo "\"
                                ";
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variante"], "attributi", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                    // line 37
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
                // line 38
                echo ">
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variante'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "



                                    <span class=\"prezzo\">";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "prezzo", array()), "html", null, true);
            echo "</span>

                            <input type=\"hidden\" name=\"quantita\" value=\"1\">

                        </form>



                        <form class=\"scelta-attributi\">
                            ";
            // line 69
            echo "

                            ";
            // line 71
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["attributi"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                // line 72
                echo "
                                ";
                // line 73
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attributo"], "valori", array())) == 1)) {
                    // line 74
                    echo "                                    <input type=\"hidden\" name=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, $context["attributo"], "valori", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[0] ?? null) : null), "valore", array()), "id", array()), "html", null, true);
                    echo "\">


                                ";
                } else {
                    // line 78
                    echo "                                <label>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "nome", array()), "html", null, true);
                    echo "</label>
                                <select name=\"";
                    // line 79
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                    echo "\" class=\"form-control\">

                                    <option value=\"\">...scegli</option>

                                    ";
                    // line 83
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["attributo"], "valori", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["valore"]) {
                        // line 84
                        echo "
                                        <option value=\"";
                        // line 85
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "id", array()), "html", null, true);
                        echo "\"
                                                ";
                        // line 86
                        if (twig_get_attribute($this->env, $this->source, $context["valore"], "parents", array())) {
                            // line 87
                            echo "                                                    ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["valore"], "parents", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                                // line 88
                                echo "                                                        data-attribute";
                                echo twig_escape_filter($this->env, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = $context["p"]) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[0] ?? null) : null), "html", null, true);
                                echo "=\"";
                                echo twig_escape_filter($this->env, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = $context["p"]) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[1] ?? null) : null), "html", null, true);
                                echo "\"
                                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 90
                            echo "                                                ";
                        }
                        // line 91
                        echo "                                                ";
                        if (twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedentevalore", array())) {
                            // line 92
                            echo "                                            data-idprec=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedenteid", array()), "html", null, true);
                            echo "\" data-valueprec=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedentevalore", array()), "html", null, true);
                            echo "\"
                                                ";
                        }
                        // line 94
                        echo "

                                                ";
                        // line 96
                        if (twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "gotAttributeValue", array(0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "id", array())), "method")) {
                            // line 97
                            echo "                                                    selected
                                                ";
                        }
                        // line 99
                        echo "                                        >";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "valore", array()), "html", null, true);
                        echo "</option>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valore'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 101
                    echo "
                                </select>

                                ";
                }
                // line 105
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 107
            echo "                        </form>


                    ";
        } else {
            // line 111
            echo "                        ";
            $context["variante"] = (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array())) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[0] ?? null) : null);
            // line 112
            echo "                        <form class=\"variante\">
                            <div class=\"prezzo\">
                                ";
            // line 114
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "prezzo", array()), "html", null, true);
            echo "
                            </div>
                        </form>
                    ";
        }
        // line 118
        echo "
                    <button type=\"submit\" class=\"btn btn-secondary\" form=\"form-add-variant\"><i class=\"fa fa-cart\"></i> Aggiungi al carrello</button>
                </div>
            </div>
        </div>
    </main>
";
    }

    // line 127
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 128
        echo "
    ";
        // line 129
        $this->displayParentBlock("javascript_footer", $context, $blocks);
        echo "
    <script>
    (function( \$ ){


        \$('.scelta-attributi [data-idprec]').hide();


        var parseForm = function(){
            me = \$(\"form.scelta-attributi\");


            selettore = [];
            selettoreVariante = [];

            selettoreAttributi = [];
            selettoreNot =[];
            variante = null;
            \$('.scelta-attributi [data-idprec]').hide();


            console.log(\$(me));

            \$(me).serializeArray().forEach(function( o , index){


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


            console.log(selettoreAttributi);
            \$(selettoreAttributi.join(\"\")).show();


            \$(selettoreVariante.join(\"\")).prop(\"checked\",true);
        }
        \$(document).on(\"change\",\"form.scelta-attributi\",function () {

            parseForm();
           /* selettore = [];
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

            });


            \$(selettoreAttributi.join(\"\")).show();


            \$(selettoreVariante.join(\"\")).prop(\"checked\",true);*/
        })

        \$(window).ready(function(){
            parseForm();
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
        return array (  314 => 129,  311 => 128,  308 => 127,  298 => 118,  291 => 114,  287 => 112,  284 => 111,  278 => 107,  271 => 105,  265 => 101,  256 => 99,  252 => 97,  250 => 96,  246 => 94,  238 => 92,  235 => 91,  232 => 90,  221 => 88,  216 => 87,  214 => 86,  210 => 85,  207 => 84,  203 => 83,  196 => 79,  191 => 78,  181 => 74,  179 => 73,  176 => 72,  172 => 71,  168 => 69,  156 => 44,  150 => 40,  143 => 38,  132 => 37,  128 => 36,  124 => 35,  120 => 33,  116 => 32,  112 => 30,  110 => 29,  105 => 27,  101 => 25,  92 => 23,  81 => 22,  76 => 21,  72 => 20,  68 => 19,  63 => 16,  54 => 14,  50 => 13,  40 => 6,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base/template.twig\" %}

{% block content %}

    <figure class=\"product-top-bg\">
        <img src=\"{{ prodotto.images[1].permalink }}\">
    </figure>
    <main id=\"scheda-prodotto\">
        <div class=\"container\">
            <div class=\"row mt-5\">
                <div class=\"col-8\">
                    <div class=\"owl-carousel owl-theme general-carousel\" data-nav>
                    {% for immagine in prodotto.images %}
                        <img src=\"{{ immagine.permalink }}\">
                    {% endfor %}
                    </div>
                </div>
                <div class=\"col-4\">
                    <h2 class=\"product-name\">{{ prodotto.nome }}</h2>
                    Codice prodotto : {% for variante in prodotto.varianti %}
                        <span class=\"product-sku\" style=\"display: none;\" {% for attributo in variante.attributi %}
                            data-attribute{{ attributo.attributo.id }}=\"{{ attributo.valore.id }}\"
                                {% endfor %}>{{ variante.sku }}</span>
                    {% endfor %}


                    <p class=\"product-description\">{{ prodotto.descrizione }}</p>

                    {% if prodotto.varianti|length > 1 %}

                        <form id=\"form-add-variant\" class=\"variante\" method=\"post\" action=\"/carrello/aggiungi\">
                            {% for variante in prodotto.varianti %}


                                <input type=\"radio\" name=\"id_variante\" value=\"{{ variante.id }}\"
                                {% for attributo in variante.attributi %}
                                    data-attribute{{ attributo.attributo.id }}=\"{{ attributo.valore.id }}\"
                                {% endfor %}>
                            {% endfor  %}




                                    <span class=\"prezzo\">{{ variante.prezzo }}</span>

                            <input type=\"hidden\" name=\"quantita\" value=\"1\">

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

                                {% if attributo.valori|length == 1 %}
                                    <input type=\"hidden\" name=\"{{ attributo.attributo.id }}\" value=\"{{ attributo.valori[0].valore.id }}\">


                                {% else %}
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
                                                {% endif %}


                                                {% if variante.gotAttributeValue( valore.valore.id) %}
                                                    selected
                                                {% endif %}
                                        >{{ valore.valore.valore }}</option>
                                    {% endfor %}

                                </select>

                                {% endif %}

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

                    <button type=\"submit\" class=\"btn btn-secondary\" form=\"form-add-variant\"><i class=\"fa fa-cart\"></i> Aggiungi al carrello</button>
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


        var parseForm = function(){
            me = \$(\"form.scelta-attributi\");


            selettore = [];
            selettoreVariante = [];

            selettoreAttributi = [];
            selettoreNot =[];
            variante = null;
            \$('.scelta-attributi [data-idprec]').hide();


            console.log(\$(me));

            \$(me).serializeArray().forEach(function( o , index){


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


            console.log(selettoreAttributi);
            \$(selettoreAttributi.join(\"\")).show();


            \$(selettoreVariante.join(\"\")).prop(\"checked\",true);
        }
        \$(document).on(\"change\",\"form.scelta-attributi\",function () {

            parseForm();
           /* selettore = [];
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

            });


            \$(selettoreAttributi.join(\"\")).show();


            \$(selettoreVariante.join(\"\")).prop(\"checked\",true);*/
        })

        \$(window).ready(function(){
            parseForm();
        })

    })(jQuery);
    </script>
{% endblock %}", "ecommerce/scheda-prodotto.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/ecommerce/scheda-prodotto.twig");
    }
}
