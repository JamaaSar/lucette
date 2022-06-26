<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelProdContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = [
            '/bio_orders' => [[['_route' => 'bioOrders', '_controller' => 'App\\Controller\\BioOrdersController::index'], null, null, null, false, false, null]],
            '/car' => [[['_route' => 'car_list', '_controller' => 'App\\Controller\\CarController::index'], null, null, null, false, false, null]],
            '/car/add' => [[['_route' => 'car_add', '_controller' => 'App\\Controller\\CarController::add'], null, null, null, false, false, null]],
            '/car_services' => [[['_route' => 'carservice_carServices', '_controller' => 'App\\Controller\\CarServicesController::index'], null, null, null, false, false, null]],
            '/carproduct' => [[['_route' => 'carservice_product', '_controller' => 'App\\Controller\\CarServicesController::myproduct'], null, null, null, false, false, null]],
            '/location/availbledate' => [[['_route' => 'carservice_availbleDate', '_controller' => 'App\\Controller\\CarServicesController::chooseDate'], null, null, null, false, false, null]],
            '/option/calendar' => [[['_route' => 'carservice_calendar', '_controller' => 'App\\Controller\\CarServicesController::mycalendar'], null, null, null, false, false, null]],
            '/order/resume' => [[['_route' => 'carservice_resumedirect', '_controller' => 'App\\Controller\\CarServicesController::resumeDirect'], null, null, null, false, false, null]],
            '/calendar/resume' => [[['_route' => 'carservice_resume', '_controller' => 'App\\Controller\\CarServicesController::orderResume'], null, null, null, false, false, null]],
            '/Payment' => [[['_route' => 'carservice_payment', '_controller' => 'App\\Controller\\CarServicesController::paiment'], null, null, null, false, false, null]],
            '/category' => [[['_route' => 'category_index', '_controller' => 'App\\Controller\\CategoryController::index'], null, null, null, false, false, null]],
            '/addcategory' => [[['_route' => 'category_add', '_controller' => 'App\\Controller\\CategoryController::addnewcat'], null, null, null, false, false, null]],
            '/service' => [[['_route' => 'category_services', '_controller' => 'App\\Controller\\CategoryController::myservices'], null, null, null, false, false, null]],
            '/addService' => [[['_route' => 'category_addService', '_controller' => 'App\\Controller\\CategoryController::addService'], null, null, null, false, false, null]],
            '/check_cars' => [[['_route' => 'checkCars', '_controller' => 'App\\Controller\\CheckCarsController::index'], null, null, null, false, false, null]],
            '/cleaner' => [[['_route' => 'cleaner_calendar', '_controller' => 'App\\Controller\\CleanerController::index'], null, null, null, true, false, null]],
            '/client' => [[['_route' => 'client_list', '_controller' => 'App\\Controller\\ClientController::index'], null, null, null, false, false, null]],
            '/client/sanscode' => [[['_route' => 'client_sanscode', '_controller' => 'App\\Controller\\ClientController::clientSansCode'], null, null, null, false, false, null]],
            '/client/tokenmissing' => [[['_route' => 'client_tokenmissing', '_controller' => 'App\\Controller\\ClientController::tokenMissing'], null, null, null, false, false, null]],
            '/' => [[['_route' => 'cms_dashboard', '_controller' => 'App\\Controller\\CmsController::index'], null, null, null, false, false, null]],
            '/turnover' => [[['_route' => 'cms_turnover', '_controller' => 'App\\Controller\\CmsController::turnoverbyprovider'], null, null, null, false, false, null]],
            '/apiCalendar' => [[['_route' => 'cms_apiCalendar', '_controller' => 'App\\Controller\\CmsController::connectGoogleCalendar'], null, null, null, false, false, null]],
            '/passage' => [[['_route' => 'cms_passage', '_controller' => 'App\\Controller\\CmsController::passage'], null, null, null, false, false, null]],
            '/company' => [[['_route' => 'company_list', '_controller' => 'App\\Controller\\CompanyController::index'], null, null, null, false, false, null]],
            '/add' => [[['_route' => 'company_add', '_controller' => 'App\\Controller\\CompanyController::add'], null, null, null, false, false, null]],
            '/hairsalon' => [[['_route' => 'hairsalon_hair_salon', '_controller' => 'App\\Controller\\HairSalonController::index'], null, null, null, false, false, null]],
            '/hairsalon/location/availbledate' => [[['_route' => 'hairsalon_availbleDate', '_controller' => 'App\\Controller\\HairSalonController::chooseDate'], null, null, null, false, false, null]],
            '/hairsalon/option/calendar' => [[['_route' => 'hairsalon_calendar', '_controller' => 'App\\Controller\\HairSalonController::mycalendar'], null, null, null, false, false, null]],
            '/hairsalon/order/resume' => [[['_route' => 'hairsalon_resumedirect', '_controller' => 'App\\Controller\\HairSalonController::resumeDirect'], null, null, null, false, false, null]],
            '/hairsalon/calendar/resume' => [[['_route' => 'hairsalon_resume', '_controller' => 'App\\Controller\\HairSalonController::orderResume'], null, null, null, false, false, null]],
            '/hairsalonPayment' => [[['_route' => 'hairsalon_payment', '_controller' => 'App\\Controller\\HairSalonController::paiment'], null, null, null, false, false, null]],
            '/iframe' => [[['_route' => 'iframe', '_controller' => 'App\\Controller\\IframeController::index'], null, null, null, false, false, null]],
            '/klin' => [[['_route' => 'klinLaundry', '_controller' => 'App\\Controller\\KlinLaundryController::index'], null, null, null, false, false, null]],
            '/option' => [[['_route' => 'option_list', '_controller' => 'App\\Controller\\OptionController::list'], null, null, null, false, false, null]],
            '/option/add' => [[['_route' => 'option_add', '_controller' => 'App\\Controller\\OptionController::add'], null, null, null, false, false, null]],
            '/order' => [[['_route' => 'order_list', '_controller' => 'App\\Controller\\OrderController::index'], null, null, null, true, false, null]],
            '/order/delete' => [[['_route' => 'order_delete', '_controller' => 'App\\Controller\\OrderController::delete'], null, null, null, false, false, null]],
            '/order/nonva' => [[['_route' => 'order_nonva', '_controller' => 'App\\Controller\\OrderController::nonValide'], null, null, null, false, false, null]],
            '/location' => [[['_route' => 'parking_list', '_controller' => 'App\\Controller\\ParkingController::index'], null, null, null, false, false, null]],
            '/location/add' => [[['_route' => 'parking_add', '_controller' => 'App\\Controller\\ParkingController::add'], null, null, null, false, false, null]],
            '/location/addavailability' => [[['_route' => 'parking_addavailability', '_controller' => 'App\\Controller\\ParkingController::addvailability'], null, null, null, false, false, null]],
            '/location/listofavailability' => [[['_route' => 'parking_listofavailability', '_controller' => 'App\\Controller\\ParkingController::listofavailability'], null, null, null, false, false, null]],
            '/location/recurrence' => [[['_route' => 'parking_recurrence', '_controller' => 'App\\Controller\\ParkingController::recurrenceAv'], null, null, null, false, false, null]],
            '/services' => [[['_route' => 'planned_services_list', '_controller' => 'App\\Controller\\PlannedServicesController::index'], null, null, null, false, false, null]],
            '/product' => [[['_route' => 'product_list', '_controller' => 'App\\Controller\\ProductController::list'], null, null, null, false, false, null]],
            '/product/add' => [[['_route' => 'product_add', '_controller' => 'App\\Controller\\ProductController::add'], null, null, null, false, false, null]],
            '/product/adminworkerlist' => [[['_route' => 'product_adminworkerlist', '_controller' => 'App\\Controller\\ProductController::workeradminlist'], null, null, null, false, false, null]],
            '/provider' => [[['_route' => 'provider_list', '_controller' => 'App\\Controller\\ProviderController::list'], null, null, null, false, false, null]],
            '/provider/add' => [[['_route' => 'provider_add', '_controller' => 'App\\Controller\\ProviderController::add'], null, null, null, false, false, null]],
            '/provider/waitlist' => [[['_route' => 'provider_waitlist', '_controller' => 'App\\Controller\\ProviderController::waitlist'], null, null, null, false, false, null]],
            '/provider/editedwaitlist' => [[['_route' => 'provider_editedwaitlist', '_controller' => 'App\\Controller\\ProviderController::editedWaitlist'], null, null, null, false, false, null]],
            '/reduction' => [[['_route' => 'reduction_list', '_controller' => 'App\\Controller\\ReductionController::index'], null, null, null, false, false, null]],
            '/reduction/add' => [[['_route' => 'reduction_add', '_controller' => 'App\\Controller\\ReductionController::add'], null, null, null, false, false, null]],
            '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
            '/sign-up' => [[['_route' => 'signup', '_controller' => 'App\\Controller\\SecurityController::signup'], null, null, null, false, false, null]],
            '/forgotpassword' => [[['_route' => 'forgotpassword', '_controller' => 'App\\Controller\\SecurityController::forgotpass'], null, null, null, false, false, null]],
            '/support' => [[['_route' => 'support_form', '_controller' => 'App\\Controller\\SupportController::index'], null, null, null, true, false, null]],
            '/usercar' => [[['_route' => 'usercar_list', '_controller' => 'App\\Controller\\UserCarController::index'], null, null, null, true, false, null]],
            '/profile' => [[['_route' => 'user_profile', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
            '/profile/edit' => [[['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::modifier'], null, null, null, false, false, null]],
            '/profile/editpassword' => [[['_route' => 'user_editpassword', '_controller' => 'App\\Controller\\UserController::pass'], null, null, null, false, false, null]],
            '/profile/addCard' => [[['_route' => 'user_addCard', '_controller' => 'App\\Controller\\UserController::addcard'], null, null, null, false, false, null]],
            '/profile/subscribe' => [[['_route' => 'user_subscribe', '_controller' => 'App\\Controller\\UserController::subscribe'], null, null, null, false, false, null]],
            '/profile/unsubscribe' => [[['_route' => 'user_unsubscribe', '_controller' => 'App\\Controller\\UserController::unsubscribe'], null, null, null, false, false, null]],
            '/wellness' => [[['_route' => 'wellness_wellnessServices', '_controller' => 'App\\Controller\\WellnessController::index'], null, null, null, false, false, null]],
            '/wellnessconf' => [[['_route' => 'wellness_email', '_controller' => 'App\\Controller\\WellnessController::modifier'], null, null, null, true, false, null]],
            '/wellness/location/availbledate' => [[['_route' => 'wellness_availbleDate', '_controller' => 'App\\Controller\\WellnessController::chooseDate'], null, null, null, false, false, null]],
            '/wellness/option/calendar' => [[['_route' => 'wellness_calendar', '_controller' => 'App\\Controller\\WellnessController::mycalendar'], null, null, null, false, false, null]],
            '/wellness/order/resume' => [[['_route' => 'wellness_resumedirect', '_controller' => 'App\\Controller\\WellnessController::resumeDirect'], null, null, null, false, false, null]],
            '/wellness/calendar/resume' => [[['_route' => 'wellness_resume', '_controller' => 'App\\Controller\\WellnessController::orderResume'], null, null, null, false, false, null]],
            '/wellnessPayment' => [[['_route' => 'wellness_payment', '_controller' => 'App\\Controller\\WellnessController::paiment'], null, null, null, false, false, null]],
            '/login_check' => [[['_route' => 'login_check'], null, null, null, false, false, null]],
            '/logout' => [[['_route' => 'logout'], null, null, null, false, false, null]],
        ];
        $this->regexpList = [
            0 => '{^(?'
                    .'|/car(?'
                        .'|/(?'
                            .'|edit/([^/]++)(*:31)'
                            .'|delete/([^/]++)(*:53)'
                        .')'
                        .'|service/([^/]++)(*:77)'
                    .')'
                    .'|/service/([^/]++)/product(*:110)'
                    .'|/([^/]++)/(?'
                        .'|productid/([^/]++)(*:149)'
                        .'|location(*:165)'
                    .')'
                    .'|/Payment/([^/]++)(*:191)'
                    .'|/newPayment/([^/]++)(*:219)'
                    .'|/valide/([^/]++)(*:243)'
                    .'|/addCar/([^/]++)(*:267)'
                    .'|/edit(?'
                        .'|category/([^/]++)(*:300)'
                        .'|Service/([^/]++)(*:324)'
                        .'|/([^/]++)(*:341)'
                    .')'
                    .'|/c(?'
                        .'|l(?'
                            .'|eaner/detail/([^/]++)(?'
                                .'|(*:383)'
                                .'|/(?'
                                    .'|edit(*:399)'
                                    .'|add(*:410)'
                                    .'|delete(?'
                                        .'|(*:427)'
                                        .'|/([^/]++)(*:444)'
                                    .')'
                                .')'
                            .')'
                            .'|ient/(?'
                                .'|modifier/(?'
                                    .'|([^/]++)/(?'
                                        .'|validertok(*:497)'
                                        .'|adminpasschange(*:520)'
                                    .')'
                                    .'|(\\d+)(*:534)'
                                .')'
                                .'|delete/([^/]++)(*:558)'
                            .')'
                        .')'
                        .'|hoosecalendar/([^/]++)(*:590)'
                        .'|onfirmation/([^/]++)(*:618)'
                    .')'
                    .'|/hairsalon(?'
                        .'|/(?'
                            .'|([^/]++)(?'
                                .'|(*:655)'
                                .'|/(?'
                                    .'|productid/([^/]++)(*:685)'
                                    .'|location(*:701)'
                                .')'
                            .')'
                            .'|Payment/([^/]++)(*:727)'
                            .'|newPayment/([^/]++)(*:754)'
                        .')'
                        .'|valide/([^/]++)(*:778)'
                    .')'
                    .'|/o(?'
                        .'|ption/(?'
                            .'|de(?'
                                .'|tail/([^/]++)(?'
                                    .'|(*:822)'
                                    .'|/(?'
                                        .'|addcategory(*:845)'
                                        .'|editcategory/([^/]++)(*:874)'
                                        .'|deleteCat/([^/]++)(*:900)'
                                    .')'
                                .')'
                                .'|lete/([^/]++)(*:923)'
                            .')'
                            .'|edit/([^/]++)(*:945)'
                        .')'
                        .'|rder/(?'
                            .'|notif/([^/]++)(*:976)'
                            .'|([^/]++)/valider(*:1000)'
                        .')'
                    .')'
                    .'|/location/(?'
                        .'|de(?'
                            .'|tail/([^/]++)(?'
                                .'|(*:1045)'
                                .'|/(?'
                                    .'|addphoto(*:1066)'
                                    .'|deletephoto(?'
                                        .'|(*:1089)'
                                        .'|/delete/([^/]++)(*:1114)'
                                    .')'
                                .')'
                            .')'
                            .'|lete/([^/]++)(*:1139)'
                        .')'
                        .'|edit/([^/]++)(*:1162)'
                        .'|([^/]++)/availability(?'
                            .'|(*:1195)'
                            .'|/([^/]++)/(?'
                                .'|deletel(?'
                                    .'|ist(*:1230)'
                                    .'|ocation(*:1246)'
                                .')'
                                .'|change(*:1262)'
                                .'|show(?'
                                    .'|(*:1278)'
                                    .'|All(*:1290)'
                                .')'
                            .')'
                        .')'
                        .'|detail/([^/]++)/addcategory(*:1329)'
                    .')'
                    .'|/pro(?'
                        .'|duct/(?'
                            .'|de(?'
                                .'|tail/([^/]++)(?'
                                    .'|(*:1375)'
                                    .'|/(?'
                                        .'|addcategory(*:1399)'
                                        .'|editcategory/([^/]++)(*:1429)'
                                        .'|deleteCat/([^/]++)(*:1456)'
                                    .')'
                                .')'
                                .'|lete/([^/]++)(*:1480)'
                            .')'
                            .'|edit/([^/]++)(*:1503)'
                        .')'
                        .'|vider/(?'
                            .'|de(?'
                                .'|tail/([^/]++)(?'
                                    .'|(*:1543)'
                                    .'|/(?'
                                        .'|listdesworker(*:1569)'
                                        .'|addcatprovider(*:1592)'
                                    .')'
                                .')'
                                .'|lete/([^/]++)(*:1616)'
                            .')'
                            .'|edit/([^/]++)(*:1639)'
                            .'|user(?'
                                .'|accepted/([^/]++)(*:1672)'
                                .'|canceled/([^/]++)(*:1698)'
                            .')'
                            .'|provider(?'
                                .'|accepted(?'
                                    .'|/([^/]++)(*:1739)'
                                    .'|mail/([^/]++)(*:1761)'
                                .')'
                                .'|canceled/([^/]++)(*:1788)'
                                .'|edited/([^/]++)(*:1812)'
                            .')'
                            .'|modifier/([^/]++)(*:1839)'
                        .')'
                        .'|file/(?'
                            .'|delCard/([^/]++)(*:1873)'
                            .'|pdf/([^/]++)(*:1894)'
                        .')'
                    .')'
                    .'|/reduction/(?'
                        .'|modifier/(\\d+)(*:1933)'
                        .'|delete/([^/]++)(*:1957)'
                    .')'
                    .'|/wellness(?'
                        .'|/(?'
                            .'|([^/]++)(?'
                                .'|(*:1994)'
                                .'|/(?'
                                    .'|productid/([^/]++)(*:2025)'
                                    .'|location(*:2042)'
                                .')'
                            .')'
                            .'|Payment/([^/]++)(*:2069)'
                            .'|newPayment/([^/]++)(*:2097)'
                        .')'
                        .'|valide/([^/]++)(*:2122)'
                    .')'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            31 => [[['_route' => 'car_edit', '_controller' => 'App\\Controller\\CarController::edit'], ['id'], null, null, false, true, null]],
            53 => [[['_route' => 'car_delete', '_controller' => 'App\\Controller\\CarController::delete'], ['id'], null, null, false, true, null]],
            77 => [[['_route' => 'carservice_carservice', '_controller' => 'App\\Controller\\CarServicesController::carcleaning'], ['id'], null, null, false, true, null]],
            110 => [[['_route' => 'carservice_serviceproduct', '_controller' => 'App\\Controller\\CarServicesController::product'], ['id'], null, null, false, false, null]],
            149 => [[['_route' => 'carservice_option', '_controller' => 'App\\Controller\\CarServicesController::options'], ['serviceid', 'id'], null, null, false, true, null]],
            165 => [[['_route' => 'carservice_locationchoice', '_controller' => 'App\\Controller\\CarServicesController::chooseLocation'], ['id'], null, null, false, false, null]],
            191 => [[['_route' => 'carservice_savedcard', '_controller' => 'App\\Controller\\CarServicesController::payWithSavedCard'], ['price'], null, null, false, true, null]],
            219 => [[['_route' => 'carservice_newmethod', '_controller' => 'App\\Controller\\CarServicesController::payWithNewCard'], ['price'], null, null, false, true, null]],
            243 => [[['_route' => 'carservice_valide', '_controller' => 'App\\Controller\\CarServicesController::valide'], ['id'], null, null, false, true, null]],
            267 => [[['_route' => 'carservice_addcar', '_controller' => 'App\\Controller\\CarServicesController::addCar'], ['id'], null, null, false, true, null]],
            300 => [[['_route' => 'category_edit', '_controller' => 'App\\Controller\\CategoryController::editcat'], ['id'], null, null, false, true, null]],
            324 => [[['_route' => 'category_editService', '_controller' => 'App\\Controller\\CategoryController::editService'], ['id'], null, null, false, true, null]],
            341 => [[['_route' => 'company_edit', '_controller' => 'App\\Controller\\CompanyController::edit'], ['id'], null, null, false, true, null]],
            383 => [[['_route' => 'cleaner_detail', '_controller' => 'App\\Controller\\CleanerController::detail'], ['id'], null, null, false, true, null]],
            399 => [[['_route' => 'cleaner_edit', '_controller' => 'App\\Controller\\CleanerController::edit'], ['id'], null, null, false, false, null]],
            410 => [[['_route' => 'cleaner_add', '_controller' => 'App\\Controller\\CleanerController::add'], ['id'], null, null, false, false, null]],
            427 => [[['_route' => 'cleaner_delete_order', '_controller' => 'App\\Controller\\CleanerController::deleteorder'], ['id'], null, null, false, false, null]],
            444 => [[['_route' => 'cleaner_delete', '_controller' => 'App\\Controller\\CleanerController::delete'], ['id', 'iduser'], null, null, false, true, null]],
            497 => [[['_route' => 'client_validertok', '_controller' => 'App\\Controller\\ClientController::validerToken'], ['id'], null, null, false, false, null]],
            520 => [[['_route' => 'client_adminpasschange', '_controller' => 'App\\Controller\\ClientController::adminpasschange'], ['id'], null, null, false, false, null]],
            534 => [[['_route' => 'client_modifier', '_controller' => 'App\\Controller\\ClientController::modifier'], ['id'], null, null, false, true, null]],
            558 => [[['_route' => 'client_delete', '_controller' => 'App\\Controller\\ClientController::supprimer'], ['id'], null, null, false, true, null]],
            590 => [[['_route' => 'cms_choosecalendar', '_controller' => 'App\\Controller\\CmsController::chooseCalendar'], ['id'], null, null, false, true, null]],
            618 => [[['_route' => 'confirmation', '_controller' => 'App\\Controller\\SecurityController::confirme'], ['token'], null, null, false, true, null]],
            655 => [[['_route' => 'hairsalon_productid', '_controller' => 'App\\Controller\\HairSalonController::product'], ['id'], null, null, false, true, null]],
            685 => [[['_route' => 'hairsalon_option', '_controller' => 'App\\Controller\\HairSalonController::options'], ['serviceid', 'id'], null, null, false, true, null]],
            701 => [[['_route' => 'hairsalon_locationchoice', '_controller' => 'App\\Controller\\HairSalonController::chooseLocation'], ['id'], null, null, false, false, null]],
            727 => [[['_route' => 'hairsalon_savedcard', '_controller' => 'App\\Controller\\HairSalonController::payWithSavedCard'], ['price'], null, null, false, true, null]],
            754 => [[['_route' => 'hairsalon_newmethod', '_controller' => 'App\\Controller\\HairSalonController::payWithNewCard'], ['price'], null, null, false, true, null]],
            778 => [[['_route' => 'hairsalon_valide', '_controller' => 'App\\Controller\\HairSalonController::valide'], ['id'], null, null, false, true, null]],
            822 => [[['_route' => 'option_detail', '_controller' => 'App\\Controller\\OptionController::detail'], ['id'], null, null, false, true, null]],
            845 => [[['_route' => 'option_addcat', '_controller' => 'App\\Controller\\OptionController::addcat'], ['id'], null, null, false, false, null]],
            874 => [[['_route' => 'option_editcat', '_controller' => 'App\\Controller\\OptionController::editcat'], ['idOp', 'idCat'], null, null, false, true, null]],
            900 => [[['_route' => 'option_deletecat', '_controller' => 'App\\Controller\\OptionController::deletecat'], ['idOp', 'id'], null, null, false, true, null]],
            923 => [[['_route' => 'option_delete', '_controller' => 'App\\Controller\\OptionController::delete'], ['id'], null, null, false, true, null]],
            945 => [[['_route' => 'option_edit', '_controller' => 'App\\Controller\\OptionController::edit'], ['id'], null, null, false, true, null]],
            976 => [[['_route' => 'order_notif', '_controller' => 'App\\Controller\\OrderController::notif'], ['id'], null, null, false, true, null]],
            1000 => [[['_route' => 'order_valider', '_controller' => 'App\\Controller\\OrderController::valider'], ['id'], null, null, false, false, null]],
            1045 => [[['_route' => 'parking_detail', '_controller' => 'App\\Controller\\ParkingController::detail'], ['id'], null, null, false, true, null]],
            1066 => [[['_route' => 'parking_addphoto', '_controller' => 'App\\Controller\\ParkingController::addphoto'], ['id'], null, null, false, false, null]],
            1089 => [[['_route' => 'parking_deletephoto', '_controller' => 'App\\Controller\\ParkingController::listphoto'], ['id'], null, null, false, false, null]],
            1114 => [[['_route' => 'parking_removephoto', '_controller' => 'App\\Controller\\ParkingController::removephoto'], ['id', 'idparking'], null, null, false, true, null]],
            1139 => [[['_route' => 'parking_delete', '_controller' => 'App\\Controller\\ParkingController::delete'], ['id'], null, null, false, true, null]],
            1162 => [[['_route' => 'parking_edit', '_controller' => 'App\\Controller\\ParkingController::edit'], ['id'], null, null, false, true, null]],
            1195 => [[['_route' => 'parking_availability', '_controller' => 'App\\Controller\\ParkingController::Availability'], ['id'], null, null, false, false, null]],
            1230 => [[['_route' => 'parking_availability_deletelist', '_controller' => 'App\\Controller\\ParkingController::DeleteListAvailability'], ['id', 'idAvailability'], null, null, false, false, null]],
            1246 => [[['_route' => 'parking_availability_deletelocation', '_controller' => 'App\\Controller\\ParkingController::DeleteLocationAvailability'], ['id', 'idAvailability'], null, null, false, false, null]],
            1262 => [[['_route' => 'parking_availability_change', '_controller' => 'App\\Controller\\ParkingController::ChangeAvailability'], ['id', 'idAvailability'], null, null, false, false, null]],
            1278 => [[['_route' => 'parking_availability_show', '_controller' => 'App\\Controller\\ParkingController::showLocationAvailability'], ['id', 'idAvailability'], null, null, false, false, null]],
            1290 => [[['_route' => 'parking_availability_showAll', '_controller' => 'App\\Controller\\ParkingController::showAllAvailability'], ['id', 'idAvailability'], null, null, false, false, null]],
            1329 => [[['_route' => 'parking_addcat', '_controller' => 'App\\Controller\\ParkingController::addCatToParking'], ['id'], null, null, false, false, null]],
            1375 => [[['_route' => 'product_detail', '_controller' => 'App\\Controller\\ProductController::detail'], ['id'], null, null, false, true, null]],
            1399 => [[['_route' => 'product_addcat', '_controller' => 'App\\Controller\\ProductController::addcat'], ['id'], null, null, false, false, null]],
            1429 => [[['_route' => 'product_editcat', '_controller' => 'App\\Controller\\ProductController::editcat'], ['idProd', 'idCat'], null, null, false, true, null]],
            1456 => [[['_route' => 'product_deletecat', '_controller' => 'App\\Controller\\ProductController::deletecat'], ['idProd', 'id'], null, null, false, true, null]],
            1480 => [[['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::delete'], ['id'], null, null, false, true, null]],
            1503 => [[['_route' => 'product_edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], null, null, false, true, null]],
            1543 => [[['_route' => 'provider_detail', '_controller' => 'App\\Controller\\ProviderController::detail'], ['id'], null, null, false, true, null]],
            1569 => [[['_route' => 'provider_listdesworker', '_controller' => 'App\\Controller\\ProviderController::listdesworker'], ['id'], null, null, false, false, null]],
            1592 => [[['_route' => 'provider_addcatprovider', '_controller' => 'App\\Controller\\ProviderController::addCatToProvider'], ['id'], null, null, false, false, null]],
            1616 => [[['_route' => 'provider_delete', '_controller' => 'App\\Controller\\ProviderController::delete'], ['id'], null, null, false, true, null]],
            1639 => [[['_route' => 'provider_edit', '_controller' => 'App\\Controller\\ProviderController::edit'], ['id'], null, null, false, true, null]],
            1672 => [[['_route' => 'provider_useraccept', '_controller' => 'App\\Controller\\ProviderController::captureByUser'], ['id'], null, null, false, true, null]],
            1698 => [[['_route' => 'provider_usercanceled', '_controller' => 'App\\Controller\\ProviderController::cancelByUser'], ['id'], null, null, false, true, null]],
            1739 => [[['_route' => 'provider_provideraccepted', '_controller' => 'App\\Controller\\ProviderController::captureByProvider'], ['id'], null, null, false, true, null]],
            1761 => [[['_route' => 'provider_provideracceptedmail', '_controller' => 'App\\Controller\\ProviderController::captureByProviderFrommail'], ['id'], null, null, false, true, null]],
            1788 => [[['_route' => 'provider_providercanceled', '_controller' => 'App\\Controller\\ProviderController::cancelByProvider'], ['id'], null, null, false, true, null]],
            1812 => [[['_route' => 'provider_provideredited', '_controller' => 'App\\Controller\\ProviderController::editByProvider'], ['id'], null, null, false, true, null]],
            1839 => [[['_route' => 'provider_modifier', '_controller' => 'App\\Controller\\ProviderController::modifier'], ['id'], null, null, false, true, null]],
            1873 => [[['_route' => 'user_deleteCard', '_controller' => 'App\\Controller\\UserController::deleteCard'], ['id'], null, null, false, true, null]],
            1894 => [[['_route' => 'user_pdf', '_controller' => 'App\\Controller\\UserController::pdf'], ['id'], null, null, false, true, null]],
            1933 => [[['_route' => 'reduction_modifier', '_controller' => 'App\\Controller\\ReductionController::modifier'], ['id'], null, null, false, true, null]],
            1957 => [[['_route' => 'reduction_delete', '_controller' => 'App\\Controller\\ReductionController::supprimer'], ['id'], null, null, false, true, null]],
            1994 => [[['_route' => 'wellness_productid', '_controller' => 'App\\Controller\\WellnessController::product'], ['id'], null, null, false, true, null]],
            2025 => [[['_route' => 'wellness_option', '_controller' => 'App\\Controller\\WellnessController::options'], ['serviceid', 'id'], null, null, false, true, null]],
            2042 => [[['_route' => 'wellness_locationchoice', '_controller' => 'App\\Controller\\WellnessController::chooseLocation'], ['id'], null, null, false, false, null]],
            2069 => [[['_route' => 'wellness_savedcard', '_controller' => 'App\\Controller\\WellnessController::payWithSavedCard'], ['price'], null, null, false, true, null]],
            2097 => [[['_route' => 'wellness_newmethod', '_controller' => 'App\\Controller\\WellnessController::payWithNewCard'], ['price'], null, null, false, true, null]],
            2122 => [[['_route' => 'wellness_valide', '_controller' => 'App\\Controller\\WellnessController::valide'], ['id'], null, null, false, true, null]],
        ];
    }
}
