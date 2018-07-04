<?php

/* list.twig */
class __TwigTemplate_9c2c8b19b31dfa0a3a2b61982e6f1cf4e1033717569bffcb9eca023f12c94c86 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "list.twig", 1);
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
                        <strong class=\"card-title\">";
        // line 10
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</strong>

                        <div class=\"list-actions float-right\">
                            <a href=\"\" class=\"btn btn-sm btn-light btn-icon\" data-toggle=\"tooltip\" title=\"Aggiungi\"><i class=\"fa fa-plus\"></i></a>
                        </div>

                    </div>



                    <div class=\"card-body\">
                        <div class=\"table-responsive\">
                            ";
        // line 22
        if ((twig_length_filter($this->env, ($context["data"] ?? null)) > 0)) {
            // line 23
            echo "                                <table id=\"bootstrap-data-table\" class=\"table table-striped \">
                                    <thead>

                                    <tr>
                                        ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('cast_to_array')->getCallable(), array((($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["data"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null))));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 28
                echo "                                        <th>";
                echo twig_escape_filter($this->env, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = $context["v"]) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[0] ?? null) : null), "html", null, true);
                echo "</th>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "                                    </tr>
                                    </thead>
                                    <tbody>

                                    ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 35
                echo "
                                    <tr>
                                        ";
                // line 37
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('cast_to_array')->getCallable(), array($context["item"])));
                foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                    // line 38
                    echo "                                            <td>
                                                ";
                    // line 39
                    if ((twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, $context["item"], "schema", array(), "method")) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[(($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = $context["v"]) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[0] ?? null) : null)] ?? null) : null), "template", array()) == "media")) {
                        // line 40
                        echo "                                                    <div class=\"form-group field-media\">
                                                        <input type=\"hidden\" class=\"field-media-id\" placeholder=\"Enter your company name\" class=\"form-control\" value=\"";
                        // line 41
                        echo twig_escape_filter($this->env, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = $context["v"]) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[1] ?? null) : null), "html", null, true);
                        echo "\">
                                                        <figure>
                                                            <img src=\"\" class=\"field-media-img\">
                                                        </figure>
                                                    </div>
                                                ";
                    } else {
                        // line 47
                        echo "


                                                    <a href=\"";
                        // line 50
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, $context["item"], "getEntity", array(), "method") . ".mod")), "method"), "build", array(0 => array("id" => twig_get_attribute($this->env, $this->source, $context["item"], "id", array()))), "method"), "html", null, true);
                        echo "\">
                                                        <div style=\"max-width: 300px;max-height: 1.5em;overflow: hidden;\">
                                                            ";
                        // line 52
                        if (twig_test_iterable((($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = $context["v"]) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[1] ?? null) : null))) {
                            // line 53
                            echo "                                                            ";
                        } else {
                            // line 54
                            echo "                                                                ";
                            echo twig_escape_filter($this->env, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = $context["v"]) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[1] ?? null) : null), "html", null, true);
                            echo "
                                                            ";
                        }
                        // line 56
                        echo "                                                        </div>
                                                    </a>

                                                ";
                    }
                    // line 60
                    echo "
                                            </td>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "                                    </tr>

                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "                                    </tbody>
                                </table>

                            ";
        } else {
            // line 70
            echo "                                <h2>Nessun risultato</h2>
                            ";
        }
        // line 72
        echo "                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->


";
    }

    // line 85
    public function block_scripts($context, array $blocks = array())
    {
        // line 86
        echo "<script type=\"text/javascript\">
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
        return "list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 86,  183 => 85,  169 => 72,  165 => 70,  159 => 66,  151 => 63,  143 => 60,  137 => 56,  131 => 54,  128 => 53,  126 => 52,  121 => 50,  116 => 47,  107 => 41,  104 => 40,  102 => 39,  99 => 38,  95 => 37,  91 => 35,  87 => 34,  81 => 30,  72 => 28,  68 => 27,  62 => 23,  60 => 22,  45 => 10,  36 => 3,  33 => 2,  15 => 1,);
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
                        <strong class=\"card-title\">{{ title }}</strong>

                        <div class=\"list-actions float-right\">
                            <a href=\"\" class=\"btn btn-sm btn-light btn-icon\" data-toggle=\"tooltip\" title=\"Aggiungi\"><i class=\"fa fa-plus\"></i></a>
                        </div>

                    </div>



                    <div class=\"card-body\">
                        <div class=\"table-responsive\">
                            {% if data|length > 0 %}
                                <table id=\"bootstrap-data-table\" class=\"table table-striped \">
                                    <thead>

                                    <tr>
                                        {% for v in data[0]|cast_to_array  %}
                                        <th>{{ v[0] }}</th>
                                        {% endfor %}
                                    </tr>
                                    </thead>
                                    <tbody>

                                    {% for item in data %}

                                    <tr>
                                        {% for v in item|cast_to_array  %}
                                            <td>
                                                {% if item.schema()[v[0]].template == \"media\" %}
                                                    <div class=\"form-group field-media\">
                                                        <input type=\"hidden\" class=\"field-media-id\" placeholder=\"Enter your company name\" class=\"form-control\" value=\"{{ v[1] }}\">
                                                        <figure>
                                                            <img src=\"\" class=\"field-media-img\">
                                                        </figure>
                                                    </div>
                                                {% else %}



                                                    <a href=\"{{ router_service.getRoute(item.getEntity()~\".mod\").build({id:item.id}) }}\">
                                                        <div style=\"max-width: 300px;max-height: 1.5em;overflow: hidden;\">
                                                            {% if v[1] is iterable %}
                                                            {%  else %}
                                                                {{ v[1] }}
                                                            {% endif %}
                                                        </div>
                                                    </a>

                                                {% endif %}

                                            </td>
                                        {% endfor %}
                                    </tr>

                                    {% endfor %}
                                    </tbody>
                                </table>

                            {% else %}
                                <h2>Nessun risultato</h2>
                            {% endif %}
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
", "list.twig", "/Users/phomea/Siti/Spagnesi/backend/template/list.twig");
    }
}
