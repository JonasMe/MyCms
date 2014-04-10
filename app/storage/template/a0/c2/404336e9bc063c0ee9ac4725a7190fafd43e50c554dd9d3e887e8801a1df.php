<?php

/* @Pages\editPage.phtml */
class __TwigTemplate_a0c2404336e9bc063c0ee9ac4725a7190fafd43e50c554dd9d3e887e8801a1df extends Twig_Template
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
        echo "<div class=\"bar ali dark\">
\t<b>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title"), "html", null, true);
        echo "</b>
</div>

<div class=\"bar ali\">
\t<div style=\"display:inline-block;\">
\t\t<span style=\"color:#fff; font-size:48px;\" class=\"glyphicon glyphicon-list-alt\"></span>
\t</div>
\t<div style=\"display:inline-block;\">
\t\t<span style=\"color:#fff; font-size:48px;\" class=\"glyphicon glyphicon-cog\"></span>
\t</div>
</div>

<div class=\"bar\">
";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "placeholders", array(), "method"), "get", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["ph"]) {
            // line 16
            echo "\t<div class=\"panel panel-default\">
\t      <div class=\"panel-heading\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ph"]) ? $context["ph"] : null), "title"), "html", null, true);
            echo "</div>

\t      <table class=\"table\">
\t        <thead>
\t          <tr>
\t            <th>#</th>
\t            <th>Navn</th>
\t            <th>Modul</th>
\t            <th>Oprettet af</th>
\t          </tr>
\t        </thead>
\t        <tbody>
\t        ";
            // line 29
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["ph"]) ? $context["ph"] : null), "objects", array(), "method"), "get", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["pho"]) {
                // line 30
                echo "\t          <tr>
\t            <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "placeholder_object_id"), "html", null, true);
                echo "</td>
\t            <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "title"), "html", null, true);
                echo "</td>
\t            <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "module", array(), "method"), "get", array(), "method"), "name"), "html", null, true);
                echo "</td>
\t            <td>Jonas</td>
\t          </tr>
\t        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pho'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "
\t        </tbody>
\t      </table>

\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ph'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "
</div>

<div class=\"bar ali dark\">
<b>Add</b>
 ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "Modules"), "allModulesSingle", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["mod"]) {
            // line 49
            echo " \t";
            if (($this->getAttribute($this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getConfig", array(), "method"), "frontendOptions") != false)) {
                // line 50
                echo " \t\t<a href=\"javascript:void(0);\" class=\"option\" attr-package=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getPackage", array(), "method"), "html", null, true);
                echo "\" attr-module=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getName", array(), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getName", array(), "method"), "html", null, true);
                echo "</a>
 \t";
            }
            // line 52
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mod'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "</div>
<div class=\"bar ali displayoptions\">
</div>

<script type=\"text/javascript\">
\tfunction editPageReady() {
\t\t\$('.option').on('click',function() {
\t\t\tvar that = this;
\t\t\t\$.post('/Module/Base/Pages', 
\t\t\t\t\t{ 
\t\t\t\t\t\t'method' : 'ajaxModuleOptions',
\t\t\t\t\t\t'args' : 
\t\t\t\t\t\t\t\t\t[
\t\t\t\t\t\t\t\t\t\t\$(that).attr('attr-package'),
\t\t\t\t\t\t\t\t\t\t\$(that).attr('attr-module'),
\t\t\t\t\t\t\t\t\t]
\t\t\t\t\t}, function(data) { \$('.displayoptions').html(data); });
\t\t});
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "@Pages\\editPage.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 53,  120 => 52,  110 => 50,  107 => 49,  103 => 48,  96 => 43,  85 => 37,  75 => 33,  71 => 32,  67 => 31,  64 => 30,  60 => 29,  45 => 17,  42 => 16,  38 => 15,  22 => 2,  19 => 1,);
    }
}
