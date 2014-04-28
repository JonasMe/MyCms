<?php

/* @Dashboard\login.phtml */
class __TwigTemplate_5f6fce26b1960704237ee8a2085aeffe76a69a4862f0c4869ffff5c983ac090c extends Twig_Template
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
        echo "<form action=\"\" method=\"POST\">\t
\t<input type=\"hidden\" name=\"redirect\" value=\"";
        // line 2
        echo (isset($context["url"]) ? $context["url"] : null);
        echo "\" />
\t<input type=\"text\" name=\"email\">
\t<input type=\"password\" name=\"password\">
\t<input type=\"submit\" value=\"submit\" />
</form>";
    }

    public function getTemplateName()
    {
        return "@Dashboard\\login.phtml";
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
