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

/* layoutadmin.html.twig */
class __TwigTemplate_fcc6063a13239f2227632b238a2f05e04b5962a41d253049730deff420254e0e extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("base.html.twig", "layoutadmin.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        // line 4
        echo "<aside id=\"left-panel\" class=\"left-panel\">
    <nav class=\"navbar navbar-expand-sm navbar-default\">

        <div class=\"navbar-header\">
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#main-menu\" aria-controls=\"main-menu\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <i class=\"fa fa-bars\"></i>
            </button>
            <a class=\"navbar-brand app-header__logo\" href=\"";
        // line 11
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/lucette.png"), "html", null, true);
        echo "\" alt=\"Logo\"></a>
            <a class=\"navbar-brand hidden app-header__logo\" href=\"";
        // line 12
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
        echo "\"></a>
        </div>

        <div id=\"main-menu\" class=\"main-menu collapse navbar-collapse\">



            <ul class=\"nav navbar-nav\">
                <li>
                    <a href=\"";
        // line 21
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
        echo "\"> <i class=\"menu-icon fa fa-dashboard\"></i>Dashboard </a>
                </li>

                <!-- ROLE_ADMIN -->
                ";
        // line 25
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 26
            echo "                    <h3 class=\"menu-title\">Clients</h3><!-- /.menu-title -->
                        <li>
                            <a href=\"";
            // line 28
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cleaner_calendar");
            echo "\"> <i class=\"menu-icon fa fa-calendar\"></i>Planning </a>
                        </li>
                        <li><a href=\"";
            // line 30
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_listofavailability");
            echo "\"><i class=\"menu-icon ti-check\"></i>Availability</a>
                        </li>
                        <li>
                            <a href=\"";
            // line 33
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_list");
            echo "\"> <i class=\"menu-icon ti-user\"></i>Clients </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 36
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_sanscode");
            echo "\"><i class=\"menu-icon fa fa-exclamation\"></i>Clients with error</a></li>
                        <li>
                            <a href=\"";
            // line 38
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("reduction_list");
            echo "\"> <i class=\"menu-icon ti-gift\"></i>Reduction </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 41
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("usercar_list");
            echo "\"> <i class=\"menu-icon ti-car\"></i>Users's cars </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 44
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_list");
            echo "\"> <i class=\"menu-icon ti-credit-card\"></i>Orders </a>
                        </li>
                         <li>
                            <a href=\"";
            // line 47
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("provider_waitlist");
            echo "\"> <i class=\"menu-icon fa fa-bars\"></i>Waitlist </a>
                        </li>
                    <h3 class=\"menu-title\">Companies</h3><!-- /.menu-title -->
                        <li>
                            <a href=\"";
            // line 51
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("company_list");
            echo "\"> <i class=\"menu-icon ti-home\"></i>Company </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 54
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_list");
            echo "\"> <i class=\"menu-icon ti-map\"></i>Locations </a>
                        </li>

                    <h3 class=\"menu-title\">Providers</h3><!-- /.menu-title -->
                        <li>
                            <a href=\"";
            // line 59
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("provider_list");
            echo "\"> <i class=\"menu-icon ti-truck\"></i>Provider </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 62
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_list");
            echo "\"> <i class=\"menu-icon ti-shopping-cart\"></i>Products </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 65
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("option_list");
            echo "\"> <i class=\"menu-icon ti-panel\"></i>Options </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 68
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("category_index");
            echo "\"><i class=\"menu-icon fa fa-tags\"></i>Category</a>
                        </li>
                         <li>
                            <a href=\"";
            // line 71
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("category_services");
            echo "\"><i class=\"menu-icon ti-layout-list-thumb-alt\"></i>Services</a>
                        </li>
                         <h3 class=\"menu-title\">Goods & Services</h3><!-- /.menu-title -->
                <li>
                    <a href=\"";
            // line 75
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("carservice_carServices");
            echo "\"> <i class=\"menu-icon ti-car\"></i>Car Services </a>
                </li>
                <li>
                    <a href=\"";
            // line 78
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_wellnessServices");
            echo "\"> <i class=\"menu-icon ti-heart\"></i>Wellness Services </a>
                </li>
                <li>
                  <a href=\"";
            // line 81
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_hair_salon");
            echo "\"> <i class=\"menu-icon fa fa-scissors\"></i>Beauty </a>
                </li>
                <li>
                    <a href=\"";
            // line 84
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klinLaundry");
            echo "\"> <i class=\"menu-icon ti-thought\"></i>Klin Laundry </a>
                </li>

                <!-- ROLE_WORKER_ADMIN -->
                ";
        } elseif ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_WORKER_ADMIN")) {
            // line 89
            echo "                    <h3 class=\"menu-title\">Works </h3><!-- /.menu-title -->
                     <li><a href=\"";
            // line 90
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_listofavailability");
            echo "\"><i class=\"menu-icon ti-check\"></i>My Availability</a>
                        </li>
                        <li>
                            <a href=\"";
            // line 93
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_adminworkerlist");
            echo "\"> <i class=\"menu-icon ti-list-ol\"></i>My list </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 96
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cleaner_calendar");
            echo "\"> <i class=\"menu-icon fa fa-calendar\"></i>Planning </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 99
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_list");
            echo "\"> <i class=\"menu-icon ti-credit-card\"></i>Orders </a>
                        </li>
                                   <li>
                            <a href=\"";
            // line 102
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("provider_waitlist");
            echo "\"> <i class=\"menu-icon fa fa-bars\"></i>Waitlist </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 105
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_list");
            echo "\"> <i class=\"menu-icon ti-map\"></i>Locations </a>
                        </li>
                    <h3 class=\"menu-title\">Products</h3><!-- /.menu-title -->
                        <li>
                            <a href=\"";
            // line 109
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_list");
            echo "\"> <i class=\"menu-icon ti-shopping-cart\"></i>Products </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 112
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("option_list");
            echo "\"> <i class=\"menu-icon ti-panel\"></i>Options </a>
                        </li>

                <!-- ROLE_WORKER -->
                ";
        } elseif ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_WORKER")) {
            // line 117
            echo "                    <h3 class=\"menu-title\">Works </h3><!-- /.menu-title -->
                        <li>
                            <a href=\"";
            // line 119
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cleaner_calendar");
            echo "\"> <i class=\"menu-icon fa fa-calendar\"></i>Planning </a>
                        </li>
                        <li>
                            <a href=\"";
            // line 122
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_list");
            echo "\"> <i class=\"menu-icon ti-credit-card\"></i>Orders </a>
                        </li>

                ";
        } elseif ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 126
            echo "                <h3 class=\"menu-title\">Goods & Services</h3><!-- /.menu-title -->
                <li>
                    <a href=\"";
            // line 128
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("carservice_carServices");
            echo "\"> <i class=\"menu-icon ti-car\"></i>Car Services </a>
                </li>
                <li>
                    <a href=\"";
            // line 131
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_wellnessServices");
            echo "\"> <i class=\"menu-icon ti-heart\"></i>Wellness Services </a>
                </li>
                <li>
                  <a href=\"";
            // line 134
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hairsalon_hair_salon");
            echo "\"> <i class=\"menu-icon fa fa-scissors\"></i>Beauty </a>
                </li>
                <li>
                    <a href=\"";
            // line 137
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klinLaundry");
            echo "\"> <i class=\"menu-icon ti-thought\"></i>Klin Laundry </a>
                </li>
                ";
        }
        // line 140
        echo "                 <!-- COMMON -->
                <h3 class=\"menu-title\">My Account</h3><!-- /.menu-title -->
                <li>
                    <a href=\"";
        // line 143
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_profile");
        echo "\"> <i class=\"menu-icon ti-user\"></i>My Profile </a>
                </li>
                <li>
                    <a href=\"";
        // line 146
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("planned_services_list");
        echo "\"> <i class=\"menu-icon ti-calendar\"></i>My Bookings </a>
                </li>
                       <li>
                    <a href=\"";
        // line 149
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("car_list");
        echo "\"> <i class=\"menu-icon ti-car\"></i>My Cars </a>
                </li>
                  ";
        // line 151
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 152
            echo "                         <li>
                    <a href=\"";
            // line 153
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_list");
            echo "\"> <i class=\"menu-icon ti-map\"></i>Locations </a>
                </li>



                 ";
        }
        // line 159
        echo "

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<div id=\"right-panel\" class=\"right-panel\">
<header id=\"header\" class=\"header\">
<div class=\"header-menu\">
    <div class=\"col-sm-7\">
        <a id=\"menuToggle\" class=\"menutoggle pull-left\"><i class=\"fa fa fa-tasks\"></i></a>


        <div class=\"header-left\">
            ";
        // line 173
        if ((isset($context["custom_layout"]) || array_key_exists("custom_layout", $context))) {
            // line 174
            echo "                ";
            if (twig_get_attribute($this->env, $this->source, ($context["custom_layout"] ?? null), "photo", [], "any", true, true, false, 174)) {
                // line 175
                echo "<a href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cms_dashboard");
                echo "\">
<img src=\"";
                // line 176
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("uploads/logo/" . twig_get_attribute($this->env, $this->source, ($context["custom_layout"] ?? null), "photo", [], "any", false, false, false, 176)) . "")), "html", null, true);
                echo "\" style=\" max-height: 50px\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["custom_layout"] ?? null), "name", [], "any", false, false, false, 176), "html", null, true);
                echo "\"/>
</a>



                ";
            }
            // line 182
            echo "            ";
        }
        // line 183
        echo "        </div>

    </div>

    <div class=\"col-sm-5\">
        <div class=\"user-area dropdown float-right show\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">

                    <button type=\"button\" class=\"rounded-circle btn btn-info \"><i class=\"fa fa-user\"></i></button>

            </a>

            <div class=\"user-menu dropdown-menu\">
                <a class=\"nav-link\" href=\"";
        // line 196
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_profile");
        echo "\"><i class=\"fa fa-user\"></i> My Profile</a>
                <a class=\"nav-link\" href=\"";
        // line 197
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("logout");
        echo "\"><i class=\"fa fa-power-off\"></i> Logout</a>
                <a class=\"nav-link\" href=\"";
        // line 198
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("support_form");
        echo "\"> <i class=\"menu-icon ti-support\"></i> Support</a>
            </div>
        </div>



    </div>
</div>
<script src=\"//code.jivosite.com/widget/JkB4LF5oA7\" async></script>
</header>
    ";
        // line 208
        $this->displayBlock('content', $context, $blocks);
        // line 210
        echo "</div>

";
    }

    // line 208
    public function block_content($context, array $blocks = [])
    {
        // line 209
        echo "    ";
    }

    public function getTemplateName()
    {
        return "layoutadmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  428 => 209,  425 => 208,  419 => 210,  417 => 208,  404 => 198,  400 => 197,  396 => 196,  381 => 183,  378 => 182,  367 => 176,  362 => 175,  359 => 174,  357 => 173,  341 => 159,  332 => 153,  329 => 152,  327 => 151,  322 => 149,  316 => 146,  310 => 143,  305 => 140,  299 => 137,  293 => 134,  287 => 131,  281 => 128,  277 => 126,  270 => 122,  264 => 119,  260 => 117,  252 => 112,  246 => 109,  239 => 105,  233 => 102,  227 => 99,  221 => 96,  215 => 93,  209 => 90,  206 => 89,  198 => 84,  192 => 81,  186 => 78,  180 => 75,  173 => 71,  167 => 68,  161 => 65,  155 => 62,  149 => 59,  141 => 54,  135 => 51,  128 => 47,  122 => 44,  116 => 41,  110 => 38,  105 => 36,  99 => 33,  93 => 30,  88 => 28,  84 => 26,  82 => 25,  75 => 21,  63 => 12,  57 => 11,  48 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layoutadmin.html.twig", "/home/lucettp/www/app/templates/layoutadmin.html.twig");
    }
}
