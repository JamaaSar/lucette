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

/* baselogin.html.twig */
class __TwigTemplate_18a4761532122ff9f6ec1c92f86fd8d61522bf0ec2641104965f0b4df7d93e72 extends \Twig\Template
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

<html class=\"no-js\" lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 11
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 28
        echo "</head>
<body class=\"open bg-dark\">
";
        // line 30
        $this->displayBlock('body', $context, $blocks);
        // line 31
        $this->displayBlock('javascripts', $context, $blocks);
        // line 38
        echo "</body>
</html>
";
    }

    // line 11
    public function block_title($context, array $blocks = [])
    {
        echo "Lucette";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 13
        echo "
        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 14
        echo "images/lucette.png";
        echo "\" />
<link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/css/bootstrap.min.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/themify-icons/css/themify-icons.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/flag-icon-css/css/flag-icon.min.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/selectFX/css/cs-skin-elastic.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jqvmap/dist/jqvmap.min.css"), "html", null, true);
        echo "\">



        <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        echo "\">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    ";
    }

    // line 30
    public function block_body($context, array $blocks = [])
    {
    }

    // line 31
    public function block_javascripts($context, array $blocks = [])
    {
        // line 32
        echo "
    <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/chart.js/dist/Chart.bundle.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jqvmap/dist/jquery.vmap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jqvmap/dist/maps/jquery.vmap.world.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "baselogin.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  145 => 36,  141 => 35,  137 => 34,  133 => 33,  130 => 32,  127 => 31,  122 => 30,  114 => 24,  107 => 20,  103 => 19,  99 => 18,  95 => 17,  91 => 16,  87 => 15,  83 => 14,  80 => 13,  77 => 12,  71 => 11,  65 => 38,  63 => 31,  61 => 30,  57 => 28,  55 => 12,  51 => 11,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "baselogin.html.twig", "/home/lucettp/www/app/templates/baselogin.html.twig");
    }
}
