<?php

/* ecommerce/templates/prodotto.edit.twig */
class __TwigTemplate_1ef757083c9a51bc2569331a97512ae707b55fc1a002bda8ad4143dcb63d6bac extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("mod.twig", "ecommerce/templates/prodotto.edit.twig", 1);
        $this->blocks = array(
            'additionalFields' => array($this, 'block_additionalFields'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "mod.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_additionalFields($context, array $blocks = array())
    {
        // line 5
        echo "
    <div class=\"form-group\">
        <label>Tipologia prodotto</label>
        <select class=\"form-control\" name=\"id_ecommerce_tipologia_prodotto\">
            ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tipologieProdotto"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tipologia"]) {
            // line 10
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tipologia"], "id", array()), "html", null, true);
            echo "\" ";
            echo (((twig_get_attribute($this->env, $this->source, $context["tipologia"], "id", array()) == twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id_ecommerce_tipologia_prodotto", array()))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tipologia"], "nome", array()), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipologia'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "        </select>
    </div>


    <div class=\"form-group\">
        <label>Prezzo base</label>
        <input class=\"form-control\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "prezzo", array())) ? (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "prezzo", array())) : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "tipologia", array()), "prezzo", array()))), "html", null, true);
        echo "\">
    </div>




";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/prodotto.edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 18,  58 => 12,  45 => 10,  41 => 9,  35 => 5,  32 => 4,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"mod.twig\" %}


{% block additionalFields %}

    <div class=\"form-group\">
        <label>Tipologia prodotto</label>
        <select class=\"form-control\" name=\"id_ecommerce_tipologia_prodotto\">
            {% for tipologia in tipologieProdotto %}
                <option value=\"{{ tipologia.id }}\" {{ tipologia.id == data.id_ecommerce_tipologia_prodotto ? 'selected' : \"\"  }}>{{ tipologia.nome }}</option>
            {% endfor %}
        </select>
    </div>


    <div class=\"form-group\">
        <label>Prezzo base</label>
        <input class=\"form-control\" value=\"{{ data.prezzo ? data.prezzo : data.tipologia.prezzo }}\">
    </div>




{% endblock %}
", "ecommerce/templates/prodotto.edit.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/prodotto.edit.twig");
    }
}
