<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\WellnessController' shared autowired service.

include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once $this->targetDirs[3].'/src/Controller/WellnessController.php';

$this->services['App\\Controller\\WellnessController'] = $instance = new \App\Controller\WellnessController(($this->privates['App\\Repository\\ReductionRepository'] ?? $this->load('getReductionRepositoryService.php')), ($this->privates['App\\Repository\\PlannedCleaningRepository'] ?? $this->load('getPlannedCleaningRepositoryService.php')), ($this->privates['App\\Repository\\CreditCardRepository'] ?? $this->load('getCreditCardRepositoryService.php')), ($this->privates['App\\Repository\\CategoryProductRepository'] ?? $this->load('getCategoryProductRepositoryService.php')), ($this->privates['App\\Repository\\ProductsRepository'] ?? $this->load('getProductsRepositoryService.php')), ($this->privates['App\\Repository\\MooveeUserHasCarRepository'] ?? $this->load('getMooveeUserHasCarRepositoryService.php')), ($this->privates['App\\Repository\\MooveeCompanyRepository'] ?? $this->load('getMooveeCompanyRepositoryService.php')), ($this->privates['App\\Repository\\AvailabilityRepository'] ?? $this->load('getAvailabilityRepositoryService.php')), ($this->privates['App\\Repository\\CategoryOptionRepository'] ?? $this->load('getCategoryOptionRepositoryService.php')), ($this->privates['App\\Repository\\CategoriesRepository'] ?? $this->load('getCategoriesRepositoryService.php')), ($this->privates['App\\Repository\\OptionRepository'] ?? $this->load('getOptionRepositoryService.php')), ($this->privates['App\\Repository\\ParkingsRepository'] ?? $this->load('getParkingsRepositoryService.php')), ($this->privates['App\\Repository\\MooveeUsersRepository'] ?? $this->load('getMooveeUsersRepositoryService.php')), ($this->privates['App\\Repository\\ServiceRepository'] ?? $this->load('getServiceRepositoryService.php')), ($this->privates['App\\Repository\\CategoryLocationRepository'] ?? $this->load('getCategoryLocationRepositoryService.php')), ($this->privates['App\\Repository\\CategoryProviderRepository'] ?? $this->load('getCategoryProviderRepositoryService.php')), ($this->privates['App\\Repository\\GoogleCalendarApiRepository'] ?? $this->load('getGoogleCalendarApiRepositoryService.php')));

$instance->setContainer(($this->privates['.service_locator.KTVqfp6'] ?? $this->load('get_ServiceLocator_KTVqfp6Service.php'))->withContext('App\\Controller\\WellnessController', $this));

return $instance;