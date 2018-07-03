<?php

/* pages/templates/contents.twig */
class __TwigTemplate_e6c6e767697fd1fc384ee88e7ecf85ea658b7900ef0ee56ea57498820d20cb3e extends Twig_Template
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
        echo "<div class=\"card\">
    <div class=\"card-body\">



        ";
        // line 14
        echo "        <p>
            Gestisci i contenuti della pagina, puoi sceglierli tra i blocchi disponibili sulla destra ed assegnarli agli hook presenti nel template scelta per la pagina.

        </p>
<div class=\"row\">
    <div class=\"col\" id=\"list-card-content\">
        <h6>Contenuti inseriti</h6>
        <br>
    ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["contenuto"]) {
            // line 23
            echo "        <div class=\"card page-content\" style=\"margin-bottom: 0\" data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contenuto"], "id", array()), "html", null, true);
            echo "\">
            <input type=\"hidden\" value=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contenuto"], "id", array()), "html", null, true);
            echo "\" name=\"id\">
            <div class=\"card-header\">
                <button class=\"btn btn-transparent float-left p-0 pr-1 pl-1 handle\" ><i class=\"fa fa-arrows-alt\"></i> </button>


                <div class=\"float-left\">
                    ";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contenuto"], "titolo", array()), "html", null, true);
            echo "
                    <br>
                    <span class=\"small badge badge-info\">";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contenuto"], "tipo", array()), "html", null, true);
            echo "</span>
                </div>

                <button class=\"btn btn-transparent float-right p-0 pr-1 pl-1 text-danger\" ><i class=\"fa fa-trash\"></i> </button>

                <button class=\"btn btn-transparent float-right p-0 pr-1 pl-1 text-warning\" ><i class=\"fa fa-edit\"></i> </button>

                <button class=\"btn btn-transparent float-right p-0 pr-1 pl-1 text-primary\" data-toggle=\"collapse\" data-parent=\"#list-card-content\" data-target=\"#card-body-content-";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contenuto"], "id", array()), "html", null, true);
            echo "\"><i class=\"fa fa-eye\"></i> </button>


            </div>
            <div class=\"collapse\" id=\"card-body-content-";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contenuto"], "id", array()), "html", null, true);
            echo "\">
                ";
            // line 44
            echo twig_get_attribute($this->env, $this->source, $context["contenuto"], "render", array(), "method");
            echo "
            </div>
            ";
            // line 83
            echo "
        </div>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contenuto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "    </div>
    <div class=\"bg-light p-3\">
        <h6>Contenuti disponibili</h6>
        <br>

        ";
        // line 92
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["contentTypes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["contentType"]) {
            // line 93
            echo "            <button class=\"btn btn-light btn-block text-left btn-add-content\" data-type=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contentType"], "type", array()), "html", null, true);
            echo "\">
                <i class=\"";
            // line 94
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contentType"], "icon", array()), "html", null, true);
            echo "\"></i>
                <span class=\"small\">";
            // line 95
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contentType"], "label", array()), "html", null, true);
            echo "</span>
            </button>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contentType'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "


    </div>
</div>


    </div>
</div>




<div class=\"modal\" tabindex=\"-1\" role=\"dialog\" id=\"modalInsertContent\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">

                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>

            <div class=\"modal-body\">
                <p>Modal body text goes here.</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-primary btn-sm\">Save changes</button>
                <button type=\"button\" class=\"btn btn-secondary btn-sm\" data-dismiss=\"modal\">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    (function () {
        \$(\"#list-card-content\").sortable({
            handle:\".handle\",
            cancel: '',
            stop: function(e,ui) {




                listaid=[];
                \$(\"#list-card-content .page-content\").each(function(o){
                    id = \$(this).find('[name=\"id\"]').val();


                    listaid.push(id);
                });

                console.log(listaid);
                \$.ajax({
                    url : '/backend/pages/content/order',
                    method : 'POST',
                    contentType: \"application/json\",
                    dataType: 'json',
                    data:JSON.stringify(listaid),
                    success : function(d){
                        console.log(d);



                    }
                })


            }
        });
    })();

    (function(\$){
        \$(\".btn-add-content\").on(\"click\",function(){
            var type = \$(this).data(\"type\");

            \$.ajax({
                url : '/backend/pages/content/getstructure/'+type,
                method : 'GET',
                dataType: \"html\",

                success : function(d){
                    console.log(d);
                    \$(\"#modalInsertContent\").modal();
                    \$(\"#modalInsertContent .modal-body\").html(d);

                }
            })

        });
    })(jQuery)
</script>
";
    }

    public function getTemplateName()
    {
        return "pages/templates/contents.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 98,  118 => 95,  114 => 94,  109 => 93,  105 => 92,  98 => 87,  89 => 83,  84 => 44,  80 => 43,  73 => 39,  63 => 32,  58 => 30,  49 => 24,  44 => 23,  40 => 22,  30 => 14,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"card\">
    <div class=\"card-body\">



        {#<div class=\"row\">
            <div class=\"col-md-12\" id=\"list-card-content\">
                {% for contenuto in data %}
                    {{ contenuto.render() | raw}}
                {% endfor %}
            </div>
        </div>
        #}
        <p>
            Gestisci i contenuti della pagina, puoi sceglierli tra i blocchi disponibili sulla destra ed assegnarli agli hook presenti nel template scelta per la pagina.

        </p>
<div class=\"row\">
    <div class=\"col\" id=\"list-card-content\">
        <h6>Contenuti inseriti</h6>
        <br>
    {% for contenuto in data %}
        <div class=\"card page-content\" style=\"margin-bottom: 0\" data-id=\"{{ contenuto.id }}\">
            <input type=\"hidden\" value=\"{{ contenuto.id }}\" name=\"id\">
            <div class=\"card-header\">
                <button class=\"btn btn-transparent float-left p-0 pr-1 pl-1 handle\" ><i class=\"fa fa-arrows-alt\"></i> </button>


                <div class=\"float-left\">
                    {{ contenuto.titolo }}
                    <br>
                    <span class=\"small badge badge-info\">{{ contenuto.tipo }}</span>
                </div>

                <button class=\"btn btn-transparent float-right p-0 pr-1 pl-1 text-danger\" ><i class=\"fa fa-trash\"></i> </button>

                <button class=\"btn btn-transparent float-right p-0 pr-1 pl-1 text-warning\" ><i class=\"fa fa-edit\"></i> </button>

                <button class=\"btn btn-transparent float-right p-0 pr-1 pl-1 text-primary\" data-toggle=\"collapse\" data-parent=\"#list-card-content\" data-target=\"#card-body-content-{{ contenuto.id }}\"><i class=\"fa fa-eye\"></i> </button>


            </div>
            <div class=\"collapse\" id=\"card-body-content-{{ contenuto.id }}\">
                {{ contenuto.render() | raw }}
            </div>
            {#<div class=\"collapse\" id=\"card-body-content-{{ contenuto.id }}\">
                <div class=\"card-body \"  >
                    <div class=\"row\">
                        <div class=\"col-md-3\">
                            <div class=\"nav flex-column nav-pills\" id=\"v-pills-tab\" role=\"tablist\" aria-orientation=\"vertical\">
                                <a class=\"nav-link active\" id=\"v-pills-home-tab\" data-toggle=\"pill\" href=\"#v-pills-home-{{ contenuto.id }}\" role=\"tab\" aria-controls=\"v-pills-home\" aria-selected=\"true\">Impostazioni</a>
                                <a class=\"nav-link\" id=\"v-pills-profile-tab\" data-toggle=\"pill\" href=\"#v-pills-profile-{{ contenuto.id }}\" role=\"tab\" aria-controls=\"v-pills-profile\" aria-selected=\"false\">Contenuto</a>
                                <a class=\"nav-link\" id=\"v-pills-anteprima-tab\" data-toggle=\"pill\" href=\"#v-pills-anteprima-{{ contenuto.id }}\" role=\"tab\" aria-controls=\"v-pills-anteprima\" aria-selected=\"false\">Anteprima</a>
                            </div>
                        </div>
                        <div class=\"col-md-9\">

                            <!--<div class=\"tab-content\" id=\"v-pills-tabContent\">
                                <div class=\"tab-pane fade show active\" id=\"v-pills-home-{{ contenuto.id }}\" role=\"tabpanel\" aria-labelledby=\"v-pills-home-tab\">
                                    Impostazioni
                                </div>
                                <div class=\"tab-pane fade\" id=\"v-pills-profile-{{ contenuto.id }}\" role=\"tabpanel\" aria-labelledby=\"v-pills-profile-tab\">

                                </div>

                                <div class=\"tab-pane fade anteprima\" id=\"v-pills-anteprima-{{ contenuto.id }}\" role=\"tabpanel\" aria-labelledby=\"v-pills-profile-tab\">


                                    {{ contenuto.render() | raw }}
                                </div>

                            </div>-->
                        </div>
                    </div>


                </div>
                <div class=\"card-footer\">
                    <a href=\"\" class=\"btn btn-success btn-sm\">Salva</a>
                </div>
            </div>
            #}

        </div>

{% endfor %}
    </div>
    <div class=\"bg-light p-3\">
        <h6>Contenuti disponibili</h6>
        <br>

        {% for contentType in contentTypes %}
            <button class=\"btn btn-light btn-block text-left btn-add-content\" data-type=\"{{ contentType.type }}\">
                <i class=\"{{ contentType.icon }}\"></i>
                <span class=\"small\">{{ contentType.label }}</span>
            </button>
        {% endfor %}



    </div>
</div>


    </div>
</div>




<div class=\"modal\" tabindex=\"-1\" role=\"dialog\" id=\"modalInsertContent\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">

                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>

            <div class=\"modal-body\">
                <p>Modal body text goes here.</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-primary btn-sm\">Save changes</button>
                <button type=\"button\" class=\"btn btn-secondary btn-sm\" data-dismiss=\"modal\">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    (function () {
        \$(\"#list-card-content\").sortable({
            handle:\".handle\",
            cancel: '',
            stop: function(e,ui) {




                listaid=[];
                \$(\"#list-card-content .page-content\").each(function(o){
                    id = \$(this).find('[name=\"id\"]').val();


                    listaid.push(id);
                });

                console.log(listaid);
                \$.ajax({
                    url : '/backend/pages/content/order',
                    method : 'POST',
                    contentType: \"application/json\",
                    dataType: 'json',
                    data:JSON.stringify(listaid),
                    success : function(d){
                        console.log(d);



                    }
                })


            }
        });
    })();

    (function(\$){
        \$(\".btn-add-content\").on(\"click\",function(){
            var type = \$(this).data(\"type\");

            \$.ajax({
                url : '/backend/pages/content/getstructure/'+type,
                method : 'GET',
                dataType: \"html\",

                success : function(d){
                    console.log(d);
                    \$(\"#modalInsertContent\").modal();
                    \$(\"#modalInsertContent .modal-body\").html(d);

                }
            })

        });
    })(jQuery)
</script>
", "pages/templates/contents.twig", "/Users/phomea/Siti/Echidna2/applications/pages/templates/contents.twig");
    }
}
