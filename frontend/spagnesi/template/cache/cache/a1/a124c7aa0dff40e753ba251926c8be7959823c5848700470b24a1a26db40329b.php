<?php

/* base/head/meta.twig */
class __TwigTemplate_7a230468903462d41c772eff84207a0bfebc15f70da97b829d13bd00f1696a45 extends Twig_Template
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
        echo "<title>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["meta"] ?? null), "title", array()), "html", null, true);
        echo "</title>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
    }

    public function getTemplateName()
    {
        return "base/head/meta.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<title>{{ meta.title }}</title>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">", "base/head/meta.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/base/head/meta.twig");
    }
}
