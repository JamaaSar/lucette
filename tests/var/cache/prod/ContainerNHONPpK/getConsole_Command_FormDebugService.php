<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'console.command.form_debug' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/console/Command/Command.php';
include_once $this->targetDirs[3].'/vendor/symfony/form/Command/DebugCommand.php';

$this->privates['console.command.form_debug'] = $instance = new \Symfony\Component\Form\Command\DebugCommand(($this->privates['form.registry'] ?? $this->load('getForm_RegistryService.php')), [0 => 'Symfony\\Component\\Form\\Extension\\Core\\Type', 1 => 'App\\Form', 2 => 'Symfony\\Bridge\\Doctrine\\Form\\Type', 3 => 'FOS\\CKEditorBundle\\Form\\Type'], [0 => 'App\\Form\\AdminPassType', 1 => 'App\\Form\\AvailabilityType', 2 => 'App\\Form\\CarType', 3 => 'App\\Form\\CatLocationType', 4 => 'App\\Form\\CatOptionType', 5 => 'App\\Form\\CatProductType', 6 => 'App\\Form\\CategoriesType', 7 => 'App\\Form\\ClientType', 8 => 'App\\Form\\CompanyType', 9 => 'App\\Form\\CreditCardType', 10 => 'App\\Form\\ForgetPassType', 11 => 'App\\Form\\HorraireType', 12 => 'App\\Form\\OptionType', 13 => 'App\\Form\\OrderType', 14 => 'App\\Form\\ParkingType', 15 => 'App\\Form\\PassType', 16 => 'App\\Form\\PhotoParkingType', 17 => 'App\\Form\\PlannedCleaningType', 18 => 'App\\Form\\ProductType', 19 => 'App\\Form\\ProviderType', 20 => 'App\\Form\\RecurrenceAvaibleType', 21 => 'App\\Form\\ReductionType', 22 => 'App\\Form\\ServiceType', 23 => 'App\\Form\\SignUpType', 24 => 'App\\Form\\Step2Type', 25 => 'App\\Form\\SupportType', 26 => 'App\\Form\\UserHasCarType', 27 => 'App\\Form\\UserType', 28 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType', 29 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType', 30 => 'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType', 31 => 'FOS\\CKEditorBundle\\Form\\Type\\CKEditorType'], [0 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\TransformationFailureExtension', 1 => 'Symfony\\Component\\Form\\Extension\\HttpFoundation\\Type\\FormTypeHttpFoundationExtension', 2 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\FormTypeValidatorExtension', 3 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\RepeatedTypeValidatorExtension', 4 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\SubmitTypeValidatorExtension', 5 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\UploadValidatorExtension', 6 => 'Symfony\\Component\\Form\\Extension\\Csrf\\Type\\FormTypeCsrfExtension', 7 => 'Craue\\FormFlowBundle\\Form\\Extension\\FormFlowFormExtension', 8 => 'Craue\\FormFlowBundle\\Form\\Extension\\FormFlowHiddenFieldExtension'], [0 => 'Symfony\\Component\\Form\\Extension\\Validator\\ValidatorTypeGuesser', 1 => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser']);

$instance->setName('debug:form');

return $instance;
