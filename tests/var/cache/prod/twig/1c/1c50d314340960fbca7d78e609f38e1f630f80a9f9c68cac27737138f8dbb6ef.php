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

/* order/list.html.twig */
class __TwigTemplate_7e72f2974b678501de73dda061b563e025f89a1c419dc44761105b1450b346c8 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "order/list.html.twig", 1);
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
        echo "
\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
\t<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js\"></script>
\t<div class=\"breadcrumbs\">
\t\t<div class=\"col-sm-4\">
\t\t\t<div class=\"page-header float-left\"></div>
\t\t</div>
\t\t<div class=\"col-sm-8\">
\t\t\t<div class=\"page-header float-right\">
\t\t\t\t<div class=\"page-title\">
\t\t\t\t\t<ol class=\"breadcrumb text-right\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
        echo "\">Dashboard</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"active\">Order</li>
\t\t\t\t\t</ol>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"content mt-3\">
\t\t<div class=\"animated fadeIn\">
\t\t\t<div class=\"row\">

\t\t\t\t<div class=\"col-md-12\">

\t\t\t\t\t<div class=\"header\">
\t\t\t\t\t\t<h4 style=\"text-align:center;\">Order Manager</h4>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t";
        // line 38
        if ( !twig_test_empty(($context["nonvalide"] ?? null))) {
            // line 39
            echo "\t\t\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\t\t\t\tThere are uncommitted orders in the database!
\t\t\t\t\t\t\t\t<a href=\"";
            // line 42
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_delete");
            echo "\">Delete</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 45
        echo "\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 45));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 46
            echo "\t\t\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t\t\t\t";
            // line 48
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "\t\t\t\t\t\t<div  class=\"col-md-12\">
\t\t\t\t\t\t\t";
        // line 55
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 56
            echo "\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t<a style=\"color:black\">Show By</a>
\t\t\t\t\t\t\t\t\t<br><button type=\"button\" data-toggle=\"dropdown\" class=\"dropdown-toggle dropdown-toggle-right\" aria-expanded=\"true\" style=\"background-color:transparent; color:black; border:1px solid #e7e7e7; border-radius:4px;text-align: left\">All orders</button>
\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"";
            // line 60
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_list");
            echo " \">All orders</a>
\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"";
            // line 61
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_nonva");
            echo " \">Non valide</a>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
        }
        // line 67
        echo "\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"myInput\" type=\"text\" placeholder=\"Search..\">\t\t<br>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t</div>

\t\t\t\t\t\t<table class=\"table table-striped bordered\">
\t\t\t\t\t\t\t<thead style=\"background-color: #85A6B8; color: white;\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<th>Cleaning Date</th>
\t\t\t\t\t\t\t\t\t<th>Parking</th>
\t\t\t\t\t\t\t\t\t<th>User</th>
\t\t\t\t\t\t\t\t\t<th>Product/Options</th>
\t\t\t\t\t\t\t\t\t<th>Price paid</th>
\t\t\t\t\t\t\t\t\t<th>Car</th>

\t\t\t\t\t\t\t\t\t<!--<th>Price</th>-->
\t\t\t\t\t\t\t\t\t";
        // line 85
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 86
            echo "\t\t\t\t\t\t\t\t\t\t<th>Reminder</th>
\t\t\t\t\t\t\t\t\t";
        }
        // line 88
        echo "
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody id=\"myTable\">
\t\t\t\t\t\t\t\t";
        // line 92
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_WORKER_ADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_COMPANY_ADMIN"))) {
            // line 93
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["Orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Order"]) {
                // line 94
                echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 95
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Order"], "date", [], "any", false, false, false, 95), "d/m/Y"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 97
                echo twig_escape_filter($this->env, twig_round((twig_get_attribute($this->env, $this->source, $context["Order"], "plannedStart", [], "any", false, false, false, 97) / 60), 0, "floor"), "html", null, true);
                echo ":";
                if (((twig_get_attribute($this->env, $this->source, $context["Order"], "plannedStart", [], "any", false, false, false, 97) % 60) < 10)) {
                    echo "0";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["Order"], "plannedStart", [], "any", false, false, false, 97) % 60), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 99
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["Order"], "plannedStart", [], "any", false, false, false, 99) % 60), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 101
                echo "\t\t\t\t\t\t\t\t\t\t\t\tTo
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 102
                echo twig_escape_filter($this->env, twig_round((twig_get_attribute($this->env, $this->source, $context["Order"], "plannedEnd", [], "any", false, false, false, 102) / 60), 0, "floor"), "html", null, true);
                echo ":";
                if (((twig_get_attribute($this->env, $this->source, $context["Order"], "plannedEnd", [], "any", false, false, false, 102) % 60) < 10)) {
                    echo "0";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["Order"], "plannedEnd", [], "any", false, false, false, 102) % 60), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 104
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["Order"], "plannedEnd", [], "any", false, false, false, 104) % 60), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 106
                echo "\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 107
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "parkingId", [], "any", false, false, false, 107), "name", [], "any", false, false, false, 107), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 108
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userid", [], "any", false, false, false, 108), "username", [], "any", false, false, false, 108), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 110
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userid", [], "any", false, false, false, 110), "phoneNumber", [], "any", false, false, false, 110), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 111
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "produit", [], "any", false, false, false, 111), "name", [], "any", false, false, false, 111), "html", null, true);
                echo ":
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 112
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaningOptions", [], "any", false, false, false, 112));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 113
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["option"], "optionId", [], "any", false, false, false, 113), "name", [], "any", false, false, false, 113), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 115
                echo "\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 117
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Order"], "pricePaid", [], "any", false, false, false, 117), 2, ".", ","), "html", null, true);
                echo "€
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 119
                if ((twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 119) != null)) {
                    // line 120
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 120), "UserHasCarNicknameCar", [], "any", false, false, false, 120), "html", null, true);
                    echo ":
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 121
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 121), "userHasCarIdCar", [], "any", false, false, false, 121), "brandCar", [], "any", false, false, false, 121), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 123
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 123), "userHasCarIdCar", [], "any", false, false, false, 123), "modelCar", [], "any", false, false, false, 123), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 125
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 125), "userHasCarIdCar", [], "any", false, false, false, 125), "CategoryCar", [], "any", false, false, false, 125), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 127
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 129
                echo "\t\t\t\t\t\t\t\t\t\t\t<!--<td>";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Order"], "pricePaid", [], "any", false, false, false, 129), 2, ".", ","), "html", null, true);
                echo " €</td>-->
\t\t\t\t\t\t\t\t\t\t\t";
                // line 130
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                    // line 131
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 132
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_notif", ["id" => twig_get_attribute($this->env, $this->source, $context["Order"], "id", [], "any", false, false, false, 132)]), "html", null, true);
                    echo "\" class=\"btn btn-info btn-sm\">Send Reminder EMail</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 134
                    if ((twig_get_attribute($this->env, $this->source, $context["Order"], "valide", [], "any", false, false, false, 134) == true)) {
                        // line 135
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 136
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_valider", ["id" => twig_get_attribute($this->env, $this->source, $context["Order"], "id", [], "any", false, false, false, 136)]), "html", null, true);
                        echo "\" class=\"btn btn-light btn-sm\">Force validate</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 138
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 140
                echo "\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 142
            echo "\t\t\t\t\t\t\t\t";
        } else {
            // line 143
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 144
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["Orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Order"]) {
                // line 145
                echo "\t\t\t\t\t\t\t\t\t\t<tr>

\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 147
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 147), "date", [], "any", false, false, false, 147), "d/m/Y"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 149
                echo twig_escape_filter($this->env, twig_round((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 149), "plannedStart", [], "any", false, false, false, 149) / 60), 0, "floor"), "html", null, true);
                echo ":
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 150
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 150), "plannedStart", [], "any", false, false, false, 150) % 60) < 10)) {
                    echo "0
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 152
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 152), "plannedStart", [], "any", false, false, false, 152) % 60), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\tTo
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 154
                echo twig_escape_filter($this->env, twig_round((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 154), "plannedEnd", [], "any", false, false, false, 154) / 60), 0, "floor"), "html", null, true);
                echo ":
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 155
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 155), "plannedEnd", [], "any", false, false, false, 155) % 60) < 10)) {
                    echo "0
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 157
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 157), "plannedEnd", [], "any", false, false, false, 157) % 60), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 158
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 158), "parkingId", [], "any", false, false, false, 158), "name", [], "any", false, false, false, 158), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 159
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 159), "userid", [], "any", false, false, false, 159), "username", [], "any", false, false, false, 159), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 161
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 161), "userid", [], "any", false, false, false, 161), "phoneNumber", [], "any", false, false, false, 161), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 162
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 162), "produit", [], "any", false, false, false, 162), "name", [], "any", false, false, false, 162), "html", null, true);
                echo ":
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 163
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 163), "PlannedCleaningOptions", [], "any", false, false, false, 163));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 164
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["option"], "optionId", [], "any", false, false, false, 164), "name", [], "any", false, false, false, 164), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 166
                echo "\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 167
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 167), "userCarId", [], "any", false, false, false, 167), "UserHasCarNicknameCar", [], "any", false, false, false, 167), "html", null, true);
                echo ":
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 168
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 168), "userCarId", [], "any", false, false, false, 168), "userHasCarIdCar", [], "any", false, false, false, 168), "brandCar", [], "any", false, false, false, 168), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 170
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 170), "userCarId", [], "any", false, false, false, 170), "userHasCarIdCar", [], "any", false, false, false, 170), "modelCar", [], "any", false, false, false, 170), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 172
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaning", [], "any", false, false, false, 172), "userCarId", [], "any", false, false, false, 172), "userHasCarIdCar", [], "any", false, false, false, 172), "CategoryCar", [], "any", false, false, false, 172), "html", null, true);
                echo "</td>


\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 177
            echo "
\t\t\t\t\t\t\t\t";
        }
        // line 179
        echo "\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>


\t\t</div>
\t</div>
\t<!-- .animated -->
</div>
<!-- .content -->
<script>
\t\$(document).ready(function () {
\$(\"#myInput\").on(\"keyup\", function () {
var value = \$(this).val().toLowerCase();
\$(\"#myTable tr\").filter(function () {
\$(this).toggle(\$(this).text().toLowerCase().indexOf(value) > -1)
});
});
});
</script>
<script src=\"";
        // line 201
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 202
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 203
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 204
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>

";
    }

    public function getTemplateName()
    {
        return "order/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  479 => 204,  475 => 203,  471 => 202,  467 => 201,  443 => 179,  439 => 177,  428 => 172,  423 => 170,  418 => 168,  414 => 167,  411 => 166,  402 => 164,  398 => 163,  394 => 162,  390 => 161,  385 => 159,  381 => 158,  376 => 157,  371 => 155,  367 => 154,  361 => 152,  356 => 150,  352 => 149,  347 => 147,  343 => 145,  339 => 144,  336 => 143,  333 => 142,  326 => 140,  322 => 138,  317 => 136,  314 => 135,  312 => 134,  307 => 132,  304 => 131,  302 => 130,  297 => 129,  293 => 127,  288 => 125,  283 => 123,  278 => 121,  273 => 120,  271 => 119,  266 => 117,  262 => 115,  253 => 113,  249 => 112,  245 => 111,  241 => 110,  236 => 108,  232 => 107,  229 => 106,  223 => 104,  214 => 102,  211 => 101,  205 => 99,  196 => 97,  191 => 95,  188 => 94,  183 => 93,  181 => 92,  175 => 88,  171 => 86,  169 => 85,  149 => 67,  140 => 61,  136 => 60,  130 => 56,  128 => 55,  125 => 54,  113 => 48,  109 => 46,  104 => 45,  98 => 42,  93 => 39,  91 => 38,  69 => 19,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "order/list.html.twig", "/home/lucettp/www/app/templates/order/list.html.twig");
    }
}
