<?php

/* @Pages\Options/editRichText.phtml */
class __TwigTemplate_966c1ca6c0ca5f41491799a1efc1f162e248241aff76bbcd5b16ab9723c59fd1 extends Twig_Template
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
        echo "\t<textarea id='pageText' name=\"text\">
\t\t\t";
        // line 2
        echo (isset($context["text"]) ? $context["text"] : null);
        echo "
\t</textarea>";
    }

    public function getTemplateName()
    {
        return "@Pages\\Options/editRichText.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
