<?php

/* @Dashboard/master.phtml */
class __TwigTemplate_9e77c82866a58320b3df949d4a2157550a2d869c11c642bfece2221104b7f3d1 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
\t<head>
\t\t<link href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews"), "html", null, true);
        echo "css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
\t\t<link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews"), "html", null, true);
        echo "css/main.css\" rel=\"stylesheet\" type=\"text/css\" />
\t</head>
\t<body>
\t<div class=\"clearfix mainWrapper\">
\t\t<div class=\"col-lg-12 header\">
\t\t\t<ul>
\t\t\t\t<!--<li>
\t\t\t\t\t<span class=\"glyphicon glyphicon-th\"></span>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<span class=\"glyphicon glyphicon-tasks\"></span>
\t\t\t\t</li>-->
\t\t\t</ul>
\t\t</div>
\t\t<div class=\"col-lg-1 sidebar\">
\t\t<ul>

\t\t\t";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["sidebar"]) ? $context["sidebar"] : null), "getAll"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 23
            echo "\t\t        <li 
\t\t        \t";
            // line 24
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getCustom", array(0 => "sitebarAjax"), "method") != false)) {
                // line 25
                echo "\t\t        \t\tsidebar-utilize-ajax=\"true\" 
\t\t        \t\tsidebar-ajax=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getModule"), "getPackage"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getModule"), "getName"), "html", null, true);
                echo "\" 
\t\t        \t\tsidebar-class=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getCustom", array(0 => "sitebarAjax"), "method"), "class"), "html", null, true);
                echo "\" 
\t\t        \t\tsidebar-method=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getCustom", array(0 => "sitebarAjax"), "method"), "method"), "html", null, true);
                echo "\" 
\t\t        \t\tsidebar-args=\"";
                // line 29
                echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getCustom", array(0 => "sitebarAjax"), "method"), "args")), "html", null, true);
                echo "\" 
\t\t        \t\tsidebar-callback=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getCustom", array(0 => "ajaxCallback"), "method"), "html", null, true);
                echo "\"
\t\t        \t";
            }
            // line 32
            echo "\t\t        >
\t\t        \t<div>
\t\t        \t<span class=\"glyphicon glyphicon-";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getIcon"), "html", null, true);
            echo "\"></span>
\t\t        \t";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getTitle"), "html", null, true);
            echo "
\t\t        \t</div>
\t\t        </li>
\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "
\t\t</ul>

\t\t</div>
\t\t<div class=\"col-lg-11 content\">
\t\t\t<div class=\"subSide pull-left\"></div>
\t\t\t<div class=\"bar\">Hej med dig kaj</div>
\t\t</div>
\t</div>

\t<!--Javascript-->
\t<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews"), "html", null, true);
        echo "js/bootstrap.min.js\" type=\"text/javascript\"></script>
\t<script type=\"text/javascript\">
\t\tfunction sizeHeight() {
\t\t\$('.mainWrapper .sidebar, .mainWrapper .content, .mainWrapper .subSide')
\t\t\t.height( parseInt(\$(window).height()) - parseInt(\$('.mainWrapper .header').height() ) );
\t\t}
\t\t\$(function() {

\t\t\$('.mainWrapper .sidebar, .mainWrapper .content, .mainWrapper .subSide')
\t\t\t.height( parseInt(\$(window).height()) - parseInt(\$('.mainWrapper .header').height() ) );

\t\t\t\$(window).resize(function() { sizeHeight(); });

\t\t\t\$('.sidebar li[sidebar-utilize-ajax=\"true\"]').each(function() {
\t\t\t\tvar call \t\t= \$(this).attr('sidebar-ajax');
\t\t\t\tvar clasS \t\t= \$(this).attr('sidebar-class');
\t\t\t\tvar method \t\t= \$(this).attr('sidebar-method');
\t\t\t\tvar args \t\t= \$(this).attr('sidebar-args');
\t\t\t\tvar callback \t= \$(this).attr('sidebar-callback');

\t\t\t\t\$(this).click(function() {
\t\t\t\t\t\$.ajax({
\t\t\t\t\t    url : \"/Module/\"+call,
\t\t\t\t\t    type: \"POST\",
\t\t\t\t\t    data : { \"class\" : clasS, \"method\" : method, args : args},
\t\t\t\t\t    success: function(data)
\t\t\t\t\t    {
\t\t\t\t\t    \t\$('.subSide').html(data);
\t\t\t\t\t    \tif( callback != \"\" ) { eval(callback+\"()\"); }
\t\t\t\t\t    \t\$('.subSide').show().css('width','0%').animate({ 'width' : '20%' }, 1000,function() {
\t\t\t\t\t    \t\t
\t\t\t\t\t    \t});
\t\t\t\t\t        
\t\t\t\t\t    },
\t\t\t\t\t    error: function (jqXHR)
\t\t\t\t\t    {
\t\t\t\t\t 
\t\t\t\t\t    }
\t\t\t\t\t});
\t\t\t\t});

\t\t\t});

\t\t});
\t</script>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "@Dashboard/master.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 51,  101 => 39,  91 => 35,  87 => 34,  83 => 32,  78 => 30,  74 => 29,  70 => 28,  66 => 27,  60 => 26,  57 => 25,  55 => 24,  52 => 23,  48 => 22,  28 => 5,  24 => 4,  19 => 1,);
    }
}
