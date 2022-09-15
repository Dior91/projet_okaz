<?php

class Store{
    
    private $id;
    private $store_name;
    private $store_address;
    private $store_city;
    private $store_postal_code;
    private $store_country;
    private $store_region;
    private $store_telephone;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of store_name
     */ 
    public function getStore_name()
    {
        return $this->store_name;
    }

    /**
     * Set the value of store_name
     *
     * @return  self
     */ 
    public function setStore_name($store_name)
    {
        $this->store_name = $store_name;

        return $this;
    }

    /**
     * Get the value of store_address
     */ 
    public function getStore_address()
    {
        return $this->store_address;
    }

    /**
     * Set the value of store_address
     *
     * @return  self
     */ 
    public function setStore_address($store_address)
    {
        $this->store_address = $store_address;

        return $this;
    }

    /**
     * Get the value of store_city
     */ 
    public function getStore_city()
    {
        return $this->store_city;
    }

    /**
     * Set the value of store_city
     *
     * @return  self
     */ 
    public function setStore_city($store_city)
    {
        $this->store_city = $store_city;

        return $this;
    }

    /**
     * Get the value of store_postal_code
     */ 
    public function getStore_postal_code()
    {
        return $this->store_postal_code;
    }

    /**
     * Set the value of store_postal_code
     *
     * @return  self
     */ 
    public function setStore_postal_code($store_postal_code)
    {
        $this->store_postal_code = $store_postal_code;

        return $this;
    }

    /**
     * Get the value of store_country
     */ 
    public function getStore_country()
    {
        return $this->store_country;
    }

    /**
     * Set the value of store_country
     *
     * @return  self
     */ 
    public function setStore_country($store_country)
    {
        $this->store_country = $store_country;

        return $this;
    }

    /**
     * Get the value of store_region
     */ 
    public function getStore_region()
    {
        return $this->store_region;
    }

    /**
     * Set the value of store_region
     *
     * @return  self
     */ 
    public function setStore_region($store_region)
    {
        $this->store_region = $store_region;

        return $this;
    }

    /**
     * Get the value of store_telephone
     */ 
    public function getStore_telephone()
    {
        return $this->store_telephone;
    }

    /**
     * Set the value of store_telephone
     *
     * @return  self
     */ 
    public function setStore_telephone($store_telephone)
    {
        $this->store_telephone = $store_telephone;

        return $this;
    }
}
