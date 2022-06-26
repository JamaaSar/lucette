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

/* hair_salon/index.html.twig */
class __TwigTemplate_729726d907be0729d095255276da7e25043052b819cd50f06cda7653b9b67389 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "hair_salon/index.html.twig", 1);
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
\t \t\t\t\t<ol class=\"breadcrumb text-right\">
\t\t\t\t\t\t<li class=\"active\">Dashboard</li>
\t\t\t\t\t</ol>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"content mt-3\" style=\" font-family: Georgia;\">

\t\t<div class=\"header\">
\t\t\t<h4 style=\"text-align:center; \">Beauty
\t\t\t</h4>
\t\t</div>
\t\t<br>
\t\t<div class=\"col-md-12\">
\t\t\t";
        // line 29
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 29), "verifyToken", [], "any", false, false, false, 29))) {
            // line 30
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\tAs long as your account has not been verified, you can't book a service!
\t\t\t\t\t<a href=\"";
            // line 33
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_email");
            echo "\">Send another verification email</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 36
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 36));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 37
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t";
            // line 39
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
        // line 45
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "error"], "method", false, false, false, 45));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 46
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-danger\">Error</span>
\t\t\t\t\t";
            // line 48
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
        // line 54
        echo "\t\t\t";
        if ((null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 54), "verifyToken", [], "any", false, false, false, 54))) {
            // line 55
            echo "\t\t\t\t";
            // line 90
            echo "\t\t\t\t<div class=\"card-deck\">
\t\t\t\t\t";
            // line 91
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["myCategories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                // line 92
                echo "\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["categories"], "service", [], "any", false, false, false, 92), "id", [], "any", false, false, false, 92) == 3)) {
                    // line 93
                    echo "\t\t\t\t\t\t\t<div class=\"polaroid col-md-6 col-lg-4\" style=\"padding-bottom:25px;\">
\t\t\t\t\t\t\t\t<form action=\"";
                    // line 94
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_productid", ["id" => twig_get_attribute($this->env, $this->source, $context["categories"], "id", [], "any", false, false, false, 94)]), "html", null, true);
                    echo "\" method=\"post\">
\t\t\t\t\t\t\t\t\t<input id=\"availability\" name=\"availability\" type=\"hidden\" value=\"";
                    // line 95
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categories"], "id", [], "any", false, false, false, 95), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-service\">
\t\t\t\t\t\t\t\t\t\t<img style='border-radius: 8px; width:350px; height:250px; margin-bottom: 25px;' src=\"";
                    // line 97
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("uploads/category/" . twig_get_attribute($this->env, $this->source, $context["categories"], "photo", [], "any", false, false, false, 97)) . "")), "html", null, true);
                    echo "\"/>
\t\t\t\t\t\t\t\t\t\t<div class=\"container\" style=\"text-align:center; padding:10px 20px; \">
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
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t";
                }
                // line 111
                echo "\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "\t\t\t\t</div>
\t\t\t\t<br>
\t\t\t\t<br>
\t\t\t";
        }
        // line 116
        echo "
\t\t\t";
        // line 117
        if ((($context["myCategories"] ?? null) == null)) {
            // line 118
            echo "\t\t\t\t<div class=\"col-md-4\" style=\"float: right;\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<p align=\"center\">No more service available ? Would you like to request a new service or availability ?
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<p align=\"center\">Please use our genius chat below !
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<p align=\"center\">
<img src=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/3162688.jpg"), "html", null, true);
            echo "\" alt=\"Genius\">

\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</a>
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t";
        }
        // line 133
        echo "\t\t</div>
\t</div>
</div></div><!-- .animated --></div><!-- .content -->\t<script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 138
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
\t";
    }

    public function getTemplateName()
    {
        return "hair_salon/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 138,  230 => 137,  226 => 136,  222 => 135,  218 => 133,  208 => 126,  198 => 118,  196 => 117,  193 => 116,  187 => 112,  181 => 111,  168 => 101,  161 => 97,  156 => 95,  152 => 94,  149 => 93,  146 => 92,  142 => 91,  139 => 90,  137 => 55,  134 => 54,  122 => 48,  118 => 46,  113 => 45,  101 => 39,  97 => 37,  92 => 36,  86 => 33,  81 => 30,  79 => 29,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "hair_salon/index.html.twig", "/home/lucettp/www/app/templates/hair_salon/index.html.twig");
    }
}
