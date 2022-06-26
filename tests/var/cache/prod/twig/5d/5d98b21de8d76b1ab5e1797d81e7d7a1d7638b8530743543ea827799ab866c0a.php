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

/* wellness/option.html.twig */
class __TwigTemplate_23a7fbc6f0f2eba825698721963c722a15b94f4a4ea51aa68f135ca30a1d4fc8 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "wellness/option.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo "Lucette
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        // line 8
        echo "\t<div class=\"breadcrumbs\"></div>
\t<div class=\"content mt-3\" style=\" font-family: Calibri;\">
\t\t<div class=\"col-md-12\">
\t\t\t";
        // line 11
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 11), "verifyToken", [], "any", false, false, false, 11))) {
            // line 12
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\tAs long as your account has not been verified, you can't book a service!
\t\t\t\t\t<a href=\"";
            // line 15
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_email");
            echo "\">Send another verification email</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 18
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 19
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t";
            // line 21
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
        // line 27
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "error"], "method", false, false, false, 27));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 28
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-danger\">Error</span>
\t\t\t\t\t";
            // line 30
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
        // line 36
        echo "\t\t\t<br>
\t\t\t<form action=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_locationchoice", ["id" => twig_get_attribute($this->env, $this->source, ($context["currentproduct"] ?? null), "id", [], "any", false, false, false, 37)]), "html", null, true);
        echo "\" method=\"post\">
\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t<div class=\"header\">
\t\t\t\t\t\t<h4 style=\"text-align:center; \"></h4>
\t\t\t\t\t</div><br><br><br>
\t\t\t\t\t<div class=\"polaroid  col-md-8\" style=\"float:none;margin:auto;\">
\t\t\t\t\t\t<button type=\"button\"  style=\"border:none; background-color:transparent;\">
\t\t\t\t\t\t\t<img style='border-radius: 8px; box-shadow: 10px 10px 10px 10px #cfcfcf;  width:350px; height:250px; margin-bottom: 25px;' src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("uploads/product/" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["currentproduct"] ?? null), "idproduct", [], "any", false, false, false, 44), "photo", [], "any", false, false, false, 44)) . "")), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t<div class=\"container\" style=\"text-align:center; padding:10px 20px;\">
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t<strong class=\"text-uppercase\">
\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t";
        // line 49
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["currentproduct"] ?? null), "idproduct", [], "any", false, false, false, 49), "name", [], "any", false, false, false, 49), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t\t";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["currentproduct"] ?? null), "price", [], "any", false, false, false, 51), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t€
\t\t\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t<div class=\"header\">
\t\t\t\t\t\t<h4 style=\"text-align:center; \">Select your option
\t\t\t\t\t\t</h4>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"card\" style=\"border:0px; background-color:transparent;\">
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t";
        // line 66
        if ((($context["numbersOfOptions"] ?? null) != 0)) {
            // line 67
            echo "\t\t\t\t\t\t\t\t<div>
<div class='card-footer' style=\"border:0px; background-color:transparent;\">
\t\t\t\t\t\t\t<button style=\"float: right;\" type=\"submit\" class=\"btn btn-success\" name=\"submit\" value=\"oneAvailability\">Next</button>
\t\t\t\t\t\t</div><br><br>
\t\t\t\t\t\t\t\t\t<table class=\"table borderedStyle\">
\t\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t\t<tr></tr>
\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 76
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 77
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["value"]);
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 78
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"product_id\" value=\"";
                    // line 79
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["currentproduct"] ?? null), "idproduct", [], "any", false, false, false, 79), "id", [], "any", false, false, false, 79), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"custom-control custom-checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"custom-control-input\" name=\"val[]\" value=\"";
                    // line 82
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 82), "html", null, true);
                    echo "\" id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 82), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"custom-control-label\" for=\"";
                    // line 83
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 83), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 84
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["option"], "idoption", [], "any", false, false, false, 84), "name", [], "any", false, false, false, 84), "html", null, true);
                    echo ":
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 85
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["option"], "idoption", [], "any", false, false, false, 85), "description", [], "any", false, false, false, 85), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 87
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "price", [], "any", false, false, false, 87), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t€
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 94
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        } else {
            // line 99
            echo "\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"product_id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["currentproduct"] ?? null), "idproduct", [], "any", false, false, false, 99), "id", [], "any", false, false, false, 99), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tThere are no options available for this selection.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t";
        }
        // line 104
        echo "\t\t\t\t\t\t</div>

\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<br><br>
\t\t\t</form>
\t\t</div>
\t</div>
\t<script src=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/js/dist/collapse.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
\t\t<script src='";
        // line 117
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-1.10.2.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
\t\t<script src='";
        // line 118
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-ui.custom.min.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
\t\t<script src='";
        // line 119
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("commandeCalendar/js/moment.min.js"), "html", null, true);
        echo "'></script>

";
    }

    public function getTemplateName()
    {
        return "wellness/option.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  281 => 119,  277 => 118,  273 => 117,  269 => 116,  265 => 115,  261 => 114,  257 => 113,  253 => 112,  243 => 104,  234 => 99,  228 => 95,  222 => 94,  209 => 87,  204 => 85,  200 => 84,  196 => 83,  190 => 82,  184 => 79,  181 => 78,  176 => 77,  172 => 76,  161 => 67,  159 => 66,  141 => 51,  136 => 49,  128 => 44,  118 => 37,  115 => 36,  103 => 30,  99 => 28,  94 => 27,  82 => 21,  78 => 19,  73 => 18,  67 => 15,  62 => 12,  60 => 11,  55 => 8,  52 => 7,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "wellness/option.html.twig", "/home/lucettp/www/app/templates/wellness/option.html.twig");
    }
}
