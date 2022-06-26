<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelProdContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        'bioOrders' => [[], ['_controller' => 'App\\Controller\\BioOrdersController::index'], [], [['text', '/bio_orders']], [], []],
        'car_list' => [[], ['_controller' => 'App\\Controller\\CarController::index'], [], [['text', '/car']], [], []],
        'car_add' => [[], ['_controller' => 'App\\Controller\\CarController::add'], [], [['text', '/car/add']], [], []],
        'car_edit' => [['id'], ['_controller' => 'App\\Controller\\CarController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/car/edit']], [], []],
        'car_delete' => [['id'], ['_controller' => 'App\\Controller\\CarController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/car/delete']], [], []],
        'carservice_carServices' => [[], ['_controller' => 'App\\Controller\\CarServicesController::index'], [], [['text', '/car_services']], [], []],
        'carservice_carservice' => [['id'], ['_controller' => 'App\\Controller\\CarServicesController::carcleaning'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/carservice']], [], []],
        'carservice_product' => [[], ['_controller' => 'App\\Controller\\CarServicesController::myproduct'], [], [['text', '/carproduct']], [], []],
        'carservice_serviceproduct' => [['id'], ['_controller' => 'App\\Controller\\CarServicesController::product'], [], [['text', '/product'], ['variable', '/', '[^/]++', 'id', true], ['text', '/service']], [], []],
        'carservice_option' => [['serviceid', 'id'], ['_controller' => 'App\\Controller\\CarServicesController::options'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/productid'], ['variable', '/', '[^/]++', 'serviceid', true]], [], []],
        'carservice_locationchoice' => [['id'], ['_controller' => 'App\\Controller\\CarServicesController::chooseLocation'], [], [['text', '/location'], ['variable', '/', '[^/]++', 'id', true]], [], []],
        'carservice_availbleDate' => [[], ['_controller' => 'App\\Controller\\CarServicesController::chooseDate'], [], [['text', '/location/availbledate']], [], []],
        'carservice_calendar' => [[], ['_controller' => 'App\\Controller\\CarServicesController::mycalendar'], [], [['text', '/option/calendar']], [], []],
        'carservice_resumedirect' => [[], ['_controller' => 'App\\Controller\\CarServicesController::resumeDirect'], [], [['text', '/order/resume']], [], []],
        'carservice_resume' => [[], ['_controller' => 'App\\Controller\\CarServicesController::orderResume'], [], [['text', '/calendar/resume']], [], []],
        'carservice_payment' => [[], ['_controller' => 'App\\Controller\\CarServicesController::paiment'], [], [['text', '/Payment']], [], []],
        'carservice_savedcard' => [['price'], ['_controller' => 'App\\Controller\\CarServicesController::payWithSavedCard'], [], [['variable', '/', '[^/]++', 'price', true], ['text', '/Payment']], [], []],
        'carservice_newmethod' => [['price'], ['_controller' => 'App\\Controller\\CarServicesController::payWithNewCard'], [], [['variable', '/', '[^/]++', 'price', true], ['text', '/newPayment']], [], []],
        'carservice_valide' => [['id'], ['_controller' => 'App\\Controller\\CarServicesController::valide'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/valide']], [], []],
        'carservice_addcar' => [['id'], ['_controller' => 'App\\Controller\\CarServicesController::addCar'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/addCar']], [], []],
        'category_index' => [[], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['text', '/category']], [], []],
        'category_add' => [[], ['_controller' => 'App\\Controller\\CategoryController::addnewcat'], [], [['text', '/addcategory']], [], []],
        'category_edit' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::editcat'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/editcategory']], [], []],
        'category_services' => [[], ['_controller' => 'App\\Controller\\CategoryController::myservices'], [], [['text', '/service']], [], []],
        'category_addService' => [[], ['_controller' => 'App\\Controller\\CategoryController::addService'], [], [['text', '/addService']], [], []],
        'category_editService' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::editService'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/editService']], [], []],
        'checkCars' => [[], ['_controller' => 'App\\Controller\\CheckCarsController::index'], [], [['text', '/check_cars']], [], []],
        'cleaner_calendar' => [[], ['_controller' => 'App\\Controller\\CleanerController::index'], [], [['text', '/cleaner/']], [], []],
        'cleaner_detail' => [['id'], ['_controller' => 'App\\Controller\\CleanerController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/cleaner/detail']], [], []],
        'cleaner_edit' => [['id'], ['_controller' => 'App\\Controller\\CleanerController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/cleaner/detail']], [], []],
        'cleaner_add' => [['id'], ['_controller' => 'App\\Controller\\CleanerController::add'], [], [['text', '/add'], ['variable', '/', '[^/]++', 'id', true], ['text', '/cleaner/detail']], [], []],
        'cleaner_delete_order' => [['id'], ['_controller' => 'App\\Controller\\CleanerController::deleteorder'], [], [['text', '/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/cleaner/detail']], [], []],
        'cleaner_delete' => [['id', 'iduser'], ['_controller' => 'App\\Controller\\CleanerController::delete'], [], [['variable', '/', '[^/]++', 'iduser', true], ['text', '/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/cleaner/detail']], [], []],
        'client_list' => [[], ['_controller' => 'App\\Controller\\ClientController::index'], [], [['text', '/client']], [], []],
        'client_sanscode' => [[], ['_controller' => 'App\\Controller\\ClientController::clientSansCode'], [], [['text', '/client/sanscode']], [], []],
        'client_tokenmissing' => [[], ['_controller' => 'App\\Controller\\ClientController::tokenMissing'], [], [['text', '/client/tokenmissing']], [], []],
        'client_validertok' => [['id'], ['_controller' => 'App\\Controller\\ClientController::validerToken'], [], [['text', '/validertok'], ['variable', '/', '[^/]++', 'id', true], ['text', '/client/modifier']], [], []],
        'client_adminpasschange' => [['id'], ['_controller' => 'App\\Controller\\ClientController::adminpasschange'], [], [['text', '/adminpasschange'], ['variable', '/', '[^/]++', 'id', true], ['text', '/client/modifier']], [], []],
        'client_modifier' => [['id'], ['_controller' => 'App\\Controller\\ClientController::modifier'], ['id' => '\\d+'], [['variable', '/', '\\d+', 'id', true], ['text', '/client/modifier']], [], []],
        'client_delete' => [['id'], ['_controller' => 'App\\Controller\\ClientController::supprimer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/client/delete']], [], []],
        'cms_dashboard' => [[], ['_controller' => 'App\\Controller\\CmsController::index'], [], [['text', '/']], [], []],
        'cms_turnover' => [[], ['_controller' => 'App\\Controller\\CmsController::turnoverbyprovider'], [], [['text', '/turnover']], [], []],
        'cms_apiCalendar' => [[], ['_controller' => 'App\\Controller\\CmsController::connectGoogleCalendar'], [], [['text', '/apiCalendar']], [], []],
        'cms_passage' => [[], ['_controller' => 'App\\Controller\\CmsController::passage'], [], [['text', '/passage']], [], []],
        'cms_choosecalendar' => [['id'], ['_controller' => 'App\\Controller\\CmsController::chooseCalendar'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/choosecalendar']], [], []],
        'company_list' => [[], ['_controller' => 'App\\Controller\\CompanyController::index'], [], [['text', '/company']], [], []],
        'company_add' => [[], ['_controller' => 'App\\Controller\\CompanyController::add'], [], [['text', '/add']], [], []],
        'company_edit' => [['id'], ['_controller' => 'App\\Controller\\CompanyController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/edit']], [], []],
        'hairsalon_hair_salon' => [[], ['_controller' => 'App\\Controller\\HairSalonController::index'], [], [['text', '/hairsalon']], [], []],
        'hairsalon_productid' => [['id'], ['_controller' => 'App\\Controller\\HairSalonController::product'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/hairsalon']], [], []],
        'hairsalon_option' => [['serviceid', 'id'], ['_controller' => 'App\\Controller\\HairSalonController::options'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/productid'], ['variable', '/', '[^/]++', 'serviceid', true], ['text', '/hairsalon']], [], []],
        'hairsalon_locationchoice' => [['id'], ['_controller' => 'App\\Controller\\HairSalonController::chooseLocation'], [], [['text', '/location'], ['variable', '/', '[^/]++', 'id', true], ['text', '/hairsalon']], [], []],
        'hairsalon_availbleDate' => [[], ['_controller' => 'App\\Controller\\HairSalonController::chooseDate'], [], [['text', '/hairsalon/location/availbledate']], [], []],
        'hairsalon_calendar' => [[], ['_controller' => 'App\\Controller\\HairSalonController::mycalendar'], [], [['text', '/hairsalon/option/calendar']], [], []],
        'hairsalon_resumedirect' => [[], ['_controller' => 'App\\Controller\\HairSalonController::resumeDirect'], [], [['text', '/hairsalon/order/resume']], [], []],
        'hairsalon_resume' => [[], ['_controller' => 'App\\Controller\\HairSalonController::orderResume'], [], [['text', '/hairsalon/calendar/resume']], [], []],
        'hairsalon_payment' => [[], ['_controller' => 'App\\Controller\\HairSalonController::paiment'], [], [['text', '/hairsalonPayment']], [], []],
        'hairsalon_savedcard' => [['price'], ['_controller' => 'App\\Controller\\HairSalonController::payWithSavedCard'], [], [['variable', '/', '[^/]++', 'price', true], ['text', '/hairsalon/Payment']], [], []],
        'hairsalon_newmethod' => [['price'], ['_controller' => 'App\\Controller\\HairSalonController::payWithNewCard'], [], [['variable', '/', '[^/]++', 'price', true], ['text', '/hairsalon/newPayment']], [], []],
        'hairsalon_valide' => [['id'], ['_controller' => 'App\\Controller\\HairSalonController::valide'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/hairsalonvalide']], [], []],
        'iframe' => [[], ['_controller' => 'App\\Controller\\IframeController::index'], [], [['text', '/iframe']], [], []],
        'klinLaundry' => [[], ['_controller' => 'App\\Controller\\KlinLaundryController::index'], [], [['text', '/klin']], [], []],
        'option_list' => [[], ['_controller' => 'App\\Controller\\OptionController::list'], [], [['text', '/option']], [], []],
        'option_detail' => [['id'], ['_controller' => 'App\\Controller\\OptionController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/option/detail']], [], []],
        'option_edit' => [['id'], ['_controller' => 'App\\Controller\\OptionController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/option/edit']], [], []],
        'option_add' => [[], ['_controller' => 'App\\Controller\\OptionController::add'], [], [['text', '/option/add']], [], []],
        'option_delete' => [['id'], ['_controller' => 'App\\Controller\\OptionController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/option/delete']], [], []],
        'option_addcat' => [['id'], ['_controller' => 'App\\Controller\\OptionController::addcat'], [], [['text', '/addcategory'], ['variable', '/', '[^/]++', 'id', true], ['text', '/option/detail']], [], []],
        'option_editcat' => [['idOp', 'idCat'], ['_controller' => 'App\\Controller\\OptionController::editcat'], [], [['variable', '/', '[^/]++', 'idCat', true], ['text', '/editcategory'], ['variable', '/', '[^/]++', 'idOp', true], ['text', '/option/detail']], [], []],
        'option_deletecat' => [['idOp', 'id'], ['_controller' => 'App\\Controller\\OptionController::deletecat'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/deleteCat'], ['variable', '/', '[^/]++', 'idOp', true], ['text', '/option/detail']], [], []],
        'order_list' => [[], ['_controller' => 'App\\Controller\\OrderController::index'], [], [['text', '/order/']], [], []],
        'order_notif' => [['id'], ['_controller' => 'App\\Controller\\OrderController::notif'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/order/notif']], [], []],
        'order_delete' => [[], ['_controller' => 'App\\Controller\\OrderController::delete'], [], [['text', '/order/delete']], [], []],
        'order_nonva' => [[], ['_controller' => 'App\\Controller\\OrderController::nonValide'], [], [['text', '/order/nonva']], [], []],
        'order_valider' => [['id'], ['_controller' => 'App\\Controller\\OrderController::valider'], [], [['text', '/valider'], ['variable', '/', '[^/]++', 'id', true], ['text', '/order']], [], []],
        'parking_list' => [[], ['_controller' => 'App\\Controller\\ParkingController::index'], [], [['text', '/location']], [], []],
        'parking_detail' => [['id'], ['_controller' => 'App\\Controller\\ParkingController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/location/detail']], [], []],
        'parking_edit' => [['id'], ['_controller' => 'App\\Controller\\ParkingController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/location/edit']], [], []],
        'parking_delete' => [['id'], ['_controller' => 'App\\Controller\\ParkingController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/location/delete']], [], []],
        'parking_add' => [[], ['_controller' => 'App\\Controller\\ParkingController::add'], [], [['text', '/location/add']], [], []],
        'parking_addphoto' => [['id'], ['_controller' => 'App\\Controller\\ParkingController::addphoto'], [], [['text', '/addphoto'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location/detail']], [], []],
        'parking_deletephoto' => [['id'], ['_controller' => 'App\\Controller\\ParkingController::listphoto'], [], [['text', '/deletephoto'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location/detail']], [], []],
        'parking_removephoto' => [['id', 'idparking'], ['_controller' => 'App\\Controller\\ParkingController::removephoto'], [], [['variable', '/', '[^/]++', 'idparking', true], ['text', '/deletephoto/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location/detail']], [], []],
        'parking_availability' => [['id'], ['_controller' => 'App\\Controller\\ParkingController::Availability'], [], [['text', '/availability'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location']], [], []],
        'parking_addavailability' => [[], ['_controller' => 'App\\Controller\\ParkingController::addvailability'], [], [['text', '/location/addavailability']], [], []],
        'parking_availability_deletelist' => [['id', 'idAvailability'], ['_controller' => 'App\\Controller\\ParkingController::DeleteListAvailability'], [], [['text', '/deletelist'], ['variable', '/', '[^/]++', 'idAvailability', true], ['text', '/availability'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location']], [], []],
        'parking_availability_deletelocation' => [['id', 'idAvailability'], ['_controller' => 'App\\Controller\\ParkingController::DeleteLocationAvailability'], [], [['text', '/deletelocation'], ['variable', '/', '[^/]++', 'idAvailability', true], ['text', '/availability'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location']], [], []],
        'parking_availability_change' => [['id', 'idAvailability'], ['_controller' => 'App\\Controller\\ParkingController::ChangeAvailability'], [], [['text', '/change'], ['variable', '/', '[^/]++', 'idAvailability', true], ['text', '/availability'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location']], [], []],
        'parking_availability_show' => [['id', 'idAvailability'], ['_controller' => 'App\\Controller\\ParkingController::showLocationAvailability'], [], [['text', '/show'], ['variable', '/', '[^/]++', 'idAvailability', true], ['text', '/availability'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location']], [], []],
        'parking_availability_showAll' => [['id', 'idAvailability'], ['_controller' => 'App\\Controller\\ParkingController::showAllAvailability'], [], [['text', '/showAll'], ['variable', '/', '[^/]++', 'idAvailability', true], ['text', '/availability'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location']], [], []],
        'parking_listofavailability' => [[], ['_controller' => 'App\\Controller\\ParkingController::listofavailability'], [], [['text', '/location/listofavailability']], [], []],
        'parking_addcat' => [['id'], ['_controller' => 'App\\Controller\\ParkingController::addCatToParking'], [], [['text', '/addcategory'], ['variable', '/', '[^/]++', 'id', true], ['text', '/location/detail']], [], []],
        'parking_recurrence' => [[], ['_controller' => 'App\\Controller\\ParkingController::recurrenceAv'], [], [['text', '/location/recurrence']], [], []],
        'planned_services_list' => [[], ['_controller' => 'App\\Controller\\PlannedServicesController::index'], [], [['text', '/services']], [], []],
        'product_list' => [[], ['_controller' => 'App\\Controller\\ProductController::list'], [], [['text', '/product']], [], []],
        'product_detail' => [['id'], ['_controller' => 'App\\Controller\\ProductController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/detail']], [], []],
        'product_edit' => [['id'], ['_controller' => 'App\\Controller\\ProductController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/edit']], [], []],
        'product_add' => [[], ['_controller' => 'App\\Controller\\ProductController::add'], [], [['text', '/product/add']], [], []],
        'product_delete' => [['id'], ['_controller' => 'App\\Controller\\ProductController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/delete']], [], []],
        'product_addcat' => [['id'], ['_controller' => 'App\\Controller\\ProductController::addcat'], [], [['text', '/addcategory'], ['variable', '/', '[^/]++', 'id', true], ['text', '/product/detail']], [], []],
        'product_editcat' => [['idProd', 'idCat'], ['_controller' => 'App\\Controller\\ProductController::editcat'], [], [['variable', '/', '[^/]++', 'idCat', true], ['text', '/editcategory'], ['variable', '/', '[^/]++', 'idProd', true], ['text', '/product/detail']], [], []],
        'product_deletecat' => [['idProd', 'id'], ['_controller' => 'App\\Controller\\ProductController::deletecat'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/deleteCat'], ['variable', '/', '[^/]++', 'idProd', true], ['text', '/product/detail']], [], []],
        'product_adminworkerlist' => [[], ['_controller' => 'App\\Controller\\ProductController::workeradminlist'], [], [['text', '/product/adminworkerlist']], [], []],
        'provider_list' => [[], ['_controller' => 'App\\Controller\\ProviderController::list'], [], [['text', '/provider']], [], []],
        'provider_detail' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/detail']], [], []],
        'provider_edit' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/edit']], [], []],
        'provider_listdesworker' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::listdesworker'], [], [['text', '/listdesworker'], ['variable', '/', '[^/]++', 'id', true], ['text', '/provider/detail']], [], []],
        'provider_add' => [[], ['_controller' => 'App\\Controller\\ProviderController::add'], [], [['text', '/provider/add']], [], []],
        'provider_delete' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/delete']], [], []],
        'provider_addcatprovider' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::addCatToProvider'], [], [['text', '/addcatprovider'], ['variable', '/', '[^/]++', 'id', true], ['text', '/provider/detail']], [], []],
        'provider_waitlist' => [[], ['_controller' => 'App\\Controller\\ProviderController::waitlist'], [], [['text', '/provider/waitlist']], [], []],
        'provider_editedwaitlist' => [[], ['_controller' => 'App\\Controller\\ProviderController::editedWaitlist'], [], [['text', '/provider/editedwaitlist']], [], []],
        'provider_useraccept' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::captureByUser'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/useraccepted']], [], []],
        'provider_provideraccepted' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::captureByProvider'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/provideraccepted']], [], []],
        'provider_provideracceptedmail' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::captureByProviderFrommail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/provideracceptedmail']], [], []],
        'provider_usercanceled' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::cancelByUser'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/usercanceled']], [], []],
        'provider_providercanceled' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::cancelByProvider'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/providercanceled']], [], []],
        'provider_provideredited' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::editByProvider'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/provideredited']], [], []],
        'provider_modifier' => [['id'], ['_controller' => 'App\\Controller\\ProviderController::modifier'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/provider/modifier']], [], []],
        'reduction_list' => [[], ['_controller' => 'App\\Controller\\ReductionController::index'], [], [['text', '/reduction']], [], []],
        'reduction_add' => [[], ['_controller' => 'App\\Controller\\ReductionController::add'], [], [['text', '/reduction/add']], [], []],
        'reduction_modifier' => [['id'], ['_controller' => 'App\\Controller\\ReductionController::modifier'], ['id' => '\\d+'], [['variable', '/', '\\d+', 'id', true], ['text', '/reduction/modifier']], [], []],
        'reduction_delete' => [['id'], ['_controller' => 'App\\Controller\\ReductionController::supprimer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/reduction/delete']], [], []],
        'login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
        'signup' => [[], ['_controller' => 'App\\Controller\\SecurityController::signup'], [], [['text', '/sign-up']], [], []],
        'forgotpassword' => [[], ['_controller' => 'App\\Controller\\SecurityController::forgotpass'], [], [['text', '/forgotpassword']], [], []],
        'confirmation' => [['token'], ['_controller' => 'App\\Controller\\SecurityController::confirme'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/confirmation']], [], []],
        'support_form' => [[], ['_controller' => 'App\\Controller\\SupportController::index'], [], [['text', '/support/']], [], []],
        'usercar_list' => [[], ['_controller' => 'App\\Controller\\UserCarController::index'], [], [['text', '/usercar/']], [], []],
        'user_profile' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/profile']], [], []],
        'user_edit' => [[], ['_controller' => 'App\\Controller\\UserController::modifier'], [], [['text', '/profile/edit']], [], []],
        'user_editpassword' => [[], ['_controller' => 'App\\Controller\\UserController::pass'], [], [['text', '/profile/editpassword']], [], []],
        'user_addCard' => [[], ['_controller' => 'App\\Controller\\UserController::addcard'], [], [['text', '/profile/addCard']], [], []],
        'user_deleteCard' => [['id'], ['_controller' => 'App\\Controller\\UserController::deleteCard'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/profile/delCard']], [], []],
        'user_subscribe' => [[], ['_controller' => 'App\\Controller\\UserController::subscribe'], [], [['text', '/profile/subscribe']], [], []],
        'user_unsubscribe' => [[], ['_controller' => 'App\\Controller\\UserController::unsubscribe'], [], [['text', '/profile/unsubscribe']], [], []],
        'user_pdf' => [['id'], ['_controller' => 'App\\Controller\\UserController::pdf'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/profile/pdf']], [], []],
        'wellness_wellnessServices' => [[], ['_controller' => 'App\\Controller\\WellnessController::index'], [], [['text', '/wellness']], [], []],
        'wellness_email' => [[], ['_controller' => 'App\\Controller\\WellnessController::modifier'], [], [['text', '/wellnessconf/']], [], []],
        'wellness_productid' => [['id'], ['_controller' => 'App\\Controller\\WellnessController::product'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/wellness']], [], []],
        'wellness_option' => [['serviceid', 'id'], ['_controller' => 'App\\Controller\\WellnessController::options'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/productid'], ['variable', '/', '[^/]++', 'serviceid', true], ['text', '/wellness']], [], []],
        'wellness_locationchoice' => [['id'], ['_controller' => 'App\\Controller\\WellnessController::chooseLocation'], [], [['text', '/location'], ['variable', '/', '[^/]++', 'id', true], ['text', '/wellness']], [], []],
        'wellness_availbleDate' => [[], ['_controller' => 'App\\Controller\\WellnessController::chooseDate'], [], [['text', '/wellness/location/availbledate']], [], []],
        'wellness_calendar' => [[], ['_controller' => 'App\\Controller\\WellnessController::mycalendar'], [], [['text', '/wellness/option/calendar']], [], []],
        'wellness_resumedirect' => [[], ['_controller' => 'App\\Controller\\WellnessController::resumeDirect'], [], [['text', '/wellness/order/resume']], [], []],
        'wellness_resume' => [[], ['_controller' => 'App\\Controller\\WellnessController::orderResume'], [], [['text', '/wellness/calendar/resume']], [], []],
        'wellness_payment' => [[], ['_controller' => 'App\\Controller\\WellnessController::paiment'], [], [['text', '/wellnessPayment']], [], []],
        'wellness_savedcard' => [['price'], ['_controller' => 'App\\Controller\\WellnessController::payWithSavedCard'], [], [['variable', '/', '[^/]++', 'price', true], ['text', '/wellness/Payment']], [], []],
        'wellness_newmethod' => [['price'], ['_controller' => 'App\\Controller\\WellnessController::payWithNewCard'], [], [['variable', '/', '[^/]++', 'price', true], ['text', '/wellness/newPayment']], [], []],
        'wellness_valide' => [['id'], ['_controller' => 'App\\Controller\\WellnessController::valide'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/wellnessvalide']], [], []],
        'login_check' => [[], [], [], [['text', '/login_check']], [], []],
        'logout' => [[], [], [], [['text', '/logout']], [], []],
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
