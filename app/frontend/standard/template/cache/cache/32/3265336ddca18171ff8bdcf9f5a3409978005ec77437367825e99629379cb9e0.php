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

/* base.twig */
class __TwigTemplate_7f277f2dec50119fe13cb723fda1889a0901ac323ac07a704a49e8ca018a5b72 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"it\">
<head>

    <meta charset=\"utf-8\" />
    <title>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["meta"] ?? null), "title", []), "html", null, true);
        echo "</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["meta"] ?? null), "description", []), "html", null, true);
        echo "\">


    <meta property=\"og:url\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["current_url"] ?? null), "html", null, true);
        echo "\" />
    <meta property=\"og:type\" content=\"article\" />
    <meta property=\"og:title\" content=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["meta"] ?? null), "title", []), "html", null, true);
        echo "\" />
    <meta property=\"og:description\" content=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["meta"] ?? null), "description", []), "html", null, true);
        echo "\" />
    <meta property=\"og:image\" content=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["meta"] ?? null), "og_image", []), "html", null, true);
        echo "\" />
    <meta property=\"og:site_name\" content=\"DivaniLab\" />


    <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"/apple-icon-57x57.png\">
    <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"/apple-icon-60x60.png\">
    <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"/apple-icon-72x72.png\">
    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"/apple-icon-76x76.png\">
    <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"/apple-icon-114x114.png\">
    <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"/apple-icon-120x120.png\">
    <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"/apple-icon-144x144.png\">
    <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"/apple-icon-152x152.png\">
    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-icon-180x180.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"/android-icon-192x192.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"/favicon-96x96.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"/favicon-16x16.png\">
    <link rel=\"manifest\" href=\"/manifest.json\">
    <meta name=\"msapplication-TileColor\" content=\"#ffffff\">
    <meta name=\"msapplication-TileImage\" content=\"/ms-icon-144x144.png\">
    <meta name=\"theme-color\" content=\"#ffffff\">


    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.13/css/all.css\" integrity=\"sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp\" crossorigin=\"anonymous\">
    <link href=\"https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/style.css\">




    <base href=\"/\">

    ";
        // line 49
        if ((($context["host"] ?? null) != "localhost")) {
            // line 50
            echo "        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-127792077-1\"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-127792077-1');
        </script>

    ";
        }
        // line 61
        echo "
</head>

<body>

<header class=\"main-header container ";
        // line 66
        echo twig_escape_filter($this->env, ($context["headerClass"] ?? null), "html", null, true);
        echo "  \">

    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
        <a class=\"navbar-brand\" href=\"#\">Navbar</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
                ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["frontend"] ?? null), "menu", []), "header", []), "items", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 77
            echo "
                    ";
            // line 78
            if (twig_get_attribute($this->env, $this->source, $context["item"], "items", [])) {
                // line 79
                echo "                        <li><a href=\"#\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "nome", []), "html", null, true);
                echo "</a>
                            <ul class=\"submenu\">
                                ";
                // line 81
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["item"], "items", []));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 82
                    echo "                                    <li><a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "link", []), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "label", []), "html", null, true);
                    echo "</a></li>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 84
                echo "
                            </ul>
                        </li>

                    ";
            } else {
                // line 89
                echo "                        <li><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "link", []), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "label", []), "html", null, true);
                echo "</a></li>
                    ";
            }
            // line 91
            echo "

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "            </ul>

        </div>
    </nav>
    <!-- //end Navbar height -->
</header>

<div class=\"container\">
    ";
        // line 102
        $this->displayBlock('content', $context, $blocks);
        // line 104
        echo "</div>
</body>
</html>";
    }

    // line 102
    public function block_content($context, array $blocks = [])
    {
        // line 103
        echo "    ";
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 103,  211 => 102,  205 => 104,  203 => 102,  193 => 94,  185 => 91,  177 => 89,  170 => 84,  159 => 82,  155 => 81,  149 => 79,  147 => 78,  144 => 77,  140 => 76,  127 => 66,  120 => 61,  107 => 50,  105 => 49,  67 => 15,  63 => 14,  59 => 13,  54 => 11,  48 => 8,  43 => 6,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"it\">
<head>

    <meta charset=\"utf-8\" />
    <title>{{ meta.title }}</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"{{ meta.description }}\">


    <meta property=\"og:url\" content=\"{{ current_url }}\" />
    <meta property=\"og:type\" content=\"article\" />
    <meta property=\"og:title\" content=\"{{ meta.title }}\" />
    <meta property=\"og:description\" content=\"{{ meta.description }}\" />
    <meta property=\"og:image\" content=\"{{ host }}{{ meta.og_image }}\" />
    <meta property=\"og:site_name\" content=\"DivaniLab\" />


    <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"/apple-icon-57x57.png\">
    <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"/apple-icon-60x60.png\">
    <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"/apple-icon-72x72.png\">
    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"/apple-icon-76x76.png\">
    <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"/apple-icon-114x114.png\">
    <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"/apple-icon-120x120.png\">
    <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"/apple-icon-144x144.png\">
    <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"/apple-icon-152x152.png\">
    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-icon-180x180.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"/android-icon-192x192.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"/favicon-96x96.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"/favicon-16x16.png\">
    <link rel=\"manifest\" href=\"/manifest.json\">
    <meta name=\"msapplication-TileColor\" content=\"#ffffff\">
    <meta name=\"msapplication-TileImage\" content=\"/ms-icon-144x144.png\">
    <meta name=\"theme-color\" content=\"#ffffff\">


    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.13/css/all.css\" integrity=\"sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp\" crossorigin=\"anonymous\">
    <link href=\"https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/style.css\">




    <base href=\"/\">

    {% if host != \"localhost\" %}
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-127792077-1\"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-127792077-1');
        </script>

    {% endif %}

</head>

<body>

<header class=\"main-header container {{ headerClass }}  \">

    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
        <a class=\"navbar-brand\" href=\"#\">Navbar</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
                {% for item in frontend.menu.header.items %}

                    {% if item.items %}
                        <li><a href=\"#\">{{ item.nome }}</a>
                            <ul class=\"submenu\">
                                {% for item in item.items %}
                                    <li><a href=\"{{ item.link }}\">{{ item.label }}</a></li>
                                {% endfor %}

                            </ul>
                        </li>

                    {% else %}
                        <li><a href=\"{{ item.link }}\">{{ item.label }}</a></li>
                    {% endif %}


                {% endfor %}
            </ul>

        </div>
    </nav>
    <!-- //end Navbar height -->
</header>

<div class=\"container\">
    {% block content %}
    {% endblock %}
</div>
</body>
</html>", "base.twig", "/var/www/html/frontend/standard/template/base.twig");
    }
}
