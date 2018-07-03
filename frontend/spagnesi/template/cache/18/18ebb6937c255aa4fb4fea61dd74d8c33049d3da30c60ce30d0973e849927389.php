<?php

/* contenuti/banner.twig */
class __TwigTemplate_790297960c5051f5394d5f203c112229e1a6e3a2d5317693b8047a3ced014142 extends Twig_Template
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
        echo "<div class=\"banner top-page\">
    <figure>

        <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contenuto"] ?? null), "media", array()), "permalink", array()), "html", null, true);
        echo "\">

    </figure>
</div>

";
    }

    public function getTemplateName()
    {
        return "contenuti/banner.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"banner top-page\">
    <figure>

        <img src=\"{{ contenuto.media.permalink }}\">

    </figure>
</div>

", "contenuti/banner.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/contenuti/banner.twig");
    }
}
