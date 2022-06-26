<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\UserController' shared autowired service.

include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once $this->targetDirs[3].'/src/Controller/UserController.php';

$this->services['App\\Controller\\UserController'] = $instance = new \App\Controller\UserController(($this->privates['App\\Repository\\MooveeCompanyRepository'] ?? $this->load('getMooveeCompanyRepositoryService.php')), ($this->privates['App\\Repository\\PlannedCleaningRepository'] ?? $this->load('getPlannedCleaningRepositoryService.php')), ($this->privates['App\\Repository\\CreditCardRepository'] ?? $this->load('getCreditCardRepositoryService.php')), ($this->services['security.password_encoder'] ?? $this->load('getSecurity_PasswordEncoderService.php')), ($this->services['swiftmailer.mailer.default'] ?? $this->load('getSwiftmailer_Mailer_DefaultService.php')));

$instance->setContainer(($this->privates['.service_locator.KTVqfp6'] ?? $this->load('get_ServiceLocator_KTVqfp6Service.php'))->withContext('App\\Controller\\UserController', $this));

return $instance;