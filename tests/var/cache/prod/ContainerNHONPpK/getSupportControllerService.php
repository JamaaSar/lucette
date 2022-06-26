<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\SupportController' shared autowired service.

include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once $this->targetDirs[3].'/src/Controller/SupportController.php';

$this->services['App\\Controller\\SupportController'] = $instance = new \App\Controller\SupportController(($this->services['swiftmailer.mailer.default'] ?? $this->load('getSwiftmailer_Mailer_DefaultService.php')), ($this->privates['App\\Repository\\MooveeUsersRepository'] ?? $this->load('getMooveeUsersRepositoryService.php')));

$instance->setContainer(($this->privates['.service_locator.KTVqfp6'] ?? $this->load('get_ServiceLocator_KTVqfp6Service.php'))->withContext('App\\Controller\\SupportController', $this));

return $instance;