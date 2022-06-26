<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Provider extends \App\Entity\Provider implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'name', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'address', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'tva', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'products', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'supprime', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'mooveeUsers', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'plannedCleanings', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'address2', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'postal_code', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'city', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'country', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'availabilities', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'providerCat'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'name', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'address', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'tva', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'products', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'supprime', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'mooveeUsers', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'plannedCleanings', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'address2', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'postal_code', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'city', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'country', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'availabilities', '' . "\0" . 'App\\Entity\\Provider' . "\0" . 'providerCat'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Provider $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress', []);

        return parent::getAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress(string $address): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', [$address]);

        return parent::setAddress($address);
    }

    /**
     * {@inheritDoc}
     */
    public function getTVA(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTVA', []);

        return parent::getTVA();
    }

    /**
     * {@inheritDoc}
     */
    public function setTVA(string $tva): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTVA', [$tva]);

        return parent::setTVA($tva);
    }

    /**
     * {@inheritDoc}
     */
    public function getSupprime(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSupprime', []);

        return parent::getSupprime();
    }

    /**
     * {@inheritDoc}
     */
    public function setSupprime(int $supprime): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSupprime', [$supprime]);

        return parent::setSupprime($supprime);
    }

    /**
     * {@inheritDoc}
     */
    public function getProducts(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProducts', []);

        return parent::getProducts();
    }

    /**
     * {@inheritDoc}
     */
    public function addProduct(\App\Entity\Products $product): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProduct', [$product]);

        return parent::addProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProduct(\App\Entity\Products $product): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProduct', [$product]);

        return parent::removeProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function getMooveeUsers(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMooveeUsers', []);

        return parent::getMooveeUsers();
    }

    /**
     * {@inheritDoc}
     */
    public function addMooveeUser(\App\Entity\MooveeUsers $mooveeUser): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMooveeUser', [$mooveeUser]);

        return parent::addMooveeUser($mooveeUser);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMooveeUser(\App\Entity\MooveeUsers $mooveeUser): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMooveeUser', [$mooveeUser]);

        return parent::removeMooveeUser($mooveeUser);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlannedCleanings(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlannedCleanings', []);

        return parent::getPlannedCleanings();
    }

    /**
     * {@inheritDoc}
     */
    public function addPlannedCleaning(\App\Entity\PlannedCleaning $plannedCleaning): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPlannedCleaning', [$plannedCleaning]);

        return parent::addPlannedCleaning($plannedCleaning);
    }

    /**
     * {@inheritDoc}
     */
    public function removePlannedCleaning(\App\Entity\PlannedCleaning $plannedCleaning): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePlannedCleaning', [$plannedCleaning]);

        return parent::removePlannedCleaning($plannedCleaning);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress2(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress2', []);

        return parent::getAddress2();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress2(?string $address2): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress2', [$address2]);

        return parent::setAddress2($address2);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostalCode(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostalCode', []);

        return parent::getPostalCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostalCode(?string $postal_code): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostalCode', [$postal_code]);

        return parent::setPostalCode($postal_code);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', []);

        return parent::getCity();
    }

    /**
     * {@inheritDoc}
     */
    public function setCity(?string $city): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', [$city]);

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', []);

        return parent::getCountry();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry(?string $country): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', [$country]);

        return parent::setCountry($country);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategoryProvider(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategoryProvider', []);

        return parent::getCategoryProvider();
    }

    /**
     * {@inheritDoc}
     */
    public function addCategoryProvider(\App\Entity\CategoryProvider $providerCat): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCategoryProvider', [$providerCat]);

        return parent::addCategoryProvider($providerCat);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCategoryProvider(\App\Entity\CategoryProvider $providerCat): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCategoryProvider', [$providerCat]);

        return parent::removeCategoryProvider($providerCat);
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailabilities(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAvailabilities', []);

        return parent::getAvailabilities();
    }

    /**
     * {@inheritDoc}
     */
    public function addAvailability(\App\Entity\Availability $availability): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAvailability', [$availability]);

        return parent::addAvailability($availability);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAvailability(\App\Entity\Availability $availability): \App\Entity\Provider
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAvailability', [$availability]);

        return parent::removeAvailability($availability);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
    }

}