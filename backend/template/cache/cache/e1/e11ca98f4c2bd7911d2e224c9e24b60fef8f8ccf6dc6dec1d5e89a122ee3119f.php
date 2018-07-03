<?php

/* CLManager/templates/ordini.lista.twig */
class __TwigTemplate_01a992caecd82947c8d71993bd8b159c42af4724c339361fd1db596ff0b44356 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "CLManager/templates/ordini.lista.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "
    <div class=\"animated fadeIn\">
        <div class=\"row\">

            <div class=\"col-md-12\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <strong class=\"card-title\">Data Table</strong>
                    </div>



                    <div class=\"card-body\">
                        <div class=\"table-responsive\">
                            <table id=\"bootstrap-data-table\" class=\"table table-striped table-bordered\">
                                <thead>

                                <tr>
                                    <th>Id</th>
                                    <th>Numero</th>
                                    <th>Stato</th>
                                    <th>Spedizione</th>
                                    <th>Pagamento</th>
                                    <th>Totale</th>

                                </tr>
                                </thead>
                                <tbody>


                                ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 34
            echo "
                                    <tr>
                                        <td>";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", array()), "html", null, true);
            echo "</td>

                                        <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "number", array()), "html", null, true);
            echo "</td>

                                        <td>";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "state", array()), "html", null, true);
            echo "</td>

                                        <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "shipping_state", array()), "html", null, true);
            echo "</td>

                                        <td>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "payment_state", array()), "html", null, true);
            echo "</td>

                                        <td>";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "formatted_total_amount_with_tax", array()), "html", null, true);
            echo "</td>
                                    </tr>

                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->


";
    }

    // line 65
    public function block_scripts($context, array $blocks = array())
    {
        // line 66
        echo "    <script type=\"text/javascript\">
        (function (\$) {
            \$(document).ready(function() {
                \$('#bootstrap-data-table-export').DataTable();
            } );
        })(jQuery);

    </script>
";
    }

    public function getTemplateName()
    {
        return "CLManager/templates/ordini.lista.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 66,  127 => 65,  111 => 50,  101 => 46,  96 => 44,  91 => 42,  86 => 40,  81 => 38,  76 => 36,  72 => 34,  68 => 33,  36 => 3,  33 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.twig\" %}
{% block content %}

    <div class=\"animated fadeIn\">
        <div class=\"row\">

            <div class=\"col-md-12\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <strong class=\"card-title\">Data Table</strong>
                    </div>



                    <div class=\"card-body\">
                        <div class=\"table-responsive\">
                            <table id=\"bootstrap-data-table\" class=\"table table-striped table-bordered\">
                                <thead>

                                <tr>
                                    <th>Id</th>
                                    <th>Numero</th>
                                    <th>Stato</th>
                                    <th>Spedizione</th>
                                    <th>Pagamento</th>
                                    <th>Totale</th>

                                </tr>
                                </thead>
                                <tbody>


                                {% for item in data %}

                                    <tr>
                                        <td>{{ item.id }}</td>

                                        <td>{{ item.number }}</td>

                                        <td>{{ item.state }}</td>

                                        <td>{{ item.shipping_state }}</td>

                                        <td>{{ item.payment_state }}</td>

                                        <td>{{ item.formatted_total_amount_with_tax }}</td>
                                    </tr>

                                {% endfor %}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->


{% endblock %}


{% block scripts %}
    <script type=\"text/javascript\">
        (function (\$) {
            \$(document).ready(function() {
                \$('#bootstrap-data-table-export').DataTable();
            } );
        })(jQuery);

    </script>
{% endblock %}
", "CLManager/templates/ordini.lista.twig", "/Users/phomea/Siti/Echidna2/applications/CLManager/templates/ordini.lista.twig");
    }
}
