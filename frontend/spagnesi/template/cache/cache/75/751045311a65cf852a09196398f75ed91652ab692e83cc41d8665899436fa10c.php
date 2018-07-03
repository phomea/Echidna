<?php

/* contenuti/gallery-5-img.twig */
class __TwigTemplate_cce151e9839a0090645ba15c8371e621d76bd0477fea57216fe4e029a1301918 extends Twig_Template
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
<div class=\"products-nospace-outer gallery\">
    <div class=\"products-nospace products-isotope\">


        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["contenuto"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 7
            echo "
            <div class=\"product-preview category1\">
                <img src=\"";
            // line 9
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" alt=\"\">
                <div class=\"hover\">
                    <div class=\"inside\">
                        <h3 class=\"title\"><a href=\"/shop/matrimoni\">Lasciati ispirare per il tuo matrimonio</a></h3>

                    </div>

                </div>
            </div>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "contenuti/gallery-5-img.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 20,  38 => 9,  34 => 7,  30 => 6,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<div class=\"products-nospace-outer gallery\">
    <div class=\"products-nospace products-isotope\">


        {% for value in contenuto %}

            <div class=\"product-preview category1\">
                <img src=\"{{ value }}\" alt=\"\">
                <div class=\"hover\">
                    <div class=\"inside\">
                        <h3 class=\"title\"><a href=\"/shop/matrimoni\">Lasciati ispirare per il tuo matrimonio</a></h3>

                    </div>

                </div>
            </div>

        {% endfor %}
    </div>
</div>
", "contenuti/gallery-5-img.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/contenuti/gallery-5-img.twig");
    }
}
