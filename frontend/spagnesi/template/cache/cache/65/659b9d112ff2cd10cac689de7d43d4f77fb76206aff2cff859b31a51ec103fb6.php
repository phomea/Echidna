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
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["variante"]) {
                // line 16
                echo "                            <form class=\"variante\"
                                    ";
                // line 17
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variante"], "attributi", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                    // line 18
                    echo "
                                    data-attribute";
                    // line 19
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "valore", array()), "id", array()), "html", null, true);
                    echo "\"

                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 21
                echo ">
                                    <input type=\"hidden\" name=\"id_variante\" value=\"";
                // line 22
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variante"], "id", array()), "html", null, true);
                echo "\">
                            </form>


                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variante'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "

                       ";
            // line 44
            echo "
                        <form class=\"scelta-attributi\">
                            ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["attributi"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["attributo"]) {
                // line 47
                echo "                                <label>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "nome", array()), "html", null, true);
                echo "</label>
                                <select name=\"";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["attributo"], "attributo", array()), "id", array()), "html", null, true);
                echo "\" class=\"form-control\">

                                    <option value=\"\">...scegli</option>

                                    ";
                // line 52
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["attributo"], "valori", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["valore"]) {
                    // line 53
                    echo "
                                        <option value=\"";
                    // line 54
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "id", array()), "html", null, true);
                    echo "\" ";
                    if (twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedentevalore", array())) {
                        // line 55
                        echo "                                            data-idprec=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedenteid", array()), "html", null, true);
                        echo "\" data-valueprec=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "attributoprecedentevalore", array()), "html", null, true);
                        echo "\"
                                        ";
                    }
                    // line 56
                    echo ">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "valore", array()), "html", null, true);
                    echo "</option>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valore'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 58
                echo "
                                </select>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "                        </form>


                    ";
        } else {
            // line 65
            echo "                        ";
            $context["variante"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "varianti", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null);
            // line 66
            echo "                        <form class=\"variante\">
                            <div class=\"prezzo\">
                                ";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["variante"] ?? null), "prezzo", array()), "html", null, true);
            echo "
                            </div>
                        </form>
                    ";
        }
        // line 72
        echo "
                </div>
            </div>
        </div>
    </main>
";
    }

    // line 80
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 81
        echo "
    ";
        // line 82
        $this->displayParentBlock("javascript_footer", $context, $blocks);
        echo "
    <script>
    (function( \$ ){

        \$('.scelta-attributi [data-idprec]').hide();

        \$(document).on(\"change\",\"form.scelta-attributi\",function () {

            console.log( \$(this).serializeArray());

            selettore = [];
            selettoreVariante = [];

            variante = null;
            \$('.scelta-attributi [data-idprec]').hide();

            \$(this).serializeArray().forEach(function( o ){
                selettoreVariante.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );

                if(o.value !=\"\") {

                    selettore.push('[data-idprec=\"' + o.name + '\"][data-valueprec=\"' + o.value + '\"]');

                }

            });
            \$('.scelta-attributi '+selettore.join()).show();

            console.log( \$(selettoreVariante.join(\"\")).first().find('[name=\"id_variante\"]').val() );




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
        return array (  191 => 82,  188 => 81,  185 => 80,  176 => 72,  169 => 68,  165 => 66,  162 => 65,  156 => 61,  148 => 58,  139 => 56,  131 => 55,  127 => 54,  124 => 53,  120 => 52,  113 => 48,  108 => 47,  104 => 46,  100 => 44,  96 => 27,  85 => 22,  82 => 21,  71 => 19,  68 => 18,  64 => 17,  61 => 16,  56 => 15,  54 => 14,  49 => 12,  45 => 11,  36 => 4,  33 => 3,  15 => 1,);
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
                        {% for variante in prodotto.varianti %}
                            <form class=\"variante\"
                                    {% for attributo in variante.attributi %}

                                    data-attribute{{ attributo.attributo.id }}=\"{{ attributo.valore.id }}\"

                                    {% endfor %}>
                                    <input type=\"hidden\" name=\"id_variante\" value=\"{{ variante.id }}\">
                            </form>


                        {% endfor  %}


                       {# <form class=\"scelta-attributi\">
                        {% for attributo in attributi %}
                            <select name=\"{{ attributo.attributo.id }}\">

                                <option value=\"\">...scegli</option>

                                 {% for valore in attributo.valori %}

                                    <option>{{ valore.valore }}</option>
                                {% endfor %}

                            </select>
                        {% endfor %}
                        </form>
                        #}

                        <form class=\"scelta-attributi\">
                            {% for attributo in attributi %}
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

            variante = null;
            \$('.scelta-attributi [data-idprec]').hide();

            \$(this).serializeArray().forEach(function( o ){
                selettoreVariante.push('[data-attribute' + o.name +'=\"'+ o.value +'\"]' );

                if(o.value !=\"\") {

                    selettore.push('[data-idprec=\"' + o.name + '\"][data-valueprec=\"' + o.value + '\"]');

                }

            });
            \$('.scelta-attributi '+selettore.join()).show();

            console.log( \$(selettoreVariante.join(\"\")).first().find('[name=\"id_variante\"]').val() );




        })
    })(jQuery);
    </script>
{% endblock %}", "ecommerce/scheda-prodotto.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/ecommerce/scheda-prodotto.twig");
    }
}
