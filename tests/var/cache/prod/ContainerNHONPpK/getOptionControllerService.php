<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\OptionController' shared autowired service.

include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once $this->targetDirs[3].'/src/Controller/OptionController.php';

$this->services['App\\Controller\\OptionController'] = $instance = new \App\Controller\OptionController(($this->privates['App\\Repository\\CategoryOptionRepository'] ?? $this->load('getCategoryOptionRepositoryService.php')), ($this->privates['App\\Repository\\OptionRepository'] ?? $this->load('getOptionRepositoryService.php')), ($this->privates['App\\Repository\\ProductsRepository'] ?? $this->load('getProductsRepositoryService.php')));

$instance->setContainer(($this->privates['.service_locator.KTVqfp6'] ?? $this->load('get_ServiceLocator_KTVqfp6Service.php'))->withContext('App\\Controller\\OptionController', $this));

return $instance;
