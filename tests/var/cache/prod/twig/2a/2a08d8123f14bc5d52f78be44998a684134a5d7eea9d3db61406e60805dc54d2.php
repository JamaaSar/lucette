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

/* hair_salon/resume.html.twig */
class __TwigTemplate_88120e9181c9949e394c9385cfaae4a8d867a3a3fc482807b368f45ec731da57 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "hair_salon/resume.html.twig", 1);
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
        echo "\t<script src=\"https://js.stripe.com/v3/\"></script>
\t<style>
\t\t.StripeElement {
\t\t\tbox-sizing: border-box;

\t\t\theight: 40px;

\t\t\tpadding: 10px 12px;

\t\t\tborder: 1px solid transparent;
\t\t\tborder-radius: 4px;
\t\t\tbackground-color: white;

\t\t\tbox-shadow: 0 1px 3px 0 #e6ebf1;
\t\t\t-webkit-transition: box-shadow 150ms ease;
\t\t\ttransition: box-shadow 150ms ease;
\t\t}

\t\t.StripeElement--focus {
\t\t\tbox-shadow: 0 1px 3px 0 #cfd7df;
\t\t}

\t\t.StripeElement--invalid {
\t\t\tborder-color: #fa755a;
\t\t}

\t\t.StripeElement--webkit-autofill {
\t\t\tbackground-color: #fefde5 !important;
\t\t}
\t</style>
\t<div class=\"content mt-3\" style=\" font-family: Calibri;\">
\t\t<div class=\"col-md-12\">
\t\t\t<div class='header'>
\t\t\t\t<h4 style=\"text-align:center; \">Order summary
\t\t\t\t</h4>
\t\t\t</div>
\t\t\t";
        // line 43
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 43), "verifyToken", [], "any", false, false, false, 43))) {
            // line 44
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\tAs long as your account has not been verified, you can't book a service!
\t\t\t\t\t<a href=\"";
            // line 47
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_email");
            echo "\">Send another verification email</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 50
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 50));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 51
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t";
            // line 53
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
        // line 59
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "error"], "method", false, false, false, 59));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 60
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-danger\">Error</span>
\t\t\t\t\t";
            // line 62
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
        // line 68
        echo "\t\t\t<form id=\"payment-form\" action=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_payment");
        echo "\" method=\"post\">
\t\t\t\t<br>
\t\t\t\t<div class=\"tile col-lg-12\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<div class=\"card\" style=\"border-radius:10px; box-shadow: 5px 5px 5px 5px #cfcfcf; \">
\t\t\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t\t\t<strong class=\"card-title \">Product & Options</strong>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"card-body\" style=\"min-height: 100px\">
\t\t\t\t\t\t\t\t\t<p class=\"card-text \">
\t\t\t\t\t\t\t\t\t\t<b class=\"product-title\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 80
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", false, false, false, 80), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t";
        // line 82
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 83
            echo "\t\t\t\t\t\t\t\t\t\t<p id=\"list-option\" class=\"card-text \">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 83), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t<div class=\"card\" style=\"border-radius:10px; box-shadow: 5px 5px 5px 5px #cfcfcf; \">
\t\t\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t\t\t<strong class=\"card-title \">Location :
\t\t\t\t\t\t\t\t\t\t";
        // line 92
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["parking"] ?? null), "name", [], "any", false, false, false, 92), "html", null, true);
        echo "</strong>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"card-body\" style=\"height: 100px\">
\t\t\t\t\t\t\t\t\t<p class=\"card-text \">
\t\t\t\t\t\t\t\t\t\t";
        // line 96
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["parking"] ?? null), "address", [], "any", false, false, false, 96), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t";
        // line 98
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["parking"] ?? null), "zipcode", [], "any", false, false, false, 98), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 99
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["parking"] ?? null), "city", [], "any", false, false, false, 99), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t<div class=\"card\" style=\"border-radius:10px; box-shadow: 5px 5px 5px 5px #cfcfcf; \">
\t\t\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t\t\t<strong class=\"card-title\">Date</strong>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"card-body\" style=\"height: 100px\">
\t\t\t\t\t\t\t\t\t<p>";
        // line 110
        echo twig_escape_filter($this->env, ($context["date"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t";
        // line 112
        echo twig_escape_filter($this->env, ($context["start"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t";
        // line 114
        echo twig_escape_filter($this->env, ($context["end"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t<table id=\"bootstrap-data-table-export\" class=\"table borderedStyle\">
\t\t\t\t\t\t\t<thead style=\"background-color: #85A6B8; color: white;\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<th>Name</th>
\t\t\t\t\t\t\t\t\t<th>Price</th>
\t\t\t\t\t\t\t\t\t<th>Time</th>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t";
        // line 130
        $context["minuteTotal"] = 0;
        // line 131
        echo "\t\t\t\t\t\t\t<tbody id=\"resume\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>";
        // line 133
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["categoryProduct"] ?? null), "idproduct", [], "any", false, false, false, 133), "name", [], "any", false, false, false, 133), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
        // line 134
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["categoryProduct"] ?? null), "price", [], "any", false, false, false, 134), "html", null, true);
        echo ".00€</td>
\t\t\t\t\t\t\t\t\t<td style=\"font-style: italic;\">";
        // line 135
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["categoryProduct"] ?? null), "time", [], "any", false, false, false, 135), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\tmin</td>
\t\t\t\t\t\t\t\t\t";
        // line 137
        $context["minuteTotal"] = (($context["minuteTotal"] ?? null) + twig_get_attribute($this->env, $this->source, ($context["categoryProduct"] ?? null), "time", [], "any", false, false, false, 137));
        // line 138
        echo "\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
        // line 139
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categoryOption"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["catop"]) {
            // line 140
            echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<input id=\"";
            // line 141
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catop"], "id", [], "any", false, false, false, 141), "html", null, true);
            echo "\" name=\"options[]\" type=\"hidden\" value=\" ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catop"], "id", [], "any", false, false, false, 141), "html", null, true);
            echo " \">
\t\t\t\t\t\t\t\t\t\t<td>";
            // line 142
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["catop"], "idoption", [], "any", false, false, false, 142), "name", [], "any", false, false, false, 142), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t<td>";
            // line 143
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catop"], "price", [], "any", false, false, false, 143), "html", null, true);
            echo ".00€</td>
\t\t\t\t\t\t\t\t\t\t<td style=\"font-style: italic;\">";
            // line 144
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catop"], "time", [], "any", false, false, false, 144), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\tmin
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t";
            // line 147
            $context["minuteTotal"] = (($context["minuteTotal"] ?? null) + twig_get_attribute($this->env, $this->source, $context["catop"], "time", [], "any", false, false, false, 147));
            // line 148
            echo "\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['catop'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>VAT (Included):</td>
\t\t\t\t\t\t\t\t\t<td>";
        // line 152
        echo twig_escape_filter($this->env, ($context["vat"] ?? null), "html", null, true);
        echo "€</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td style=\"background-color: #85A6B8; color: white;\">Total:</td>
\t\t\t\t\t\t\t\t\t<td style=\"background-color: #85A6B8; color: white;\">";
        // line 156
        echo twig_escape_filter($this->env, ($context["priceTotal"] ?? null), "html", null, true);
        echo ".00€</td>
\t\t\t\t\t\t\t\t\t<td style=\"background-color: #85A6B8; color: white;  font-style: italic;\">";
        // line 157
        echo twig_escape_filter($this->env, ($context["minuteTotal"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\tmin</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<br><br>
\t\t\t\t<div>
\t\t\t\t\t";
        // line 166
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["categoryProduct"] ?? null), "idproduct", [], "any", false, false, false, 166), "directbuy", [], "any", false, false, false, 166) == 0)) {
            // line 167
            echo "
\t\t\t\t\t\t<label for=\"discount\" style=\"margin-right: 5px\">Discount code</label>
\t\t\t\t\t\t<input id=\"discount\" type=\"text\" name=\"discount\" value=\"\" style='border-radius:10px;'>
\t\t\t\t\t\t<label id=\"after_validate\"></label><br>
\t\t\t\t\t\t<input id=\"btn_discount\" type=\"button\" value=\"Validate\" class=\"btn btn-info\">
\t\t\t\t\t\t<input id=\"validate_discount\" name=\"validate_discount\" type=\"hidden\" value=\"\">
\t\t\t\t\t";
        } else {
            // line 174
            echo "\t\t\t\t\t\t<label for=\"discountDirect\" style=\"margin-right: 5px\">Discount code
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<input id=\"discountDirect\" type=\"text\" name=\"discountDirect\" value=\"\" style='border-radius:10px;'>
\t\t\t\t\t\t<label id=\"after_validate\"></label><br>
\t\t\t\t\t\t<input id=\"btn_discountDirect\" type=\"button\" value=\"Validate\" class=\"btn btn-info\">
\t\t\t\t\t\t<input id=\"validate_discount\" name=\"validate_discount\" type=\"hidden\" value=\"\">
\t\t\t\t\t";
        }
        // line 181
        echo "\t\t\t\t\t<br><br><br>
\t\t\t\t</div>
\t\t\t\t<div>
\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t<label for=\"CGU\" style=\"margin-right: 5px\">I have read the
\t\t\t\t\t\t\t<a href=\"https://lucette.market/cgv/\" target=\"_blank\">
\t\t\t\t\t\t\t\t<b>CGV/CGU</b>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<input id=\"CGU\" type=\"checkbox\" name=\"CGU\" required>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<input id=\"availability\" name=\"availability\" type=\"hidden\" value=\"";
        // line 192
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["availability"] ?? null), "id", [], "any", false, false, false, 192), "html", null, true);
        echo "\">
\t\t\t\t\t\t<input id=\"product_id\" name=\"product_id\" type=\"hidden\" value=\"";
        // line 193
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["categoryProduct"] ?? null), "id", [], "any", false, false, false, 193), "html", null, true);
        echo "\">
\t\t\t\t\t\t<input id=\"parkingId\" name=\"parkingId\" type=\"hidden\" value=\"";
        // line 194
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["parking"] ?? null), "id", [], "any", false, false, false, 194), "html", null, true);
        echo "\">
\t\t\t\t\t\t<input id=\"start\" name=\"start\" type=\"hidden\" value=\"";
        // line 195
        echo twig_escape_filter($this->env, ($context["start"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t<input id=\"end\" name=\"end\" type=\"hidden\" value=\"";
        // line 196
        echo twig_escape_filter($this->env, ($context["end"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t<a href=\"";
        // line 197
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_hair_salon");
        echo "\" class=\"btn btn-danger\">Cancel</a>
\t\t\t\t\t\t<input type=\"Submit\" value=\"Proceed To Payment\" id=\"NextStep3\" class=\"btn btn-info\">
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<br>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</form>
\t\t</div>
\t\t<!-- .animated -->
\t</div><!-- .content --></div></div></div>
\t<script src=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 208
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 209
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 210
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/js/dist/collapse.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 211
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
\t<script src='";
        // line 212
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-1.10.2.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
\t<script src='";
        // line 213
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-ui.custom.min.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
\t<script>

\t\$(document).on('click', '#btn_discount', function () { // console.log('ok');

if (\$(\"#discount\").val() != \"\") {
var reduc = \$(\"#discount\").val();
// console.log(\"pas null\");
// console.log(\$(\"#discount\").val());
} else { // console.log(\"null\");
var reduc = \" \";
}
\$.ajax({
url: '";
        // line 226
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_resume");
        echo "',
type: \"POST\",
dataType: \"json\",
data: {
\"reduction\": reduc
},
async: true,
success: function (data) {
\$(\"#after_validate\").html(data.verify);
\$(\"#validate_discount\").val(data.code);


// console.log(data);


}
});
});
\$(document).on('click', '#btn_discountDirect', function () { // console.log('ok');

if (\$(\"#discountDirect\").val() != \"\") {
var reduc = \$(\"#discountDirect\").val();
// console.log(\"pas null\");
// console.log(\$(\"#discount\").val());
} else { // console.log(\"null\");
var reduc = \" \";
}
\$.ajax({
url: '";
        // line 254
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_resumedirect");
        echo "',
type: \"POST\",
dataType: \"json\",
data: {
\"reduction\": reduc
},
async: true,
success: function (data) {
\$(\"#after_validate\").html(data.verify);
\$(\"#validate_discount\").val(data.code);


// console.log(data);


}
});


});</script>";
    }

    public function getTemplateName()
    {
        return "hair_salon/resume.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  474 => 254,  443 => 226,  427 => 213,  423 => 212,  419 => 211,  415 => 210,  411 => 209,  407 => 208,  403 => 207,  390 => 197,  386 => 196,  382 => 195,  378 => 194,  374 => 193,  370 => 192,  357 => 181,  348 => 174,  339 => 167,  337 => 166,  325 => 157,  321 => 156,  314 => 152,  310 => 150,  303 => 148,  301 => 147,  295 => 144,  291 => 143,  287 => 142,  281 => 141,  278 => 140,  274 => 139,  271 => 138,  269 => 137,  264 => 135,  260 => 134,  256 => 133,  252 => 131,  250 => 130,  231 => 114,  226 => 112,  221 => 110,  207 => 99,  203 => 98,  198 => 96,  191 => 92,  182 => 85,  173 => 83,  169 => 82,  164 => 80,  148 => 68,  136 => 62,  132 => 60,  127 => 59,  115 => 53,  111 => 51,  106 => 50,  100 => 47,  95 => 44,  93 => 43,  55 => 7,  52 => 6,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "hair_salon/resume.html.twig", "/home/lucettp/www/app/templates/hair_salon/resume.html.twig");
    }
}
