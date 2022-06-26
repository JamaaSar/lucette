<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'doctrine.orm.default_entity_manager' shared service.

include_once $this->targetDirs[3].'/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/ObjectManager.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';
include_once $this->targetDirs[3].'/vendor/doctrine/dbal/lib/Doctrine/DBAL/Configuration.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Configuration.php';
include_once $this->targetDirs[3].'/vendor/doctrine/cache/lib/Doctrine/Common/Cache/Cache.php';
include_once $this->targetDirs[3].'/vendor/doctrine/cache/lib/Doctrine/Common/Cache/FlushableCache.php';
include_once $this->targetDirs[3].'/vendor/doctrine/cache/lib/Doctrine/Common/Cache/ClearableCache.php';
include_once $this->targetDirs[3].'/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MultiGetCache.php';
include_once $this->targetDirs[3].'/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MultiDeleteCache.php';
include_once $this->targetDirs[3].'/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MultiPutCache.php';
include_once $this->targetDirs[3].'/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MultiOperationCache.php';
include_once $this->targetDirs[3].'/vendor/doctrine/cache/lib/Doctrine/Common/Cache/CacheProvider.php';
include_once $this->targetDirs[3].'/vendor/symfony/cache/PruneableInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/cache/ResettableInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/cache/DoctrineProvider.php';
include_once $this->targetDirs[3].'/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/MappingDriver.php';
include_once $this->targetDirs[3].'/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/MappingDriverChain.php';
include_once $this->targetDirs[3].'/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/AnnotationDriver.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/AnnotationDriver.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/NamingStrategy.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/UnderscoreNamingStrategy.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/QuoteStrategy.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/DefaultQuoteStrategy.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/EntityListenerResolver.php';
include_once $this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Mapping/EntityListenerServiceResolver.php';
include_once $this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Mapping/ContainerAwareEntityListenerResolver.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Repository/RepositoryFactory.php';
include_once $this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Repository/ContainerRepositoryFactory.php';
include_once $this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/ManagerConfigurator.php';

$a = new \Doctrine\ORM\Configuration();

$b = new \Symfony\Component\Cache\DoctrineProvider(($this->privates['doctrine.system_cache_pool'] ?? $this->load('getDoctrine_SystemCachePoolService.php')));
$c = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();
$c->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()), [0 => ($this->targetDirs[3].'/src/Entity')]), 'App\\Entity');

$a->setEntityNamespaces(['App' => 'App\\Entity']);
$a->setMetadataCacheImpl($b);
$a->setQueryCacheImpl($b);
$a->setResultCacheImpl(new \Symfony\Component\Cache\DoctrineProvider(($this->privates['doctrine.result_cache_pool'] ?? $this->load('getDoctrine_ResultCachePoolService.php'))));
$a->setMetadataDriverImpl($c);
$a->setProxyDir(($this->targetDirs[0].'/doctrine/orm/Proxies'));
$a->setProxyNamespace('Proxies');
$a->setAutoGenerateProxyClasses(false);
$a->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
$a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
$a->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy());
$a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
$a->setEntityListenerResolver(new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver($this));
$a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'App\\Repository\\AvailabilityRepository' => ['privates', 'App\\Repository\\AvailabilityRepository', 'getAvailabilityRepositoryService.php', true],
    'App\\Repository\\CategoriesRepository' => ['privates', 'App\\Repository\\CategoriesRepository', 'getCategoriesRepositoryService.php', true],
    'App\\Repository\\CategoryLocationRepository' => ['privates', 'App\\Repository\\CategoryLocationRepository', 'getCategoryLocationRepositoryService.php', true],
    'App\\Repository\\CategoryOptionRepository' => ['privates', 'App\\Repository\\CategoryOptionRepository', 'getCategoryOptionRepositoryService.php', true],
    'App\\Repository\\CategoryProductRepository' => ['privates', 'App\\Repository\\CategoryProductRepository', 'getCategoryProductRepositoryService.php', true],
    'App\\Repository\\CategoryProviderRepository' => ['privates', 'App\\Repository\\CategoryProviderRepository', 'getCategoryProviderRepositoryService.php', true],
    'App\\Repository\\CreditCardRepository' => ['privates', 'App\\Repository\\CreditCardRepository', 'getCreditCardRepositoryService.php', true],
    'App\\Repository\\EventsFromGCalendarRepository' => ['privates', 'App\\Repository\\EventsFromGCalendarRepository', 'getEventsFromGCalendarRepositoryService.php', true],
    'App\\Repository\\GoogleCalendarApiRepository' => ['privates', 'App\\Repository\\GoogleCalendarApiRepository', 'getGoogleCalendarApiRepositoryService.php', true],
    'App\\Repository\\MooveeCarRepository' => ['privates', 'App\\Repository\\MooveeCarRepository', 'getMooveeCarRepositoryService.php', true],
    'App\\Repository\\MooveeCompanyRepository' => ['privates', 'App\\Repository\\MooveeCompanyRepository', 'getMooveeCompanyRepositoryService.php', true],
    'App\\Repository\\MooveeUserHasCarRepository' => ['privates', 'App\\Repository\\MooveeUserHasCarRepository', 'getMooveeUserHasCarRepositoryService.php', true],
    'App\\Repository\\MooveeUsersRepository' => ['privates', 'App\\Repository\\MooveeUsersRepository', 'getMooveeUsersRepositoryService.php', true],
    'App\\Repository\\OptionRepository' => ['privates', 'App\\Repository\\OptionRepository', 'getOptionRepositoryService.php', true],
    'App\\Repository\\ParkingsRepository' => ['privates', 'App\\Repository\\ParkingsRepository', 'getParkingsRepositoryService.php', true],
    'App\\Repository\\PhotosParkingRepository' => ['privates', 'App\\Repository\\PhotosParkingRepository', 'getPhotosParkingRepositoryService.php', true],
    'App\\Repository\\PlaningRepository' => ['privates', 'App\\Repository\\PlaningRepository', 'getPlaningRepositoryService.php', true],
    'App\\Repository\\PlannedCleaningOptionsRepository' => ['privates', 'App\\Repository\\PlannedCleaningOptionsRepository', 'getPlannedCleaningOptionsRepositoryService.php', true],
    'App\\Repository\\PlannedCleaningRepository' => ['privates', 'App\\Repository\\PlannedCleaningRepository', 'getPlannedCleaningRepositoryService.php', true],
    'App\\Repository\\ProductsRepository' => ['privates', 'App\\Repository\\ProductsRepository', 'getProductsRepositoryService.php', true],
    'App\\Repository\\ProviderRepository' => ['privates', 'App\\Repository\\ProviderRepository', 'getProviderRepositoryService.php', true],
    'App\\Repository\\ReductionRepository' => ['privates', 'App\\Repository\\ReductionRepository', 'getReductionRepositoryService.php', true],
    'App\\Repository\\ServiceRepository' => ['privates', 'App\\Repository\\ServiceRepository', 'getServiceRepositoryService.php', true],
])));

$this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create(($this->services['doctrine.dbal.default_connection'] ?? $this->load('getDoctrine_Dbal_DefaultConnectionService.php')), $a);

(new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))->configure($instance);

return $instance;
