<?php

/* @Pages\typo.phtml */
class __TwigTemplate_eeae9b8ec56d00625744b9b9152b3175d402e50fb2d11c284cc1083b54fb1b26 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div style=\"margin-top:10px; font-size:14px; margin-left:5px; margin-right:5px; border-bottom:1px solid #fff; padding-bottom:5px;\">
  <span class=\"addNewPage\"><span class=\"glyphicon glyphicon-plus\"></span> Tilføj side</span>
   
   <span class=\"glyphicon glyphicon-transfer\" style=\"margin-left:20px;\"></span> Eksporter
</div>
<div class=\"helper\" style=\"margin-top:10px; font-size:14px; margin-left:5px; margin-right:5px; border-bottom:1px solid #fff; padding-bottom:5px; display:none;\">
\t<div class=\"form-group\">
\t\t<label>Sidenavn</label>
\t\t<input type=\"text\" name=\"pageName\" class=\"form-controll\" />
\t</div>
</div>
<div class=\"tree\">

    ";
        // line 14
        echo (isset($context["menu"]) ? $context["menu"] : null);
        echo "
</div>
<script type=\"text/javascript\">
\tfunction TreeReady() {

\t\t\$('.tree li').each(function() {
\t\t\tif( \$(this).children('ul').length > 0 ) {
\t\t\t\t\$(this).prepend('<span class=\"trigger glyphicon glyphicon-expand\" style=\"cursor:pointer;\"></span>');
\t\t\t}
\t\t});

\t\t\$('.addNewPage').click(function() {
\t\t\t\$('.helper').slideDown('slow');
\t\t});

\t    \$('.tree li li').hide();
\t    \$('.tree li .trigger').on('click', function (e) {
\t    \tif( \$(this).parent().children('ul').length > 0 ) {

\t        \tvar children = \$(this).parent().find('> ul > li');
\t        \tif (children.is(\":visible\")) {
\t        \t\t\$(this).removeClass('glyphicon-collapse-down').addClass('glyphicon-expand');
\t        \t\tchildren.hide('fast');
\t        \t} else {
\t        \t\t\$(this).removeClass('glyphicon-expand').addClass('glyphicon-collapse-down');
\t        \t\tchildren.show('fast');
\t        \t}
\t        \te.stopPropagation();
\t        }
\t    });
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "@Pages\\typo.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 14,  19 => 1,);
    }
}
