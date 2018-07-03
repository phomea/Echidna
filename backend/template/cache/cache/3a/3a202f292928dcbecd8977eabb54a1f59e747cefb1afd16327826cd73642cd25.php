<?php

/* ecommerce/templates/prodotto.edit.categorie.twig */
class __TwigTemplate_dcd77d2f0c52a8d6ce15dfbfe0066e597230b0655c10c6e05f97807d3c2f4a4b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<div class=\"card\">
    <div class=\"card-body\">

        <div class=\"row\">
            <div class=\"col-md-4\">

                ";
        // line 8
        echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ($context["categorieAssociate"] ?? null)), "html", null, true);
        echo "
                <div class=\"form-group\">
                    <label>Categorie associate</label>
                    <select size=\"10\" class=\"form-control\">
                        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categorieAssociate"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 13
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "id", array()), "html", null, true);
            echo "\" name=\"categorieAssociate[]\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "nome", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "                    </select>
                </div>
            </div>

            <div class=\"col-md-4\">

            </div>

            <div class=\"col-md-4\">
                <div class=\"form-group\">
                    <label>Categorie disponibili</label>
                    <select size=\"10\" class=\"form-control\">
                        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categorieDisponibili"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 28
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "id", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "nome", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "                    </select>
                </div>
            </div>


        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/prodotto.edit.categorie.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 30,  72 => 28,  68 => 27,  54 => 15,  43 => 13,  39 => 12,  32 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<div class=\"card\">
    <div class=\"card-body\">

        <div class=\"row\">
            <div class=\"col-md-4\">

                {{ dump(categorieAssociate) }}
                <div class=\"form-group\">
                    <label>Categorie associate</label>
                    <select size=\"10\" class=\"form-control\">
                        {% for cat in categorieAssociate %}
                            <option value=\"{{ cat.id }}\" name=\"categorieAssociate[]\">{{ cat.nome }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>

            <div class=\"col-md-4\">

            </div>

            <div class=\"col-md-4\">
                <div class=\"form-group\">
                    <label>Categorie disponibili</label>
                    <select size=\"10\" class=\"form-control\">
                        {% for cat in categorieDisponibili %}
                            <option value=\"{{ cat.id }}\" >{{ cat.nome }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>


        </div>
    </div>
</div>", "ecommerce/templates/prodotto.edit.categorie.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/prodotto.edit.categorie.twig");
    }
}
