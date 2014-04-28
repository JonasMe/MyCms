<?php

/* @Dashboard/javascriptContainer.phtml */
class __TwigTemplate_a5f0f6edfd1ad51b8170bd1278cac46b490067bb9079337d566e08d8bf74b880 extends Twig_Template
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
        echo "function func";
        echo (isset($context["token"]) ? $context["token"] : null);
        echo "() {};
func";
        // line 2
        echo (isset($context["token"]) ? $context["token"] : null);
        echo ".prototype = {
\tdata : data_";
        // line 3
        echo (isset($context["token"]) ? $context["token"] : null);
        echo ",
\tcontainer : function() {
\t\t";
        // line 5
        echo (isset($context["fileContent"]) ? $context["fileContent"] : null);
        echo "
\t}
};

var Holder";
        // line 9
        echo (isset($context["token"]) ? $context["token"] : null);
        echo " = new func";
        echo (isset($context["token"]) ? $context["token"] : null);
        echo ";
Holder";
        // line 10
        echo (isset($context["token"]) ? $context["token"] : null);
        echo ".container();
";
    }

    public function getTemplateName()
    {
        return "@Dashboard/javascriptContainer.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 10,  40 => 9,  33 => 5,  28 => 3,  24 => 2,  19 => 1,);
    }
}
