<?php

/* parti/slider.twig */
class __TwigTemplate_44bf283a2bbd2b8eb3c9a4ed1295a3ccce960973f7172a284228f8c436a32bcb extends Twig_Template
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
        $context["slides"] = twig_get_attribute($this->env, $this->source, ($context["slider"] ?? null), "slides", array());
        // line 2
        echo "
<div class=\"container p-t1\">
    <section id=\"slider\" class=\"slider-home\">
        <div class=\"slider-full owl-carousel owl-theme\">

            ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["slides"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["slide"]) {
            // line 8
            echo "                <div class=\"item\">
                    <a href=\"slide.link\"  title=\"";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["slide"], "link_text", array()), "html", null, true);
            echo "\">
                        ";
            // line 10
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["slide"], "getImmagineMedia", array(), "method"), "render", array(), "method");
            echo "

                        ";
            // line 26
            echo "                    </a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slide'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "
        </div>
    </section>
</div>";
    }

    public function getTemplateName()
    {
        return "parti/slider.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 29,  48 => 26,  43 => 10,  39 => 9,  36 => 8,  32 => 7,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set slides = slider.slides %}

<div class=\"container p-t1\">
    <section id=\"slider\" class=\"slider-home\">
        <div class=\"slider-full owl-carousel owl-theme\">

            {% for slide in slides %}
                <div class=\"item\">
                    <a href=\"slide.link\"  title=\"{{ slide.link_text}}\">
                        {{ slide.getImmagineMedia().render() |raw }}

                        {#
                        <?php
                    if ( Service(Request)->isMobile() ){
                        ?>
                        <img src=\"<?=\$value->media_mobile->permalink?>\" alt=\"<?=\$value->testo?>\">
                        <?php
                    }else{
                        ?>
                        <img src=\"<?=\$value->media->permalink?>\" alt=\"<?=\$value->testo?>\">
                        <?php
                    }
                    ?>

                    #}
                    </a>
                </div>
            {% endfor %}

        </div>
    </section>
</div>", "parti/slider.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/parti/slider.twig");
    }
}
