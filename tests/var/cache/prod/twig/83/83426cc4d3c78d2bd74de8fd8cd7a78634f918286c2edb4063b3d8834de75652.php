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

/* @FOSCKEditor/Form/ckeditor_widget.html.twig */
class __TwigTemplate_284234c264febfeb8ba44b1f678b8358d217821d6b198c8b494e4496d90bf438 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'ckeditor_widget' => [$this, 'block_ckeditor_widget'],
            'ckeditor_javascript' => [$this, 'block_ckeditor_javascript'],
            '_ckeditor_javascript' => [$this, 'block__ckeditor_javascript'],
            'ckeditor_widget_extra' => [$this, 'block_ckeditor_widget_extra'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->displayBlock('ckeditor_widget', $context, $blocks);
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('ckeditor_javascript', $context, $blocks);
        // line 14
        echo "
";
        // line 15
        $this->displayBlock('_ckeditor_javascript', $context, $blocks);
    }

    // line 1
    public function block_ckeditor_widget($context, array $blocks = [])
    {
        // line 2
        echo "    <textarea ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "</textarea>

    ";
        // line 4
        if ((($context["enable"] ?? null) &&  !($context["async"] ?? null))) {
            // line 5
            echo "        ";
            $this->displayBlock("_ckeditor_javascript", $context, $blocks);
            echo "
    ";
        }
    }

    // line 9
    public function block_ckeditor_javascript($context, array $blocks = [])
    {
        // line 10
        echo "    ";
        if ((($context["enable"] ?? null) && ($context["async"] ?? null))) {
            // line 11
            echo "        ";
            $this->displayBlock("_ckeditor_javascript", $context, $blocks);
            echo "
    ";
        }
    }

    // line 15
    public function block__ckeditor_javascript($context, array $blocks = [])
    {
        // line 16
        echo "    ";
        if (($context["autoload"] ?? null)) {
            // line 17
            echo "        <script type=\"text/javascript\">
            var CKEDITOR_BASEPATH = \"";
            // line 18
            echo $this->extensions['FOS\CKEditorBundle\Twig\CKEditorExtension']->renderBasePath(($context["base_path"] ?? null));
            echo "\";
        </script>
        <script type=\"text/javascript\" src=\"";
            // line 20
            echo $this->extensions['FOS\CKEditorBundle\Twig\CKEditorExtension']->renderJsPath(($context["js_path"] ?? null));
            echo "\"></script>
        ";
            // line 21
            if (($context["jquery"] ?? null)) {
                // line 22
                echo "            <script type=\"text/javascript\" src=\"";
                echo $this->extensions['FOS\CKEditorBundle\Twig\CKEditorExtension']->renderJsPath(($context["jquery_path"] ?? null));
                echo "\"></script>
        ";
            }
            // line 24
            echo "    ";
        }
        // line 25
        echo "    <script type=\"text/javascript\">
        ";
        // line 26
        if (($context["jquery"] ?? null)) {
            // line 27
            echo "            \$(function () {
        ";
        }
        // line 29
        echo "
        ";
        // line 30
        if (($context["require_js"] ?? null)) {
            // line 31
            echo "            require(['ckeditor'], function() {
        ";
        }
        // line 33
        echo "
        ";
        // line 34
        echo $this->extensions['FOS\CKEditorBundle\Twig\CKEditorExtension']->renderDestroy(($context["id"] ?? null));
        echo "

        ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugins"] ?? null));
        foreach ($context['_seq'] as $context["plugin_name"] => $context["plugin"]) {
            // line 37
            echo "            ";
            echo $this->extensions['FOS\CKEditorBundle\Twig\CKEditorExtension']->renderPlugin($context["plugin_name"], $context["plugin"]);
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['plugin_name'], $context['plugin'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "
        ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["style_name"] => $context["style"]) {
            // line 41
            echo "            ";
            echo $this->extensions['FOS\CKEditorBundle\Twig\CKEditorExtension']->renderStylesSet($context["style_name"], $context["style"]);
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['style_name'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "
        ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["templates"] ?? null));
        foreach ($context['_seq'] as $context["template_name"] => $context["template"]) {
            // line 45
            echo "            ";
            echo $this->extensions['FOS\CKEditorBundle\Twig\CKEditorExtension']->renderTemplate($context["template_name"], $context["template"]);
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['template_name'], $context['template'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "
        ";
        // line 48
        $this->displayBlock('ckeditor_widget_extra', $context, $blocks);
        // line 49
        echo "
        ";
        // line 50
        echo $this->extensions['FOS\CKEditorBundle\Twig\CKEditorExtension']->renderWidget(($context["id"] ?? null), ($context["config"] ?? null), ["auto_inline" =>         // line 51
($context["auto_inline"] ?? null), "inline" =>         // line 52
($context["inline"] ?? null), "input_sync" =>         // line 53
($context["input_sync"] ?? null), "filebrowsers" =>         // line 54
($context["filebrowsers"] ?? null)]);
        // line 55
        echo "

        ";
        // line 57
        if (($context["require_js"] ?? null)) {
            // line 58
            echo "            });
        ";
        }
        // line 60
        echo "
        ";
        // line 61
        if (($context["jquery"] ?? null)) {
            // line 62
            echo "            });
        ";
        }
        // line 64
        echo "    </script>
";
    }

    // line 48
    public function block_ckeditor_widget_extra($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "@FOSCKEditor/Form/ckeditor_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  226 => 48,  221 => 64,  217 => 62,  215 => 61,  212 => 60,  208 => 58,  206 => 57,  202 => 55,  200 => 54,  199 => 53,  198 => 52,  197 => 51,  196 => 50,  193 => 49,  191 => 48,  188 => 47,  179 => 45,  175 => 44,  172 => 43,  163 => 41,  159 => 40,  156 => 39,  147 => 37,  143 => 36,  138 => 34,  135 => 33,  131 => 31,  129 => 30,  126 => 29,  122 => 27,  120 => 26,  117 => 25,  114 => 24,  108 => 22,  106 => 21,  102 => 20,  97 => 18,  94 => 17,  91 => 16,  88 => 15,  80 => 11,  77 => 10,  74 => 9,  66 => 5,  64 => 4,  56 => 2,  53 => 1,  49 => 15,  46 => 14,  44 => 9,  41 => 8,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@FOSCKEditor/Form/ckeditor_widget.html.twig", "/home/lucettp/www/app/vendor/friendsofsymfony/ckeditor-bundle/src/Resources/views/Form/ckeditor_widget.html.twig");
    }
}
