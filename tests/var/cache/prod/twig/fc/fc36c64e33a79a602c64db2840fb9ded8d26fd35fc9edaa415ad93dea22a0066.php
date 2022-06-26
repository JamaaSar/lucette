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

/* user/profile.html.twig */
class __TwigTemplate_e26ab663f64637791a1f4b65e39460dc982bb4dd1586aba7b709ec2e2bdb1ddc extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "user/profile.html.twig", 1);
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
        // line 17
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
        echo "\">Dashboard</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"active\">User Profile</li>
\t\t\t\t\t</ol>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"content mt-3\" style=\" font-family: Calibri; \">
\t\t<div class=\"animated fadeIn\">

\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-12\">

\t\t\t\t\t<div class=\"header\">
\t\t\t\t\t\t<h4 style=\"text-align:center\">My profile </h4>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"card-body\">

\t\t\t\t\t\t<div class=\"default-tab\">
\t\t\t\t\t\t\t<nav>
\t\t\t\t\t\t\t\t<div class=\"nav nav-tabs\" id=\"nav-tab\" role=\"tablist\">
\t\t\t\t\t\t\t\t\t<a class=\"nav-item nav-link active\" id=\"nav-profile-tab\" data-toggle=\"tab\" href=\"#nav-profile\" role=\"tab\" aria-controls=\"nav-profile\" aria-selected=\"true\">Details</a>
\t\t\t\t\t\t\t\t\t<a class=\"nav-item nav-link\" id=\"nav-credit_card-tab\" data-toggle=\"tab\" href=\"#nav-credit_card\" role=\"tab\" aria-controls=\"nav-credit_card\" aria-selected=\"false\">Credit Card</a>
\t\t\t\t\t\t\t\t\t<a class=\"nav-item nav-link\" id=\"nav-history-tab\" data-toggle=\"tab\" href=\"#nav-history\" role=\"tab\" aria-controls=\"nav-history\" aria-selected=\"false\">Order History</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</nav>
\t\t\t\t\t\t\t<div class=\"tab-content pl-3 pt-2\" id=\"nav-tabContent\">
\t\t\t\t\t\t\t\t<div class=\"tab-pane fade show active\" id=\"nav-profile\" role=\"tabpanel\" aria-labelledby=\"nav-profile-tab\">
\t\t\t\t\t\t\t\t\t";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 47));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 48
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 50
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
\t\t\t\t\t\t\t\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "\t\t\t\t\t\t\t\t\t<p class=\"text-muted m-b-15\"></p>
\t\t\t\t\t\t\t\t\t<p>First Name:
\t\t\t\t\t\t\t\t\t\t<b>";
        // line 58
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 58), "firstname", [], "any", false, false, false, 58), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>Last Name:
\t\t\t\t\t\t\t\t\t\t<b>";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 61), "lastname", [], "any", false, false, false, 61), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>Street name and number:
\t\t\t\t\t\t\t\t\t\t<b>";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 64), "numberAndStreet", [], "any", false, false, false, 64), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>ZIP Code:
\t\t\t\t\t\t\t\t\t\t<b>";
        // line 67
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 67), "zipCode", [], "any", false, false, false, 67), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>City:
\t\t\t\t\t\t\t\t\t\t<b>";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 70), "city", [], "any", false, false, false, 70), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>Email:
\t\t\t\t\t\t\t\t\t\t<b>";
        // line 73
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 73), "email", [], "any", false, false, false, 73), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>Phone:
\t\t\t\t\t\t\t\t\t\t<b>";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 76), "phoneNumber", [], "any", false, false, false, 76), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t<p>Company Code:
\t\t\t\t\t\t\t\t\t\t<b>";
        // line 79
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 79), "codeCompany", [], "any", false, false, false, 79), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>

\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 82
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_edit");
        echo "\" class=\"btn btn-success btn-sm\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-magic\"></i>&nbsp; Edit Profile</a>
\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 84
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_editpassword");
        echo "\" class=\"btn btn-success btn-sm\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-magic\"></i>&nbsp; Edit Password</a>
\t\t\t\t\t\t\t\t\t\t";
        // line 86
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 86), "subscribe", [], "any", false, false, false, 86) == true)) {
            // line 87
            echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_unsubscribe");
            echo "\" class=\"btn btn-warning btn-sm\">
\t\t\t\t\t\t\t\t\t\t&nbsp; Unsubscribe</a>
\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 90
            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_subscribe");
            echo "\" class=\"btn btn-warning btn-sm\">
\t\t\t\t\t\t\t\t\t\t&nbsp; Subscribe</a>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 93
        echo "

\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t<div class=\"tab-pane fade\" id=\"nav-credit_card\" role=\"tabpanel\" aria-labelledby=\"nav-credit_card-tab\">
\t\t\t\t\t\t\t\t\t<table id=\"bootstrap-data-table-export\" class=\"table table-striped table-bordered\">
\t\t\t\t\t\t\t\t\t\t<thead style=\"background-color: #85A6B8; color: white;\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<th>Credit card</th>
\t\t\t\t\t\t\t\t\t\t\t\t<th>Number</th>
\t\t\t\t\t\t\t\t\t\t\t\t<th>Validity</th>
\t\t\t\t\t\t\t\t\t\t\t\t<th>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 106
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_addCard");
        echo "\" class=\"btn btn-bookAService btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"></i>&nbsp; Add</a>
\t\t\t\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["creditCards"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["creditCard"]) {
            // line 113
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 114
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "cardType", [], "any", false, false, false, 114), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td>**** **** ****
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 116
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "lastDigits", [], "any", false, false, false, 116), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 117
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "monthValidity", [], "any", false, false, false, 117), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "yearValidity", [], "any", false, false, false, 117), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 119
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_deleteCard", ["id" => twig_get_attribute($this->env, $this->source, $context["creditCard"], "id", [], "any", false, false, false, 119)]), "html", null, true);
            echo "\" onclick=\"return confirm('Do you want to delete this card?')\" class=\"btn btn-danger btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-trash\"></i>&nbsp; Delete</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 124
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"4\">You have no credit card registered</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['creditCard'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t<div class=\"tab-pane fade\" id=\"nav-history\" role=\"tabpanel\" aria-labelledby=\"nav-history-tab\">
\t\t\t\t\t\t\t\t\t<table id=\"bootstrap-data-table-export\" class=\"table table-striped bordered\">
\t\t\t\t\t\t\t\t\t\t<thead style=\"background-color: #85A6B8; color: white;\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<th>Date</th>
\t\t\t\t\t\t\t\t\t\t\t\t<th>Parking</th>
\t\t\t\t\t\t\t\t\t\t\t\t<th>Car</th>
\t\t\t\t\t\t\t\t\t\t\t\t<th>Product/Options</th>
\t\t\t\t\t\t\t\t\t\t\t\t<th>Price</th>
\t\t\t\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 147
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["Orders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["Order"]) {
            // line 148
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 150
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Order"], "date", [], "any", false, false, false, 150), "d/m/Y"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 152
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_detail", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "parkingId", [], "any", false, false, false, 152), "id", [], "any", false, false, false, 152)]), "html", null, true);
            echo "\" class=\"btn btn-parking btn-sm\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-eye mr-0\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;";
            // line 154
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "parkingId", [], "any", false, false, false, 154), "name", [], "any", false, false, false, 154), "html", null, true);
            echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 157
            if ( !(null === twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 157))) {
                // line 158
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 159
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 159), "userHasCarIdCar", [], "any", false, false, false, 159), "brandCar", [], "any", false, false, false, 159), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 161
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 161), "userHasCarIdCar", [], "any", false, false, false, 161), "modelCar", [], "any", false, false, false, 161), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 163
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 163), "userHasCarNicknameCar", [], "any", false, false, false, 163), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 164
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 164), "spaceNumber", [], "any", false, false, false, 164) != null) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 164), "spaceNumber", [], "any", false, false, false, 164) != ""))) {
                    // line 165
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 166
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "userCarId", [], "any", false, false, false, 166), "spaceNumber", [], "any", false, false, false, 166), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 168
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 169
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 171
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Order"], "produit", [], "any", false, false, false, 171), "name", [], "any", false, false, false, 171), "html", null, true);
            echo ":
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 172
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["Order"], "PlannedCleaningOptions", [], "any", false, false, false, 172));
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 173
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["option"], "optionId", [], "any", false, false, false, 173), "name", [], "any", false, false, false, 173), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 175
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 176
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Order"], "pricePaid", [], "any", false, false, false, 176), 2, ".", ","), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t€</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-bookAService\" href=\"";
            // line 179
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_pdf", ["id" => twig_get_attribute($this->env, $this->source, $context["Order"], "id", [], "any", false, false, false, 179)]), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-download\"></i>&nbsp;Download</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>

\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 185
        echo "
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t</div>


\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>


\t\t</div>


\t</div>
</div>

<script src=\"";
        // line 206
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 208
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 209
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>";
    }

    public function getTemplateName()
    {
        return "user/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  419 => 209,  415 => 208,  411 => 207,  407 => 206,  384 => 185,  372 => 179,  366 => 176,  363 => 175,  354 => 173,  350 => 172,  346 => 171,  342 => 169,  339 => 168,  334 => 166,  331 => 165,  329 => 164,  325 => 163,  320 => 161,  315 => 159,  312 => 158,  310 => 157,  304 => 154,  299 => 152,  294 => 150,  290 => 148,  286 => 147,  265 => 128,  256 => 124,  246 => 119,  239 => 117,  235 => 116,  230 => 114,  227 => 113,  222 => 112,  213 => 106,  198 => 93,  191 => 90,  184 => 87,  182 => 86,  177 => 84,  172 => 82,  166 => 79,  160 => 76,  154 => 73,  148 => 70,  142 => 67,  136 => 64,  130 => 61,  124 => 58,  120 => 56,  108 => 50,  104 => 48,  100 => 47,  67 => 17,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "user/profile.html.twig", "/home/lucettp/www/app/templates/user/profile.html.twig");
    }
}
