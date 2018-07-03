<?php

/* parts/breadcrumbs.twig */
class __TwigTemplate_36848a041524e740fc03ccad012731223e0861f40628bd753b3a0a9b12ed8552 extends Twig_Template
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
        echo "<div class=\"breadcrumbs\">
    <div class=\"col-sm-4\">
        <div class=\"page-header float-left\">
            <div class=\"page-title\">
                <h1>";
        // line 5
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h1>
            </div>
        </div>
    </div>
    <div class=\"col-sm-8\">
        <div class=\"page-header float-right\">
            <div class=\"page-title\">
                <ol class=\"breadcrumb text-right\">
                    <li class=\"active\">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "parts/breadcrumbs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"breadcrumbs\">
    <div class=\"col-sm-4\">
        <div class=\"page-header float-left\">
            <div class=\"page-title\">
                <h1>{{ title }}</h1>
            </div>
        </div>
    </div>
    <div class=\"col-sm-8\">
        <div class=\"page-header float-right\">
            <div class=\"page-title\">
                <ol class=\"breadcrumb text-right\">
                    <li class=\"active\">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>", "parts/breadcrumbs.twig", "/Users/phomea/Siti/Echidna2/backend/template/parts/breadcrumbs.twig");
    }
}
