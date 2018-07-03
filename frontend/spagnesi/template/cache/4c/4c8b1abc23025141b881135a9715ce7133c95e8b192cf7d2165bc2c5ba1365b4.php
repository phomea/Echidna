<?php

/* contenuti/titolo-testo.twig */
class __TwigTemplate_76fc45db4ca7872bd22771a6aaae083f1edd3e857d2c80a256eb42b4ac80ea7a extends Twig_Template
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
<div class=\"container tc p-t2\">

    <h2>";
        // line 4
        echo twig_escape_filter($this->env, ($context["titolo"] ?? null), "html", null, true);
        echo "</h2>
    <p>";
        // line 5
        echo ($context["testo"] ?? null);
        echo "</p>
</div>";
    }

    public function getTemplateName()
    {
        return "contenuti/titolo-testo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 5,  28 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<div class=\"container tc p-t2\">

    <h2>{{ titolo }}</h2>
    <p>{{ testo | raw }}</p>
</div>", "contenuti/titolo-testo.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/contenuti/titolo-testo.twig");
    }
}
