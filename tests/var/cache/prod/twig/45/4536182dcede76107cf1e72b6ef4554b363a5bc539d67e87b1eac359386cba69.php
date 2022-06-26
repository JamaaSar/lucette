<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* parking/addnewav.html.twig */
class __TwigTemplate_fa126fcab28ea5964ba28bb0dd8fc7e0453e79b67e4258814d12e36c95086717 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layoutadmin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "parking/addnewav.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo "Lucette
";
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        // line 7
        echo "\t<div class=\"breadcrumbs\">
\t\t<div class=\"col-sm-4\">
\t\t\t<div class=\"page-header float-left\"></div>
\t\t</div>
\t\t<div class=\"col-sm-8\">
\t\t\t<div class=\"page-header float-right\">
\t\t\t\t<div class=\"page-title\">
\t\t\t\t\t<ol class=\"breadcrumb text-right\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
        // line 16
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
        echo "\">Dashboard</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_list");
        echo "\">Parking</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"active\">Availability</li>
\t\t\t\t\t</ol>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"content mt-3\">
\t\t<div class=\"animated fadeIn\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-5\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t<strong class=\"card-title\">Add Availability</strong>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<div class=\"tile col-lg-4\">
\t\t\t\t\t\t\t\t";
        // line 37
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parking", [], "any", false, false, false, 39), 'errors');
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parking", [], "any", false, false, false, 40), 'label');
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parking", [], "any", false, false, false, 41), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        // line 43
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 44
            echo "\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
            // line 45
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "provider", [], "any", false, false, false, 45), 'errors');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 46
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "provider", [], "any", false, false, false, 46), 'label');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 47
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "provider", [], "any", false, false, false, 47), 'widget', ["attr" => ["class" => "form-control"]]);
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 50
        echo "\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "from", [], "any", false, false, false, 51), 'errors');
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "from", [], "any", false, false, false, 52), 'label');
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "from", [], "any", false, false, false, 53), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "to", [], "any", false, false, false, 56), 'errors');
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "to", [], "any", false, false, false, 57), 'label');
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "to", [], "any", false, false, false, 58), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 61), 'errors');
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 62), 'label');
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 63), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-info\">Add</button>
\t\t\t\t\t\t\t\t<a href=\"";
        // line 66
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_listofavailability");
        echo "\" class=\"btn btn-danger\">Return</a>

\t\t\t\t\t\t\t\t";
        // line 68
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t<strong class=\"card-title\"></strong>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"card-body\">

\t\t\t\t\t\t\t";
        // line 82
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 82));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 83
            echo "\t\t\t\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t\t\t\t\t";
            // line 85
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "alert-warning"], "method", false, false, false, 91));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 92
            echo "\t\t\t\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\t\t\t\t\t";
            // line 94
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t\t\t\t\t</button>

\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "
\t\t\t\t\t\t\t<table id=\"bootstrap-data-table-export\" class=\"table table-striped bordered\">
\t\t\t\t\t\t\t\t<thead style=\"background-color: #85A6B8; color: white;\">
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t";
        // line 105
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 106
            echo "\t\t\t\t\t\t\t\t\t\t\t<th>Provider</th>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 108
        echo "\t\t\t\t\t\t\t\t\t\t<th>Parking</th>
\t\t\t\t\t\t\t\t\t\t<th>Date</th>
\t\t\t\t\t\t\t\t\t\t<th>From</th>
\t\t\t\t\t\t\t\t\t\t<th>To</th>
\t\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t";
        // line 116
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["availabilities"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["availability"]) {
            // line 117
            echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 118
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 118), "name", [], "any", false, false, false, 118), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 119
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["availability"], "date", [], "any", false, false, false, 119), "d-m-Y"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 120
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["availability"], "debut", [], "any", false, false, false, 120), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 121
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["availability"], "fin", [], "any", false, false, false, 121), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 123
            if ((twig_get_attribute($this->env, $this->source, $context["availability"], "affiche", [], "any", false, false, false, 123) != 1)) {
                // line 124
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Do you really want to show this availability? You will not be able to edit it anymore.')\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_availability_showAll", ["idAvailability" => twig_get_attribute($this->env, $this->source, $context["availability"], "id", [], "any", false, false, false, 124), "id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 124), "id", [], "any", false, false, false, 124)]), "html", null, true);
                echo "\" class=\"btn btn-success btn-sm \">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-check mr-0\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 127
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_availability_change", ["idAvailability" => twig_get_attribute($this->env, $this->source, $context["availability"], "id", [], "any", false, false, false, 127), "id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 127), "id", [], "any", false, false, false, 127)]), "html", null, true);
                echo "\" class=\"btn btn-info btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-pencil mr-0\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Do you want to delete the availability?')\" href=\"";
                // line 130
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_availability_deletelist", ["idAvailability" => twig_get_attribute($this->env, $this->source, $context["availability"], "id", [], "any", false, false, false, 130), "id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 130), "id", [], "any", false, false, false, 130)]), "html", null, true);
                echo "\" class=\"btn btn-danger btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o mr-0\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 134
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_availability_deletelist", ["idAvailability" => twig_get_attribute($this->env, $this->source, $context["availability"], "id", [], "any", false, false, false, 134), "id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 134), "id", [], "any", false, false, false, 134)]), "html", null, true);
                echo "\" disabled=\"disabled\" class=\"btn btn-success btn-sm disabled\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-check mr-0\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Do you want to delete the availability?')\" href=\"";
                // line 137
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_availability_deletelist", ["idAvailability" => twig_get_attribute($this->env, $this->source, $context["availability"], "id", [], "any", false, false, false, 137), "id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 137), "id", [], "any", false, false, false, 137)]), "html", null, true);
                echo "\" class=\"btn btn-danger btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o mr-0\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 141
            echo "\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 144
            echo "\t\t\t\t\t\t\t\t\t\t<td colspan=\"5\">No availability found!</td>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['availability'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 146
        echo "
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>

\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<script src=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 158
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"https://apis.google.com/js/api.js\"></script>



";
    }

    public function getTemplateName()
    {
        return "parking/addnewav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  361 => 160,  357 => 159,  353 => 158,  349 => 157,  336 => 146,  329 => 144,  322 => 141,  315 => 137,  308 => 134,  301 => 130,  295 => 127,  288 => 124,  286 => 123,  281 => 121,  277 => 120,  273 => 119,  269 => 118,  266 => 117,  261 => 116,  251 => 108,  247 => 106,  245 => 105,  239 => 101,  226 => 94,  222 => 92,  217 => 91,  205 => 85,  201 => 83,  197 => 82,  180 => 68,  175 => 66,  169 => 63,  165 => 62,  161 => 61,  155 => 58,  151 => 57,  147 => 56,  141 => 53,  137 => 52,  133 => 51,  130 => 50,  124 => 47,  120 => 46,  116 => 45,  113 => 44,  111 => 43,  106 => 41,  102 => 40,  98 => 39,  93 => 37,  72 => 19,  66 => 16,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "parking/addnewav.html.twig", "/home/lucettp/www/app/templates/parking/addnewav.html.twig");
    }
}
