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

/* wellness/mycalendar.html.twig */
class __TwigTemplate_7ff230ac188a4de75b5a850b26824e38e6ab3242d49a8e4ad4e068158d23cd78 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "wellness/mycalendar.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo "Lucette
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        // line 8
        echo "\t<script src=\"https://js.stripe.com/v3/\"></script>
\t<div class=\"breadcrumbs\"></div>
\t<div class=\"content mt-3\" style=\" font-family: Calibri;\">
\t\t<div class=\"col-md-12\">
\t\t\t";
        // line 12
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 12), "verifyToken", [], "any", false, false, false, 12))) {
            // line 13
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\tAs long as your account has not been verified, you can't book a service!
\t\t\t\t\t<a href=\"";
            // line 16
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_email");
            echo "\">Send another verification email</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 19
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 20
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t";
            // line 22
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
        // line 28
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "error"], "method", false, false, false, 28));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 29
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-danger\">Error</span>
\t\t\t\t\t";
            // line 31
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
        // line 37
        echo "\t\t\t<form id=\"jsform\" name='myform' method=\"post\" action=\" ";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_resume");
        echo "\">
\t\t\t\t<input type=\"hidden\" name=\"product\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, ($context["product"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 40
            echo "\t\t\t\t\t<input type=\"hidden\" id=\"options\" name=\"options\" value=\"";
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo "\">
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "\t\t\t</form>
\t\t\t<div style=\"margin-left:auto; margin-right:auto; margin-bottom:-100px;\">

\t\t\t\t<div class=\"header\">
\t\t\t\t\t<h3 style=\"text-align:center;\">
\t\t\t\t\t\tChoose a date
\t\t\t\t\t</h3>
\t\t\t\t</div>
\t\t\t\t<br>
\t\t\t\t<div class=\"card\" style=\"background-color:transparent;border:none; \">

\t\t\t\t\t<div class=\"card-body\" style=\"margin-left:auto; margin-right:auto; \">
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<div id='calendar1' class='calendar col-md-6' style='width:650px;'></div>
\t\t\t\t\t\t<div id='calendar2' class='calendar col-md-6' style='width:500px;'></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<link href='";
        // line 62
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("commandeCalendar/css/fullcalendar.css"), "html", null, true);
        echo "' rel='stylesheet'/>
\t<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/js/dist/collapse.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
\t<script src='";
        // line 68
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-1.10.2.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
\t<script src='";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-ui.custom.min.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
\t<script src='";
        // line 70
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("commandeCalendar/js/moment.min.js"), "html", null, true);
        echo "'></script>
\t<script src='";
        // line 71
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("commandeCalendar/js/jquery.min.js"), "html", null, true);
        echo "'></script>
\t<script src='";
        // line 72
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("commandeCalendar/js/fullcalendar.js"), "html", null, true);
        echo "'></script>

\t<script>
\t\t\$(function () {
showTodaysDate();
initializeCalendar();
getCalendars();
initializeRightCalendar();
initializeLeftCalendar();
});

/* --------------------------initialize calendar-------------------------- */
var initializeCalendar = function () {
\$(\".calendar\").fullCalendar({

editable: false,
height: 400,
firstDay: 1,
timezone: 'local',
timeFormat: 'H(:mm)a',
axisFormat: 'H:mm',
views: {
agendaDay: {
minTime: '05:00',
maxTime: '22:00'
}
}

})
};

/*--------------------------calendar variables--------------------------*/
var getCalendars = function () {
\$cal = \$(\".calendar\");
\$cal1 = \$(\"#calendar1\");
\$cal2 = \$(\"#calendar2\");
};

/* -------------------manage cal2 (right)------------------- */
var previousClickedEvent = false;


var initializeRightCalendar = function () {
\$cal2.fullCalendar(\"changeView\", \"agendaDay\");
\$cal2.fullCalendar('addEventSource', {


events: [";
        // line 119
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["res"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["event"]);
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["s"]);
                foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
                    echo "{
id:  \"";
                    // line 120
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["event"], 0, [], "any", false, false, false, 120), "parking", [], "any", false, false, false, 120), "id", [], "any", false, false, false, 120), "html", null, true);
                    echo "&id=       ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["event"], 0, [], "any", false, false, false, 120), "id", [], "any", false, false, false, 120), "html", null, true);
                    echo "\",
title: \"Available\",

start: new Date(\"";
                    // line 123
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["event"], 0, [], "any", false, false, false, 123), "date", [], "any", false, false, false, 123), "Y-m-d"), "html", null, true);
                    echo "T";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["a"], "start", [], "any", false, false, false, 123), "html", null, true);
                    echo "\"),
end: new Date(\"";
                    // line 124
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["event"], 0, [], "any", false, false, false, 124), "date", [], "any", false, false, false, 124), "Y-m-d"), "html", null, true);
                    echo "T";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["a"], "end", [], "any", false, false, false, 124), "html", null, true);
                    echo "\"),
allDay: false,


},";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "]

});
\$cal2.fullCalendar(\"option\", {
contentHeight: \"auto\",

slotEventOverlap: false,
allDaySlot: false,
header: {
right: \"prev,next today\"
},
eventClick: function (event, calEvent, view) {
var date = event.start.format('DD/MM/YYYY');
var stime = event.start.format('h:mm a');
var etime = event.end.format('h:mm a');

var decision = confirm(\"You choosed a date of \" + date + \" from \" + stime + \" to \" + etime + \"\\n Are you sure to choose this slot?\");

if (decision == true) {

var queryString = \$('#jsform').serialize();
var myurl = \"";
        // line 149
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("wellness/calendar/resume"), "html", null, true);
        echo "\" +\"?date=\" + date + \"&start=\" + stime + \"&end=\" + etime + \"&\" + queryString + \"&parking=\" + event.id;
window.open(myurl, '_self');
return false;
}
},

selectable: true,
selectHelper: true,
select: function (start, end) {
newEvent(start);
}

});
};
/* -------------------manage cal1 (left) ------------------- */
var initializeLeftCalendar = function () {
\$cal1.fullCalendar('addEventSource', {

events: [";
        // line 167
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["availabilities"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["avaibility"]) {
            echo "{
title: \"Available\",
start: new Date(\"";
            // line 169
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["avaibility"], "date", [], "any", false, false, false, 169), "Y-m-d"), "html", null, true);
            echo "\"),
allDay: true,
color: '#30c794ff',
rendering: 'background'


},";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avaibility'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "]
});
\$cal1.fullCalendar(\"option\", {
contentHeight: \"auto\",

header: {
left: \"prev,next today\",
center: \"title\",
right: \"month,agendaWeek\"


},
dayClick: function (date, jsEvent, view) {
cal2GoTo(date);
},
eventClick: function (calEvent) {
cal2GoTo(calEvent.start);
}
});
};

/* -------------------moves right pane to date------------------- */
var cal2GoTo = function (date) {
\$cal2.fullCalendar(\"gotoDate\", date);
};
/* --------------------------load date in navbar-------------------------- */
var showTodaysDate = function () {
n = new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
\$(\"#todaysDate\").html(\"Today is \" + m + \"/\" + d + \"/\" + y);
};

/* full calendar gives newly created given different ids in month/week view
\tand day view. create/edit event in day (right) view, so correct for
\tid change to update in month/week (left)
\t*/
var getCal1Id = function (cal2Id) {
var num = cal2Id.replace(\"_fc\", \"\") - 1;
var id = \"_fc\" + num;
return id;
};
\t</script>
";
    }

    public function getTemplateName()
    {
        return "wellness/mycalendar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  362 => 175,  349 => 169,  342 => 167,  321 => 149,  293 => 128,  276 => 124,  270 => 123,  262 => 120,  250 => 119,  200 => 72,  196 => 71,  192 => 70,  188 => 69,  184 => 68,  180 => 67,  176 => 66,  172 => 65,  168 => 64,  164 => 63,  160 => 62,  138 => 42,  129 => 40,  125 => 39,  121 => 38,  116 => 37,  104 => 31,  100 => 29,  95 => 28,  83 => 22,  79 => 20,  74 => 19,  68 => 16,  63 => 13,  61 => 12,  55 => 8,  52 => 7,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "wellness/mycalendar.html.twig", "/home/lucettp/www/app/templates/wellness/mycalendar.html.twig");
    }
}
