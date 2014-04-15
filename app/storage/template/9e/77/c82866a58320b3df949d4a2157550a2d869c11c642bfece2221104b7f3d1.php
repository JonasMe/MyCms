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
\t\t<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
\t\t<link rel=\"stylesheet\" href=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css\" />
\t\t<link href=\"";
        // line 6
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "css/bootstrap-datetimepicker.min.css\" rel=\"stylesheet\" type=\"text/css\" />
\t\t<link href=\"";
        // line 7
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
\t\t<link href=\"";
        // line 8
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "css/dashboard.css\" rel=\"stylesheet\" type=\"text/css\" />
\t</head>

\t<body>
\t<div class=\"row fill\">
\t\t\t<div class=\"col-lg-1 fill\" id=\"sidePanel\"></div>
\t\t\t<div class=\"col-lg-11 fill no-padding-left\">
\t\t\t\t<div class=\"pull-left fill shadow-left\" id=\"mainSideBar\"></div>
\t\t\t\t<div class=\"pull-left\" id=\"mainContent\">hej med dig</div>
\t\t\t</div>
\t\t\t
\t</div>

\t<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\" type=\"text/javascript\"></script>
\t<script src=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js\"></script>
\t<script src=\"";
        // line 23
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "js/bootstrap.min.js\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 24
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "js/json2html.js\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 25
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "js/bootstrap-datetimepicker.min.js\" type=\"text/javascript\"></script>
\t<script>

\t\t\tvar jsonListRenderer =  {
\t\t\t\trender : function(data) {
\t\t\t\t\tvar returnS = \"\";
\t\t\t\t\t\$.each(data,function(k,f) {
\t\t\t\t\t\treturnS = returnS + f.module_options_id;
\t\t\t\t\t});

\t\t\t\t\treturn returnS;
\t\t\t\t}
\t\t\t};

\t\t\tfunction mainSideBar(){}
\t\t\tmainSideBar.prototype = {
\t\t\t\telement : \$('#mainSideBar'),
\t\t\t\topen : function(callback) {
\t\t\t\t\tif( typeof(callback) == \"undefined\") {
\t\t\t\t\t\tcallback = function(){};
\t\t\t\t\t}
\t\t\t\t\t\$('#mainContent').css('width','80%');
\t\t\t\t\tthis.element.show().animate({ width : '20%' },1000,callback);
\t\t\t\t},
\t\t\t\tclose : function(callback) {
\t\t\t\t\tif( typeof(callback) == \"undefined\") {
\t\t\t\t\t\tcallback = function(){};
\t\t\t\t\t}
\t\t\t\t\t\$('#mainContent').css('width','100%');
\t\t\t\t\tthis.element.animate({ width : '0%' },1000,callback).hide();
\t\t\t\t},
\t\t\t\taddData : function(data, rendere) {
\t\t\t\t\tif( typeof(rendere) == \"undefined\" ) {
\t\t\t\t\t\tthis.element.html(data);
\t\t\t\t\t} else {
\t\t\t\t\t\tthis.element.html( rendere.render(data) );
\t\t\t\t\t}

\t\t\t\t\treturn this;
\t\t\t\t}
\t\t\t};

\t\t\tfunction contentArea(){};
\t\t\tcontentArea.prototype = {
\t\t\t\telement : \$('#mainContent'),
\t\t\t\tloading : function(is) {
\t\t\t\t\tif( is == true ) {
\t\t\t\t\t\tthis.element.html(\"Henter..\");
\t\t\t\t\t} else {

\t\t\t\t\t}
\t\t\t\t},
\t\t\t\taddData : function(data, rendere) {
\t\t\t\t\tif( typeof(rendere) == \"undefined\" ) {
\t\t\t\t\t\tthis.element.html(data);
\t\t\t\t\t} else {
\t\t\t\t\t\tthis.element.html( rendere.render(data) );
\t\t\t\t\t}

\t\t\t\t\treturn this;
\t\t\t\t}
\t\t\t}

\t\t\tfunction RequestTool() {}
\t\t\tRequestTool.prototype = {
\t\t\t\tloadedCss : [],
\t\t\t\tloadedJs : [],
\t\t\t\tfetch : function(object) {
\t\t\t\t\tvar pckClass,call,method,type,arguments,success,error,dataType;
\t\t\t\t\tif( typeof(object.pckClass) == \"undefined\" ) {
\t\t\t\t\t\tconsole.log(\"Fetch requires the pckClass parameter\");
\t\t\t\t\t\treturn false;
\t\t\t\t\t} else { pckClass = object.pckClass; }

\t\t\t\t\tif( typeof(object.call) == \"undefined\" ) {
\t\t\t\t\t\tconsole.log(\"Fetch requires the call parameter\");
\t\t\t\t\t\treturn false;
\t\t\t\t\t} else { call = object.call; }

\t\t\t\t\tif( typeof(object.method) == \"undefined\" ) {
\t\t\t\t\t\tconsole.log(\"Fetch requires the method parameter\");
\t\t\t\t\t\treturn false;
\t\t\t\t\t} else { method = object.method; }

\t\t\t\t\tif( typeof(object.type) == \"undefined\" ) {
\t\t\t\t\t\trequestType = \"post\";
\t\t\t\t\t} else { requestType = object.type; }

\t\t\t\t\tif( typeof(object.arguments) == \"undefined\" ) {
\t\t\t\t\t\targuments = {};
\t\t\t\t\t} else { arguments ={ args : object.arguments }; }

\t\t\t\t\tif( typeof(object.success) == \"undefined\" ) {
\t\t\t\t\t\tsuccess = function(){};
\t\t\t\t\t} else { success = object.success; }

\t\t\t\t\tif( typeof(object.error) == \"undefined\" ) {
\t\t\t\t\t\terror = function(){};
\t\t\t\t\t} else { error = object.error; }

\t\t\t\t\tif( typeof(object.dataType) == \"undefined\" ) {
\t\t\t\t\t\t
\t\t\t\t\t} else { dataType = object.dataType; }

\t\t\t\t\tvar url = \"/Module/\"+pckClass+\"/\"+encodeURIComponent(call)+\"/\"+method;
\t\t\t\t\tif( typeof(object.urlArguments) != \"undefined\") {
\t\t\t\t\t\turl = url + \"/\"+object.urlArguments;
\t\t\t\t\t}
\t\t\t\t\tvar that = this;

\t\t\t\t\t\$.ajax({
\t\t\t\t\t    url : url, type: requestType, data : arguments,
\t\t\t\t\t    success: function(data) {
\t\t\t\t\t    \tvar DynVar = pckClass.replace(\".\",\"_\");
\t\t\t\t\t    \twindow[DynVar+\"_\"+method] = data;

\t\t\t\t\t    \tsuccess(data);

\t\t\t\t\t    \tif( typeof(object.noCss) == \"undefined\" ) {
\t\t\t\t\t\t    \tif( typeof(data.loadCss) != \"undefined\" ) {
\t\t\t\t\t\t    \t\t\$.each(data.loadCss,function(key,css) {
\t\t\t\t\t\t    \t\tif( \$.inArray(css,that.loadedCss) > -1 ) { return true; }
\t\t\t\t\t\t    \t\tthat.loadedCss.push(css);
\t\t\t\t\t\t    \t\t\$('<link/>', {
\t\t\t\t\t\t\t\t\t\t   rel: 'stylesheet',
\t\t\t\t\t\t\t\t\t\t   type: 'text/css',
\t\t\t\t\t\t\t\t\t\t   href: css + \"?t_=\"+Math.floor((Math.random()*1000)+1),
\t\t\t\t\t\t\t\t\t\t}).appendTo('head');
\t\t\t\t\t\t    \t\t});
\t\t\t\t\t\t    \t}
\t\t\t\t\t\t    }

\t\t\t\t\t\t    if( typeof(object.noJs) == \"undefined\" ) {
\t\t\t\t\t\t    \tif( typeof(data.loadScript) != \"undefined\" ) {
\t\t\t\t\t\t    \t\t\$.each(data.loadScript,function(key,script) {
\t\t\t\t\t\t    \t\t\tif( \$.inArray(script,that.loadedJs) > -1) { return true; }
\t\t\t\t\t\t    \t\t\tthat.loadedJs.push(script);
\t\t\t\t\t\t    \t\t\t\$.getScript( script, function() { })
\t\t\t\t\t\t    \t\t\t.fail(function( jqxhr, settings, exception ) {
\t    \t\t\t\t\t\t\t\t\tconsole.log(\"Triggered ajaxError handler. \" + exception );
\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t    \t\t});
\t\t\t\t\t\t    \t}
\t\t\t\t\t    \t}
\t\t\t\t\t    },
\t\t\t\t\t    error: error,
\t\t\t\t\t    dataType : dataType,
\t\t\t\t\t});
\t\t\t\t}
\t\t\t}

\t\t\t\$(function() {
\t\t\t\t //s.addData({hej : \"dav\"},jsonListRenderer).open();
\t\t\t\t request = new RequestTool();
\t\t\t\t request.fetch(
\t\t\t\t \t\t{
\t\t\t\t \t\t\tpckClass : \"Base.Pages\",
\t\t\t\t \t\t\tcall : \"Dashboard\\\\Pages\",
\t\t\t\t \t\t\tmethod : \"getPages\",
\t\t\t\t \t\t\tsuccess : function(data) {
\t\t\t\t \t\t\t},
\t\t\t\t \t\t});
\t\t\t});
\t</script>
\t";
        // line 189
        echo (isset($context["appendJs"]) ? $context["appendJs"] : null);
        echo "
\t</body>
</html>
";
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
        return array (  227 => 189,  60 => 25,  56 => 24,  52 => 23,  34 => 8,  30 => 7,  26 => 6,  19 => 1,);
    }
}
