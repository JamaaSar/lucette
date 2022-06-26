<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PlannedCleaningOptions extends \App\Entity\PlannedCleaningOptions implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\PlannedCleaningOptions' . "\0" . 'id', '' . "\0" . 'App\\Entity\\PlannedCleaningOptions' . "\0" . 'planned_cleaning_id', '' . "\0" . 'App\\Entity\\PlannedCleaningOptions' . "\0" . 'option_id', '' . "\0" . 'App\\Entity\\PlannedCleaningOptions' . "\0" . 'price_paid'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\PlannedCleaningOptions' . "\0" . 'id', '' . "\0" . 'App\\Entity\\PlannedCleaningOptions' . "\0" . 'planned_cleaning_id', '' . "\0" . 'App\\Entity\\PlannedCleaningOptions' . "\0" . 'option_id', '' . "\0" . 'App\\Entity\\PlannedCleaningOptions' . "\0" . 'price_paid'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PlannedCleaningOptions $proxy) {
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
    public function getPlannedCleaningId(): ?\App\Entity\PlannedCleaning
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlannedCleaningId', []);

        return parent::getPlannedCleaningId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlannedCleaningId(?\App\Entity\PlannedCleaning $planned_cleaning_id): \App\Entity\PlannedCleaningOptions
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlannedCleaningId', [$planned_cleaning_id]);

        return parent::setPlannedCleaningId($planned_cleaning_id);
    }

    /**
     * {@inheritDoc}
     */
    public function getOptionId(): ?\App\Entity\Option
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOptionId', []);

        return parent::getOptionId();
    }

    /**
     * {@inheritDoc}
     */
    public function setOptionId(?\App\Entity\Option $option_id): \App\Entity\PlannedCleaningOptions
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOptionId', [$option_id]);

        return parent::setOptionId($option_id);
    }

    /**
     * {@inheritDoc}
     */
    public function getPricePaid(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPricePaid', []);

        return parent::getPricePaid();
    }

    /**
     * {@inheritDoc}
     */
    public function setPricePaid(float $price_paid): \App\Entity\PlannedCleaningOptions
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPricePaid', [$price_paid]);

        return parent::setPricePaid($price_paid);
    }

}