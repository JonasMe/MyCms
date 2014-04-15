<?php

/* @Pages\dashboardIndex.phtml */
class __TwigTemplate_4cbbda1c6cf4c75e2be8bd18702c3f326b390f5b438cc6ef8eed0afe2c9b7adf extends Twig_Template
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
        echo "<div class=\"subSide col-lg-2 fullHeight\">
\t<div class=\"tree\">
    \t";
        // line 3
        echo (isset($context["menu"]) ? $context["menu"] : null);
        echo "
\t</div>
</div>
<div class=\"col-lg-10\">
 Dav.
</div>
";
    }

    public function getTemplateName()
    {
        return "@Pages\\dashboardIndex.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
