<?php

/* pages/templates/form-content.twig */
class __TwigTemplate_c18ac87ce07fbefe0480964cd4562e8a0347c3cd71c949a3fd9de8cb726fef4e extends Twig_Template
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
        echo "<form>

    ";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "renderForm", array(), "method"), "html", null, true);
        echo "
</form>";
    }

    public function getTemplateName()
    {
        return "pages/templates/form-content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<form>

    {{ data.renderForm() }}
</form>", "pages/templates/form-content.twig", "/Users/phomea/Siti/Echidna2/applications/pages/templates/form-content.twig");
    }
}
