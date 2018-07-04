<?php

/* ecommerce/templates/attributo.valori.twig */
class __TwigTemplate_c6a9edb511199c60b524195f8f980ea4157c4c223d1c4c33dee04c55dbfd96f3 extends Twig_Template
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
<form class=\"form-ajax valore-form\" action=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["urlupdate"] ?? null), "html", null, true);
        echo "\" method=\"post\" style=\"display: none;\">
    <input type=\"hidden\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["valore"] ?? null), "id", array()), "html", null, true);
        echo "\" name=\"id\">
    <div class=\"form-group\">

        <input type=\"text\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["valore"] ?? null), "valore", array()), "html", null, true);
        echo "\" name=\"valore\" class=\"form-control\">

        <button type=\"submit\" class=\"btn btn-xs btn-success mr-2\" value=\"Aggiorna\" name=\"action\"><i class=\"fa fa-save\"></i> </button>

        <button type=\"button\" data-id=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["valore"] ?? null), "id", array()), "html", null, true);
        echo "\"  class=\"btn btn-xs btn-danger remove-value\"  value=\"Elimina\" name=\"action\"><i class=\"fa fa-trash\"></i></button>

    </div>
</form>




<div class=\"card\">
    <div class=\"card-header\">
        <div class=\"float-right\">
            <button class=\"btn btn-sm btn-light btn-icon\" id=\"aggiungiValore\"><i class=\"fa fa-plus\"></i> </button>
        </div>
    </div>
    <div   class=\"card-body\" style=\"max-width: 50em\">
        <div id=\"lista-valori\">
            ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["valori"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["valore"]) {
            // line 27
            echo "                <form class=\"form-ajax\" action=\"";
            echo twig_escape_filter($this->env, ($context["urlupdate"] ?? null), "html", null, true);
            echo "\" method=\"post\">
                    <input type=\"hidden\" value=\"";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "id", array()), "html", null, true);
            echo "\" name=\"id\">
                    <div class=\"form-group\">

                            <input type=\"text\" value=\"";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "valore", array()), "html", null, true);
            echo "\" name=\"valore\" class=\"form-control\">

                        <button type=\"submit\" class=\"btn btn-sm btn-light btn-icon mr-2\" value=\"Aggiorna\" name=\"action\"><i class=\"fa fa-save\"></i> </button>

                        <button type=\"button\" data-id=\"";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["valore"], "id", array()), "html", null, true);
            echo "\"  class=\"btn btn-sm btn-light btn-icon remove-value\"  value=\"Elimina\" name=\"action\"><i class=\"fa fa-trash\"></i></button>

                    </div>
                </form>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valore'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "        </div>


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
                <form class=\"form-ajax form-aggiungi\" action=\"";
        // line 58
        echo twig_escape_filter($this->env, ($context["urlinsert"] ?? null), "html", null, true);
        echo "\" method=\"post\" data-postevent=\"ecommerce.valore.aggiunto\">

                    <input type=\"hidden\" name=\"id_ecommerce_attributo\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["attributo"] ?? null), "id", array()), "html", null, true);
        echo "\">
                    <div class=\"form-group\">
                        <div class=\"input-group mb-3\">
                            <input type=\"text\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["valore"] ?? null), "valore", array()), "html", null, true);
        echo "\" class=\"form-control\" name=\"valore\">
                        </div>
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-xs btn-success mr-2\" type=\"submit\"><i class=\"fa fa-trash\"></i>Aggiorna </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script>
    (function( \$ ){
       \$(window).ready(function(){

           var valoreForm = \$(\".valore-form\").clone();

           function updateValues(){
                \$.get(\"";
        // line 84
        echo twig_escape_filter($this->env, ($context["urllist"] ?? null), "html", null, true);
        echo "\").done(function( d ){
                    \$(\"#lista-valori\").empty();

                    d.forEach(function( o ){
                        var v = valoreForm.clone();
                        v.find('[name=\"valore\"]').val(o.valore);
                        v.find('[data-id]').attr(\"data-id\",o.id);
                        v.show();

                        \$(\"#lista-valori\").append(v);
                    })
                })
           }

           \$(document).on(\"click\",\".remove-value\",function(){
               id = \$( this ).attr(\"data-id\");
               url = \"";
        // line 100
        echo twig_escape_filter($this->env, ($context["urlremove"] ?? null), "html", null, true);
        echo "\";
               \$.post(url,{
                   id : id
               }).done(updateValues);
           });



           \$(document).on(\"ecommerce.valore.aggiunto\",function(){
               \$(\"#modalInsertContent\").modal(\"hide\");
               \$(\".form-aggiungi\").find('[name=\"valore\"]').val(\"\");
               updateValues();
           })
           /*
            <form class=\"form-ajax\">
            <input type=\"hidden\" value=\"";
        // line 115
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["valore"] ?? null), "id", array()), "html", null, true);
        echo "\">
            <div class=\"form-group\">
            <div class=\"input-group mb-3\">
            <input type=\"text\" value=\"";
        // line 118
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["valore"] ?? null), "valore", array()), "html", null, true);
        echo "\" class=\"form-control\">
            </div>
            <div class=\"input-group-append\">
            <button class=\"btn btn-xs btn-success mr-2\" type=\"button\"><i class=\"fa fa-trash\"></i>Aggiorna </button>
            <button class=\"btn btn-xs btn-danger\" type=\"button\"><i class=\"fa fa-trash\"></i>Elimina </button>
            </div>
            </div>
            </form>
            */

           \$(\"#aggiungiValore\").on(\"click\",function(){
               \$(\"#modalInsertContent\").modal();
           })



       });


    })(jQuery);
</script>";
    }

    public function getTemplateName()
    {
        return "ecommerce/templates/attributo.valori.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 118,  187 => 115,  169 => 100,  150 => 84,  126 => 63,  120 => 60,  115 => 58,  95 => 40,  84 => 35,  77 => 31,  71 => 28,  66 => 27,  62 => 26,  43 => 10,  36 => 6,  30 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<form class=\"form-ajax valore-form\" action=\"{{ urlupdate }}\" method=\"post\" style=\"display: none;\">
    <input type=\"hidden\" value=\"{{ valore.id }}\" name=\"id\">
    <div class=\"form-group\">

        <input type=\"text\" value=\"{{ valore.valore }}\" name=\"valore\" class=\"form-control\">

        <button type=\"submit\" class=\"btn btn-xs btn-success mr-2\" value=\"Aggiorna\" name=\"action\"><i class=\"fa fa-save\"></i> </button>

        <button type=\"button\" data-id=\"{{ valore.id }}\"  class=\"btn btn-xs btn-danger remove-value\"  value=\"Elimina\" name=\"action\"><i class=\"fa fa-trash\"></i></button>

    </div>
</form>




<div class=\"card\">
    <div class=\"card-header\">
        <div class=\"float-right\">
            <button class=\"btn btn-sm btn-light btn-icon\" id=\"aggiungiValore\"><i class=\"fa fa-plus\"></i> </button>
        </div>
    </div>
    <div   class=\"card-body\" style=\"max-width: 50em\">
        <div id=\"lista-valori\">
            {% for valore in valori %}
                <form class=\"form-ajax\" action=\"{{ urlupdate }}\" method=\"post\">
                    <input type=\"hidden\" value=\"{{ valore.id }}\" name=\"id\">
                    <div class=\"form-group\">

                            <input type=\"text\" value=\"{{ valore.valore }}\" name=\"valore\" class=\"form-control\">

                        <button type=\"submit\" class=\"btn btn-sm btn-light btn-icon mr-2\" value=\"Aggiorna\" name=\"action\"><i class=\"fa fa-save\"></i> </button>

                        <button type=\"button\" data-id=\"{{ valore.id }}\"  class=\"btn btn-sm btn-light btn-icon remove-value\"  value=\"Elimina\" name=\"action\"><i class=\"fa fa-trash\"></i></button>

                    </div>
                </form>
            {% endfor %}
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
                <form class=\"form-ajax form-aggiungi\" action=\"{{ urlinsert }}\" method=\"post\" data-postevent=\"ecommerce.valore.aggiunto\">

                    <input type=\"hidden\" name=\"id_ecommerce_attributo\" value=\"{{ attributo.id }}\">
                    <div class=\"form-group\">
                        <div class=\"input-group mb-3\">
                            <input type=\"text\" value=\"{{ valore.valore }}\" class=\"form-control\" name=\"valore\">
                        </div>
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-xs btn-success mr-2\" type=\"submit\"><i class=\"fa fa-trash\"></i>Aggiorna </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script>
    (function( \$ ){
       \$(window).ready(function(){

           var valoreForm = \$(\".valore-form\").clone();

           function updateValues(){
                \$.get(\"{{ urllist }}\").done(function( d ){
                    \$(\"#lista-valori\").empty();

                    d.forEach(function( o ){
                        var v = valoreForm.clone();
                        v.find('[name=\"valore\"]').val(o.valore);
                        v.find('[data-id]').attr(\"data-id\",o.id);
                        v.show();

                        \$(\"#lista-valori\").append(v);
                    })
                })
           }

           \$(document).on(\"click\",\".remove-value\",function(){
               id = \$( this ).attr(\"data-id\");
               url = \"{{ urlremove }}\";
               \$.post(url,{
                   id : id
               }).done(updateValues);
           });



           \$(document).on(\"ecommerce.valore.aggiunto\",function(){
               \$(\"#modalInsertContent\").modal(\"hide\");
               \$(\".form-aggiungi\").find('[name=\"valore\"]').val(\"\");
               updateValues();
           })
           /*
            <form class=\"form-ajax\">
            <input type=\"hidden\" value=\"{{ valore.id }}\">
            <div class=\"form-group\">
            <div class=\"input-group mb-3\">
            <input type=\"text\" value=\"{{ valore.valore }}\" class=\"form-control\">
            </div>
            <div class=\"input-group-append\">
            <button class=\"btn btn-xs btn-success mr-2\" type=\"button\"><i class=\"fa fa-trash\"></i>Aggiorna </button>
            <button class=\"btn btn-xs btn-danger\" type=\"button\"><i class=\"fa fa-trash\"></i>Elimina </button>
            </div>
            </div>
            </form>
            */

           \$(\"#aggiungiValore\").on(\"click\",function(){
               \$(\"#modalInsertContent\").modal();
           })



       });


    })(jQuery);
</script>", "ecommerce/templates/attributo.valori.twig", "/Users/phomea/Siti/Spagnesi/applications/ecommerce/templates/attributo.valori.twig");
    }
}
