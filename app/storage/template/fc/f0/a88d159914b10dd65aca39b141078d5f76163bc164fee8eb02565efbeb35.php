<?php

/* @Dashboard/index.phtml */
class __TwigTemplate_fcf0a88d159914b10dd65aca39b141078d5f76163bc164fee8eb02565efbeb35 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Dashboard/master.phtml");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Dashboard/master.phtml";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "@Dashboard/index.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array ();
    }
}
