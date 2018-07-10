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
            'beforeContent' => array($this, 'block_beforeContent'),
            'content' => array($this, 'block_content'),
            'additionalFields' => array($this, 'block_additionalFields'),
            'afterContent' => array($this, 'block_afterContent'),
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
    public function block_beforeContent($context, array $blocks = array())
    {
        // line 3
        echo "        <form data-redirect=\"\" action=\"";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array())) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "getEntity", array(), "method") . ".update")), "method"), "build", array(0 => array("id" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array()))), "method")) : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "getEntity", array(), "method") . ".insert")), "method"), "build", array(), "method"))), "html", null, true);
        echo "\" class=\"form-mod\" method=\"";
        echo ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array())) ? ("PUT") : ("POST"));
        echo "\">
    ";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "



        <input value=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "getEntity", array(), "method"), "html", null, true);
        echo "\" name=\"form_entity\" type=\"hidden\">
        ";
        // line 12
        if (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array())) {
            // line 13
            echo "        <input value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array()), "html", null, true);
            echo "\" type=\"hidden\" name=\"id\">
        ";
        }
        // line 15
        echo "        <div class=\"card\">
            <div class=\"card-header\">

                ";
        // line 18
        if (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array())) {
            // line 19
            echo "                <div class=\"mod-actions float-right\">
                    <a href=\"\" class=\"btn btn-sm btn-light btn-icon\" data-toggle=\"tooltip\" title=\"Clona\"><i class=\"fa fa-plus\"></i></a>
                    <a href=\"";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "getEntity", array(), "method") . ".delete")), "method"), "build", array(0 => array("id" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", array()))), "method"), "html", null, true);
            echo "\" class=\"btn btn-sm btn-light btn-icon\" data-toggle=\"tooltip\" title=\"Elimina\"><i class=\"fa fa-trash\"></i></a>
                    <a href=\"\" class=\"btn btn-sm btn-light btn-icon\" data-toggle=\"tooltip\" title=\"Attiva o disattiva\"><i class=\"fa fa-eye\"></i></a>
                </div>
                ";
        }
        // line 25
        echo "            </div>
         <div class=\"card-body\">
        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 28
            echo "          ";
            echo $context["field"];
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "

             ";
        // line 32
        $this->displayBlock('additionalFields', $context, $blocks);
        // line 33
        echo "




         </div>

        </div>

        <div class=\"card\">
            <div class=\"card-body\">
                <button type=\"submit\" class=\"btn btn-success\" ><i class=\"fa fa-save\"></i> Salva</button>
            </div>
        </div>

";
    }

    // line 32
    public function block_additionalFields($context, array $blocks = array())
    {
    }

    // line 50
    public function block_afterContent($context, array $blocks = array())
    {
        // line 51
        echo "        </form>
  ";
    }

    // line 54
    public function block_scripts($context, array $blocks = array())
    {
        // line 55
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
        return array (  144 => 55,  141 => 54,  136 => 51,  133 => 50,  128 => 32,  109 => 33,  107 => 32,  103 => 30,  94 => 28,  90 => 27,  86 => 25,  79 => 21,  75 => 19,  73 => 18,  68 => 15,  62 => 13,  60 => 12,  56 => 11,  50 => 7,  47 => 6,  38 => 3,  35 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends template_extend %}
    {% block beforeContent %}
        <form data-redirect=\"\" action=\"{{ data.id ? router_service.getRoute(data.getEntity()~\".update\").build({id:data.id}) : router_service.getRoute(data.getEntity()~\".insert\").build() }}\" class=\"form-mod\" method=\"{{ data.id ? \"PUT\" : \"POST\" }}\">
    {% endblock %}

{% block content %}




        <input value=\"{{ data.getEntity() }}\" name=\"form_entity\" type=\"hidden\">
        {% if data.id %}
        <input value=\"{{ data.id }}\" type=\"hidden\" name=\"id\">
        {% endif %}
        <div class=\"card\">
            <div class=\"card-header\">

                {% if data.id %}
                <div class=\"mod-actions float-right\">
                    <a href=\"\" class=\"btn btn-sm btn-light btn-icon\" data-toggle=\"tooltip\" title=\"Clona\"><i class=\"fa fa-plus\"></i></a>
                    <a href=\"{{ router_service.getRoute(data.getEntity()~\".delete\").build({id:data.id})}}\" class=\"btn btn-sm btn-light btn-icon\" data-toggle=\"tooltip\" title=\"Elimina\"><i class=\"fa fa-trash\"></i></a>
                    <a href=\"\" class=\"btn btn-sm btn-light btn-icon\" data-toggle=\"tooltip\" title=\"Attiva o disattiva\"><i class=\"fa fa-eye\"></i></a>
                </div>
                {% endif %}
            </div>
         <div class=\"card-body\">
        {% for field in fields %}
          {{ field|raw }}
        {% endfor %}


             {% block additionalFields %}{% endblock %}





         </div>

        </div>

        <div class=\"card\">
            <div class=\"card-body\">
                <button type=\"submit\" class=\"btn btn-success\" ><i class=\"fa fa-save\"></i> Salva</button>
            </div>
        </div>

{% endblock %}

  {% block afterContent %}
        </form>
  {% endblock %}

{% block scripts %}

{% endblock %}
", "mod.twig", "/Users/phomea/Siti/Spagnesi/backend/template/mod.twig");
    }
}
