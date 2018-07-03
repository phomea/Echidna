<?php

/* contenuti/titolo-testo.twig */
class __TwigTemplate_1a276db00528b5ce7a7920076ef97f4a68c593585c5b0e52b51214962017736b extends Twig_Template
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
        echo twig_escape_filter($this->env, strip_tags(($context["testo"] ?? null)), "html", null, true);
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
    <p>{{ testo | raw|striptags }}</p>
</div>", "contenuti/titolo-testo.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/contenuti/titolo-testo.twig");
    }
}
