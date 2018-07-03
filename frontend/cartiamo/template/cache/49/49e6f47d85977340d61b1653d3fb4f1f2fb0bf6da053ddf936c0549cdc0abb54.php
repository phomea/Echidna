<?php

/* pagine/home.twig */
class __TwigTemplate_6952816be4c7f168245aba6dd31868bc8d75cc8815aa58334c481c51aea4ed02 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base/template.twig", "pagine/home.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base/template.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "


    ";
        // line 6
        $this->loadTemplate("parti/slider.twig", "pagine/home.twig", 6)->display($context);
        // line 7
        echo "
    <!--
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-8\">
            <img src=\"/media/livegennaio.jpg\">
            <article>
                <figure>

                </figure>
                <h2>asd</h2>
            </article>
        </div>
        <div class=\"col-md-4 text-center\">


            ";
        // line 23
        $this->loadTemplate("blocchi/dove-trovarmi.twig", "pagine/home.twig", 23)->display($context);
        // line 24
        echo "            <br>
            <h2>Prossime date</h2>
            <a href=\"http://www.songkick.com/artists/9381919\" class=\"songkick-widget\" data-theme=\"light\" data-track-button=\"on\" data-detect-style=\"true\" data-background-color=\"transparent\"></a>
            <script src=\"//widget.songkick.com/widget.js\"></script>
        </div>
    </div>

</div>
-->


    <div class=\"container\">
        ";
        // line 36
        echo twig_get_attribute($this->env, $this->source, ($context["pagina"] ?? null), "content", array());
        echo "
    </div>

    ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pagina"] ?? null), "hooks", array()), "contenutoCentrale", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 40
            echo "        ";
            echo $context["hook"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "
    <div class=\"hh2 bg-dot \"></div>
    <div class=\"bg1\">

    ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pagina"] ?? null), "hooks", array()), "spazioCarousel", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 47
            echo "        ";
            echo $context["hook"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "
    ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pagina"] ?? null), "hooks", array()), "prefooter", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 51
            echo "        ";
            echo $context["hook"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "
";
    }

    public function getTemplateName()
    {
        return "pagine/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 53,  121 => 51,  117 => 50,  114 => 49,  105 => 47,  101 => 46,  95 => 42,  86 => 40,  82 => 39,  76 => 36,  62 => 24,  60 => 23,  42 => 7,  40 => 6,  35 => 3,  32 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base/template.twig\" %}
{% block content %}



    {% include 'parti/slider.twig' %}

    <!--
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-8\">
            <img src=\"/media/livegennaio.jpg\">
            <article>
                <figure>

                </figure>
                <h2>asd</h2>
            </article>
        </div>
        <div class=\"col-md-4 text-center\">


            {% include \"blocchi/dove-trovarmi.twig\" %}
            <br>
            <h2>Prossime date</h2>
            <a href=\"http://www.songkick.com/artists/9381919\" class=\"songkick-widget\" data-theme=\"light\" data-track-button=\"on\" data-detect-style=\"true\" data-background-color=\"transparent\"></a>
            <script src=\"//widget.songkick.com/widget.js\"></script>
        </div>
    </div>

</div>
-->


    <div class=\"container\">
        {{ pagina.content | raw}}
    </div>

    {% for hook in pagina.hooks.contenutoCentrale %}
        {{ hook | raw }}
    {% endfor  %}

    <div class=\"hh2 bg-dot \"></div>
    <div class=\"bg1\">

    {% for hook in pagina.hooks.spazioCarousel %}
        {{ hook | raw }}
    {% endfor  %}

    {% for hook in pagina.hooks.prefooter %}
        {{ hook | raw }}
    {% endfor  %}

{% endblock %}", "pagine/home.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/pagine/home.twig");
    }
}
