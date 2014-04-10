<?php

/* @Pages\typo.phtml */
class __TwigTemplate_eeae9b8ec56d00625744b9b9152b3175d402e50fb2d11c284cc1083b54fb1b26 extends Twig_Template
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
        echo "<div style=\"margin-top:10px; font-size:14px; margin-left:5px; margin-right:5px; border-bottom:1px solid #fff; padding-bottom:5px;\">
  <span class=\"addNewPage\"><span class=\"glyphicon glyphicon-plus\"></span> Tilføj side</span>
   
   <span class=\"glyphicon glyphicon-transfer\" style=\"margin-left:20px;\"></span> Eksporter
</div>
<div class=\"helper\" style=\"margin-top:10px; font-size:14px; margin-left:5px; margin-right:5px; border-bottom:1px solid #fff; padding-bottom:5px; display:none;\">
\t<div class=\"form-group\">
\t\t<label>Sidenavn</label>
\t\t<input type=\"text\" name=\"pageName\" class=\"form-controll\" />
\t</div>
</div>
<div class=\"tree\">
    <ul>
    \t";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pages"]) ? $context["pages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 15
            echo "\t        <li>\t<a href=\"#\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title"), "html", null, true);
            echo "</a>

\t            <ul>
\t                <li>\t<a href=\"#\">Child</a>

\t                    <ul>
\t                        <li>\t<a href=\"#\">Grand Child</a>

\t                        </li>
\t                    </ul>
\t                </li>
\t                <li>\t<a href=\"#\">Child</a>

\t                    <ul>
\t                        <li><a href=\"#\">Grand Child</a>
\t                        </li>
\t                        <li>\t<a href=\"#\">Grand Child</a>

\t                            <ul>
\t                                <li>\t<a href=\"#\">Great Grand Child</a>

\t                                </li>
\t                                <li>\t<a href=\"#\">Great Grand Child</a>

\t                                </li>
\t                                <li>\t<a href=\"#\">Great Grand Child</a>

\t                                </li>
\t                            </ul>
\t                        </li>
\t                        <li><a href=\"#\">Grand Child</a>
\t                        </li>
\t                    </ul>
\t                </li>
\t            </ul>
\t        </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "    </ul>
</div>
<script type=\"text/javascript\">
\tfunction TreeReady() {

\t\t\$('.addNewPage').click(function() {
\t\t\t\$('.helper').slideDown('slow');
\t\t});

\t    \$('.tree li li').hide();
\t    \$('.tree li').on('click', function (e) {
\t        var children = \$(this).find('> ul > li');
\t        if (children.is(\":visible\")) children.hide('fast');
\t        else children.show('fast');
\t        e.stopPropagation();
\t    });
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "@Pages\\typo.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 52,  38 => 15,  34 => 14,  19 => 1,);
    }
}
