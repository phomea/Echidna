<?php

/* contenuti/separatore.twig */
class __TwigTemplate_2d534aa21ae39639eb1bea8c609fb7e6848efd9635ce7a0c1a706e8b8db572ed extends Twig_Template
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
";
        // line 2
        if (( !twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "tipo", array()) || (twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "tipo", array()) == 0))) {
            // line 3
            echo "<br><br>
";
        } else {
            // line 5
            echo "<hr>
";
        }
    }

    public function getTemplateName()
    {
        return "contenuti/separatore.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 5,  28 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% if not contenuto.tipo or contenuto.tipo == 0 %}
<br><br>
{% else %}
<hr>
{% endif %}", "contenuti/separatore.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/contenuti/separatore.twig");
    }
}
