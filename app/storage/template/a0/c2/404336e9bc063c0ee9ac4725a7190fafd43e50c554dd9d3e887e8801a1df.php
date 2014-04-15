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
<div class=\"bar carrot optionpick\">
<b>Add</b>
 ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "Modules"), "allModulesSingle", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["mod"]) {
            // line 16
            echo " \t";
            if (($this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "frontendOptions") != false)) {
                // line 17
                echo " \t\t<a href=\"javascript:void(0);\" class=\"option\" attr-package=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getPackage", array(), "method"), "html", null, true);
                echo "\" attr-module=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getName", array(), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getName", array(), "method"), "html", null, true);
                echo "</a>
 \t";
            }
            // line 19
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mod'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "</div>
<div class=\"bar carrot dark displayoptions\">
</div>
<div class=\"bar\">
";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "placeholders", array(), "method"), "get", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["ph"]) {
            // line 25
            echo "\t<div class=\"panel panel-default\">
\t      <div class=\"panel-heading\">";
            // line 26
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
            // line 38
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["ph"]) ? $context["ph"] : null), "objects", array(), "method"), "get", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["pho"]) {
                // line 39
                echo "\t          <tr>
\t            <td><a href=\"javascript:void(0);\" onClick=\"\$('.optionpick').slideDown('slow');\">";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "placeholder_object_id"), "html", null, true);
                echo "</a></td>
\t            <td>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "title"), "html", null, true);
                echo "</td>
\t            <td>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "module", array(), "method"), "get", array(), "method"), "name"), "html", null, true);
                echo "</td>
\t            <td>Jonas</td>
\t          </tr>
\t        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pho'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "
\t        </tbody>
\t      </table>

\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ph'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "
</div>

<script type=\"text/javascript\">
\tfunction editPageReady() {
\t\t\$('.displayoptions, .optionpick').hide();

\t\t\$('.option').on('click',function() {
\t\t\tvar that = this;
\t\t\t\$.post('/Module/Base/Pages/Pages', 
\t\t\t\t\t{ 
\t\t\t\t\t\t'method' : 'ajaxModuleOptions',
\t\t\t\t\t\t'args' : 
\t\t\t\t\t\t\t\t\t[
\t\t\t\t\t\t\t\t\t\t\$(that).attr('attr-package'),
\t\t\t\t\t\t\t\t\t\t\$(that).attr('attr-module'),
\t\t\t\t\t\t\t\t\t]
\t\t\t\t\t}, function(data) { \$('.displayoptions').html(data).slideDown('slow'); });
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
        return array (  125 => 52,  114 => 46,  104 => 42,  100 => 41,  96 => 40,  93 => 39,  89 => 38,  74 => 26,  71 => 25,  67 => 24,  61 => 20,  55 => 19,  45 => 17,  42 => 16,  38 => 15,  22 => 2,  19 => 1,);
    }
}
