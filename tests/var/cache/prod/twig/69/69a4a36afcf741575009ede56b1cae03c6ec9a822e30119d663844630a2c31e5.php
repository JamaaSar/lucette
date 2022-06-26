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

/* security/login.html.twig */
class __TwigTemplate_1cab71957e4d8b4586deb839ffda5060f676c5627b0a99a50f4726705721c564 extends \Twig\Template
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
        // line 3
        return "baselogin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("baselogin.html.twig", "security/login.html.twig", 3);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        // line 6
        echo "

<div class=\"sufee-login d-flex align-content-center flex-wrap\">
    <div class=\"container\">
        <div class=\"login-content\">
            <div class=\"login-logo\" style=\"text-align:center;\">
                <a href=\"https://lucette.market/\">
                    <img style=\"margin-bottom:10px; margin-top:10px; width:70%;\" class=\"align-content\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/lucette.png"), "html", null, true);
        echo "\" alt=\"Lucette\">
                </a>
            </div>
            <div class=\"login-form\" style=\"border:2px solid;border-color:#99AAA5;border-radius:15px;background-color:#F3F3F3; width:100%;\">
                ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 18
            echo "                    <div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
                        <span class=\"badge badge-pill badge-success\">Success</span>
                        ";
            // line 20
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "
                ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "danger"], "method", false, false, false, 27));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 28
            echo "                    <div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">
                        <span class=\"badge badge-pill badge-danger\">Error</span>
                        ";
            // line 30
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "

                ";
        // line 38
        if (($context["error"] ?? null)) {
            // line 39
            echo "                    <div>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageKey", [], "any", false, false, false, 39), twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageData", [], "any", false, false, false, 39), "security"), "html", null, true);
            echo "</div>
                ";
        }
        // line 41
        echo "                <form action=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login_check");
        echo "\" method=\"post\">
                    <div class=\"form-group\">
                        <label for=\"username\">Email address</label>
                        <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\" class=\"form-control\" placeholder=\"Email\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"password\">Password</label>
                        <input id=\"password\" name=\"_password\" type=\"password\" class=\"form-control\" placeholder=\"Password\">
                    </div>
                    <div class=\"checkbox\">
                        <label class=\"pull-right\">
                            <a href=\"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("forgotpassword");
        echo "\">Forgotten Password?</a>
                        </label>

                    </div>
                    <button href=\"";
        // line 56
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
        echo "\" type=\"submit\" class=\"btn btn-info btn-flat m-b-30 m-t-30\">Sign in</button>

                    <div class=\"register-link m-t-15 text-center\">
                        <p>Don't have account ? <a href=\"";
        // line 59
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("signup");
        echo "\"> Sign Up Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>



";
    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 70,  168 => 69,  164 => 68,  160 => 67,  149 => 59,  143 => 56,  136 => 52,  125 => 44,  118 => 41,  112 => 39,  110 => 38,  106 => 36,  94 => 30,  90 => 28,  86 => 27,  83 => 26,  71 => 20,  67 => 18,  63 => 17,  56 => 13,  47 => 6,  44 => 5,  34 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "security/login.html.twig", "/home/lucettp/www/app/templates/security/login.html.twig");
    }
}
