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

/* user/edit.html.twig */
class __TwigTemplate_fd75d191ffeb18f23e8d5aecc2915198a385287b76727405a0bef1980cac5e98 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "user/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo "Lucette";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        // line 6
        echo "    <div class=\"breadcrumbs\">
        <div class=\"col-sm-4\">
            <div class=\"page-header float-left\">

            </div>
        </div>
        <div class=\"col-sm-8\">
            <div class=\"page-header float-right\">
                <div class=\"page-title\">
                    <ol class=\"breadcrumb text-right\">
                        <li><a href=\"";
        // line 16
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
        echo "\">Dashboard</a></li>
                        <li><a href=\"";
        // line 17
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_profile");
        echo "\">Profile</a></li>
                        <li class=\"active\">Add Card</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class=\"content mt-3\">
    <div class=\"animated fadeIn\">
    <div class=\"row\">

    <div class=\"col-md-12\">
    <div class=\"card\">
    <div class=\"card-header\">
        <strong class=\"card-title\">Add Card</strong>
    </div>
    <div class=\"card-body\">
    <div class=\"tile col-lg-4\">



        ";
        // line 38
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
        <div class=\"form-group\">
            ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "firstName", [], "any", false, false, false, 40), 'errors');
        echo "
            ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "firstName", [], "any", false, false, false, 41), 'label');
        echo "
            ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "firstName", [], "any", false, false, false, 42), 'widget', ["attr" => ["class" => "form-control", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 42), "firstname", [], "any", false, false, false, 42)]]);
        echo "
        </div>
        <div class=\"form-group\">
            ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lastName", [], "any", false, false, false, 45), 'errors');
        echo "
            ";
        // line 46
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lastName", [], "any", false, false, false, 46), 'label');
        echo "
            ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lastName", [], "any", false, false, false, 47), 'widget', ["attr" => ["class" => "form-control", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 47), "lastname", [], "any", false, false, false, 47)]]);
        echo "
        </div>
        <div class=\"form-group\">
            ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 50), 'errors');
        echo "
            ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 51), 'label');
        echo "
            ";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 52), 'widget', ["attr" => ["class" => "form-control", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 52), "email", [], "any", false, false, false, 52)]]);
        echo "
        </div>
        <div class=\"form-group\">
            ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "phoneNumber", [], "any", false, false, false, 55), 'errors');
        echo "
            ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "phoneNumber", [], "any", false, false, false, 56), 'label');
        echo "
            ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "phoneNumber", [], "any", false, false, false, 57), 'widget', ["attr" => ["class" => "form-control", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 57), "phoneNumber", [], "any", false, false, false, 57)]]);
        echo "
        </div>
        <div class=\"form-group\">
            ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number_and_street", [], "any", false, false, false, 60), 'errors');
        echo "
            ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number_and_street", [], "any", false, false, false, 61), 'label');
        echo "
            ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number_and_street", [], "any", false, false, false, 62), 'widget', ["attr" => ["class" => "form-control", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 62), "numberAndStreet", [], "any", false, false, false, 62)]]);
        echo "
        </div>
        <div class=\"form-group\">
            ";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "zip_code", [], "any", false, false, false, 65), 'errors');
        echo "
            ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "zip_code", [], "any", false, false, false, 66), 'label');
        echo "
            ";
        // line 67
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "zip_code", [], "any", false, false, false, 67), 'widget', ["attr" => ["class" => "form-control", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 67), "zipCode", [], "any", false, false, false, 67)]]);
        echo "
        </div>
        <div class=\"form-group\">
            ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 70), 'errors');
        echo "
            ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 71), 'label');
        echo "
            ";
        // line 72
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 72), 'widget', ["attr" => ["class" => "form-control", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 72), "city", [], "any", false, false, false, 72)]]);
        echo "
        </div>
        <div class=\"form-group\">
            ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "code_company", [], "any", false, false, false, 75), 'errors');
        echo "
            ";
        // line 76
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "code_company", [], "any", false, false, false, 76), 'label');
        echo "
            ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "code_company", [], "any", false, false, false, 77), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
        </div>


        <button type=\"submit\" class=\"btn btn-info\">Edit</button>
        <a href=\"";
        // line 82
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_profile");
        echo "\"  class=\"btn btn-danger\">Cancel</a>
        ";
        // line 83
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
    </div>
    <script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "user/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 88,  230 => 87,  226 => 86,  222 => 85,  217 => 83,  213 => 82,  205 => 77,  201 => 76,  197 => 75,  191 => 72,  187 => 71,  183 => 70,  177 => 67,  173 => 66,  169 => 65,  163 => 62,  159 => 61,  155 => 60,  149 => 57,  145 => 56,  141 => 55,  135 => 52,  131 => 51,  127 => 50,  121 => 47,  117 => 46,  113 => 45,  107 => 42,  103 => 41,  99 => 40,  94 => 38,  70 => 17,  66 => 16,  54 => 6,  51 => 5,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "user/edit.html.twig", "/home/lucettp/www/app/templates/user/edit.html.twig");
    }
}
