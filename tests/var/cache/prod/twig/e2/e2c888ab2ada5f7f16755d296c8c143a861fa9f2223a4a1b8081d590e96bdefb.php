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

/* hair_salon/payment.html.twig */
class __TwigTemplate_62cb9b5ea1d83c4c9187dedfbc81971a93da34dd829d45db6781169e27449bf7 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("base.html.twig", "hair_salon/payment.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        // line 4
        echo "\t<style>
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
\t<script src=\"https://js.stripe.com/v3/\"></script>

\t<div class=\"content mt-3\" style=\" font-family: Calibri;\">
\t\t<div class=\"animated fadeIn\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t\t<div class=\"card\" style=\"border:0px; background-color:transparent;\">
\t\t\t\t\t\t\t<div class=\"card-body\" style=\"float:none;margin:10%;\">
\t\t\t\t\t\t\t\t<header class=\"sr-header\">
\t\t\t\t\t\t\t\t\t<div class=\"sr-header__logo\" style=\"margin-bottom:20px;\">
\t\t\t\t\t\t\t\t\t\t<img style=' width:100px; height:100px; margin-bottom: 15px;' src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/lucette.png"), "html", null, true);
        echo "\"/>

\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</header>
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<h3>
\t\t\t\t\t\t\t\t\t\t<p>";
        // line 50
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", false, false, false, 50), "html", null, true);
        echo "</p>
\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t<h3 class=\"order-amount\">";
        // line 52
        echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
        echo "€</h3>
\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t<img style='border-radius: 8px; width:500px; height:250px; margin-bottom: 25px;' src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("uploads/product/" . twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "photo", [], "any", false, false, false, 54)) . "")), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t\t<div class=\"card\" style=\"border:0px; background-color:transparent;\">
\t\t\t\t\t\t\t<div class=\"card-body\" style=\"float:none;margin:10%\">
\t\t\t\t\t\t\t\t<div class='header' style=\"margin-bottom:20px;\">
\t\t\t\t\t\t\t\t\t<h3>Payer par carte</h3>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"p\">
\t\t\t\t\t\t\t\t\t";
        // line 66
        if ((($context["creditCards"] ?? null) != null)) {
            // line 67
            echo "
\t\t\t\t\t\t\t\t<form id=\"payment-form1\" action=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_savedcard", ["price" => ($context["price"] ?? null)]), "html", null, true);
            echo "\" method=\"post\">

\t\t\t\t\t\t\t\t\t\t<fieldset class=\"border p-2\" style=\"border-radius:12px;\">
\t\t\t\t\t\t\t\t\t\t\t<legend class=\"w-auto\" style='margin-left:25px;'>Your cards
\t\t\t\t\t\t\t\t\t\t\t</legend>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\" style=\"margin-left:25px;\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["creditCards"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["creditCard"]) {
                // line 75
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"creditCard\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "id", [], "any", false, false, false, 75), "html", null, true);
                echo "\" id=\"creditCard\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"";
                // line 76
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "id", [], "any", false, false, false, 76), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 77
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "cardtype", [], "any", false, false, false, 77), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\tending : ****
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                // line 79
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "lastDigits", [], "any", false, false, false, 79), "html", null, true);
                echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\texpires
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "monthValidity", [], "any", false, false, false, 81), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["creditCard"], "yearValidity", [], "any", false, false, false, 81), "html", null, true);
                echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t</label><br>

\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['creditCard'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 85
            echo "\t\t\t\t\t\t\t\t \t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"product_id\" name=\"product_id\" type=\"hidden\" value=\"";
            // line 86
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["categoryProduct"] ?? null), "id", [], "any", false, false, false, 86), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"availability\" name=\"availability\" type=\"hidden\" value=\"";
            // line 87
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["availability"] ?? null), "id", [], "any", false, false, false, 87), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"user_id\" name=\"user_id\" type=\"hidden\" value=\"";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 88), "email", [], "any", false, false, false, 88), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 89
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categoryOption"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["catop"]) {
                // line 90
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catop"], "id", [], "any", false, false, false, 90), "html", null, true);
                echo "\" name=\"options[]\" type=\"hidden\" value=\" ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catop"], "id", [], "any", false, false, false, 90), "html", null, true);
                echo " \">
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['catop'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"parkingId\" name=\"parkingId\" type=\"hidden\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["parking"] ?? null), "id", [], "any", false, false, false, 92), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"start\" name=\"start\" type=\"hidden\" value=\"";
            // line 93
            echo twig_escape_filter($this->env, ($context["start"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"end\" name=\"end\" type=\"hidden\" value=\"";
            // line 94
            echo twig_escape_filter($this->env, ($context["end"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"duration\" name=\"duration\" type=\"hidden\" value=\"";
            // line 95
            echo twig_escape_filter($this->env, ($context["duration"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button disabled=\"disabled\" class=\"form-control\" style=\"background-color:#30c794ff;\" type=\"submit\" id='savedCard' name=\"savedCard\">Pay
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 98
            echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
            echo "€</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</fieldset>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t";
        }
        // line 106
        echo "\t\t\t\t\t\t\t\t<form id=\"payment-form\" action=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_newmethod", ["price" => ($context["price"] ?? null)]), "html", null, true);
        echo "\" method=\"post\">
\t\t\t\t\t\t\t\t\t<fieldset class=\"border p-2\" style=\"border-radius:12px;\">
\t\t\t\t\t\t\t\t\t\t<legend class=\"w-auto\" style='margin-left:25px;'>Use new payment method
\t\t\t\t\t\t\t\t\t\t</legend>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\" style=\"margin-left:25px;\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"cardholder-name\">
\t\t\t\t\t\t\t\t\t\t\t\t\tCardholder Name
\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"cardholder-name\" id=\"cardholder-name\" type=\"text\" style=\"width:100%;\">
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"card-element\">
\t\t\t\t\t\t\t\t\t\t\t\t\tCredit card
\t\t\t\t\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\t\t\t\t\tid=\"card-element\"><!-- A Stripe Element will be inserted here. -->
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"savemycard\" name=\"savemycard\" data-secret=\"<?= \$intent->client_secret ?>\">
\t\t\t\t\t\t\t\t\t\t\t\t<label>&nbsp;Save for future payments</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<input id=\"product_id\" name=\"product_id\" type=\"hidden\" value=\"";
        // line 131
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["categoryProduct"] ?? null), "id", [], "any", false, false, false, 131), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<input id=\"availability\" name=\"availability\" type=\"hidden\" value=\"";
        // line 132
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["availability"] ?? null), "id", [], "any", false, false, false, 132), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<input id=\"user_id\" name=\"user_id\" type=\"hidden\" value=\"";
        // line 133
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 133), "email", [], "any", false, false, false, 133), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 134
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categoryOption"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["catop"]) {
            // line 135
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catop"], "id", [], "any", false, false, false, 135), "html", null, true);
            echo "\" name=\"options[]\" type=\"hidden\" value=\" ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catop"], "id", [], "any", false, false, false, 135), "html", null, true);
            echo " \">
\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['catop'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "\t\t\t\t\t\t\t\t\t\t\t<input id=\"parkingId\" name=\"parkingId\" type=\"hidden\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["parking"] ?? null), "id", [], "any", false, false, false, 137), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<input id=\"start\" name=\"start\" type=\"hidden\" value=\"";
        // line 138
        echo twig_escape_filter($this->env, ($context["start"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<input id=\"end\" name=\"end\" type=\"hidden\" value=\"";
        // line 139
        echo twig_escape_filter($this->env, ($context["end"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<input id=\"duration\" name=\"duration\" type=\"hidden\" value=\"";
        // line 140
        echo twig_escape_filter($this->env, ($context["duration"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div id=\"card-errors\" role=\"alert\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<button class=\"form-control\" style=\"background-color:#30c794ff;\" id=\"card-button\" data-secret=\"<?= \$intent->client_secret ?>\">
\t\t\t\t\t\t\t\t\t\t\tPay
\t\t\t\t\t\t\t\t\t\t\t";
        // line 145
        echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
        echo "€
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</fieldset>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"loader\" style=\"display:none\">
\t\t\t\t\t\t\t\t\t\t\t<p><strong>
\t\t\t\t\t\t\t\t\t\t\t\t<i class='fa fa-spinner fa-spin'></i>&nbsp;&nbsp;&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\tPlease wait. Payment Processing...</strong></p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script src=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 167
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 168
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 169
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/stripe.js"), "html", null, true);
        echo "\"></script>
<script>
\tjQuery(document).ready(function (\$) {
\$(document).ready(function () {
\$(\"input[name='creditCard']\").click(function () {
\$(\"#savedCard\").prop(\"disabled\", false);
\$(\"#card-button\").prop(\"hidden\", true);
});

});

});
</script>
<script>
\tjQuery(document).ready(function (\$) {
\$(document).ready(function () {
\$(\"button[name='savedCard']\").click(function () {
\t\$(\"#savedCard\").prop(\"hidden\", true);
});

});

});
</script>";
    }

    public function getTemplateName()
    {
        return "hair_salon/payment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  348 => 169,  344 => 168,  340 => 167,  336 => 166,  332 => 165,  309 => 145,  301 => 140,  297 => 139,  293 => 138,  288 => 137,  277 => 135,  273 => 134,  269 => 133,  265 => 132,  261 => 131,  232 => 106,  221 => 98,  215 => 95,  211 => 94,  207 => 93,  202 => 92,  191 => 90,  187 => 89,  183 => 88,  179 => 87,  175 => 86,  172 => 85,  160 => 81,  155 => 79,  150 => 77,  146 => 76,  141 => 75,  137 => 74,  128 => 68,  125 => 67,  123 => 66,  108 => 54,  103 => 52,  98 => 50,  89 => 44,  47 => 4,  44 => 3,  34 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "hair_salon/payment.html.twig", "/home/lucettp/www/app/templates/hair_salon/payment.html.twig");
    }
}
