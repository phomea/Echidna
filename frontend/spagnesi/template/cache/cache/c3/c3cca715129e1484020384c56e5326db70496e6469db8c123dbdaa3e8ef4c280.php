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
            'scripts' => array($this, 'block_scripts'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->loadTemplate("base/head/head.twig", "base/template.twig", 1)->display($context);
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('content', $context, $blocks);
        // line 4
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
        // line 130
        $this->displayBlock('scripts', $context, $blocks);
        // line 132
        echo "


";
        // line 135
        $this->displayBlock('javascript_footer', $context, $blocks);
        // line 140
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
    }

    // line 130
    public function block_scripts($context, array $blocks = array())
    {
    }

    // line 135
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 136
        echo "
    ";
        // line 137
        $this->loadTemplate("base/footer/js.twig", "base/template.twig", 137)->display($context);
        // line 138
        echo "
";
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
        return array (  202 => 138,  200 => 137,  197 => 136,  194 => 135,  189 => 130,  184 => 3,  170 => 140,  168 => 135,  163 => 132,  161 => 130,  33 => 4,  31 => 3,  28 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% include \"base/head/head.twig\" %}

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

{% block scripts %}
{% endblock %}



{% block javascript_footer %}

    {% include 'base/footer/js.twig' %}

{% endblock javascript_footer %}



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
