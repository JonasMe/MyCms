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
\t\t\t<div class=\"col-lg-1 fill\" id=\"sidePanel\">
\t\t\t\t";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sidebar"]) ? $context["sidebar"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["sb"]) {
            // line 15
            echo "\t\t\t\t\t<div module=\"";
            echo $this->getAttribute((isset($context["sb"]) ? $context["sb"] : null), "module");
            echo "\" file=\"";
            echo $this->getAttribute((isset($context["sb"]) ? $context["sb"] : null), "class");
            echo "\" method=\"";
            echo $this->getAttribute((isset($context["sb"]) ? $context["sb"] : null), "method");
            echo "\">
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-";
            // line 16
            echo $this->getAttribute((isset($context["sb"]) ? $context["sb"] : null), "icon");
            echo "\"></span><br />
\t\t\t\t\t\t";
            // line 17
            echo $this->getAttribute((isset($context["sb"]) ? $context["sb"] : null), "title");
            echo "
\t\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "\t\t\t</div>
\t\t\t<div class=\"col-lg-11 fill no-padding-left container\">
\t\t\t\t<div class=\"fill shadow-left\" id=\"sideBarExtra\"></div>
\t\t\t\t<div class=\"pull-left fill shadow-left\" id=\"mainSideBar\"></div>
\t\t\t\t<div class=\"pull-left\" id=\"mainContent\">hej med dig</div>

\t\t\t\t<div id=\"loader\">
\t\t\t\t\t<div class=\"spinner\"></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t</div>
\t\t\t\t<div class=\"modal fade\" id=\"DashboardModal\">
\t\t\t\t  <div class=\"modal-dialog modal-lg\">
\t\t\t\t    <div class=\"modal-content\">
\t\t\t\t      <div class=\"modal-header\">
\t\t\t\t        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t\t\t\t        <h4 class=\"modal-title\">Modal title</h4>
\t\t\t\t      </div>
\t\t\t\t      <div class=\"notifications\"></div>
\t\t\t\t      <form class=\"form\" class=\"save\" method=\"POST\">
\t\t\t\t\t      <div class=\"modal-body\">
\t\t\t\t\t        <p>One fine body&hellip;</p>
\t\t\t\t\t      </div>
\t\t\t\t      
\t\t\t\t      <div class=\"modal-footer\">
\t\t\t\t        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">";
        // line 46
        echo $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "get", array(0 => "dashboard.cancel"), "method");
        echo "</button>
\t\t\t\t        <button type=\"submit\" class=\"btn btn-primary\">";
        // line 47
        echo $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "get", array(0 => "dashboard.save_changes"), "method");
        echo "</button>
\t\t\t\t        </form>
\t\t\t\t      </div>
\t\t\t\t    </div>
\t\t\t\t  </div>
\t\t\t\t</div>

\t<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\" type=\"text/javascript\"></script>
\t<script src=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js\"></script>
\t<script src=\"";
        // line 56
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "js/bootstrap.min.js\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 57
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "js/json2html.js\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 58
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "DashboardViews");
        echo "js/bootstrap-datetimepicker.min.js\" type=\"text/javascript\"></script>
\t<script>
\t\tvar Request;
\t\tvar Modal;
\t\tvar Content;
\t\tvar MainSideBar;

\t\t\tfunction ModalControl(){ 
\t\t\t\t\tthis.element \t\t= \$('#DashboardModal');
\t\t\t\t\tthis.titleElement \t= this.element.find('.modal-title');
\t\t\t\t\tthis.bodyElement\t= this.element.find('.modal-body');
\t\t\t\t\tthis.formElement\t= this.element.find('form');
\t\t\t\t\tthis.notificationElement = this.element.find('.notifications');
\t\t\t};
\t\t\tModalControl.prototype = {
\t\t\t\treset : function() {
\t\t\t\t\tthis.titleElement.html(\"\");
\t\t\t\t\tthis.bodyElement.html(\"\");
\t\t\t\t\tthis.notificationElement.html(\"\");
\t\t\t\t\tthis.element.off('submit','form');
\t\t\t\t\treturn this;
\t\t\t\t},

\t\t\t\ttitle : function(title) {
\t\t\t\t\t\$(this.element).trigger('titleChange');
\t\t\t\t\tthis.titleElement.html(title);
\t\t\t\t\treturn this;
\t\t\t\t},
\t\t\t\taddNotification : function(note) {
\t\t\t\t\tvar n = \$(note).hide();
\t\t\t\t\tthis.notificationElement.append(n);
\t\t\t\t\tn.slideDown('slow');
\t\t\t\t\treturn this;
\t\t\t\t},
\t\t\t\tclearNotifications : function() {
\t\t\t\t\tthis.notificationElement.html(\"\");
\t\t\t\t\treturn this;
\t\t\t\t},
\t\t\t\tbody : function(body) {
\t\t\t\t\t\$(this.element).trigger('bodyChange');
\t\t\t\t\tthis.bodyElement.html(body);
\t\t\t\t\treturn this;
\t\t\t\t},

\t\t\t\tsubmit : function(sup) {
\t\t\t\t\tthis.element.on('submit','form',function(e) {
\t\t\t\t\t\te.preventDefault();
\t\t\t\t\t\tsup();
\t\t\t\t\t});
\t\t\t\t\treturn this;
\t\t\t\t},
\t\t\t\topen : function() {
\t\t\t\t\tthis.element.modal();
\t\t\t\t},
\t\t\t\tclose : function() {
\t\t\t\t\tthis.element.modal('hide');
\t\t\t\t}

\t\t\t}

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
\t\t\t\tstate : false,
\t\t\t\telement : \$('#mainSideBar'),
\t\t\t\topen : function(callback) {
\t\t\t\t\tif( this.state == false ) {
\t\t\t\t\t\tif( typeof(callback) == \"undefined\") {
\t\t\t\t\t\t\tcallback = function(){};
\t\t\t\t\t\t}
\t\t\t\t\t\t\$('#mainContent').css('width','80%');
\t\t\t\t\t\tvar that = this;
\t\t\t\t\t\tthis.element.show().animate({ width : '20%' },1000,function() {
\t\t\t\t\t\t\tthat.state = true;
\t\t\t\t\t\t\tcallback();
\t\t\t\t\t\t});
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\tclose : function(callback) {
\t\t\t\t\tif( this.state == true ) {
\t\t\t\t\t\tif( typeof(callback) == \"undefined\") {
\t\t\t\t\t\t\tcallback = function(){};
\t\t\t\t\t\t}
\t\t\t\t\t\t\$('#mainContent').css('width','100%');
\t\t\t\t\t\tthat = this;
\t\t\t\t\t\tthis.element.animate({ width : '0%' },1000,function() {
\t\t\t\t\t\t\t\tthat.element.hide();
\t\t\t\t\t\t\t\tthat.state = false;
\t\t\t\t\t\t\t\tcallback();
\t\t\t\t\t\t\t});
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\taddData : function(data, rendere) {
\t\t\t\t\tthis.element.off('click','**');
\t\t\t\t\tif( typeof(rendere) == \"undefined\" ) {
\t\t\t\t\t\tthis.element.html(data);
\t\t\t\t\t} else {
\t\t\t\t\t\tthis.element.html( rendere.render(data) );
\t\t\t\t\t}

\t\t\t\t\treturn this;
\t\t\t\t},
\t\t\t\tsubBar : {
\t\t\t\t\telement : \$('#sideBarExtra'),
\t\t\t\t\topen : function(callback) {
\t\t\t\t\t\tif( typeof(callback) == \"undefined\") {
\t\t\t\t\t\t\tcallback = function(){};
\t\t\t\t\t\t}
\t\t\t\t\t\tthis.element.show().animate({ width : '20%' },1000,callback);
\t\t\t\t\t},
\t\t\t\t\tclose : function(callback) {
\t\t\t\t\t\tif( typeof(callback) == \"undefined\") {
\t\t\t\t\t\t\tcallback = function(){};
\t\t\t\t\t\t}
\t\t\t\t\t\tthis.element.stop().animate({ width : '0%' },1000,function() {
\t\t\t\t\t\t\t\$(this).hide();
\t\t\t\t\t\t\tcallback();
\t\t\t\t\t\t});
\t\t\t\t\t},
\t\t\t\t\taddData : function(data, rendere) {
\t\t\t\t\t\tif( typeof(rendere) == \"undefined\" ) {
\t\t\t\t\t\t\tthis.element.html(data);
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\tthis.element.html( rendere.render(data) );
\t\t\t\t\t\t}

\t\t\t\t\t\treturn this;
\t\t\t\t\t},
\t\t\t\t}
\t\t\t};

\t\t\tfunction contentArea(){};
\t\t\tcontentArea.prototype = {
\t\t\t\telement : \$('#mainContent'),
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
\t\t\t\tloadIncrement : 0,
\t\t\t\tloadedCss : [],
\t\t\t\tloadedJs : [],
\t\t\t\tsetPckClass : function (pckclass) {
\t\t\t\t\tthis.pckClass = pckclass;
\t\t\t\t},
\t\t\t\tsetCall : function(call) {
\t\t\t\t\tthis.call = call;
\t\t\t\t},
\t\t\t\tloading : function(is) {
\t\t\t\t\tif( is == true ) {
\t\t\t\t\t\t\$(\"#loader\").show();
\t\t\t\t\t} else {
\t\t\t\t\t\t\$(\"#loader\").hide();
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\tloadScript : function(script,callback,container) {
\t\t\t\t\tif( typeof(callback) == \"undefined\" || callback == null ) {
\t\t\t\t\t\tcallback = function() {}
\t\t\t\t\t}

\t\t\t\t\tif( \$.inArray(script,this.loadedJs) > -1 ) {
\t\t\t\t\t\tcallback();
\t\t\t\t\t\treturn true;

\t\t\t\t\t}
\t\t\t\t\t\t    \t\t\t
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\tif( typeof(container) != \"undefined\" && container != null && container == true ) {
\t\t\t\t\t\tsource = \"/Module/Base.Dashboard/Dashboard/makeModularJs/\"+this.loadIncrement+\"?f=\"+script;
\t\t\t\t\t\tthis.loadIncrement++;
\t\t\t\t\t} else {
\t\t\t\t\t\tsource = script;
\t\t\t\t\t}

\t\t\t\t\t\$(\"<script>\", {
\t\t\t\t\t\ttype : 'text/javascript',
\t\t\t\t\t\t src  : source,
\t\t\t\t\t\tclass: 'sidescript',
\t\t\t\t\t}).appendTo('body');
\t\t\t\t\tthis.loadedJs.push(script);
\t\t\t\t\tcallback();
\t\t\t\t\t
\t\t\t\t},
\t\t\t\tloadCss : function(css,callback) {

\t\t\t\t\tif( typeof(callback) == \"undefined\" || callback == null ) {
\t\t\t\t\t\tcallback = function() {}
\t\t\t\t\t}

\t\t\t\t\tif( \$.inArray(css,this.loadedCss) > -1 ) {
\t\t\t\t\t\tcallback();
\t\t\t\t\t\treturn true;

\t\t\t\t\t}
\t\t\t\t\tthis.loadedCss.push(css);

\t\t\t\t\t\t\$('<link/>', {
\t\t\t\t\t\tclass : 'sidestyle',
\t\t\t\t\t\trel: 'stylesheet',
\t\t\t\t\t\ttype: 'text/css',
\t\t\t\t\t\thref: css + \"?t_=\"+Math.floor((Math.random()*1000)+1),
\t\t\t\t\t\t}).appendTo('head');

\t\t\t\t\t\tcallback();
\t\t\t\t\t\treturn true;
\t\t\t\t},
\t\t\t\tclearScripts : function() {
\t\t\t\t\tif( this.loadIncrement > 0 ) {
\t\t\t\t\t\tfor (var i = this.loadIncrement; i >= -1; i--) {
\t\t\t\t\t\t\twindow[\"data_\"+i] = null;
\t\t\t\t\t\t\twindow[\"func\"+i] = undefined;
\t\t\t\t\t\t\twindow[\"Holder\"+i] = null;
\t\t\t\t\t\t\t\$('.sidescript').empty().remove();
\t\t\t\t\t\t\tthis.loadedJs = [];
\t\t\t\t\t\t\tconsole.log( typeof( func1 )  );
\t\t\t\t\t\t};
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\tclearScript : function(id) {

\t\t\t\t},
\t\t\t\tfetch : function(object) {
\t\t\t\t\tvar pckClass,call,method,type,arguments,success,error,dataType;
\t\t\t\t\tif( typeof(object.pckClass) == \"undefined\" && typeof(this.pckClass) == \"undefined\" ) {
\t\t\t\t\t\tconsole.log(\"Fetch requires the pckClass parameter\");
\t\t\t\t\t\treturn false;
\t\t\t\t\t} else { pckClass = this.pckClass = object.pckClass; }

\t\t\t\t\tif( typeof(object.call) == \"undefined\" && typeof(this.call) ) {
\t\t\t\t\t\tconsole.log(\"Fetch requires the call parameter\");
\t\t\t\t\t\treturn false;
\t\t\t\t\t} else { call = this.call = object.call; }

\t\t\t\t\tif( typeof(object.method) == \"undefined\" ) {
\t\t\t\t\t\tconsole.log(\"Fetch requires the method parameter\");
\t\t\t\t\t\treturn false;
\t\t\t\t\t} else { method = object.method; }

\t\t\t\t\tif( typeof(object.type) == \"undefined\" ) {
\t\t\t\t\t\trequestType = \"post\";
\t\t\t\t\t} else { requestType = object.type; }

\t\t\t\t\tif( typeof(object.arguments) == \"undefined\" ) {
\t\t\t\t\t\targuments = {};
\t\t\t\t\t} else { arguments = object.arguments; }

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
\t\t\t\t\tthis.loading(true);
\t\t\t\t\t\$.ajax({
\t\t\t\t\t    url : url, type: requestType, data : arguments,
\t\t\t\t\t    success: function(data) {

\t\t\t\t\t    \tif( typeof(object.noCss) == \"undefined\" ) {
\t\t\t\t\t\t    \tif( typeof(data.loadCss) != \"undefined\" ) {
\t\t\t\t\t\t    \t\t\$.each(data.loadCss,function(key,css) {
\t\t\t\t\t\t    \t\t\tthat.loadCss(css);
\t\t\t\t\t\t    \t\t});
\t\t\t\t\t\t    \t}
\t\t\t\t\t\t    }

\t\t\t\t\t\t    if( typeof(object.noJs) == \"undefined\" ) {
\t\t\t\t\t\t    \tif( typeof(data.loadScript) != \"undefined\" ) {
\t\t\t\t\t\t    \t\t\$.each(data.loadScript,function(key,script) {
\t\t\t\t\t\t    \t\t\twindow[\"data_\"+that.loadIncrement] = data;
\t\t\t\t\t\t    \t\t\tthat.loadScript(script,function() {},true);
\t\t\t\t\t\t    \t\t});
\t\t\t\t\t\t    \t}
\t\t\t\t\t    \t}



\t\t\t\t\t    \tsuccess(data);
\t\t\t\t\t    \tthat.loading(false);
\t\t\t\t\t    },
\t\t\t\t\t    error: function(data) {
\t\t\t\t\t    \tthat.loading(false);
\t\t\t\t\t    \talert(\"An error occured.\");
\t\t\t\t\t    \terror();
\t\t\t\t\t    },
\t\t\t\t\t    dataType : dataType,
\t\t\t\t\t});
\t\t\t\t}
\t\t\t}

\t\t\tfunction LanguageControl(array) {
\t\t\t\tthis.langArray = array;
\t\t\t};
\t\t\tLanguageControl.prototype = {

\t\t\t\tget : function(string, replace) {
\t\t\t\t\tif( typeof(this.langArray[string]) != \"undefined\" || this.langArray[string] != null ) {
\t\t\t\t\t\t\tif( typeof(replace) != \"undefined\" && typeof(replace) == \"object\" ) {
\t\t\t\t\t\t\t\tthat = this;
\t\t\t\t\t\t\t\t\$.each(replace, function(k,v) {
\t\t\t\t\t\t\t\t\tthat.langArray[string] = that.langArray[string].replace(k,v);
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t}
\t\t\t\t\t\treturn this.langArray[string];
\t\t\t\t\t} else {
\t\t\t\t\t\treturn \"\";
\t\t\t\t\t}
\t\t\t\t}
\t\t\t}

\t\t\t\$(function() {
\t\t\t\t //s.addData({hej : \"dav\"},jsonListRenderer).open();
\t\t\t\t Content \t\t= new contentArea();
\t\t\t\t MainSideBar \t= new mainSideBar();
\t\t\t\t Modal  \t\t= new ModalControl();
\t\t\t\t Request \t\t= new RequestTool();

\t\t\t\t \$('#sidePanel > div').click(function() {
\t\t\t\t \t\$('#sidePanel > div.active').removeClass('active');
\t\t\t\t \t\$(this).addClass('active');
\t\t\t\t \tRequest.clearScripts();
\t\t\t\t \tMainSideBar.close();

\t\t\t\t\t Request.fetch(
\t\t\t\t\t \t\t{
\t\t\t\t\t \t\t\tpckClass : \$(this).attr('module'),
\t\t\t\t\t \t\t\tcall : \$(this).attr('file'),
\t\t\t\t\t \t\t\tmethod : \$(this).attr('method'),
\t\t\t\t\t \t\t\tsuccess : function(data) {
\t\t\t\t\t \t\t\t},
\t\t\t\t\t \t\t});
\t\t\t\t });
\t\t\t});
\t</script>
\t";
        // line 421
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
        return array (  487 => 421,  121 => 58,  117 => 57,  113 => 56,  101 => 47,  97 => 46,  69 => 20,  60 => 17,  56 => 16,  47 => 15,  43 => 14,  34 => 8,  30 => 7,  26 => 6,  19 => 1,);
    }
}
