<?php

/* @Pages\Dashboard/placeholderObject.phtml */
class __TwigTemplate_a85fc751d9df4aff549cedd9e332e0b5e701d74d962ad597562ac429110e872a extends Twig_Template
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
        echo "<div class=\"bar ali\">
\t\t  <a href=\"javascript:void(0);\" onClick=\"\$('#editPlaceholderForm').submit();\">
\t\t  \t<span class=\"glyphicon glyphicon-floppy-saved\"></span> Gem
\t\t  </a>
\t\t  <a href=\"#\">
\t\t  \t<span class=\"glyphicon glyphicon-remove-circle\"></span> Annuler
\t\t  </a>
</div>

<div class=\"bar\">
";
        // line 11
        if (((isset($context["hasForm"]) ? $context["hasForm"] : null) == true)) {
            // line 12
            echo "\t<form action=\"\" method=\"post\" id=\"editPlaceholderForm\">
";
        }
        // line 14
        echo "
\t";
        // line 15
        echo (isset($context["objectEdit"]) ? $context["objectEdit"] : null);
        echo "

";
        // line 17
        if (((isset($context["hasForm"]) ? $context["hasForm"] : null) == true)) {
            // line 18
            echo "\t</form>
";
        }
        // line 20
        echo "
</div>


";
    }

    public function getTemplateName()
    {
        return "@Pages\\Dashboard/placeholderObject.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 20,  47 => 18,  45 => 17,  40 => 15,  37 => 14,  33 => 12,  31 => 11,  19 => 1,);
    }
}
