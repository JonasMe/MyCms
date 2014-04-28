<?php

/* @Pages/Dashboard/editPage.phtml */
class __TwigTemplate_7cf91157223807ce4afe7720bd6fea99d996620bdf889bfee2ddc2415d6350ed extends Twig_Template
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
\t<div>
\t  <a href=\"javascript:void(0);\" onClick=\"\$('.pageSave').submit();\">
\t  \t<span class=\"glyphicon glyphicon-floppy-saved\"></span> Gem
\t  </a>
\t  <a href=\"#\">
\t  \t<span class=\"glyphicon glyphicon-remove-circle\"></span> Annuler
\t  </a>
\t</div>
</div>

<div class=\"bar ali\">
\t<ul class=\"nav nav-tabs\">
\t  <li class=\"active\">
\t\t  \t<a href=\"#home\" data-toggle=\"tab\">
\t\t  \t\t<span style=\"color:#fff; font-size:48px;\" class=\"glyphicon glyphicon-list-alt\"></span>
\t\t  \t</a>
\t  </li>
\t  <li class=\"\">
\t\t  \t<a href=\"#settings\" data-toggle=\"tab\">
\t\t  \t\t<span style=\"color:#fff; font-size:48px;\" class=\"glyphicon glyphicon-cog\"></span>
\t\t  \t</a>
\t  </li>
\t</ul>
</div>


<div class=\"bar carrot optionpick\">
<b>Add</b>
 ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["Global"]) ? $context["Global"] : null), "Modules"), "allModulesSingle", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["mod"]) {
            // line 31
            echo " \t";
            if (($this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "frontendOptions") != false)) {
                // line 32
                echo " \t\t<a href=\"javascript:void(0);\" class=\"option\" attr-package=\"";
                echo $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getPackage", array(), "method");
                echo "\" attr-module=\"";
                echo $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getName", array(), "method");
                echo "\">";
                echo $this->getAttribute((isset($context["mod"]) ? $context["mod"] : null), "getName", array(), "method");
                echo "</a>
 \t";
            }
            // line 34
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mod'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "</div>
<div class=\"bar carrot dark displayoptions\">
</div>
<div class=\"bar\">

<div class=\"tab-content\">
  <div class=\"tab-pane active\" id=\"home\">
\t\t";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "placeholders", array(), "method"), "get", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["ph"]) {
            // line 43
            echo "\t\t\t<div class=\"panel panel-default\">
\t\t\t      <div class=\"panel-heading\">";
            // line 44
            echo $this->getAttribute((isset($context["ph"]) ? $context["ph"] : null), "title");
            echo "</div>

\t\t\t      <table class=\"table\">
\t\t\t        <thead>
\t\t\t          <tr>
\t\t\t            <th>#</th>
\t\t\t            <th>Navn</th>
\t\t\t            <th>Modul</th>
\t\t\t            <th>Oprettet af</th>
\t\t\t          </tr>
\t\t\t        </thead>
\t\t\t        <tbody class=\"sortable\" id=\"ph";
            // line 55
            echo $this->getAttribute((isset($context["ph"]) ? $context["ph"] : null), "placeholder_id");
            echo "\">
\t\t\t        ";
            // line 56
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["ph"]) ? $context["ph"] : null), "objects", array(), "method"), "get", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["pho"]) {
                // line 57
                echo "\t\t\t          <tr id=\"object";
                echo $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "placeholder_object_id");
                echo "\">
\t\t\t            <td><a href=\"javascript:void(0);\" onClick=\"\$('.optionpick').slideDown('slow');\">";
                // line 58
                echo $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "placeholder_object_id");
                echo "</a></td>
\t\t\t            <td><a href=\"/admin/Base.Pages/Dashboard%5CPages/placeholder/";
                // line 59
                echo $this->getAttribute((isset($context["ph"]) ? $context["ph"] : null), "placeholder_id");
                echo "/";
                echo $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "placeholder_object_id");
                echo "?option=";
                echo $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "module_option_id");
                echo "\">";
                echo $this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "title");
                echo "</a></td>
\t\t\t            <td>";
                // line 60
                echo $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["pho"]) ? $context["pho"] : null), "module", array(), "method"), "get", array(), "method"), "name");
                echo "</td>
\t\t\t            <td>Jonas</td>
\t\t\t          </tr>
\t\t\t        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pho'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "
\t\t\t        </tbody>
\t\t\t      </table>

\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ph'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "  </div>
  <div class=\"tab-pane\" id=\"settings\">
\t\t\t<form action=\"\" method=\"post\" class=\"pageSave\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"form-group col-lg-6\">
\t\t\t\t\t  <label class=\"control-label\" for=\"title\">Titel</label>
\t\t\t\t\t  <div class=\"controls\">
\t\t\t\t\t    <input id=\"title\" name=\"title\" type=\"text\" placeholder=\"Sidens titel\" class=\"input-xlarge form-control\" required=\"\" value=\"";
        // line 77
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title");
        echo "\">
\t\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t\t<!-- Text input-->
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"form-group col-lg-6\">
\t\t\t\t\t  <label class=\"control-label\" for=\"slug\">Sidens url</label>
\t\t\t\t\t  <div class=\"controls\">
\t\t\t\t\t    <input id=\"slug\" name=\"slug\" type=\"text\" placeholder=\"Indtast sidens URL her\" class=\"input-xlarge form-control\" required=\"\" value=\"";
        // line 87
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug");
        echo "\">
\t\t\t\t\t    
\t\t\t\t\t  </div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"form-group col-lg-6\">
\t\t\t\t\t<label class=\"control-label\" for=\"activeFrom\">Aktiv fra</label>
\t\t\t\t\t  <div class=\"datepicker input-append date input-group\">
\t\t\t\t\t    <input data-format=\"dd/MM/yyyy hh:mm:ss\" name=\"activeFrom\" type=\"text\" class=\"form-control\"></input>
\t\t\t\t\t    <span class=\"add-on input-group-addon\">
\t\t\t\t\t      <i data-time-icon=\"glyphicon glyphicon-time\" data-date-icon=\"glyphicon glyphicon-calendar\">
\t\t\t\t\t      </i>
\t\t\t\t\t    </span>
\t\t\t\t\t  </div>
\t\t\t\t\t </div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"form-group col-lg-6\">
\t\t\t\t\t<label class=\"control-label\" for=\"activeFrom\">Aktiv til</label>
\t\t\t\t\t  <div class=\"datepicker input-append date input-group\">
\t\t\t\t\t    <input data-format=\"dd/MM/yyyy hh:mm:ss\" name=\"activeTo\" type=\"text\" class=\"form-control\"></input>
\t\t\t\t\t    <span class=\"add-on input-group-addon\">
\t\t\t\t\t      <i data-time-icon=\"glyphicon glyphicon-time\" data-date-icon=\"glyphicon glyphicon-calendar\">
\t\t\t\t\t      </i>
\t\t\t\t\t    </span>
\t\t\t\t\t  </div>
\t\t\t\t\t </div>
\t\t\t\t</div>
\t\t\t
\t      </div>

\t        </form>
  </div>
</div>


</div>

<div class=\"modal fade\" id=\"editPage\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Rediger ";
        // line 133
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title");
        echo "</h4>
      </div>
      <div class=\"modal-body\">
\t\t<form action=\"\" method=\"post\">
\t\t\t<div class=\"control-group\">
\t\t\t  <label class=\"control-label\" for=\"title\">Titel</label>
\t\t\t  <div class=\"controls\">
\t\t\t    <input id=\"title\" name=\"title\" type=\"text\" placeholder=\"Sidens titel\" class=\"input-xlarge form-control\" required=\"\" value=\"";
        // line 140
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title");
        echo "\">
\t\t\t    
\t\t\t  </div>
\t\t\t</div>

\t\t\t<!-- Text input-->
\t\t\t<div class=\"control-group\">
\t\t\t  <label class=\"control-label\" for=\"slug\">Sidens url</label>
\t\t\t  <div class=\"controls\">
\t\t\t    <input id=\"slug\" name=\"slug\" type=\"text\" placeholder=\"Indtast sidens URL her\" class=\"input-xlarge form-control\" required=\"\" value=\"";
        // line 149
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug");
        echo "\">
\t\t\t    
\t\t\t  </div>
\t\t\t</div>

\t\t\t  <div class=\"datepicker input-append date\">
\t\t\t    <input data-format=\"dd/MM/yyyy hh:mm:ss\" type=\"text\"></input>
\t\t\t    <span class=\"add-on\">
\t\t\t      <i data-time-icon=\"glyphicon glyphicon-time\" data-date-icon=\"glyphicon glyphicon-calendar\">
\t\t\t      </i>
\t\t\t    </span>
\t\t\t  </div>
\t\t
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Afslut</button>
        <button type=\"submit\" class=\"btn btn-primary\">Gem</button>
        </form>
      </div>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "@Pages/Dashboard/editPage.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 149,  232 => 140,  222 => 133,  173 => 87,  160 => 77,  151 => 70,  140 => 64,  130 => 60,  120 => 59,  116 => 58,  111 => 57,  107 => 56,  103 => 55,  89 => 44,  86 => 43,  82 => 42,  73 => 35,  67 => 34,  57 => 32,  54 => 31,  50 => 30,  19 => 1,);
    }
}
