<?php

/* base/template.twig */
class __TwigTemplate_9861ea831c297722285c782338da0c3dea11955850fde64ed03bd74910163f4e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->loadTemplate("base/head/head.twig", "base/template.twig", 1)->display(array_merge($context, array("headerClass" => ($context["headerClass"] ?? null))));
        // line 2
        $this->displayBlock('content', $context, $blocks);
        // line 3
        echo "

<!-- Footer -->
<div class=\"bg-dot hh2\"></div>
<footer>
    <div id=\"\" class=\"ini open\">
        <div class=\"footer-navbar\">
            <div class=\"container\">
                <!--<div class=\"arrow link hidden-xs hidden-sm\">
                  <i class=\"icon flaticon-down14\"></i>
                </div>-->
                <div class=\"collapsed-block\">
                    <div class=\"inside\">
                        <h3><span class=\"link\">Su di noi</span><a class=\"expander visible-sm visible-xs\" href=\"#TabBlock-2\">+</a></h3>
                        <div class=\"tabBlock\" id=\"TabBlock-2\">
                            <ul class=\"menu\">
                                <li><a href=\"/chi-siamo\">Chi siamo</a></li>
                                <li><a href=\"/termini-e-condizioni\">Termini e condizioni</a></li>
                                <li><a href=\"/sicurezza-e-privacy\">Sicurezza e privacy</a></li>
                                <li><a href=\"/contatti\">Contatti</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"collapsed-block\">
                    <div class=\"inside\">
                        <h3><span class=\"link\">Il tuo ordine</span><a class=\"expander visible-sm visible-xs\" href=\"#TabBlock-3\">+</a></h3>
                        <div class=\"tabBlock\" id=\"TabBlock-3\">
                            <ul class=\"menu\">
                                <li><a href=\"/come-funziona\">Come funziona</a></li>
                                <li><a href=\"/metodi-di-pagamento\">Metodi di pagamento</a></li>
                                <li><a href=\"/resi-e-recessi\">Resi e recessi</a></li>
                                <li><a href=\"/faq\">Help & FAQs</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"collapsed-block\">
                    <div class=\"inside\">
                        <h3><span class=\"link\">SERVIZI AGGIUNTIVI</span><a class=\"expander visible-sm visible-xs\" href=\"#TabBlock-4\">+</a></h3>
                        <div class=\"tabBlock\" id=\"TabBlock-4\">
                            <ul class=\"menu\">
                                <li><a href=\"/campione-gratuito\">Campione gratuito</a></li>
                                <li><a href=\"/collabora-con-noi\">Collabora con noi</a></li>
                                <li><a href=\"/personalizzazione\">Personalizzazione</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"collapsed-block\">
                    <div class=\"inside\">
                        <h3><span class=\"link\">Trovaci online</span><a class=\"expander visible-sm visible-xs\" href=\"#TabBlock-5\">+</a></h3>
                        <div class=\"tabBlock\" id=\"TabBlock-5\">
                            <ul class=\"socials socials-lg\">
                                <li><a href=\"https://www.facebook.com/partecipazionimatrimonicerimonie/\" target=\"_blank\"><span class=\"icon flaticon-facebook12\"></span></a></li>

                            </ul>
                            <div class=\"divider divider-sm visible-xs visible-sm\">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class=\"collapsed-block\">
                   <div class=\"inside\">
                     <h3> </h3>
                     <div class=\"tabBlock\" id=\"TabBlock-6\">
                       <ul class=\"menu menu-icon\">
                         <li><span class=\"icon flaticon-home113\"></span>VIA RENATO FUCINI, 7</li>
                         <li><span class=\"icon flaticon-phone163\"></span>0572 73463</li>

                       </ul>
                     </div>
                   </div>
                 </div>

                   -->
            </div>
        </div>
        <div class=\"footer-bottom\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-8 copyright\">
                        © 2017 <a href=\"#\">Cartiamo</a>. All Rights Reserved.
                    </div>
                    <div class=\"col-md-4\">
                        <ul class=\"payment-list pull-right\">
                            <li><img src=\"images/icon-payment-01.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                            <li><img src=\"images/icon-payment-02.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                            <li><img src=\"images/icon-payment-03.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                            <li><img src=\"images/icon-payment-04.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                            <li><img src=\"images/icon-payment-05.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class=\"container\">
                <a title=\"web-design aiosa web agency\" href=\"https://aiosa.net\">web-design</a> by Web Agency <a id=\"madebyaiosa\" title=\"Web Agency Pistoia\" href=\"https://aiosa.net\">Aiosa</a>


                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = \"https://aiosa.net/external/aiosa-sdk.js\";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'aiosasdk'));

                </script>

            </div>
        </div>
    </div>
</footer>
<div id=\"outer-overlay\">
</div>
<!-- //end Footer -->


</div>
</div>



";
        // line 131
        $this->displayBlock('javascript_footer', $context, $blocks);
        // line 136
        echo "
";
        // line 137
        $this->displayBlock('scripts', $context, $blocks);
        // line 139
        echo "


<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = '7liyChKD9i';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
";
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
    }

    // line 131
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 132
        echo "
    ";
        // line 133
        $this->loadTemplate("base/footer/js.twig", "base/template.twig", 133)->display($context);
        // line 134
        echo "
";
    }

    // line 137
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base/template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 137,  194 => 134,  192 => 133,  189 => 132,  186 => 131,  181 => 2,  167 => 139,  165 => 137,  162 => 136,  160 => 131,  30 => 3,  28 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% include \"base/head/head.twig\" with {headerClass : headerClass}%}
{% block content %}{% endblock content %}


<!-- Footer -->
<div class=\"bg-dot hh2\"></div>
<footer>
    <div id=\"\" class=\"ini open\">
        <div class=\"footer-navbar\">
            <div class=\"container\">
                <!--<div class=\"arrow link hidden-xs hidden-sm\">
                  <i class=\"icon flaticon-down14\"></i>
                </div>-->
                <div class=\"collapsed-block\">
                    <div class=\"inside\">
                        <h3><span class=\"link\">Su di noi</span><a class=\"expander visible-sm visible-xs\" href=\"#TabBlock-2\">+</a></h3>
                        <div class=\"tabBlock\" id=\"TabBlock-2\">
                            <ul class=\"menu\">
                                <li><a href=\"/chi-siamo\">Chi siamo</a></li>
                                <li><a href=\"/termini-e-condizioni\">Termini e condizioni</a></li>
                                <li><a href=\"/sicurezza-e-privacy\">Sicurezza e privacy</a></li>
                                <li><a href=\"/contatti\">Contatti</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"collapsed-block\">
                    <div class=\"inside\">
                        <h3><span class=\"link\">Il tuo ordine</span><a class=\"expander visible-sm visible-xs\" href=\"#TabBlock-3\">+</a></h3>
                        <div class=\"tabBlock\" id=\"TabBlock-3\">
                            <ul class=\"menu\">
                                <li><a href=\"/come-funziona\">Come funziona</a></li>
                                <li><a href=\"/metodi-di-pagamento\">Metodi di pagamento</a></li>
                                <li><a href=\"/resi-e-recessi\">Resi e recessi</a></li>
                                <li><a href=\"/faq\">Help & FAQs</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"collapsed-block\">
                    <div class=\"inside\">
                        <h3><span class=\"link\">SERVIZI AGGIUNTIVI</span><a class=\"expander visible-sm visible-xs\" href=\"#TabBlock-4\">+</a></h3>
                        <div class=\"tabBlock\" id=\"TabBlock-4\">
                            <ul class=\"menu\">
                                <li><a href=\"/campione-gratuito\">Campione gratuito</a></li>
                                <li><a href=\"/collabora-con-noi\">Collabora con noi</a></li>
                                <li><a href=\"/personalizzazione\">Personalizzazione</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"collapsed-block\">
                    <div class=\"inside\">
                        <h3><span class=\"link\">Trovaci online</span><a class=\"expander visible-sm visible-xs\" href=\"#TabBlock-5\">+</a></h3>
                        <div class=\"tabBlock\" id=\"TabBlock-5\">
                            <ul class=\"socials socials-lg\">
                                <li><a href=\"https://www.facebook.com/partecipazionimatrimonicerimonie/\" target=\"_blank\"><span class=\"icon flaticon-facebook12\"></span></a></li>

                            </ul>
                            <div class=\"divider divider-sm visible-xs visible-sm\">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class=\"collapsed-block\">
                   <div class=\"inside\">
                     <h3> </h3>
                     <div class=\"tabBlock\" id=\"TabBlock-6\">
                       <ul class=\"menu menu-icon\">
                         <li><span class=\"icon flaticon-home113\"></span>VIA RENATO FUCINI, 7</li>
                         <li><span class=\"icon flaticon-phone163\"></span>0572 73463</li>

                       </ul>
                     </div>
                   </div>
                 </div>

                   -->
            </div>
        </div>
        <div class=\"footer-bottom\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-8 copyright\">
                        © 2017 <a href=\"#\">Cartiamo</a>. All Rights Reserved.
                    </div>
                    <div class=\"col-md-4\">
                        <ul class=\"payment-list pull-right\">
                            <li><img src=\"images/icon-payment-01.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                            <li><img src=\"images/icon-payment-02.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                            <li><img src=\"images/icon-payment-03.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                            <li><img src=\"images/icon-payment-04.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                            <li><img src=\"images/icon-payment-05.png\" width=\"36\" height=\"22\" alt=\"\"></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class=\"container\">
                <a title=\"web-design aiosa web agency\" href=\"https://aiosa.net\">web-design</a> by Web Agency <a id=\"madebyaiosa\" title=\"Web Agency Pistoia\" href=\"https://aiosa.net\">Aiosa</a>


                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = \"https://aiosa.net/external/aiosa-sdk.js\";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'aiosasdk'));

                </script>

            </div>
        </div>
    </div>
</footer>
<div id=\"outer-overlay\">
</div>
<!-- //end Footer -->


</div>
</div>



{% block javascript_footer %}

    {% include 'base/footer/js.twig' %}

{% endblock javascript_footer %}

{% block scripts %}
{% endblock %}



<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = '7liyChKD9i';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
", "base/template.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/base/template.twig");
    }
}
