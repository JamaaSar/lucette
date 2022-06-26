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

/* wellness/locationchoice.html.twig */
class __TwigTemplate_abf56aa693d327564a8b4437f504668826c4cbe9297c844f8315e7d26f48c1c3 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layoutadmin.html.twig", "wellness/locationchoice.html.twig", 1);
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
        echo "\t<div class=\"breadcrumbs\"></div>
\t<div class=\"content mt-3\" style=\" font-family: Calibri;\">
\t\t<h3 style=\"text-align:center; \">Select your location
\t\t</h3>
\t\t<br>
\t\t<div class=\"col-md-12\">
\t\t\t";
        // line 14
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 14), "verifyToken", [], "any", false, false, false, 14))) {
            // line 15
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-warning alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-warning\">Warning</span>
\t\t\t\t\tAs long as your account has not been verified, you can't book a service!
\t\t\t\t\t<a href=\"";
            // line 18
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_email");
            echo "\">Send another verification email</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 21
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 21));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 22
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-success\">Success</span>
\t\t\t\t\t";
            // line 24
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
        // line 30
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "error"], "method", false, false, false, 30));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 31
            echo "\t\t\t\t<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t<span class=\"badge badge-pill badge-danger\">Error</span>
\t\t\t\t\t";
            // line 33
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
        // line 39
        echo "\t\t\t<div class=\"gmap_unix card-body\">
\t\t\t\t<div class=\"map\" id=\"map\" style=\"border-radius:7px; box-shadow: 5px 5px 5px 5px #cfcfcf;  width:100%;  height: 700px;\"></div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/popper.js/dist/umd/popper.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap/js/dist/collapse.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        echo "\"></script>
<script src='";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-1.10.2.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
<script src='";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-ui.custom.min.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
<script src='";
        // line 52
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("commandeCalendar/js/moment.min.js"), "html", null, true);
        echo "'></script>
<script>


\tjQuery(document).ready(function (\$) {

\$(\"input[name='parking']\").change(function () {
\$(\"#NextStep\").prop(\"disabled\", false)
});

\$(\"input[name='parking']\").change(function () {
\$(\"#next\").prop(\"disabled\", false);
});


});
// Initialize and add the map

// Add some markers to the map.
// Note: The code uses the JavaScript Array.prototype.map() method to
// create an array of markers based on a given \"locations\" array.
// The map() method here has nothing to do with the Google Maps API.</script><script>

var map;
var Markers = {};
var infowindow;
var count = 0;
var locations = [";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["avaible"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["res"]) {
            echo "[
'";
            // line 80
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 80), "id", [], "any", false, false, false, 80), "html", null, true);
            echo "',
'<form action=\"   ";
            // line 81
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_availbleDate");
            echo "\" method=\"post\">' + '<input type=\"hidden\" name=\"catproduct_id\" value=\"   ";
            echo twig_escape_filter($this->env, ($context["catproduct"] ?? null), "html", null, true);
            echo "\">' +  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 82
                echo "'<input type=\"hidden\" name=\"val[]\" value=\"   ";
                echo twig_escape_filter($this->env, $context["option"], "html", null, true);
                echo "\">' +
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "'<strong>    ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 84), "name", [], "any", false, false, false, 84), "html", null, true);
            echo "' + '<br>' + '";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 84), "address", [], "any", false, false, false, 84), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 84), "zipcode", [], "any", false, false, false, 84), "html", null, true);
            echo ",    ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 84), "country", [], "any", false, false, false, 84), "html", null, true);
            echo "' + '<br><br>' + '<a href=\"    ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("parking_detail", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 84), "id", [], "any", false, false, false, 84)]), "html", null, true);
            echo "\" style=\"color: green\"target=\"_blank\">' + 'Detail <i class=\"fa fa-eye\"></i></a> </strong> <input type=\"hidden\" name=\"parking\" value=\"   ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 84), "id", [], "any", false, false, false, 84), "html", null, true);
            echo "\" id=\"parking\">' + ";
            if ((($context["achat"] ?? null) == false)) {
                // line 85
                echo "'<button style=\"float: right; \" type=\"submit\" class=\"btn btn-success btn-btn-xs\" id=\"parking\" name=\"parking\" value=\"   ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 85), "id", [], "any", false, false, false, 85), "html", null, true);
                echo "\" formaction=\"   ";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("wellness_calendar");
                echo "\">Choose</button>'";
            }
            if ((($context["achat"] ?? null) == true)) {
                echo "'<button style=\"float: right;\" type=\"submit\" class=\"btn btn-success btn-btn-xs\" id=\"parking\" name=\"parking\" value=\"   ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 85), "id", [], "any", false, false, false, 85), "html", null, true);
                echo "\">Choose</button>'";
            }
            echo ",

'";
            // line 87
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 87), "latitude", [], "any", false, false, false, 87), "html", null, true);
            echo "',
'";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 88), "longitude", [], "any", false, false, false, 88), "html", null, true);
            echo "',
count ++,";
            // line 89
            if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["res"], "parking", [], "any", false, false, false, 89), "company", [], "any", false, false, false, 89))) {
                // line 90
                echo "\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("uploads/logo/" . twig_get_attribute($this->env, $this->source, $context["res"], "photo", [], "any", false, false, false, 90)) . "")), "html", null, true);
                echo "\"
";
            }
            // line 92
            echo "

],";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['res'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "];


function initialize() {


var mylat;
navigator.geolocation.getCurrentPosition(function (response) {

var mylat = new google.maps.LatLng(response.coords.latitude, response.coords.longitude);
console.log(mylat);


});


var mapOptions = {
zoom: 11.5,
center: mylat
};

map = new google.maps.Map(document.getElementById('map'), mapOptions);
var bounds = new google.maps.LatLngBounds();

infowindow = new google.maps.InfoWindow();


for (i = 0; i < locations.length; i ++) {
var lat = parseFloat(locations[i][2]);
var long = parseFloat(locations[i][3]);
var position = new google.maps.LatLng(lat, long);
if (locations[i][5] === undefined) {
var img = {
url: \"";
        // line 127
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/iconmap/home.png"), "html", null, true);
        echo "\",

scaledSize: new google.maps.Size(60, 60)

}


} else {
var img = {
url: locations[i][5],
scaledSize: new google.maps.Size(70, 40)

}
}


var marker = new google.maps.Marker({position: position, icon: img, map: map});
console.log(locations[i][5]);


google.maps.event.addListener(marker, 'click', (function (marker, i) {
return function () {
infowindow.setContent(locations[i][1]);
infowindow.setOptions({maxWidth: 200});
infowindow.open(map, marker);
}
})(marker, i));
Markers[locations[i][4]] = marker;
}

locate(0);
}

function locate(marker_id) {
var myMarker = Markers[marker_id];
var markerPosition = myMarker.getPosition();
map.panTo(markerPosition);
google.maps.event.trigger(myMarker, 'click');


}
</script>


<script src=\"https://unpkg.com/@google/markerclustererplus@5.1.0/dist/markerclustererplus.min.js\"></script>
<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyBaYtB6Dqw9i7vWLXQ_e5U0dzn2X1FWd3M&sensor=false&callback=initialize\" type=\"text/javascript\"></script>";
    }

    public function getTemplateName()
    {
        return "wellness/locationchoice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  299 => 127,  264 => 94,  256 => 92,  250 => 90,  248 => 89,  244 => 88,  240 => 87,  225 => 85,  211 => 84,  202 => 82,  194 => 81,  190 => 80,  184 => 79,  154 => 52,  150 => 51,  146 => 50,  142 => 49,  138 => 48,  134 => 47,  130 => 46,  126 => 45,  118 => 39,  106 => 33,  102 => 31,  97 => 30,  85 => 24,  81 => 22,  76 => 21,  70 => 18,  65 => 15,  63 => 14,  55 => 8,  52 => 7,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "wellness/locationchoice.html.twig", "/home/lucettp/www/app/templates/wellness/locationchoice.html.twig");
    }
}
