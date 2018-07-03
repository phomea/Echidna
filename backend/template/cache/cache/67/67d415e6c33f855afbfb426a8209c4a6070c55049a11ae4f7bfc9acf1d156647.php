<?php

/* main/widgets/views/widget_card.twig */
class __TwigTemplate_af7ef4d66a599a5299bce42cdcd26e6467f26c4c8c0460714a35b8ce6ef982fa extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("main/widgets/views/widget_base.twig", "main/widgets/views/widget_card.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main/widgets/views/widget_base.twig";
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
        <div class=\"card text-white bg-flat-color-";
        // line 4
        echo twig_escape_filter($this->env, ($context["color"] ?? null), "html", null, true);
        echo "\">
            <div class=\"card-body pb-0\">
                <div class=\"dropdown float-right\">
                    <button class=\"btn bg-transparent dropdown-toggle theme-toggle text-light\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\">
                        <i class=\"fa fa-cog\"></i>
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                        <div class=\"dropdown-menu-content\">
                            ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["actions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 13
            echo "                                <a class=\"dropdown-item\" href=\"#\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["action"], "label", array()), "html", null, true);
            echo "</a>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "                            <!--
                            <a class=\"dropdown-item\" href=\"#\">Action</a>
                            <a class=\"dropdown-item\" href=\"#\">Another action</a>
                            <a class=\"dropdown-item\" href=\"#\">Something else here</a>-->
                        </div>
                    </div>
                </div>
                <h4 class=\"mb-0\">
                    <span class=\"count\">";
        // line 23
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "</span>
                </h4>
                <p class=\"text-light\">";
        // line 25
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "</p>


                <div class=\"chart-wrapper px-0\" style=\"height:70px;\" height=\"70\">
                    <canvas id=\"widgetChart1\"></canvas>
                </div>

            </div>

        </div>
    ";
    }

    public function getTemplateName()
    {
        return "main/widgets/views/widget_card.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 25,  72 => 23,  62 => 15,  53 => 13,  49 => 12,  38 => 4,  35 => 3,  32 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source(" {% extends \"main/widgets/views/widget_base.twig\" %}
    {% block content %}

        <div class=\"card text-white bg-flat-color-{{ color }}\">
            <div class=\"card-body pb-0\">
                <div class=\"dropdown float-right\">
                    <button class=\"btn bg-transparent dropdown-toggle theme-toggle text-light\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\">
                        <i class=\"fa fa-cog\"></i>
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                        <div class=\"dropdown-menu-content\">
                            {% for action in actions %}
                                <a class=\"dropdown-item\" href=\"#\">{{ action.label }}</a>
                            {% endfor %}
                            <!--
                            <a class=\"dropdown-item\" href=\"#\">Action</a>
                            <a class=\"dropdown-item\" href=\"#\">Another action</a>
                            <a class=\"dropdown-item\" href=\"#\">Something else here</a>-->
                        </div>
                    </div>
                </div>
                <h4 class=\"mb-0\">
                    <span class=\"count\">{{ value }}</span>
                </h4>
                <p class=\"text-light\">{{ label }}</p>


                <div class=\"chart-wrapper px-0\" style=\"height:70px;\" height=\"70\">
                    <canvas id=\"widgetChart1\"></canvas>
                </div>

            </div>

        </div>
    {% endblock %}

", "main/widgets/views/widget_card.twig", "/Users/phomea/Siti/Echidna2/applications/main/widgets/views/widget_card.twig");
    }
}
