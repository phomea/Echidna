<?php

/* parti/shop/product-thumb.twig */
class __TwigTemplate_edea71cc11afad1c174a7cb9d2befd293d861e11ac99fad4b37fe16027303734 extends Twig_Template
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
";
        // line 2
        $context["img"] = "/assets/img/noimg.png";
        // line 3
        echo "
";
        // line 4
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "featured_image", array()), "base_url", array())) {
            // line 5
            echo "    ";
            $context["img"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "featured_image", array()), "base_url", array());
        } elseif ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source,         // line 6
($context["prodotto"] ?? null), "images", array())) > 0)) {
            // line 7
            echo "    ";
            $context["img"] = twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "images", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null), "base_url", array());
            // line 8
            echo "
    ";
            // line 9
            if ((($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "images", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[1] ?? null) : null)) {
                // line 10
                echo "        ";
                $context["img2"] = twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "images", array())) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[1] ?? null) : null), "base_url", array());
                // line 11
                echo "    ";
            }
        }
        // line 13
        echo "

<div class=\"product-preview-outer\" itemscope itemtype=\"http://schema.org/Product\">
    <div class=\"product-preview\">
        <div class=\"preview\">
            <div class=\"preview-image-outer\">
                <a href=\"/";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "slug", array()), "html", null, true);
        echo "\" class=\"preview-image\">
                    <img itemprop=\"image\" class=\"img-responsive img-default\"  alt=\"Partecipazione ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "name", array()), "html", null, true);
        echo "\" src=\"";
        echo twig_escape_filter($this->env, ($context["img"] ?? null), "html", null, true);
        echo "?w=300&fm=jpg&q=60\" alt=\"\">
                    <img class=\"img-responsive img-second\" alt=\"";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "description", array()), "html", null, true);
        echo "\" src=\"";
        echo twig_escape_filter($this->env, ($context["img2"] ?? null), "html", null, true);
        echo "?w=300&fm=jpg&q=60\" alt=\"\"></a>
            </div>
        </div>
        <h3 class=\"title\"><a href=\"/";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "slug", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "name", array()), "html", null, true);
        echo "</a></h3>

        <meta itemprop=\"name\" content=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "name", array()), "html", null, true);
        echo "\"/>
        <meta itemprop=\"brand\" content=\"Cartiamo\"/>



        <span class=\"price\" itemprop=\"offers\" itemscope itemtype=\"http://schema.org/Offer\">
             <meta itemprop=\"priceCurrency\" content=\"EUR\" />
             <span itemprop=\"price\">";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "price", array()), "compare_at_amount", array()), "html", null, true);
        echo "</span>€
             <link itemprop=\"availability\" href=\"http://schema.org/InStock\"/>
          </span>
        <div class=\"info\">
            <p itemprop=\"description\">";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prodotto"] ?? null), "description", array()), "html", null, true);
        echo "</p>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "parti/shop/product-thumb.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 37,  96 => 33,  86 => 26,  79 => 24,  71 => 21,  65 => 20,  61 => 19,  53 => 13,  49 => 11,  46 => 10,  44 => 9,  41 => 8,  38 => 7,  36 => 6,  33 => 5,  31 => 4,  28 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% set img = '/assets/img/noimg.png' %}

{% if prodotto.featured_image.base_url %}
    {% set img = prodotto.featured_image.base_url %}
{% elseif prodotto.images|length > 0 %}
    {% set img = prodotto.images[0].base_url %}

    {% if prodotto.images[1] %}
        {% set img2 = prodotto.images[1].base_url %}
    {% endif %}
{% endif %}


<div class=\"product-preview-outer\" itemscope itemtype=\"http://schema.org/Product\">
    <div class=\"product-preview\">
        <div class=\"preview\">
            <div class=\"preview-image-outer\">
                <a href=\"/{{ prodotto.slug }}\" class=\"preview-image\">
                    <img itemprop=\"image\" class=\"img-responsive img-default\"  alt=\"Partecipazione {{ prodotto.name }}\" src=\"{{ img }}?w=300&fm=jpg&q=60\" alt=\"\">
                    <img class=\"img-responsive img-second\" alt=\"{{ prodotto.description }}\" src=\"{{ img2 }}?w=300&fm=jpg&q=60\" alt=\"\"></a>
            </div>
        </div>
        <h3 class=\"title\"><a href=\"/{{ prodotto.slug }}\">{{ prodotto.name }}</a></h3>

        <meta itemprop=\"name\" content=\"{{ prodotto.name }}\"/>
        <meta itemprop=\"brand\" content=\"Cartiamo\"/>



        <span class=\"price\" itemprop=\"offers\" itemscope itemtype=\"http://schema.org/Offer\">
             <meta itemprop=\"priceCurrency\" content=\"EUR\" />
             <span itemprop=\"price\">{{ prodotto.price.compare_at_amount }}</span>€
             <link itemprop=\"availability\" href=\"http://schema.org/InStock\"/>
          </span>
        <div class=\"info\">
            <p itemprop=\"description\">{{ prodotto.description }}</p>
        </div>
    </div>
</div>
", "parti/shop/product-thumb.twig", "/Users/phomea/Siti/Echidna2/frontend/cartiamo/template/parti/shop/product-thumb.twig");
    }
}
