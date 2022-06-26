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

/* klin/index.html.twig */
class __TwigTemplate_a29a776af39394a29b8ac5121767d723db97e0d23e3f7a4b64888dbe5858cedb extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "klin/index.html.twig", 1);
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
                        <li class=\"active\">Klin LAUNDRY</li>
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
                        <div class=\"card-body\">
                            <iframe frameborder=\"0\" style=\"height:900px;width:99%;border:none;\" src='https://business.klin.lu/login/'></iframe>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <script src=\"../vendors/jquery/dist/jquery.min.js\"></script>
    <script src=\"../vendors/popper.js/dist/umd/popper.min.js\"></script>
    <script src=\"../vendors/bootstrap/dist/js/bootstrap.min.js\"></script>
    <script src=\"../assets/js/main.js\"></script>



";
    }

    public function getTemplateName()
    {
        return "klin/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 16,  54 => 6,  51 => 5,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "klin/index.html.twig", "/home/lucettp/www/app/templates/klin/index.html.twig");
    }
}
