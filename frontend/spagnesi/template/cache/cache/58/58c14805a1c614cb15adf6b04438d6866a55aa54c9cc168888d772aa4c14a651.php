<?php

/* base/footer/footer.twig */
class __TwigTemplate_c49d7b34771e37802c609323e8d321a29a601fa9bc07ca0605173d8f640a2eba extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'scripts' => array($this, 'block_scripts'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Footer -->
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
        // line 125
        $this->displayBlock('scripts', $context, $blocks);
        // line 127
        echo "


";
        // line 130
        $this->displayBlock('javascript_footer', $context, $blocks);
        // line 135
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

    // line 125
    public function block_scripts($context, array $blocks = array())
    {
    }

    // line 130
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 131
        echo "
";
        // line 132
        $this->loadTemplate("base/footer/js.twig", "base/footer/footer.twig", 132)->display($context);
        // line 133
        echo "
";
    }

    public function getTemplateName()
    {
        return "base/footer/footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  187 => 133,  185 => 132,  182 => 131,  179 => 130,  174 => 125,  160 => 135,  158 => 130,  153 => 127,  151 => 125,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- Footer -->
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
", "base/footer/footer.twig", "/Users/phomea/Siti/Spagnesi/frontend/spagnesi/template/base/footer/footer.twig");
    }
}
