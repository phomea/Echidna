<?php

/* parts/left-panel.twig */
class __TwigTemplate_81401b1a1f51a91758206e9efe46d8f360d7ba2c360078570bb33003793ca56f extends Twig_Template
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
<!-- Left Panel -->

<aside id=\"left-panel\" class=\"left-panel\">
    <nav class=\"navbar navbar-expand-sm navbar-default\">

        <div class=\"navbar-header\">
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#main-menu\" aria-controls=\"main-menu\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <i class=\"fa fa-bars\"></i>
            </button>
            <a class=\"navbar-brand\" href=\"./\"><img src=\"/backend/assets/img/echidna.png\" alt=\"Logo\"></a>
            <a class=\"navbar-brand hidden\" href=\"./\"><img src=\"/backend/assets/img/echidna.png\" alt=\"Logo\"></a>
        </div>


        <div id=\"main-menu\" class=\"main-menu collapse navbar-collapse\">



            <ul class=\"nav navbar-nav\">
                <li class=\"active\">
                    <a href=\"index.html\"> <i class=\"menu-icon fa fa-dashboard\"></i>Dashboard </a>
                </li>
                <h3 class=\"menu-title\">Gestione contenuti</h3>

                ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "gestionecontenuti", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 27
            echo "

                    <li class=\"menu-item-has-children dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-laptop\"></i>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "label", array()), "html", null, true);
            echo "</a>
                        ";
            // line 31
            if (twig_get_attribute($this->env, $this->source, $context["m"], "children", array())) {
                // line 32
                echo "                        <ul class=\"sub-menu children dropdown-menu\">
                            ";
                // line 33
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["m"], "children", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["children"]) {
                    // line 34
                    echo "                                <li><a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["children"], "href", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["children"], "label", array()), "html", null, true);
                    echo "</a></li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "
                        </ul>
                        ";
            }
            // line 39
            echo "                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "
                <!--<li class=\"active\">
                    <a href=\"index.html\"> <i class=\"menu-icon fa fa-dashboard\"></i>Dashboard </a>
                </li>
                <h3 class=\"menu-title\">UI elements</h3>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-laptop\"></i>Components</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"fa fa-puzzle-piece\"></i><a href=\"ui-buttons.html\">Buttons</a></li>
                        <li><i class=\"fa fa-id-badge\"></i><a href=\"ui-badges.html\">Badges</a></li>
                        <li><i class=\"fa fa-bars\"></i><a href=\"ui-tabs.html\">Tabs</a></li>
                        <li><i class=\"fa fa-share-square-o\"></i><a href=\"ui-social-buttons.html\">Social Buttons</a></li>
                        <li><i class=\"fa fa-id-card-o\"></i><a href=\"ui-cards.html\">Cards</a></li>
                        <li><i class=\"fa fa-exclamation-triangle\"></i><a href=\"ui-alerts.html\">Alerts</a></li>
                        <li><i class=\"fa fa-spinner\"></i><a href=\"ui-progressbar.html\">Progress Bars</a></li>
                        <li><i class=\"fa fa-fire\"></i><a href=\"ui-modals.html\">Modals</a></li>
                        <li><i class=\"fa fa-book\"></i><a href=\"ui-switches.html\">Switches</a></li>
                        <li><i class=\"fa fa-th\"></i><a href=\"ui-grids.html\">Grids</a></li>
                        <li><i class=\"fa fa-file-word-o\"></i><a href=\"ui-typgraphy.html\">Typography</a></li>
                    </ul>
                </li>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-table\"></i>Tables</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"fa fa-table\"></i><a href=\"tables-basic.html\">Basic Table</a></li>
                        <li><i class=\"fa fa-table\"></i><a href=\"tables-data.html\">Data Table</a></li>
                    </ul>
                </li>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-th\"></i>Forms</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-th\"></i><a href=\"forms-basic.html\">Basic Form</a></li>
                        <li><i class=\"menu-icon fa fa-th\"></i><a href=\"forms-advanced.html\">Advanced Form</a></li>
                    </ul>
                </li>

                <h3 class=\"menu-title\">Icons</h3>

                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-tasks\"></i>Icons</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-fort-awesome\"></i><a href=\"font-fontawesome.html\">Font Awesome</a></li>
                        <li><i class=\"menu-icon ti-themify-logo\"></i><a href=\"font-themify.html\">Themefy Icons</a></li>
                    </ul>
                </li>
                <li>
                    <a href=\"widgets.html\"> <i class=\"menu-icon ti-email\"></i>Widgets </a>
                </li>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-bar-chart\"></i>Charts</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-line-chart\"></i><a href=\"charts-chartjs.html\">Chart JS</a></li>
                        <li><i class=\"menu-icon fa fa-area-chart\"></i><a href=\"charts-flot.html\">Flot Chart</a></li>
                        <li><i class=\"menu-icon fa fa-pie-chart\"></i><a href=\"charts-peity.html\">Peity Chart</a></li>
                    </ul>
                </li>

                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-area-chart\"></i>Maps</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-map-o\"></i><a href=\"maps-gmap.html\">Google Maps</a></li>
                        <li><i class=\"menu-icon fa fa-street-view\"></i><a href=\"maps-vector.html\">Vector Maps</a></li>
                    </ul>
                </li>
                <h3 class=\"menu-title\">Extras</h3><
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-glass\"></i>Pages</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-sign-in\"></i><a href=\"page-login.html\">Login</a></li>
                        <li><i class=\"menu-icon fa fa-sign-in\"></i><a href=\"page-register.html\">Register</a></li>
                        <li><i class=\"menu-icon fa fa-paper-plane\"></i><a href=\"pages-forget.html\">Forget Pass</a></li>
                    </ul>
                </li>-->
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->";
    }

    public function getTemplateName()
    {
        return "parts/left-panel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 41,  88 => 39,  83 => 36,  72 => 34,  68 => 33,  65 => 32,  63 => 31,  59 => 30,  54 => 27,  50 => 26,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<!-- Left Panel -->

<aside id=\"left-panel\" class=\"left-panel\">
    <nav class=\"navbar navbar-expand-sm navbar-default\">

        <div class=\"navbar-header\">
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#main-menu\" aria-controls=\"main-menu\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <i class=\"fa fa-bars\"></i>
            </button>
            <a class=\"navbar-brand\" href=\"./\"><img src=\"/backend/assets/img/echidna.png\" alt=\"Logo\"></a>
            <a class=\"navbar-brand hidden\" href=\"./\"><img src=\"/backend/assets/img/echidna.png\" alt=\"Logo\"></a>
        </div>


        <div id=\"main-menu\" class=\"main-menu collapse navbar-collapse\">



            <ul class=\"nav navbar-nav\">
                <li class=\"active\">
                    <a href=\"index.html\"> <i class=\"menu-icon fa fa-dashboard\"></i>Dashboard </a>
                </li>
                <h3 class=\"menu-title\">Gestione contenuti</h3>

                {% for m in menu.gestionecontenuti %}


                    <li class=\"menu-item-has-children dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-laptop\"></i>{{ m.label }}</a>
                        {% if m.children %}
                        <ul class=\"sub-menu children dropdown-menu\">
                            {% for children in m.children %}
                                <li><a href=\"{{ children.href }}\">{{ children.label }}</a></li>
                            {% endfor %}

                        </ul>
                        {% endif %}
                    </li>
                {% endfor %}

                <!--<li class=\"active\">
                    <a href=\"index.html\"> <i class=\"menu-icon fa fa-dashboard\"></i>Dashboard </a>
                </li>
                <h3 class=\"menu-title\">UI elements</h3>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-laptop\"></i>Components</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"fa fa-puzzle-piece\"></i><a href=\"ui-buttons.html\">Buttons</a></li>
                        <li><i class=\"fa fa-id-badge\"></i><a href=\"ui-badges.html\">Badges</a></li>
                        <li><i class=\"fa fa-bars\"></i><a href=\"ui-tabs.html\">Tabs</a></li>
                        <li><i class=\"fa fa-share-square-o\"></i><a href=\"ui-social-buttons.html\">Social Buttons</a></li>
                        <li><i class=\"fa fa-id-card-o\"></i><a href=\"ui-cards.html\">Cards</a></li>
                        <li><i class=\"fa fa-exclamation-triangle\"></i><a href=\"ui-alerts.html\">Alerts</a></li>
                        <li><i class=\"fa fa-spinner\"></i><a href=\"ui-progressbar.html\">Progress Bars</a></li>
                        <li><i class=\"fa fa-fire\"></i><a href=\"ui-modals.html\">Modals</a></li>
                        <li><i class=\"fa fa-book\"></i><a href=\"ui-switches.html\">Switches</a></li>
                        <li><i class=\"fa fa-th\"></i><a href=\"ui-grids.html\">Grids</a></li>
                        <li><i class=\"fa fa-file-word-o\"></i><a href=\"ui-typgraphy.html\">Typography</a></li>
                    </ul>
                </li>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-table\"></i>Tables</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"fa fa-table\"></i><a href=\"tables-basic.html\">Basic Table</a></li>
                        <li><i class=\"fa fa-table\"></i><a href=\"tables-data.html\">Data Table</a></li>
                    </ul>
                </li>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-th\"></i>Forms</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-th\"></i><a href=\"forms-basic.html\">Basic Form</a></li>
                        <li><i class=\"menu-icon fa fa-th\"></i><a href=\"forms-advanced.html\">Advanced Form</a></li>
                    </ul>
                </li>

                <h3 class=\"menu-title\">Icons</h3>

                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-tasks\"></i>Icons</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-fort-awesome\"></i><a href=\"font-fontawesome.html\">Font Awesome</a></li>
                        <li><i class=\"menu-icon ti-themify-logo\"></i><a href=\"font-themify.html\">Themefy Icons</a></li>
                    </ul>
                </li>
                <li>
                    <a href=\"widgets.html\"> <i class=\"menu-icon ti-email\"></i>Widgets </a>
                </li>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-bar-chart\"></i>Charts</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-line-chart\"></i><a href=\"charts-chartjs.html\">Chart JS</a></li>
                        <li><i class=\"menu-icon fa fa-area-chart\"></i><a href=\"charts-flot.html\">Flot Chart</a></li>
                        <li><i class=\"menu-icon fa fa-pie-chart\"></i><a href=\"charts-peity.html\">Peity Chart</a></li>
                    </ul>
                </li>

                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-area-chart\"></i>Maps</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-map-o\"></i><a href=\"maps-gmap.html\">Google Maps</a></li>
                        <li><i class=\"menu-icon fa fa-street-view\"></i><a href=\"maps-vector.html\">Vector Maps</a></li>
                    </ul>
                </li>
                <h3 class=\"menu-title\">Extras</h3><
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-glass\"></i>Pages</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-sign-in\"></i><a href=\"page-login.html\">Login</a></li>
                        <li><i class=\"menu-icon fa fa-sign-in\"></i><a href=\"page-register.html\">Register</a></li>
                        <li><i class=\"menu-icon fa fa-paper-plane\"></i><a href=\"pages-forget.html\">Forget Pass</a></li>
                    </ul>
                </li>-->
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->", "parts/left-panel.twig", "/Users/phomea/Siti/Spagnesi/backend/template/parts/left-panel.twig");
    }
}
