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

/* car_services/index.html.twig */
class __TwigTemplate_f03313bfa5bb6516315718cfbeac2a2559e2b942cc4f8bb738fcfb7367a11686 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "car_services/index.html.twig", 1);
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
        echo "\t<div class=\"breadcrumbs\"></div>
\t<div class=\"content mt-3\" style=\" font-family: Calibri;\">
\t\t<h3 style=\"text-align:center;\">Our dedicated car services</h3>
\t\t<br><br>
\t\t<div class=\"col-md-12\">
\t\t\t";
        // line 12
        if ( !twig_test_empty(($context["availabilities"] ?? null))) {
            // line 13
            echo "\t\t\t\t";
            if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 13), "verifyToken", [], "any", false, false, false, 13))) {
                // line 14
                echo "\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\t\tAs long as your account has not been verified, you can't book a service!
\t\t\t\t\t\t<a href=\"";
                // line 17
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_email");
                echo "\">Send another verification email</a>
\t\t\t\t\t</div>
\t\t\t\t";
            } elseif (twig_test_empty(            // line 19
($context["car"] ?? null))) {
                // line 20
                echo "\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\t\tAs long as you haven't registered a car, you can't book a service!
\t\t\t\t\t\t<a href=\"";
                // line 23
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("car_list");
                echo "\">Register a car</a>
\t\t\t\t\t</div>
\t\t\t\t\t";
            } elseif (twig_test_empty(            // line 25
($context["creditCard"] ?? null))) {
                // line 26
                echo "\t\t\t\t\t<!-- <div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\t\t\t\t\tAs long as you haven't registered a credit card, you can't book a service! <a href=\"";
                // line 28
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_addCard");
                echo "\">Register a credit card</a>
\t\t\t\t\t\t\t\t\t</div>-->
\t\t\t\t";
            }
            // line 31
            echo "\t\t\t";
        }
        // line 32
        echo "
\t\t\t";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 33));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 34
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t";
            // line 36
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
        // line 42
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "error"], "method", false, false, false, 42));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 43
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-danger\">Error</span>
\t\t\t\t\t";
            // line 45
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
        // line 51
        echo "\t\t\t";
        if ((null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 51), "verifyToken", [], "any", false, false, false, 51))) {
            // line 52
            echo "\t\t\t\t";
            // line 88
            echo "
\t\t\t<div class=\"card-deck\">
\t\t\t\t";
            // line 90
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["myCategories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                // line 91
                echo "\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["categories"], "service", [], "any", false, false, false, 91), "id", [], "any", false, false, false, 91) == 1)) {
                    // line 92
                    echo "\t\t\t\t\t\t<div class=\"polaroid col-md-6 col-lg-4\" style=\"padding-bottom:25px;\">
\t\t\t\t\t\t\t<form action=\"";
                    // line 93
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("carservice_carservice", ["id" => twig_get_attribute($this->env, $this->source, $context["categories"], "id", [], "any", false, false, false, 93)]), "html", null, true);
                    echo "\" method=\"post\">
\t\t\t\t\t\t\t\t<input id=\"availability\" name=\"availability\" type=\"hidden\" value=\"";
                    // line 94
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categories"], "id", [], "any", false, false, false, 94), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t";
                    // line 95
                    if ((twig_get_attribute($this->env, $this->source, $context["categories"], "needCar", [], "any", false, false, false, 95) == 1)) {
                        // line 96
                        echo "\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-service\">
\t\t\t\t\t\t\t\t\t\t<img style='border-radius: 8px; width:350px; height:250px; margin-bottom: 25px;' src=\"";
                        // line 97
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("uploads/category/" . twig_get_attribute($this->env, $this->source, $context["categories"], "photo", [], "any", false, false, false, 97)) . "")), "html", null, true);
                        echo "\"/>
\t\t\t\t\t\t\t\t\t\t<div class=\"container\" style=\"text-align:center; padding:10px 20px;\">
\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t<strong class=\"text-uppercase\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 101
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categories"], "category", [], "any", false, false, false, 101), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 107
                        echo "\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-service\" formaction=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("carservice_serviceproduct", ["id" => twig_get_attribute($this->env, $this->source, $context["categories"], "id", [], "any", false, false, false, 107)]), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t<img style='border-radius: 8px; width:350px; height:250px; margin-bottom: 25px;' src=\"";
                        // line 108
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("uploads/category/" . twig_get_attribute($this->env, $this->source, $context["categories"], "photo", [], "any", false, false, false, 108)) . "")), "html", null, true);
                        echo "\"/>
\t\t\t\t\t\t\t\t\t\t<div class=\"container\" style=\"text-align:center; padding:10px 20px;\">
\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t<strong class=\"text-uppercase\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 112
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categories"], "category", [], "any", false, false, false, 112), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</button>


\t\t\t\t\t\t\t\t";
                    }
                    // line 120
                    echo "\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<br>
\t\t\t\t\t";
                }
                // line 125
                echo "\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            echo "\t\t\t</div>
\t\t\t<br>
\t\t\t<br>
\t\t\t\t\t";
        }
        // line 130
        echo "\t\t\t";
        if ((($context["myCategories"] ?? null) == null)) {
            // line 131
            echo "\t\t\t\t<div class=\"col-md-4\" style=\"float: right;\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<p align=\"center\">No more service available ? Would you like to request a new service or availability ?
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<p align=\"center\">Please use our genius chat below !
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<p align=\"center\">
\t\t\t\t\t\t\t\t<img src=\"";
            // line 139
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/3162688.jpg"), "html", null, true);
            echo "\" alt=\"Genius\">
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</a>
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t";
        }
        // line 145
        echo "\t\t</div>
\t</div>
\t<!-- .content -->
\t<script src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 151
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
<!--\t<script src=\"../vendors/datatables.net/js/jquery.dataTables.min.js\"></script>
\t<script src=\"../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js\"></script>
\t<script src=\"../vendors/datatables.net-buttons/js/dataTables.buttons.min.js\"></script>
\t<script src=\"../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js\"></script>
\t<script src=\"../vendors/jszip/dist/jszip.min.js\"></script>
\t<script src=\"../vendors/pdfmake/build/pdfmake.min.js\"></script>
\t<script src=\"../vendors/pdfmake/build/vfs_fonts.js\"></script>
\t<script src=\"../vendors/datatables.net-buttons/js/buttons.html5.min.js\"></script>
\t<script src=\"../vendors/datatables.net-buttons/js/buttons.print.min.js\"></script>
\t<script src=\"../vendors/datatables.net-buttons/js/buttons.colVis.min.js\"></script>
\t<script src=\"../assets/js/init-scripts/data-table/datatables-init.js\"></script> -->
";
    }

    public function getTemplateName()
    {
        return "car_services/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  277 => 151,  273 => 150,  269 => 149,  265 => 148,  260 => 145,  251 => 139,  241 => 131,  238 => 130,  232 => 126,  226 => 125,  219 => 120,  208 => 112,  201 => 108,  196 => 107,  187 => 101,  180 => 97,  177 => 96,  175 => 95,  171 => 94,  167 => 93,  164 => 92,  161 => 91,  157 => 90,  153 => 88,  151 => 52,  148 => 51,  136 => 45,  132 => 43,  127 => 42,  115 => 36,  111 => 34,  107 => 33,  104 => 32,  101 => 31,  95 => 28,  91 => 26,  89 => 25,  84 => 23,  79 => 20,  77 => 19,  72 => 17,  67 => 14,  64 => 13,  62 => 12,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "car_services/index.html.twig", "/home/lucettp/www/app/templates/car_services/index.html.twig");
    }
}
