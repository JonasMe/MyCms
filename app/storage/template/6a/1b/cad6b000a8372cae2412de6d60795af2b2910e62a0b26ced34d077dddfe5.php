<?php

/* @Pages/Dashboard/index.phtml */
class __TwigTemplate_6a1bcad6b000a8372cae2412de6d60795af2b2910e62a0b26ced34d077dddfe5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Pages/Dashboard/master.phtml");

        $this->blocks = array(
            'sidebar' => array($this, 'block_sidebar'),
            'maincont' => array($this, 'block_maincont'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Pages/Dashboard/master.phtml";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_sidebar($context, array $blocks = array())
    {
        // line 3
        echo "\t";
        echo $this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "menu");
        echo "
";
    }

    // line 6
    public function block_maincont($context, array $blocks = array())
    {
        // line 7
        echo "\t";
        echo (isset($context["cont"]) ? $context["cont"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Pages/Dashboard/index.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 7,  39 => 6,  32 => 3,  29 => 2,);
    }
}
