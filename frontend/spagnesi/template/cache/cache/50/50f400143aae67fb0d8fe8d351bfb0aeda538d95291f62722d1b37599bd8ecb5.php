<?php

/* base/header/menu/mainmenu.twig */
class __TwigTemplate_80721269165fb200dc94f83cba4197ac22ccdfaf120fe903c5071de32ff896bb extends Twig_Template
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
        $context["matrimoni"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clmanager"] ?? null), "catalog", array()), "matrimoni", array());
        // line 2
        echo "
<div class=\"navbar-main-menu-outer\">
    <div class=\"container\">

        <div class=\"row\">

            <div class=\"col\">
                <div class=\"navbar-main-menu\">


                    <dt class=\"item\" class=\"hidden-xs\"><a href=\"/\" class=\"btn-main\"><span
                                    class=\"fas fa-home\"></span></a></dt>
                    <dd class=\"hidden-xs\">

                    </dd>

                    <div class=\"item\">
                        <a href=\"/shop/matrimoni\" class=\"btn-main line\">Matrimonio</a>
                        <dd class=\"item-content\">


                            <div class=\"navbar-main-submenu\">
                                <div class=\"container\">
                                    <div class=\"row\">
                                        <!-- caregories -->
                                        <div class=\"col-sm-12 col-md-12\">
                                            <div class=\"row\">


                                                <div class=\"col-xs-6 col-md-4 col-lg-3\">

                                                    ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["matrimoni"] ?? null), "children", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["categoria"]) {
            // line 34
            echo "                                                    <div class=\"submenu-block\">
                                                        <!--<span class=\"icon\"><img src=\"images/icon-category1.png\" alt=\"\"></span>-->

                                                        <a class=\"name\"
                                                           href=\"";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clmanager"] ?? null), "catalog", array()), "getCategoryLink", array(0 => $context["categoria"]), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categoria"], "name", array()), "html", null, true);
            echo "</a>


                                                        <p><a  href=\"";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clmanager"] ?? null), "catalog", array()), "getCategoryLink", array(0 => $context["categoria"]), "method"), "html", null, true);
            echo "\">sadasdas asd dsa as</a></p>
                                                        ";
            // line 64
            echo "                                                    </div>


                                                    ";
            // line 67
            if ((((twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) % 2) == 0) && (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) != 0))) {
                // line 68
                echo "                                                </div>
                                                <div class=\"col-xs-6 col-md-4 col-lg-3\">
                                                    ";
            }
            // line 71
            echo "                                                    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categoria'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "
                                                </div>

                                            </div>
                                        </div>
                                        <!-- //end caregories -->
                                        <!-- html block -->
                                        <div class=\"col-md-3 hidden-sm hidden-xs\">
                                            <div class=\"img-fullheight\">
                                                <!--<img class=\"img-responsive\" src=\"images/menu/matrimoni.png\" style=\"opacity:0.2\"
                                                     alt=\"\">-->
                                            </div>
                                        </div>
                                        <!-- //end html block -->
                                    </div>


                                    <div class=\"row col-divider\">


                                        <div class=\"col\">
                                            <h5>ORGANIZZARE IL MATRIMONIO PERFETTO</h5>
                                            <p>
                                                Nicola Santini , giornalista esperto di bon ton e autore di “ domani mi sposo ! Manuale
                                                completo per un matrimonio “ ha indicato , all’interno del suo decalogo di comportamento ,
                                                l’utilizzo categorico delle care vecchie partecipazioni cartacee , le quali devono
                                                rigorosamente essere spedite , come da tradizione , via posta . assolutamente out inviarle
                                                via mail o tramite sms
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>




                        </dd>
                    </div>

                    <div class=\"item\"><a href=\"/shop/comunioni\" class=\"btn-main\"> Comunioni</a></div>


                    <div class=\"item\"><a href=\"/shop/natale\" class=\"btn-main\"> Natale</a></div>


                    <div class=\"item\"><a href=\"/collaborazione-save-the-children\" class=\"btn-main\"> Save the children</a></div>

                    <div class=\"item\"><a href=\"/faq\" class=\"btn-main\"> FAQ</a></div>


                    <div class=\"item\"><a href=\"/contatti\" class=\"btn-main\"> Contatti</a></div>


                    <div class=\"item\"><a href=\"<?= \\echidna\\entities\\Blog::getBaseUrl() ?>\" class=\"btn-main\"> Blog</a></div>



                    <!--<dt class=\"item\"><a href=\"/campione-gratuito\" class=\"btn-cool\"><span class=\"icon flaticon-gift1\"></span> Campioni omaggio</a></dt>
                    <dd></dd>-->

                </div>
            </div>

            <div class=\"col-2 top-icons\">

                <a href=\"#\" class=\"btn btn-xs btn-default btn-search\" data-toggle=\"dropdown\">
                    <span class=\"fas fa-search\"></span>
                </a>



                <a href=\"/carrello\" class=\"btn btn-xs btn-default btn-shopping-cart\"><span class=\"fas fa-shopping-cart\"></span></a>




                <a href=\"/campione-gratuito\" class=\"btn btn-xs btn-default btn-gift\">

                    <span class=\"fas fa-gift\"></span>
                </a>

            </div>

        </div>





    </div>
</div>



";
    }

    public function getTemplateName()
    {
        return "base/header/menu/mainmenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 72,  105 => 71,  100 => 68,  98 => 67,  93 => 64,  89 => 41,  81 => 38,  75 => 34,  58 => 33,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set matrimoni = clmanager.catalog.matrimoni %}

<div class=\"navbar-main-menu-outer\">
    <div class=\"container\">

        <div class=\"row\">

            <div class=\"col\">
                <div class=\"navbar-main-menu\">


                    <dt class=\"item\" class=\"hidden-xs\"><a href=\"/\" class=\"btn-main\"><span
                                    class=\"fas fa-home\"></span></a></dt>
                    <dd class=\"hidden-xs\">

                    </dd>

                    <div class=\"item\">
                        <a href=\"/shop/matrimoni\" class=\"btn-main line\">Matrimonio</a>
                        <dd class=\"item-content\">


                            <div class=\"navbar-main-submenu\">
                                <div class=\"container\">
                                    <div class=\"row\">
                                        <!-- caregories -->
                                        <div class=\"col-sm-12 col-md-12\">
                                            <div class=\"row\">


                                                <div class=\"col-xs-6 col-md-4 col-lg-3\">

                                                    {% for categoria in matrimoni.children %}
                                                    <div class=\"submenu-block\">
                                                        <!--<span class=\"icon\"><img src=\"images/icon-category1.png\" alt=\"\"></span>-->

                                                        <a class=\"name\"
                                                           href=\"{{ clmanager.catalog.getCategoryLink(categoria) }}\">{{ categoria.name }}</a>


                                                        <p><a  href=\"{{ clmanager.catalog.getCategoryLink(categoria)}}\">sadasdas asd dsa as</a></p>
                                                        {#
                                                        <?php
                                                        \$c = CLCategoria::findByNomemacchina(\$key);


                                                        if (\$c && count(\$c) > 0) {


                                                        ?>
                                                        <p>
                                                            <a href=\"<?= CLCatalog::getCategoryLink(\$value) ?>\"><?= \$c[0]->descrizione_breve ?></a>
                                                        </p>
                                                        <?php
                                                        } else {
                                                            ?>
                                                        <p>
                                                            <a href=\"<?= CLCatalog::getCategoryLink(\$value) ?>\">Categoria <?= \$value['name'] ?></a>
                                                        </p>
                                                        <?php
                                                        }
                                                        ?>
                                                        #}
                                                    </div>


                                                    {% if loop.index % 2 == 0 and loop.index != 0 %}
                                                </div>
                                                <div class=\"col-xs-6 col-md-4 col-lg-3\">
                                                    {% endif %}
                                                    {% endfor %}

                                                </div>

                                            </div>
                                        </div>
                                        <!-- //end caregories -->
                                        <!-- html block -->
                                        <div class=\"col-md-3 hidden-sm hidden-xs\">
                                            <div class=\"img-fullheight\">
                                                <!--<img class=\"img-responsive\" src=\"images/menu/matrimoni.png\" style=\"opacity:0.2\"
                                                     alt=\"\">-->
                                            </div>
                                        </div>
                                        <!-- //end html block -->
                                    </div>


                                    <div class=\"row col-divider\">


                                        <div class=\"col\">
                                            <h5>ORGANIZZARE IL MATRIMONIO PERFETTO</h5>
                                            <p>
                                                Nicola Santini , giornalista esperto di bon ton e autore di “ domani mi sposo ! Manuale
                                                completo per un matrimonio “ ha indicato , all’interno del suo decalogo di comportamento ,
                                                l’utilizzo categorico delle care vecchie partecipazioni cartacee , le quali devono
                                                rigorosamente essere spedite , come da tradizione , via posta . assolutamente out inviarle
                                                via mail o tramite sms
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>




                        </dd>
                    </div>

                    <div class=\"item\"><a href=\"/shop/comunioni\" class=\"btn-main\"> Comunioni</a></div>


                    <div class=\"item\"><a href=\"/shop/natale\" class=\"btn-main\"> Natale</a></div>


                    <div class=\"item\"><a href=\"/collaborazione-save-the-children\" class=\"btn-main\"> Save the children</a></div>

                    <div class=\"item\"><a href=\"/faq\" class=\"btn-main\"> FAQ</a></div>


                    <div class=\"item\"><a href=\"/contatti\" class=\"btn-main\"> Contatti</a></div>


                    <div class=\"item\"><a href=\"<?= \\echidna\\entities\\Blog::getBaseUrl() ?>\" class=\"btn-main\"> Blog</a></div>



                    <!--<dt class=\"item\"><a href=\"/campione-gratuito\" class=\"btn-cool\"><span class=\"icon flaticon-gift1\"></span> Campioni omaggio</a></dt>
                    <dd></dd>-->

                </div>
            </div>

            <div class=\"col-2 top-icons\">

                <a href=\"#\" class=\"btn btn-xs btn-default btn-search\" data-toggle=\"dropdown\">
                    <span class=\"fas fa-search\"></span>
                </a>



                <a href=\"/carrello\" class=\"btn btn-xs btn-default btn-shopping-cart\"><span class=\"fas fa-shopping-cart\"></span></a>




                <a href=\"/campione-gratuito\" class=\"btn btn-xs btn-default btn-gift\">

                    <span class=\"fas fa-gift\"></span>
                </a>

            </div>

        </div>





    </div>
</div>



", "base/header/menu/mainmenu.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/base/header/menu/mainmenu.twig");
    }
}
