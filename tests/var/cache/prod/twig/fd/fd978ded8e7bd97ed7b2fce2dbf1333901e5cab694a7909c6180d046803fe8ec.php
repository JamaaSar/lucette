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

/* base.html.twig */
class __TwigTemplate_050b2cd45dcedc04767ddd2184ec4dc753c01faa511c64e937c19f671bc9d5bf extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\" lang=\"\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\" lang=\"\"> <![endif]-->
<!--[if gt IE 8]><!-->
<!--<![endif]-->

\t<html class=\"no-js\" lang=\"en\"> <head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
\t\t<meta name=\"google-site-verification\" content=\"yfBUJDGws0wpyMWopWeB0uoMKxDDX8IFwgTP5UlDI2k\"/>
\t\t<title>
\t\t\t";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        // line 15
        echo "\t\t</title>
\t\t";
        // line 16
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 68
        echo "\t</head>
\t<body>
\t\t";
        // line 70
        $this->displayBlock('body', $context, $blocks);
        // line 71
        echo "\t\t";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 82
        echo "\t</body>
</html>
";
    }

    // line 13
    public function block_title($context, array $blocks = [])
    {
        echo "Lucette
\t\t\t";
    }

    // line 16
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 17
        echo "\t\t\t<link rel=\"apple-touch-icon\" href=\"../../../../../apple-icon.png\">
\t\t\t<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/lucette.png"), "html", null, true);
        echo "\"/>

\t\t\t<style type=\"text/css\">

\t\t\t\t.StripeElement {
\t\t\t\t\tbox-sizing: border-box;

\t\t\t\t\theight: 40px;

\t\t\t\t\tpadding: 10px 12px;

\t\t\t\t\tborder: 1px solid transparent;
\t\t\t\t\tborder-radius: 4px;
\t\t\t\t\tbackground-color: white;

\t\t\t\t\tbox-shadow: 0 1px 3px 0 #e6ebf1;
\t\t\t\t\t-webkit-transition: box-shadow 150ms ease;
\t\t\t\t\ttransition: box-shadow 150ms ease;
\t\t\t\t}

\t\t\t\t.StripeElement--focus {
\t\t\t\t\tbox-shadow: 0 1px 3px 0 #cfd7df;
\t\t\t\t}

\t\t\t\t.StripeElement--invalid {
\t\t\t\t\tborder-color: #fa755a;
\t\t\t\t}

\t\t\t\t.StripeElement--webkit-autofill {
\t\t\t\t\tbackground-color: #fefde5 !important;
\t\t\t\t}
\t\t\t</style>
<link rel=\"stylesheet\" href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/css/bootstrap.min.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/themify-icons/css/themify-icons.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/flag-icon-css/css/flag-icon.min.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/selectFX/css/cs-skin-elastic.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jqvmap/dist/jqvmap.min.css"), "html", null, true);
        echo "\">


<link rel=\"stylesheet\" href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/btn.css"), "html", null, true);
        echo "\">

<link rel=\"stylesheet\" href=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/table.css"), "html", null, true);
        echo "\">




\t\t\t<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
\t\t";
    }

    // line 70
    public function block_body($context, array $blocks = [])
    {
    }

    // line 71
    public function block_javascripts($context, array $blocks = [])
    {
        // line 72
        echo "



<script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/chart.js/dist/Chart.bundle.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jqvmap/dist/jquery.vmap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jqvmap/dist/maps/jquery.vmap.world.js"), "html", null, true);
        echo "\"></script>

\t\t";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  195 => 79,  191 => 78,  187 => 77,  183 => 76,  177 => 72,  174 => 71,  169 => 70,  158 => 61,  153 => 59,  149 => 58,  143 => 55,  139 => 54,  135 => 53,  131 => 52,  127 => 51,  123 => 50,  88 => 18,  85 => 17,  82 => 16,  75 => 13,  69 => 82,  66 => 71,  64 => 70,  60 => 68,  58 => 16,  55 => 15,  53 => 13,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/home/lucettp/www/app/templates/base.html.twig");
    }
}
