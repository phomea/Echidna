<?php

/* homepage/templates/gestisci.twig */
class __TwigTemplate_aba12c867607653958a6168d5ea3f4a3490ac2128d53830fd3b7058f2a17f91d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "homepage/templates/gestisci.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div class=\"container\">
    <div class=\"card\">
        <div class=\"card-header\" data-toggle=\"collapse\" href=\"#scelta-pagina\">
            <h6>Scelta Pagina</h6>
        </div>
        <div class=\"card-body collapse\" id=\"scelta-pagina\">
            <form method=\"post\" class=\"form-ajax\" action=\"\" method=\"post\">

                <div class=\"form-group\">
                    <label>Scegli l'homepage</label>
                    <select class=\"form-control\" name=\"pagina_id\">
                        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["pagine"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["pagina"]) {
            // line 17
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pagina"], "id", array()), "html", null, true);
            echo "\" ";
            echo (((twig_get_attribute($this->env, $this->source, ($context["homepage"] ?? null), "pagina_id", array()) == twig_get_attribute($this->env, $this->source, $context["pagina"], "id", array()))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pagina"], "title", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pagina'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "                    </select>
                </div>



                <button type=\"submit\" class=\"btn btn-sm btn-primary\">Salva</button>

                <a href=\"\" class=\"btn btn-sm btn-info\">Modifica pagina</a>
            </form>
        </div>
    </div>

    <div class=\"card\">
        <div class=\"card-header\" data-toggle=\"collapse\" href=\"#override-meta\">
            <h6>Override meta</h6>
        </div>
        <div class=\"card-body collapse\" id=\"override-meta\">
            <form method=\"post\" class=\"form-ajax\" action=\"\" method=\"post\">


                <div class=\"form-group\">
                    <label>Sovrascrivi meta title</label>
                    <input type=\"text\" name=\"meta_title\" class=\"form-control\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["homepage"] ?? null), "meta_title", array()), "html", null, true);
        echo "\">
                </div>

                <div class=\"form-group\">
                    <label>Sovrascrivi meta description</label>
                    <textarea class=\"form-control\" name=\"meta_description\">";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["homepage"] ?? null), "meta_description", array()), "html", null, true);
        echo "</textarea>
                </div>

                <button type=\"submit\" class=\"btn btn-sm btn-primary\">Salva</button>


            </form>
        </div>
    </div>

</div>

";
    }

    public function getTemplateName()
    {
        return "homepage/templates/gestisci.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 46,  90 => 41,  66 => 19,  53 => 17,  49 => 16,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.twig' %}

{% block content %}

<div class=\"container\">
    <div class=\"card\">
        <div class=\"card-header\" data-toggle=\"collapse\" href=\"#scelta-pagina\">
            <h6>Scelta Pagina</h6>
        </div>
        <div class=\"card-body collapse\" id=\"scelta-pagina\">
            <form method=\"post\" class=\"form-ajax\" action=\"\" method=\"post\">

                <div class=\"form-group\">
                    <label>Scegli l'homepage</label>
                    <select class=\"form-control\" name=\"pagina_id\">
                        {% for pagina in pagine %}
                            <option value=\"{{ pagina.id }}\" {{ homepage.pagina_id == pagina.id ? \"selected\" : '' }}>{{ pagina.title }}</option>
                        {%  endfor %}
                    </select>
                </div>



                <button type=\"submit\" class=\"btn btn-sm btn-primary\">Salva</button>

                <a href=\"\" class=\"btn btn-sm btn-info\">Modifica pagina</a>
            </form>
        </div>
    </div>

    <div class=\"card\">
        <div class=\"card-header\" data-toggle=\"collapse\" href=\"#override-meta\">
            <h6>Override meta</h6>
        </div>
        <div class=\"card-body collapse\" id=\"override-meta\">
            <form method=\"post\" class=\"form-ajax\" action=\"\" method=\"post\">


                <div class=\"form-group\">
                    <label>Sovrascrivi meta title</label>
                    <input type=\"text\" name=\"meta_title\" class=\"form-control\" value=\"{{ homepage.meta_title }}\">
                </div>

                <div class=\"form-group\">
                    <label>Sovrascrivi meta description</label>
                    <textarea class=\"form-control\" name=\"meta_description\">{{ homepage.meta_description }}</textarea>
                </div>

                <button type=\"submit\" class=\"btn btn-sm btn-primary\">Salva</button>


            </form>
        </div>
    </div>

</div>

{% endblock %}", "homepage/templates/gestisci.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/applications/homepage/templates/gestisci.twig");
    }
}
