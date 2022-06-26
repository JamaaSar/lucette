<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Parkings extends \App\Entity\Parkings implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'name', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'address', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'zip_code', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'city', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'country', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'description', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'created_date', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'updated_date', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'is_deleted', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'company', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'longitude', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'latitude', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'photosParkings', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'plannedCleanings', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'availabilities', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'parkingCat'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'name', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'address', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'zip_code', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'city', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'country', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'description', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'created_date', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'updated_date', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'is_deleted', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'company', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'longitude', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'latitude', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'photosParkings', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'plannedCleanings', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'availabilities', '' . "\0" . 'App\\Entity\\Parkings' . "\0" . 'parkingCat'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Parkings $proxy) {
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
    public function setName(string $name): \App\Entity\Parkings
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
    public function setAddress(string $address): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', [$address]);

        return parent::setAddress($address);
    }

    /**
     * {@inheritDoc}
     */
    public function getZipCode(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getZipCode', []);

        return parent::getZipCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setZipCode(string $zip_code): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setZipCode', [$zip_code]);

        return parent::setZipCode($zip_code);
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
    public function setCity(string $city): \App\Entity\Parkings
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
    public function setCountry(string $country): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', [$country]);

        return parent::setCountry($country);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription(string $description): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedDate(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedDate', []);

        return parent::getCreatedDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedDate(\DateTimeInterface $created_date): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedDate', [$created_date]);

        return parent::setCreatedDate($created_date);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedDate(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedDate', []);

        return parent::getUpdatedDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedDate(\DateTimeInterface $updated_date): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedDate', [$updated_date]);

        return parent::setUpdatedDate($updated_date);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsDeleted(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsDeleted', []);

        return parent::getIsDeleted();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsDeleted(bool $is_deleted): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsDeleted', [$is_deleted]);

        return parent::setIsDeleted($is_deleted);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompany(): ?\App\Entity\MooveeCompany
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompany', []);

        return parent::getCompany();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompany(?\App\Entity\MooveeCompany $company): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompany', [$company]);

        return parent::setCompany($company);
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLongitude', []);

        return parent::getLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude(string $longitude): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLongitude', [$longitude]);

        return parent::setLongitude($longitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLatitude', []);

        return parent::getLatitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLatitude(string $latitude): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLatitude', [$latitude]);

        return parent::setLatitude($latitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhotosParkings(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhotosParkings', []);

        return parent::getPhotosParkings();
    }

    /**
     * {@inheritDoc}
     */
    public function addPhotosParking(\App\Entity\PhotosParking $photosParking): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPhotosParking', [$photosParking]);

        return parent::addPhotosParking($photosParking);
    }

    /**
     * {@inheritDoc}
     */
    public function removePhotosParking(\App\Entity\PhotosParking $photosParking): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePhotosParking', [$photosParking]);

        return parent::removePhotosParking($photosParking);
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
    public function addPlannedCleaning(\App\Entity\PlannedCleaning $plannedCleaning): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPlannedCleaning', [$plannedCleaning]);

        return parent::addPlannedCleaning($plannedCleaning);
    }

    /**
     * {@inheritDoc}
     */
    public function removePlannedCleaning(\App\Entity\PlannedCleaning $plannedCleaning): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePlannedCleaning', [$plannedCleaning]);

        return parent::removePlannedCleaning($plannedCleaning);
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
    public function addAvailability(\App\Entity\Availability $availability): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAvailability', [$availability]);

        return parent::addAvailability($availability);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAvailability(\App\Entity\Availability $availability): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAvailability', [$availability]);

        return parent::removeAvailability($availability);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategories(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategories', []);

        return parent::getCategories();
    }

    /**
     * {@inheritDoc}
     */
    public function getCategoryLocation(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategoryLocation', []);

        return parent::getCategoryLocation();
    }

    /**
     * {@inheritDoc}
     */
    public function addCategoryLocation(\App\Entity\CategoryLocation $parkingCat): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCategoryLocation', [$parkingCat]);

        return parent::addCategoryLocation($parkingCat);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCategoryLocation(\App\Entity\CategoryLocation $parkingCat): \App\Entity\Parkings
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCategoryLocation', [$parkingCat]);

        return parent::removeCategoryLocation($parkingCat);
    }

}
