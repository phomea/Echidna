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
        <div class=\"row\">

            <div class=\"col\">
                <label class=\"d-block text-center\">Filtra per prodotto</label>
                <div class=\"text-center\">
                    <img src=\"/assets/img/icone/divano.svg\" class=\"mr-4\">
                    <img src=\"/assets/img/icone/poltrona.svg\" class=\"mr-2 ml-2\">
                    <img src=\"/assets/img/icone/letto.svg\" class=\"ml-4\">
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
                    <input type=\"text\" class=\"form-control\" placeholder=\"Parola chiave\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
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
                    <input type=\"number\" class=\"form-control\" placeholder=\"3\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
                </div>

            </div>

            <div class=\"col\">
                <a href=\"\" class=\"btn btn-secondary d-block mt-5\">Cerca</a>
            </div>

        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "parti/barra-ricerca.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"search-bar-container\">
    <div class=\"search-bar\">
        <div class=\"row\">

            <div class=\"col\">
                <label class=\"d-block text-center\">Filtra per prodotto</label>
                <div class=\"text-center\">
                    <img src=\"/assets/img/icone/divano.svg\" class=\"mr-4\">
                    <img src=\"/assets/img/icone/poltrona.svg\" class=\"mr-2 ml-2\">
                    <img src=\"/assets/img/icone/letto.svg\" class=\"ml-4\">
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
                    <input type=\"text\" class=\"form-control\" placeholder=\"Parola chiave\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
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
                    <input type=\"number\" class=\"form-control\" placeholder=\"3\" aria-label=\"Username\" aria-describedby=\"basic-addon1\">
                </div>

            </div>

            <div class=\"col\">
                <a href=\"\" class=\"btn btn-secondary d-block mt-5\">Cerca</a>
            </div>

        </div>
    </div>
</section>", "parti/barra-ricerca.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/parti/barra-ricerca.twig");
    }
}
