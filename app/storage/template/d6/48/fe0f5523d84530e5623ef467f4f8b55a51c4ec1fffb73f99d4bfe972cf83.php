<?php

/* Default/test.phtml */
class __TwigTemplate_d648fe0f5523d84530e5623ef467f4f8b55a51c4ec1fffb73f99d4bfe972cf83 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
\t<head>
\t\t\t";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 7
        echo "\t</head>
\t<body>
\t";
        // line 9
        echo call_user_func_array($this->env->getFunction('placeholder')->getCallable(), array("Dette er en test"));
        echo "
\t</body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "\t            <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t        ";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Default/test.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 5,  39 => 4,  32 => 9,  28 => 7,  26 => 4,  21 => 1,);
    }
}
