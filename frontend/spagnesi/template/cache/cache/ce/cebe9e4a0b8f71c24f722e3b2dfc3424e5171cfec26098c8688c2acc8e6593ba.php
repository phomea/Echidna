<?php

/* pagine/home.twig */
class __TwigTemplate_8a21cddeb273528097ae480b0aa24772881ea3c1f8872e367b6ac2a43a8ae5ad extends Twig_Template
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
    <section id=\"slide-home\">

        <img src=\"/assets/img/slide-home.png\">

        <article class=\"text-center\">
            <h2>Prova qualcosa</h2>
            <p>
                Lorem ipsum d
                olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
            </p>

            <div class=\"text-center\">
                <a href=\"\" class=\"btn btn-primary\">Vedi offerta</a>
            </div>
        </article>
    </section>

    <div class=\"container text-center mt-5\">
        <h2>Tpoasd</h2>
        <p> Lorem ipsum d
            olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum v</p>
        ";
        // line 25
        $this->loadTemplate("parti/barra-ricerca.twig", "pagine/home.twig", 25)->display($context);
        // line 26
        echo "    </div>

    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pagina"] ?? null), "hooks", array()), "prodottiInEvidenza", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 29
            echo "        ";
            echo $context["hook"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "
    <div class=\"container\">
        ";
        // line 33
        echo twig_get_attribute($this->env, $this->source, ($context["pagina"] ?? null), "content", array());
        echo "
    </div>

    <div class=\"anteprima-prodotto mb-5\">
        <div class=\"row\">
            <div class=\"col\">
                <img src=\"/assets/img/mocked/divan1.png\">
            </div>
            <div class=\"col\">
                <img src=\"/assets/img/mocked/divano1ambient.png\">
            </div>
        </div>

        <section class=\"info\">
            <div class=\" \">
                <div class=\"row\">
                    <div class=\"col\">
                        <h2>Cecilia</h2>
                        <p>
                            Lorem ipsum d
                            olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
                        </p>
                    </div>
                    <div class=\"col\">
                        <span class=\"price\">1.200€</span>
                        <span class=\"old-price\">1.600€</span>

                        <div class=\"azioni-veloci\">
                            <div class=\"row mb-4\">
                                <div class=\"col-12\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-6\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                                <div class=\"col-6\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class=\"anteprima-prodotto\">
        <div class=\"row\">
            <div class=\"col\">
                <img src=\"/assets/img/mocked/divano2ambient.png\">
            </div>
            <div class=\"col\">
                <img src=\"/assets/img/mocked/divano2.png\">
            </div>
        </div>

        <section class=\"info\">
            <div class=\" \">
                <div class=\"row\">
                    <div class=\"col\">
                        <h2>Cecilia</h2>
                        <p>
                            Lorem ipsum d
                            olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
                        </p>
                    </div>
                    <div class=\"col\">
                        <span class=\"price\">1.200€</span>
                        <span class=\"old-price\">1.600€</span>

                        <div class=\"azioni-veloci\">
                            <div class=\"row mb-4\">
                                <div class=\"col-12\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-6\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                                <div class=\"col-6\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <div class=\"container mt-5 mb-5\">
        <div class=\"row\">
            <div class=\"col-8\">
                <h2>Titolone</h2>
                <h3>Titoletto</h3>
                <p>
                    Lorem ipsum d
                    olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
                </p>
            </div>
            <div class=\"col-4\">
                <ul>

                </ul>
            </div>
        </div>
    </div>



    <section class=\"anteprima-landing\">
        <img src=\"/assets/img/mocked/divanogrosso.png\">
        <div class=\"info\">
            <div class=\"container text-center\">
            <h2>Un salotto da sogno</h2>
            <p>
                Lorem ipsum d
                olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
            </p>
            <a href=\"\" class=\"btn btn-secondary\">Lasciati inspirare</a>
            </div>
        </div>
    </section>

    <div class=\"hh2 bg-dot \"></div>
    <div class=\"bg1\">

    ";
        // line 168
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pagina"] ?? null), "hooks", array()), "spazioCarousel", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 169
            echo "        ";
            echo $context["hook"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        echo "
    ";
        // line 172
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pagina"] ?? null), "hooks", array()), "prefooter", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 173
            echo "        ";
            echo $context["hook"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
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
        return array (  249 => 175,  240 => 173,  236 => 172,  233 => 171,  224 => 169,  220 => 168,  82 => 33,  78 => 31,  69 => 29,  65 => 28,  61 => 26,  59 => 25,  35 => 3,  32 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base/template.twig\" %}
{% block content %}

    <section id=\"slide-home\">

        <img src=\"/assets/img/slide-home.png\">

        <article class=\"text-center\">
            <h2>Prova qualcosa</h2>
            <p>
                Lorem ipsum d
                olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
            </p>

            <div class=\"text-center\">
                <a href=\"\" class=\"btn btn-primary\">Vedi offerta</a>
            </div>
        </article>
    </section>

    <div class=\"container text-center mt-5\">
        <h2>Tpoasd</h2>
        <p> Lorem ipsum d
            olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum v</p>
        {% include \"parti/barra-ricerca.twig\" %}
    </div>

    {% for hook in pagina.hooks.prodottiInEvidenza %}
        {{ hook | raw }}
    {% endfor  %}

    <div class=\"container\">
        {{ pagina.content | raw}}
    </div>

    <div class=\"anteprima-prodotto mb-5\">
        <div class=\"row\">
            <div class=\"col\">
                <img src=\"/assets/img/mocked/divan1.png\">
            </div>
            <div class=\"col\">
                <img src=\"/assets/img/mocked/divano1ambient.png\">
            </div>
        </div>

        <section class=\"info\">
            <div class=\" \">
                <div class=\"row\">
                    <div class=\"col\">
                        <h2>Cecilia</h2>
                        <p>
                            Lorem ipsum d
                            olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
                        </p>
                    </div>
                    <div class=\"col\">
                        <span class=\"price\">1.200€</span>
                        <span class=\"old-price\">1.600€</span>

                        <div class=\"azioni-veloci\">
                            <div class=\"row mb-4\">
                                <div class=\"col-12\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-6\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                                <div class=\"col-6\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class=\"anteprima-prodotto\">
        <div class=\"row\">
            <div class=\"col\">
                <img src=\"/assets/img/mocked/divano2ambient.png\">
            </div>
            <div class=\"col\">
                <img src=\"/assets/img/mocked/divano2.png\">
            </div>
        </div>

        <section class=\"info\">
            <div class=\" \">
                <div class=\"row\">
                    <div class=\"col\">
                        <h2>Cecilia</h2>
                        <p>
                            Lorem ipsum d
                            olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
                        </p>
                    </div>
                    <div class=\"col\">
                        <span class=\"price\">1.200€</span>
                        <span class=\"old-price\">1.600€</span>

                        <div class=\"azioni-veloci\">
                            <div class=\"row mb-4\">
                                <div class=\"col-12\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-6\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                                <div class=\"col-6\">
                                    <a href=\"\" class=\"btn btn-primary d-block\">Compra subito</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <div class=\"container mt-5 mb-5\">
        <div class=\"row\">
            <div class=\"col-8\">
                <h2>Titolone</h2>
                <h3>Titoletto</h3>
                <p>
                    Lorem ipsum d
                    olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
                </p>
            </div>
            <div class=\"col-4\">
                <ul>

                </ul>
            </div>
        </div>
    </div>



    <section class=\"anteprima-landing\">
        <img src=\"/assets/img/mocked/divanogrosso.png\">
        <div class=\"info\">
            <div class=\"container text-center\">
            <h2>Un salotto da sogno</h2>
            <p>
                Lorem ipsum d
                olor sit amet, consectetur adipiscing elit. Cras dapibus vulputate diam eu pretium. Mauris elit orci, ultricies id fermentum vel, porta et eros. Vestibulum condimentum lectus in convallis feugiat. Sed vulputate fringilla felis. Aliquam ut arcu et dui feugiat scelerisque eu quis diam. Mauris placerat congue dui sit amet blandit. Phasellus condimentum libero vel velit auctor, sit amet tincidunt velit varius.
            </p>
            <a href=\"\" class=\"btn btn-secondary\">Lasciati inspirare</a>
            </div>
        </div>
    </section>

    <div class=\"hh2 bg-dot \"></div>
    <div class=\"bg1\">

    {% for hook in pagina.hooks.spazioCarousel %}
        {{ hook | raw }}
    {% endfor  %}

    {% for hook in pagina.hooks.prefooter %}
        {{ hook | raw }}
    {% endfor  %}


{% endblock %}", "pagine/home.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/pagine/home.twig");
    }
}
