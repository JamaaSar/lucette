<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'craue.form.flow.event_listener.previous_step_invalid' shared service.

include_once $this->targetDirs[3].'/vendor/craue/formflow-bundle/EventListener/PreviousStepInvalidEventListener.php';

$this->privates['craue.form.flow.event_listener.previous_step_invalid'] = $instance = new \Craue\FormFlowBundle\EventListener\PreviousStepInvalidEventListener();

$instance->setTranslator(($this->services['translator'] ?? $this->getTranslatorService()));

return $instance;
