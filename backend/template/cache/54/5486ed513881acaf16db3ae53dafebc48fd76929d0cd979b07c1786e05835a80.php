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
                        <strong class=\"card-title\">Data Table</strong>
                    </div>



                    <div class=\"card-body\">
                        <div class=\"table-responsive\">
                        <table id=\"bootstrap-data-table\" class=\"table table-striped table-bordered\">
                            <thead>

                            <tr>
                                ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('cast_to_array')->getCallable(), array((($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["data"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null))));
        foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
            // line 22
            echo "                                <th>";
            echo twig_escape_filter($this->env, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = $context["v"]) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[0] ?? null) : null), "html", null, true);
            echo "</th>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                            </tr>
                            </thead>
                            <tbody>

                            ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 29
            echo "
                            <tr>
                                ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('cast_to_array')->getCallable(), array($context["item"])));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 32
                echo "                                    <td>
                                        ";
                // line 33
                if ((twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, $context["item"], "schema", array(), "method")) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[(($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = $context["v"]) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[0] ?? null) : null)] ?? null) : null), "template", array()) == "media")) {
                    // line 34
                    echo "                                            <div class=\"form-group field-media\">
                                                <input type=\"hidden\" class=\"field-media-id\" placeholder=\"Enter your company name\" class=\"form-control\" value=\"";
                    // line 35
                    echo twig_escape_filter($this->env, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = $context["v"]) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[1] ?? null) : null), "html", null, true);
                    echo "\">
                                                <figure>
                                                    <img src=\"\" class=\"field-media-img\">
                                                </figure>
                                            </div>
                                        ";
                } else {
                    // line 41
                    echo "                                            <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, $context["item"], "getEntity", array(), "method") . ".update")), "method"), "build", array(0 => array("id" => twig_get_attribute($this->env, $this->source, $context["item"], "id", array()))), "method"), "html", null, true);
                    echo "\">
                                                <div style=\"max-width: 300px;max-height: 50px;overflow: hidden;\">";
                    // line 42
                    echo twig_escape_filter($this->env, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = $context["v"]) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[1] ?? null) : null), "html", null, true);
                    echo "</div>
                                            </a>
                                        ";
                }
                // line 45
                echo "
                                    </td>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "                            </tr>

                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->


";
    }

    // line 66
    public function block_scripts($context, array $blocks = array())
    {
        // line 67
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
        return array (  150 => 67,  147 => 66,  131 => 51,  123 => 48,  115 => 45,  109 => 42,  104 => 41,  95 => 35,  92 => 34,  90 => 33,  87 => 32,  83 => 31,  79 => 29,  75 => 28,  69 => 24,  60 => 22,  56 => 21,  36 => 3,  33 => 2,  15 => 1,);
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
                                            <a href=\"{{ router_service.getRoute(item.getEntity()~\".update\").build({id:item.id}) }}\">
                                                <div style=\"max-width: 300px;max-height: 50px;overflow: hidden;\">{{ v[1] }}</div>
                                            </a>
                                        {% endif %}

                                    </td>
                                {% endfor %}
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
", "list.twig", "/Users/phomea/Siti/Echidna2/backend/template/list.twig");
    }
}
