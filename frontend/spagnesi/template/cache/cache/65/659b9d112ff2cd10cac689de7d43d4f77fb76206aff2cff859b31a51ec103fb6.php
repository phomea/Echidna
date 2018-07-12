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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "images", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null), "permalink", array()), "html", null, true);
        echo "\">
    </figure>
    <main id=\"scheda-prodotto\">
        <div class=\"container\">

            <div>


                <div class=\"row mt-5\">
                    <div class=\"col-8\">
                        <div class=\"owl-carousel owl-theme general-carousel mb-5\" data-nav>
                            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "images", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["immagine"]) {
            // line 18
            echo "                                <img src=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["immagine"], "permalink", array()), "html", null, true);
            echo "\">
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['immagine'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                        </div>

                        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["variante"]) {
            // line 23
            echo "                            <div class=\"card variante mb-5\">
                                <div class=\"card-header\">
                                    <h3>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variante"], "nome", array()), "html", null, true);
            echo "</h3>
                                </div>
                                <div class=\"card-body\">
                                    <form method=\"post\" action=\"/carrello/aggiungi\">
                                        <input type=\"hidden\" name=\"id_variante\" value=\"";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variante"], "id", array()), "html", null, true);
            echo "\">
                                        <input type=\"hidden\" name=\"quantita\" value=\"1\">

                                        <div class=\"row\">
                                            <div class=\"col-3\">
                                                <img src=\"";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, $context["variante"], "images", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[0] ?? null) : null), "permalink", array()), "html", null, true);
            echo "\">
                                            </div>


                                            <div class=\"col-9\">


                                                <div>
                                                ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variante"], "attributi", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                // line 43
                echo "                                                    ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "nome", array()), "html", null, true);
                echo "
                                                    ";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "valore", array()), "valore", array()), "html", null, true);
                echo "
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                                                </div>
                                                <button type=\"submit\" class=\"btn btn-secondary\"><i class=\"fa fa-cart-plus\"></i> Aggiungi al carrello </button>
                                            </div>

                                        </div>


                                    </form>
                                </div>
                            </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variante'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                    </div>
                    <div class=\"col-4\">
                        <h2 class=\"product-name\">";
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "nome", array()), "html", null, true);
        echo "</h2>
                        <p>
                            Codice prodotto :
                        </p>
                        <div>
                            ";
        // line 64
        echo twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "descrizione", array());
        echo "
                        </div>
                    </div>
                </div>




            </div>
            <div class=\"row mt-5\">
                <div class=\"col-8\">
                    <div class=\"owl-carousel owl-theme general-carousel\" data-nav>
                    ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "images", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["immagine"]) {
            // line 77
            echo "                        <img src=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["immagine"], "permalink", array()), "html", null, true);
            echo "\">
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['immagine'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "                    </div>
                </div>
                <div class=\"col-4\">
                    <h2 class=\"product-name\">";
        // line 82
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "nome", array()), "html", null, true);
        echo "</h2>
                    Codice prodotto : ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["variante"]) {
            // line 84
            echo "                        <span class=\"product-sku\" style=\"display: none;\" ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variante"], "attributi", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                // line 85
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
            // line 86
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variante"], "sku", array()), "html", null, true);
            echo "</span>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variante'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "

                    <p class=\"product-description\">";
        // line 90
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "descrizione", array()), "html", null, true);
        echo "</p>

                    ";
        // line 92
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array())) > 1)) {
            // line 93
            echo "
                        <form id=\"form-add-variant\" class=\"variante\" method=\"post\" action=\"/carrello/aggiungi\">
                            ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["variante"]) {
                // line 96
                echo "

                                <input type=\"radio\" name=\"id_variante\" value=\"";
                // line 98
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variante"], "id", array()), "html", null, true);
                echo "\"
                                ";
                // line 99
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variante"], "attributi", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                    // line 100
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
                // line 101
                echo ">
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variante'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            echo "



                                    <span class=\"prezzo\">";
            // line 107
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "prezzo", array()), "html", null, true);
            echo "</span>

                            <input type=\"hidden\" name=\"quantita\" value=\"1\">

                        </form>



                        <form class=\"scelta-attributi\">
                            ";
            // line 132
            echo "

                            ";
            // line 134
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["attributi"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                // line 135
                echo "
                                ";
                // line 136
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attributo"], "valori", array())) == 1)) {
                    // line 137
                    echo "                                    <input type=\"hidden\" name=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, $context["attributo"], "valori", array())) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[0] ?? null) : null), "valore", array()), "id", array()), "html", null, true);
                    echo "\">


                                ";
                } else {
                    // line 141
                    echo "                                <label>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "nome", array()), "html", null, true);
                    echo "</label>
                                <select name=\"";
                    // line 142
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                    echo "\" class=\"form-control\">

                                    <option value=\"\">...scegli</option>

                                    ";
                    // line 146
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["attributo"], "valori", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["valore"]) {
                        // line 147
                        echo "
                                        <option value=\"";
                        // line 148
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "id", array()), "html", null, true);
                        echo "\"
                                                ";
                        // line 149
                        if (twig_get_attribute($this->env, $this->source, $context["valore"], "parents", array())) {
                            // line 150
                            echo "                                                    ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["valore"], "parents", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                                // line 151
                                echo "                                                        data-attribute";
                                echo twig_escape_filter($this->env, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = $context["p"]) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[0] ?? null) : null), "html", null, true);
                                echo "=\"";
                                echo twig_escape_filter($this->env, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = $context["p"]) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[1] ?? null) : null), "html", null, true);
                                echo "\"
                                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 153
                            echo "                                                ";
                        }
                        // line 154
                        echo "                                                ";
                        if (twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedentevalore", array())) {
                            // line 155
                            echo "                                            data-idprec=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedenteid", array()), "html", null, true);
                            echo "\" data-valueprec=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedentevalore", array()), "html", null, true);
                            echo "\"
                                                ";
                        }
                        // line 157
                        echo "

                                                ";
                        // line 159
                        if (twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "gotAttributeValue", array(0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "id", array())), "method")) {
                            // line 160
                            echo "                                                    selected
                                                ";
                        }
                        // line 162
                        echo "                                        >";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "valore", array()), "html", null, true);
                        echo "</option>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valore'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 164
                    echo "
                                </select>

                                ";
                }
                // line 168
                echo "
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 170
            echo "                        </form>


                    ";
        } else {
            // line 174
            echo "                        ";
            $context["variante"] = (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array())) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[0] ?? null) : null);
            // line 175
            echo "                        <form class=\"variante\">
                            <div class=\"prezzo\">
                                ";
            // line 177
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "prezzo", array()), "html", null, true);
            echo "
                            </div>
                        </form>
                    ";
        }
        // line 181
        echo "
                    <button type=\"submit\" class=\"btn btn-secondary\" form=\"form-add-variant\"><i class=\"fa fa-cart\"></i> Aggiungi al carrello</button>
                </div>
            </div>
        </div>
    </main>
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
        return array (  412 => 181,  405 => 177,  401 => 175,  398 => 174,  392 => 170,  385 => 168,  379 => 164,  370 => 162,  366 => 160,  364 => 159,  360 => 157,  352 => 155,  349 => 154,  346 => 153,  335 => 151,  330 => 150,  328 => 149,  324 => 148,  321 => 147,  317 => 146,  310 => 142,  305 => 141,  295 => 137,  293 => 136,  290 => 135,  286 => 134,  282 => 132,  270 => 107,  264 => 103,  257 => 101,  246 => 100,  242 => 99,  238 => 98,  234 => 96,  230 => 95,  226 => 93,  224 => 92,  219 => 90,  215 => 88,  206 => 86,  195 => 85,  190 => 84,  186 => 83,  182 => 82,  177 => 79,  168 => 77,  164 => 76,  149 => 64,  141 => 59,  137 => 57,  121 => 46,  113 => 44,  108 => 43,  104 => 42,  93 => 34,  85 => 29,  78 => 25,  74 => 23,  70 => 22,  66 => 20,  57 => 18,  53 => 17,  39 => 6,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base/template.twig\" %}

{% block content %}

    <figure class=\"product-top-bg\">
        <img src=\"{{ prodotto.images[0].permalink }}\">
    </figure>
    <main id=\"scheda-prodotto\">
        <div class=\"container\">

            <div>


                <div class=\"row mt-5\">
                    <div class=\"col-8\">
                        <div class=\"owl-carousel owl-theme general-carousel mb-5\" data-nav>
                            {% for immagine in prodotto.images %}
                                <img src=\"{{ immagine.permalink }}\">
                            {% endfor %}
                        </div>

                        {% for variante in prodotto.varianti %}
                            <div class=\"card variante mb-5\">
                                <div class=\"card-header\">
                                    <h3>{{ variante.nome }}</h3>
                                </div>
                                <div class=\"card-body\">
                                    <form method=\"post\" action=\"/carrello/aggiungi\">
                                        <input type=\"hidden\" name=\"id_variante\" value=\"{{ variante.id }}\">
                                        <input type=\"hidden\" name=\"quantita\" value=\"1\">

                                        <div class=\"row\">
                                            <div class=\"col-3\">
                                                <img src=\"{{ variante.images[0].permalink }}\">
                                            </div>


                                            <div class=\"col-9\">


                                                <div>
                                                {% for attributo in variante.attributi %}
                                                    {{ attributo.attributo.nome }}
                                                    {{ attributo.valore.valore }}
                                                {% endfor %}
                                                </div>
                                                <button type=\"submit\" class=\"btn btn-secondary\"><i class=\"fa fa-cart-plus\"></i> Aggiungi al carrello </button>
                                            </div>

                                        </div>


                                    </form>
                                </div>
                            </div>
                        {%  endfor %}
                    </div>
                    <div class=\"col-4\">
                        <h2 class=\"product-name\">{{ prodotto.nome }}</h2>
                        <p>
                            Codice prodotto :
                        </p>
                        <div>
                            {{ prodotto.descrizione|raw }}
                        </div>
                    </div>
                </div>




            </div>
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

", "ecommerce/scheda-prodotto.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/ecommerce/scheda-prodotto.twig");
    }
}
