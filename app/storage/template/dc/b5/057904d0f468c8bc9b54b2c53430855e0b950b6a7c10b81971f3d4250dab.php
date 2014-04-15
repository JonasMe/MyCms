<?php

/* @Pages/Dashboard/master.phtml */
class __TwigTemplate_dcb5057904d0f468c8bc9b54b2c53430855e0b950b6a7c10b81971f3d4250dab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sidebar' => array($this, 'block_sidebar'),
            'maincont' => array($this, 'block_maincont'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"subSide col-lg-2 fullHeight\">
\t<div class=\"tree\">
\t";
        // line 3
        $this->displayBlock('sidebar', $context, $blocks);
        // line 4
        echo "\t</div>
</div>
<div class=\"col-lg-10\">
\t";
        // line 7
        $this->displayBlock('maincont', $context, $blocks);
        // line 8
        echo "</div>
";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 7
    public function block_maincont($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@Pages/Dashboard/master.phtml";
    }

    public function getDebugInfo()
    {
        return array (  44 => 7,  39 => 3,  34 => 8,  32 => 7,  27 => 4,  25 => 3,  21 => 1,  31 => 3,  28 => 2,);
    }
}
