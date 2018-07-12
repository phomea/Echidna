<?php

/* parti/barra-ricerca.twig */
class __TwigTemplate_6f9e9748ead1cafeb4659f1854079c04a3f46663b2acc9dffa18c9173ab4612d extends Twig_Template
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
        echo "<section class=\"search-bar-container\">
    <div class=\"search-bar\">
        <form id=\"form-search-bar\" action=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["router_service"] ?? null), "getRoute", array(0 => "frontend.ecommerce.ricerca"), "method"), "build", array(), "method"), "html", null, true);
        echo "\">
            <div class=\"row\">

                <div class=\"col\">
                    <label class=\"d-block text-center\">Filtra per prodotto</label>
                    <div class=\"text-center scelta-tipologia\">
                        <label>
                            <input type=\"checkbox\" name=\"tipologia[divano]\" value=\"3\">
                            <img src=\"/assets/img/icone/divano.svg\" class=\"mr-4\">
                        </label>

                        <label>
                            <input type=\"checkbox\" name=\"tipologia[poltrona]\" value=\"4\">
                            <img src=\"/assets/img/icone/poltrona.svg\" class=\"mr-2 ml-2\">
                        </label>

                        <label>
                            <input type=\"checkbox\" name=\"tipologia[letto]\" value=\"5\">
                            <img src=\"/assets/img/icone/letto.svg\" class=\"ml-4\">
                        </label>
                    </div>
                </div>

                <div class=\"col\">
                    <label class=\"d-block\">Cerca per parola chiave o nome</label>

                    <div class=\"input-group mb-3\">
                        <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\" id=\"basic-addon1\">
                                <img src=\"/assets/img/icone/cerca.svg\">
                            </span>
                        </div>
                        <input type=\"text\" class=\"form-control\" placeholder=\"Parola chiave\" aria-label=\"Username\" aria-describedby=\"basic-addon1\" name=\"ricerca\">
                    </div>

                </div>

                <div class=\"col-2\">
                    <label class=\"d-block\">Numero di posti</label>

                    <div class=\"input-group mb-3\">
                        <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\" id=\"basic-addon1\">
                                <img src=\"/assets/img/icone/seduta.svg\">
                            </span>
                        </div>

                        <select class=\"form-control\" name=\"attributo[5]\">
                            <option value=\"\">Qualsiasi</option>
                            <option value=\"19\">2</option>
                            <option value=\"34\">2.5</option>
                            <option value=\"20\">3</option>
                        </select>
                    </div>

                </div>

                <div class=\"col\">
                    <button type=\"submit\" class=\"btn btn-secondary d-block mt-5\">Cerca</button>
                </div>

            </div>
        </form>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "parti/barra-ricerca.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"search-bar-container\">
    <div class=\"search-bar\">
        <form id=\"form-search-bar\" action=\"{{ router_service.getRoute(\"frontend.ecommerce.ricerca\").build() }}\">
            <div class=\"row\">

                <div class=\"col\">
                    <label class=\"d-block text-center\">Filtra per prodotto</label>
                    <div class=\"text-center scelta-tipologia\">
                        <label>
                            <input type=\"checkbox\" name=\"tipologia[divano]\" value=\"3\">
                            <img src=\"/assets/img/icone/divano.svg\" class=\"mr-4\">
                        </label>

                        <label>
                            <input type=\"checkbox\" name=\"tipologia[poltrona]\" value=\"4\">
                            <img src=\"/assets/img/icone/poltrona.svg\" class=\"mr-2 ml-2\">
                        </label>

                        <label>
                            <input type=\"checkbox\" name=\"tipologia[letto]\" value=\"5\">
                            <img src=\"/assets/img/icone/letto.svg\" class=\"ml-4\">
                        </label>
                    </div>
                </div>

                <div class=\"col\">
                    <label class=\"d-block\">Cerca per parola chiave o nome</label>

                    <div class=\"input-group mb-3\">
                        <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\" id=\"basic-addon1\">
                                <img src=\"/assets/img/icone/cerca.svg\">
                            </span>
                        </div>
                        <input type=\"text\" class=\"form-control\" placeholder=\"Parola chiave\" aria-label=\"Username\" aria-describedby=\"basic-addon1\" name=\"ricerca\">
                    </div>

                </div>

                <div class=\"col-2\">
                    <label class=\"d-block\">Numero di posti</label>

                    <div class=\"input-group mb-3\">
                        <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\" id=\"basic-addon1\">
                                <img src=\"/assets/img/icone/seduta.svg\">
                            </span>
                        </div>

                        <select class=\"form-control\" name=\"attributo[5]\">
                            <option value=\"\">Qualsiasi</option>
                            <option value=\"19\">2</option>
                            <option value=\"34\">2.5</option>
                            <option value=\"20\">3</option>
                        </select>
                    </div>

                </div>

                <div class=\"col\">
                    <button type=\"submit\" class=\"btn btn-secondary d-block mt-5\">Cerca</button>
                </div>

            </div>
        </form>
    </div>
</section>", "parti/barra-ricerca.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/parti/barra-ricerca.twig");
    }
}
