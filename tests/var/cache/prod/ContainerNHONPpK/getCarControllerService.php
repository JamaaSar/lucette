<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\CarController' shared autowired service.

include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once $this->targetDirs[3].'/src/Controller/CarController.php';

$this->services['App\\Controller\\CarController'] = $instance = new \App\Controller\CarController(($this->privates['App\\Repository\\MooveeCompanyRepository'] ?? $this->load('getMooveeCompanyRepositoryService.php')), ($this->privates['App\\Repository\\MooveeCarRepository'] ?? $this->load('getMooveeCarRepositoryService.php')), ($this->privates['App\\Repository\\MooveeUserHasCarRepository'] ?? $this->load('getMooveeUserHasCarRepositoryService.php')));

$instance->setContainer(($this->privates['.service_locator.KTVqfp6'] ?? $this->load('get_ServiceLocator_KTVqfp6Service.php'))->withContext('App\\Controller\\CarController', $this));

return $instance;
