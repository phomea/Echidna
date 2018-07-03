<?php

/* mod.twig */
class __TwigTemplate_61406cccebc93e99496bc99b24ec270c4ff6d5d3eeefd5100ee028c99c3921e0 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(($context["template_extend"] ?? null), "mod.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "


    <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array())) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "getEntity", array(), "method") . ".update")), "method"), "build", array(0 => array("id" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array()))), "method")) : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "getEntity", array(), "method") . ".insert")), "method"), "build", array(), "method"))), "html", null, true);
        echo "\" class=\"form-mod\" method=\"";
        echo ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array())) ? ("PUT") : ("POST"));
        echo "\">
        <input value=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "getEntity", array(), "method"), "html", null, true);
        echo "\" name=\"form_entity\" type=\"hidden\">
        ";
        // line 8
        if (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array())) {
            // line 9
            echo "        <input value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array()), "html", null, true);
            echo "\" type=\"hidden\" name=\"id\">
        ";
        }
        // line 11
        echo "        <div class=\"card\">
         <div class=\"card-body\">
        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 14
            echo "          ";
            echo $context["field"];
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "
             <button type=\"submit\" class=\"btn btn-success\" ><i class=\"fa fa-save\"></i> Salva</button>
         </div>

        </div>
    </form>

";
    }

    // line 26
    public function block_scripts($context, array $blocks = array())
    {
        // line 27
        echo "
";
    }

    public function getTemplateName()
    {
        return "mod.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 27,  86 => 26,  75 => 16,  66 => 14,  62 => 13,  58 => 11,  52 => 9,  50 => 8,  46 => 7,  40 => 6,  35 => 3,  32 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends template_extend %}
{% block content %}



    <form action=\"{{ data.id ? router_service.getRoute(data.getEntity()~\".update\").build({id:data.id}) : router_service.getRoute(data.getEntity()~\".insert\").build() }}\" class=\"form-mod\" method=\"{{ data.id ? \"PUT\" : \"POST\" }}\">
        <input value=\"{{ data.getEntity() }}\" name=\"form_entity\" type=\"hidden\">
        {% if data.id %}
        <input value=\"{{ data.id }}\" type=\"hidden\" name=\"id\">
        {% endif %}
        <div class=\"card\">
         <div class=\"card-body\">
        {% for field in fields %}
          {{ field|raw }}
        {% endfor %}

             <button type=\"submit\" class=\"btn btn-success\" ><i class=\"fa fa-save\"></i> Salva</button>
         </div>

        </div>
    </form>

{% endblock %}


{% block scripts %}

{% endblock %}
", "mod.twig", "/Users/phomea/Siti/Echidna2/backend/template/mod.twig");
    }
}
