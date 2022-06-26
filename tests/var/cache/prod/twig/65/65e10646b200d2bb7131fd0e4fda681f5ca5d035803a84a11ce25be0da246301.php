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

/* parking/listofavailability.html.twig */
class __TwigTemplate_88a861f1431c8ce7b6afa4de57695e6edbb64e5adb781a6c601ad3a362e7d2b5 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "parking/listofavailability.html.twig", 1);
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
\t\t\t\t\t\t<li class=\"active\">Availability</li>
\t\t\t\t\t</ol>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"content mt-3\">
\t\t<div class=\"animated fadeIn\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-sm-12 \">

\t\t\t\t\t\t<div class=\"header\">
\t\t\t\t\t\t\t\t<h4 style=\"text-align:center;\">Next availability</h4>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 34));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 35
            echo "\t\t\t\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t\t\t\t\t";
            // line 37
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
        // line 43
        echo "\t\t\t\t\t\t\t<table id=\"bootstrap-data-table-export\" class=\"table  bordered\">
\t\t\t\t\t\t\t\t<thead style=\"background-color: #85A6B8; color: white;\">

\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>Location</th>
\t\t\t\t\t\t\t\t\t\t";
        // line 48
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 49
            echo "\t\t\t\t\t\t\t\t\t\t\t<th>Provider</th>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 51
        echo "\t\t\t\t\t\t\t\t\t\t<th>Date</th>
\t\t\t\t\t\t\t\t\t\t<th>From</th>
\t\t\t\t\t\t\t\t\t\t<th>To</th>
\t\t\t\t\t\t\t\t\t\t<th>Available Services
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t\t<th>Order</th>
\t\t\t\t\t\t\t\t\t\t<th>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 58
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_addavailability");
        echo "\" class=\"btn btn-success btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"></i>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t<a href=\"";
        // line 61
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_recurrence");
        echo "\" class=\"btn btn-success btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\">
\t\t\t\t\t\t\t\t\t\t\t\tMultiple </i>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["availabilities"] ?? null));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["availability"]) {
            // line 70
            echo "
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 72), "name", [], "any", false, false, false, 72), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 73
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 74
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "provider", [], "any", false, false, false, 74), "name", [], "any", false, false, false, 74), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 76
            echo "\t\t\t\t\t\t\t\t\t\t\t<td>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["availability"], "date", [], "any", false, false, false, 76), "d-m-Y"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["availability"], "debut", [], "any", false, false, false, 77), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 78
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["availability"], "fin", [], "any", false, false, false, 78), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "provider", [], "any", false, false, false, 80), "products", [], "any", false, false, false, 80));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 81
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if ((null === twig_get_attribute($this->env, $this->source, $context["product"], "supprime", [], "any", false, false, false, 81))) {
                    // line 82
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 82), "html", null, true);
                    echo "

\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 85
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            echo "\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 87
            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["orderNumber"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 87)] ?? null) : null), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_availability", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 89), "id", [], "any", false, false, false, 89)]), "html", null, true);
            echo "\" class=\"btn btn-success btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Do you want to delete the availability?')\" href=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_availability_deletelist", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["availability"], "parking", [], "any", false, false, false, 92), "id", [], "any", false, false, false, 92), "idAvailability" => twig_get_attribute($this->env, $this->source, $context["availability"], "id", [], "any", false, false, false, 92)]), "html", null, true);
            echo "\" class=\"btn btn-danger btn-sm\">


\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash-o mr-0\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</td>


\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 102
            echo "\t\t\t\t\t\t\t\t\t\t<td colspan=\"5\">No availability found!</td>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['availability'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
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
        // line 114
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
<script src=\"../vendors/datatables.net/js/jquery.dataTables.min.js\"></script>
<script src=\"../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js\"></script>
<script src=\"../vendors/datatables.net-buttons/js/dataTables.buttons.min.js\"></script>
<script src=\"../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js\"></script>
<script src=\"../vendors/jszip/dist/jszip.min.js\"></script>
<script src=\"../vendors/pdfmake/build/pdfmake.min.js\"></script>
<script src=\"../vendors/pdfmake/build/vfs_fonts.js\"></script>
<script src=\"../vendors/datatables.net-buttons/js/buttons.html5.min.js\"></script>
<script src=\"../vendors/datatables.net-buttons/js/buttons.print.min.js\"></script>
<script src=\"../vendors/datatables.net-buttons/js/buttons.colVis.min.js\"></script>
<script src=\"../assets/js/init-scripts/data-table/datatables-init.js\"></script>


";
    }

    public function getTemplateName()
    {
        return "parking/listofavailability.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 117,  278 => 116,  274 => 115,  270 => 114,  258 => 104,  251 => 102,  228 => 92,  222 => 89,  217 => 87,  214 => 86,  208 => 85,  201 => 82,  198 => 81,  194 => 80,  189 => 78,  185 => 77,  180 => 76,  174 => 74,  172 => 73,  168 => 72,  164 => 70,  146 => 69,  135 => 61,  129 => 58,  120 => 51,  116 => 49,  114 => 48,  107 => 43,  95 => 37,  91 => 35,  87 => 34,  66 => 16,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "parking/listofavailability.html.twig", "/home/lucettp/www/app/templates/parking/listofavailability.html.twig");
    }
}
