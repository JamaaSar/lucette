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

/* cms/index.html.twig */
class __TwigTemplate_c743d5029c2ffd6098a72bc4d1cb4a86a1686aaaf674ecd0f56c8358878bf96f extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "cms/index.html.twig", 1);
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
\t\t\t<div class=\"page-header float-left\">
\t\t\t\t";
        // line 10
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 11
            echo "\t\t\t\t\t<ol class=\"breadcrumb text-left\">
\t\t\t\t\t\t";
            // line 12
            if ((null === ($context["googleCalendarConnected"] ?? null))) {
                // line 13
                echo "\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-xs social google-plus\" style=\"margin-bottom: 4px\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-google-plus-square\"></i>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 15
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_apiCalendar");
                echo "\" style=\"color:white;\">
\t\t\t\t\t\t\t\t\tConnect your account to google calendar
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</button>

\t\t\t\t\t\t";
            }
            // line 21
            echo "

\t\t\t\t\t</ol>
\t\t\t\t";
        }
        // line 25
        echo "
\t\t\t</div>
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
\t<div class=\"content mt-3\" style=\"font-family: Georgia, serif;\">
\t\t<div class=\"animated fadeIn\">
\t\t\t<div class=\"row\">
\t\t\t\t";
        // line 41
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 42
            echo "\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t";
            // line 43
            if ((($context["validerbyuser"] ?? null) != 0)) {
                // line 44
                echo "\t\t\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">&nbsp;&nbsp;
\t\t\t\t\t\t\t\t<span class=\"badge badge-pill badge-danger\">&nbsp;&nbsp;<i class=\"fa fa-warning\"></i>&nbsp;&nbsp;</span>&nbsp;&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tYou have a
\t\t\t\t\t\t\t\t";
                // line 47
                echo twig_escape_filter($this->env, ($context["validerbyuser"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
                // line 48
                if ((($context["validerbyuser"] ?? null) > 1)) {
                    // line 49
                    echo "\t\t\t\t\t\t\t\t\torders
\t\t\t\t\t\t\t\t";
                } else {
                    // line 51
                    echo "\t\t\t\t\t\t\t\t\torder
\t\t\t\t\t\t\t\t";
                }
                // line 53
                echo "\t\t\t\t\t\t\t\tawaiting your validation. &nbsp;
\t\t\t\t\t\t\t\t<a href=\"";
                // line 54
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("planned_services_list");
                echo "\">Click here to see your waiting list
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t\t\t\t\t<span aria-hidden=\"true\">×</span>
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 61
            echo "\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t<div class=\"header\">
\t\t\t\t\t\t\t<h4 style=\"text-align:center; font-family: Georgia, serif; \">Our dedicated services</h4>
\t\t\t\t\t\t</div><br>
\t\t\t\t\t\t<div class=\"card-deck\">
\t\t\t\t\t\t\t<table class=\"table table-striped table-basic\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<p align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 72
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("carservice_carServices");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/carservice1.jpg"), "html", null, true);
            echo "\" style='border-radius: 8px; box-shadow: 10px 10px 10px 10px #cfcfcf; ' height=\"150\" width=\"250\" alt=\"Car Services\"></a>
\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<p align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 77
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_wellnessServices");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/wellness.jpg"), "html", null, true);
            echo "\" style='border-radius: 8px; box-shadow: 10px 10px 10px 10px #cfcfcf;' height=\"150\" width=\"250\" alt=\"Wellness\"></a>
\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<p align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 82
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_hair_salon");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hairsalon.jpg"), "html", null, true);
            echo "\" style='border-radius: 8px; box-shadow: 10px 10px 10px 10px #cfcfcf;' height=\"150\" width=\"250\" alt=\"Beauty\"></a>
\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<p align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 87
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klinLaundry");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/laundry1.jpg"), "html", null, true);
            echo "\" style='border-radius: 8px; box-shadow: 10px 10px 10px 10px #cfcfcf;' height=\"150\" width=\"250\" alt=\"Laundry\"></a>
\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<p align=\"center\">Premium Car Services</p>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<p align=\"center\">Wellness Services</p>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<p align=\"center\">Beauty </p>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<p align=\"center\">Laundry Services</p>
\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<br>
\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t<div class=\"header\">
\t\t\t\t\t\t<h4 style=\"text-align:center; font-family: Georgia, serif; \">Our partners !</h4>
\t\t\t\t\t</div><br>
\t\t\t\t\t<div class=\"card-deck\">
\t\t\t\t\t\t<table class=\"table table-striped table-basic\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t<p align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 121
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("carservice_carServices");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logoLayout2.png"), "html", null, true);
            echo "\" height=\"100\" alt=\"Moovee Car Cleaning\"></a>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t<p align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 126
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klinLaundry");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo_klin.png"), "html", null, true);
            echo "\" height=\"150\" width=\"150\" alt=\"Klin\"></a>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t<p align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 131
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bioOrders");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo_chat_biotte.jpg"), "html", null, true);
            echo "\" height=\"150\" alt=\"Chat\"></a>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t<p align=\"center\">MOOVEE – Premium Car Services</p>
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t<p align=\"center\">Klin – on demand dry cleaning & laundry</p>
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t<th align=\"center\">
\t\t\t\t\t\t\t\t\t\t<p align=\"center\">Fruits & Vegetables Delivery</p>
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 156
        echo "\t\t<div class=\"col-sm-12 mb-4\">

";
        // line 158
        if ( !(null === ($context["googleCalendarConnected"] ?? null))) {
            // line 159
            echo "

\t\t\t";
            // line 161
            if ((null === twig_get_attribute($this->env, $this->source, ($context["googleCalendarConnected"] ?? null), "calendarid", [], "any", false, false, false, 161))) {
                // line 162
                echo "
\t\t\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Alert</span>
\t\t\t\t\t\tPlease choose your calendar!

\t\t\t\t\t\t<a href=\"";
                // line 167
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_choosecalendar", ["id" => twig_get_attribute($this->env, $this->source, ($context["googleCalendarConnected"] ?? null), "id", [], "any", false, false, false, 167)]), "html", null, true);
                echo "\"> Click here </a>
\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 170
            echo "
";
        }
        // line 172
        echo "
\t\t\t<div class=\"card-group\">
\t\t\t\t";
        // line 174
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_WORKER_ADMIN")) {
            // line 175
            echo "\t\t\t\t\t";
            if ( !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 176
                echo "\t\t\t\t\t\t<div class=\"card col-md-3 col-md-3 bg-flat-color-4\" style=\"border-radius:7px; margin:1px;\">
\t\t\t\t\t\t\t<a style=\"color: white\" class=\"stretched-link\" href=\"";
                // line 177
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("provider_waitlist");
                echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-body bg-flat-color-0\">
\t\t\t\t\t\t\t\t\t<div class=\"h1 text-muted text-right mb-4\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-bars text-light\"></i>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"h4 mb-0 text-light\">
\t\t\t\t\t\t\t\t\t\t<span class=\"count\">";
                // line 183
                echo twig_escape_filter($this->env, ($context["plannedCleaning"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<small class=\"text-uppercase font-weight-bold text-light\">Pending Orders</small>
\t\t\t\t\t\t\t\t\t<div class=\"h6 text-muted text-right mb-4\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card col-md-3 col-md-3 bg-flat-color-2\" style=\"border-radius:7px; margin:1px;\">
\t\t\t\t\t\t\t<a style=\"color: white\" class=\"stretched-link\" href=\"";
                // line 191
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_list");
                echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-body bg-flat-color-2\">
\t\t\t\t\t\t\t\t\t<div class=\"h1 text-muted text-right mb-4\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-calendar text-light\"></i>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"h4 mb-0 text-light\">
\t\t\t\t\t\t\t\t\t\t<span class=\"count\">";
                // line 197
                echo twig_escape_filter($this->env, ($context["nbIncoming"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<small class=\"text-uppercase font-weight-bold text-light\">Incoming Orders</small>
\t\t\t\t\t\t\t\t\t<div class=\"h6 text-muted text-right mb-4\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card col-md-3 col-md-3  bg-flat-color-3\" style=\"border-radius:7px; margin:1px;\">
\t\t\t\t\t\t\t<a style=\"color: white\" class=\"stretched-link\" href=\"";
                // line 205
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_listofavailability");
                echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-body bg-flat-color-3 \">
\t\t\t\t\t\t\t\t\t<div class=\"h1 text-muted text-right mb-4\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-check text-light\"></i>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"h4 mb-0 text-light\">
\t\t\t\t\t\t\t\t\t\t<span class=\"count\">";
                // line 211
                echo twig_escape_filter($this->env, ($context["nbAvailability"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<small class=\"text-uppercase font-weight-bold text-light\">Availability</small>
\t\t\t\t\t\t\t\t\t<div class=\"h6 text-muted text-right mb-0\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card col-md-3 col-md-3 bg-flat-color-1\" style=\"border-radius:7px; margin:1px;\">
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<div class=\"h1 text-muted text-right mb-4\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-eur text-light\"></i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"h4 mb-0 text-light\">
\t\t\t\t\t\t\t\t\t<span class=\"count\">";
                // line 224
                echo twig_escape_filter($this->env, ($context["chiffreDaf"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t€</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<small class=\"text-uppercase font-weight-bold text-light\">Turnover for
\t\t\t\t\t\t\t\t\t";
                // line 228
                echo twig_escape_filter($this->env, ($context["mois"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 233
            echo "\t\t\t\t\t";
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 234
                echo "\t\t\t\t\t\t<div class=\"card col-md-3 col-md-3 bg-flat-color-4\" style=\"border-radius:7px; margin:1px;\">
\t\t\t\t\t\t\t<a style=\"color: white\" class=\"stretched-link\" href=\"";
                // line 235
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("provider_waitlist");
                echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-body bg-flat-color-0\">
\t\t\t\t\t\t\t\t\t<div class=\"h1 text-muted text-right mb-4\">
\t\t\t\t\t\t\t\t\t\t<i class=\" fa fa-bars text-light\"></i>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"h4 mb-0 text-light\">
\t\t\t\t\t\t\t\t\t\t<span class=\"count\">";
                // line 241
                echo twig_escape_filter($this->env, ($context["plannedCleaning"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<small class=\"text-uppercase font-weight-bold text-light\">Pending Orders</small>
\t\t\t\t\t\t\t\t\t<div class=\"h6 text-muted text-right mb-4\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card col-md-3 col-md-3 bg-flat-color-2\" style=\"border-radius:7px; margin:1px;\">
\t\t\t\t\t\t\t<a style=\"color: white\" class=\"stretched-link\" href=\"";
                // line 249
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_list");
                echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-body bg-flat-color-2\">
\t\t\t\t\t\t\t\t\t<div class=\"h1 text-muted text-right mb-4\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-calendar text-light\"></i>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"h4 mb-0 text-light\">
\t\t\t\t\t\t\t\t\t\t<span class=\"count\">";
                // line 255
                echo twig_escape_filter($this->env, ($context["nbIncoming"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<small class=\"text-uppercase font-weight-bold text-light\">Incoming Orders</small>
\t\t\t\t\t\t\t\t\t<div class=\"h6 text-muted text-right mb-4\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card col-md-3 col-md-3  bg-flat-color-3\" style=\"border-radius:7px; margin:1px;\">
\t\t\t\t\t\t\t<a style=\"color: white\" class=\"stretched-link\" href=\"";
                // line 263
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_listofavailability");
                echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-body bg-flat-color-3 \">
\t\t\t\t\t\t\t\t\t<div class=\"h1 text-muted text-right mb-4\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-check text-light\"></i>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"h4 mb-0 text-light\">
\t\t\t\t\t\t\t\t\t\t<span class=\"count\">";
                // line 269
                echo twig_escape_filter($this->env, ($context["nbAvailability"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<small class=\"text-uppercase font-weight-bold text-light\">Availability</small>
\t\t\t\t\t\t\t\t\t<div class=\"h6 text-muted text-right mb-0\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"card col-md-3 col-md-3 bg-flat-color-1\" style=\"border-radius:7px; margin:1px;\">
\t\t\t\t\t\t\t<a style=\"color: white\" class=\"stretched-link\" href=\"";
                // line 278
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_turnover");
                echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t<div class=\"h1 text-muted text-right mb-4\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-eur text-light\"></i>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"h4 mb-0 text-light\">
\t\t\t\t\t\t\t\t\t\t<span class=\"count\">";
                // line 284
                echo twig_escape_filter($this->env, ($context["chiffreDaf"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t€</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<small class=\"text-uppercase font-weight-bold text-light\">Turnover for
\t\t\t\t\t\t\t\t\t\t";
                // line 288
                echo twig_escape_filter($this->env, ($context["mois"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 294
            echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-lg-6\">
\t\t\t\t<div class=\"card  no-padding\" style='border-radius:13px;'>
\t\t\t\t\t<div class=\"card-header\" style=\"text-align:center; background-color:white; border-top-left-radius:13px; border-top-right-radius:13px; border-bottom-style:hidden;\">
\t\t\t\t\t\t<h7>Monthly turnover</h7>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t<canvas id=\"myChart\" height=\"500\" width=\"800\"></canvas>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>


\t\t</div>


\t";
        }
        // line 313
        echo "</div>
<!--.animated--></div><!--.content-->



<script src=\"";
        // line 318
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 319
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 320
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 321
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>

<script src=\"";
        // line 323
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/chart.js/dist/Chart.min.js"), "html", null, true);
        echo "\"></script>



<script>
\tvar month = []; // X Axis Label
var ca = []; // Value and Y Axis basis


";
        // line 332
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["arrData"] ?? null));
        foreach ($context['_seq'] as $context["res"] => $context["value"]) {
            echo "month.push(";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "month", [], "any", false, false, false, 332), "html", null, true);
            echo ");
ca.push(";
            // line 333
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "ca", [], "any", false, false, false, 333), "html", null, true);
            echo ");";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['res'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: [
'January',
'February',
'March',
'April',
'May',
'June',
'July',
'August',
'September',
'october',
'november',
'december'
],
datasets: [
{
label: \"Monthly turnover €\",
data: [
ca[0],
ca[1],
ca[2],
ca[3],
ca[4],
ca[5],
ca[6],
ca[7],
ca[8],
ca[9],
ca[10],
ca[11],
ca[12]
],
backgroundColor: \"rgba(0,123,255,.3)\",
borderColor: \"rgba(0, 123, 255, 0.9)\",
borderWidth: 1
},
]
},
options: {
maintainAspectRatio: true,
legend: {
display: false
},
scales: {
xAxes: [
{
barPercentage: 1
}
]

}
}

});
</script>";
    }

    public function getTemplateName()
    {
        return "cms/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  553 => 333,  545 => 332,  533 => 323,  528 => 321,  524 => 320,  520 => 319,  516 => 318,  509 => 313,  488 => 294,  479 => 288,  472 => 284,  463 => 278,  451 => 269,  442 => 263,  431 => 255,  422 => 249,  411 => 241,  402 => 235,  399 => 234,  396 => 233,  388 => 228,  381 => 224,  365 => 211,  356 => 205,  345 => 197,  336 => 191,  325 => 183,  316 => 177,  313 => 176,  310 => 175,  308 => 174,  304 => 172,  300 => 170,  294 => 167,  287 => 162,  285 => 161,  281 => 159,  279 => 158,  275 => 156,  245 => 131,  235 => 126,  225 => 121,  186 => 87,  176 => 82,  166 => 77,  156 => 72,  143 => 61,  133 => 54,  130 => 53,  126 => 51,  122 => 49,  120 => 48,  116 => 47,  111 => 44,  109 => 43,  106 => 42,  104 => 41,  86 => 25,  80 => 21,  71 => 15,  67 => 13,  65 => 12,  62 => 11,  60 => 10,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "cms/index.html.twig", "/home/lucettp/www/app/templates/cms/index.html.twig");
    }
}
