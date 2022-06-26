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

/* wellness/product.html.twig */
class __TwigTemplate_326e2a0d116b355bf5e4d6fd9cf4830cdb401566e391a194b2222f2426c7fd61 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "wellness/product.html.twig", 1);
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
\t\t\t\t\t\t<li class=\"active\">Dashboard</li>
\t\t\t\t\t</ol>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
<div class=\"content mt-3\" style=\" font-family: Georgia; margin-left:0;margin-right:0;padding-left:0;padding-right:0;\">

\t\t<div class=\"col-md-12\">
\t\t\t<div class='header'>
\t\t\t\t<h3 style=\"text-align:center; \">
\t\t\t\t\tSelect your product
\t\t\t\t</h3>
\t\t\t</div>
\t\t\t<br>
\t\t\t";
        // line 30
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 30), "verifyToken", [], "any", false, false, false, 30))) {
            // line 31
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\tAs long as your account has not been verified, you can't book a service!
\t\t\t\t\t<a href=\"";
            // line 34
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_email");
            echo "\">Send another verification email</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 37
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 37));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 38
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t";
            // line 40
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "error"], "method", false, false, false, 46));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 47
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-danger\">Error</span>
\t\t\t\t\t";
            // line 49
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "\t\t\t<div class=\"col-sm-12 \" style=\"display: flex;
    align-items: stretch; margin:0; padding:0;\">
\t\t\t\t<div class=\"card-deck\" style=\"display: flex;
    align-items: stretch;\">
\t\t\t\t\t";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 60
            echo "\t\t\t\t\t\t<div class=\"polaroid col-md-6 col-lg-4\" style=\"padding-bottom:25px;padding-left:0;padding-right:0;margin:0 1% 0 1%;display: flex; max-width:31%;
    align-items: stretch;\">
\t\t\t\t\t\t\t<form action=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_option", ["serviceid" => ($context["serviceId"] ?? null), "id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["product"], "idproduct", [], "any", false, false, false, 62), "id", [], "any", false, false, false, 62)]), "html", null, true);
            echo "\" method=\"post\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"serviceId\" value=\"";
            // line 63
            echo twig_escape_filter($this->env, ($context["serviceId"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-service\">
\t\t\t\t\t\t\t\t\t<img style='border-radius: 8px; width:100%; height:auto; margin-bottom: 25px;' src=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("uploads/product/" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["product"], "idproduct", [], "any", false, false, false, 65), "photo", [], "any", false, false, false, 65)) . "")), "html", null, true);
            echo "\"/>
\t\t\t\t\t\t\t\t\t<div class=\"container\" style=\"text-align:center; padding:0;text-overflow: visible; display block;width: 100%;overflow: hidden; white-space: initial;height:200px;\">

\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 69
            $context["description"] = twig_replace_filter(strip_tags(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["product"], "idproduct", [], "any", false, false, false, 69), "description", [], "any", false, false, false, 69), ""), ["&nbsp;" => "", " /" => ". "]);
            // line 70
            echo "

\t\t\t\t\t\t\t\t\t\t\t\t<small class=\"text-uppercase\"> <b>";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["product"], "idproduct", [], "any", false, false, false, 72), "name", [], "any", false, false, false, 72), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 74
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 74), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t€</b>
\t\t\t\t\t\t\t\t\t\t\t\t</small><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span id=\"";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 77), "html", null, true);
            echo "\">";
            echo ($context["description"] ?? null);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        echo "\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div style=\"border:0px; background-color:transparent;\">
\t\t\t\t<a style=\"float: right;\" href=\"";
        // line 87
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_wellnessServices");
        echo "\" class=\"btn btn-danger\">Back</a>

\t\t\t</div>
\t\t</div>
\t</div>
\t<!-- .animated -->
</div>
<!-- .content -->
<link rel=\"stylesheet\"href=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/checkbox.css"), "html", null, true);
        echo "\">
<script src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/order.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/events.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/vendors/jszip/dist/jszip.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/vendors/pdfmake/build/pdfmake.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/vendors/pdfmake/build/vfs_fonts.js"), "html", null, true);
        echo "\"></script>
<script>

\tjQuery(document).ready(function (\$) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar regex = /<br\\s[\\/]>\\s<br\\s[\\/]>\\s<br\\s[\\/]>/gi;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar x = document.getElementById(\"test\").value;

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar nobr = x.replace(regex, '');

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar reg = /<br\\s[\\/]>/gi;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar tes = nobr.replace(reg, '.');


\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#descrip\").html(decodeURI(tes));



\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tconsole.log(tes);


\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</script>




\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
    }

    public function getTemplateName()
    {
        return "wellness/product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 104,  245 => 103,  241 => 102,  237 => 101,  233 => 100,  229 => 99,  225 => 98,  221 => 97,  217 => 96,  213 => 95,  202 => 87,  197 => 84,  182 => 77,  176 => 74,  171 => 72,  167 => 70,  165 => 69,  158 => 65,  153 => 63,  149 => 62,  145 => 60,  141 => 59,  135 => 55,  123 => 49,  119 => 47,  114 => 46,  102 => 40,  98 => 38,  93 => 37,  87 => 34,  82 => 31,  80 => 30,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "wellness/product.html.twig", "/home/lucettp/www/app/templates/wellness/product.html.twig");
    }
}
