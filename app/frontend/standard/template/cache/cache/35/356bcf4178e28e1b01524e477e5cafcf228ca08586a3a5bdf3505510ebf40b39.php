<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* pages/home.twig */
class __TwigTemplate_a42aafdb9950765c1db46756325198bae07b5db144a16fbf5cad1458138d1c4e extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("base.twig", "pages/home.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "
    <figure>
        <img data-src=\"holder.js/100px250\" class=\"img-fluid\" alt=\"100%x250\" style=\"height: 250px; width: 100%; display: block;\" src=\"data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22727%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20727%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16741444d0b%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A36pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16741444d0b%22%3E%3Crect%20width%3D%22727%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22271.4140625%22%20y%3D%22141.5%22%3E727x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E\" data-holder-rendered=\"true\">
    </figure>


    <blockquote class=\"blockquote text-center mt-5\">
        <p class=\"mb-0 h1\">Ma lorem ipsum dove si trova?!</p>
        <footer class=\"blockquote-footer\">Una frase di <cite title=\"Source Title\">A. Bindi</cite></footer>
    </blockquote>

    <hr>

    <div class=\"row\">
        <div class=\"col-md-6\">
            <article>
                <h2>Titolo</h2>
                <h4>Sottotitolo</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet elit accumsan, fermentum nibh a, molestie ligula. Aliquam a lectus fringilla, vulputate nulla ac, commodo odio. Quisque iaculis nisi nisi, ut scelerisque erat ultrices in. Phasellus magna elit, consectetur a rutrum at, pellentesque nec libero. Ut cursus augue id lacus tincidunt molestie. Cras sagittis mollis enim, ac cursus arcu tincidunt et. Praesent egestas ut massa nec mattis. Suspendisse potenti. Nulla sodales elit sit amet justo tristique luctus. Morbi scelerisque arcu sit amet interdum consectetur.
                </p>
                <footer class=\"blockquote-footer\">Lorem ipsum</footer>
            </article>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "pages/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 4,  44 => 3,  34 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block content %}

    <figure>
        <img data-src=\"holder.js/100px250\" class=\"img-fluid\" alt=\"100%x250\" style=\"height: 250px; width: 100%; display: block;\" src=\"data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22727%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20727%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16741444d0b%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A36pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16741444d0b%22%3E%3Crect%20width%3D%22727%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22271.4140625%22%20y%3D%22141.5%22%3E727x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E\" data-holder-rendered=\"true\">
    </figure>


    <blockquote class=\"blockquote text-center mt-5\">
        <p class=\"mb-0 h1\">Ma lorem ipsum dove si trova?!</p>
        <footer class=\"blockquote-footer\">Una frase di <cite title=\"Source Title\">A. Bindi</cite></footer>
    </blockquote>

    <hr>

    <div class=\"row\">
        <div class=\"col-md-6\">
            <article>
                <h2>Titolo</h2>
                <h4>Sottotitolo</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet elit accumsan, fermentum nibh a, molestie ligula. Aliquam a lectus fringilla, vulputate nulla ac, commodo odio. Quisque iaculis nisi nisi, ut scelerisque erat ultrices in. Phasellus magna elit, consectetur a rutrum at, pellentesque nec libero. Ut cursus augue id lacus tincidunt molestie. Cras sagittis mollis enim, ac cursus arcu tincidunt et. Praesent egestas ut massa nec mattis. Suspendisse potenti. Nulla sodales elit sit amet justo tristique luctus. Morbi scelerisque arcu sit amet interdum consectetur.
                </p>
                <footer class=\"blockquote-footer\">Lorem ipsum</footer>
            </article>
        </div>
    </div>
{% endblock %}", "pages/home.twig", "/var/www/html/frontend/standard/template/pages/home.twig");
    }
}
