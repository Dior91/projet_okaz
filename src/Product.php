<?php

class Product {
    private $id;
    private $name;
    private $image;
    private $description;
    private $product_condition;
    private $dimensions;
    private $color;
    private $price;
    private $availability;
    private $id_dda_product_category;
    private $id_dda_stores;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of product_condition
     */ 
    public function getProduct_condition()
    {
        return $this->product_condition;
    }

    /**
     * Set the value of product_condition
     *
     * @return  self
     */ 
    public function setProduct_condition($product_condition)
    {
        $this->product_condition = $product_condition;

        return $this;
    }

    /**
     * Get the value of dimensions
     */ 
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Set the value of dimensions
     *
     * @return  self
     */ 
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of availability
     */ 
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set the value of availability
     *
     * @return  self
     */ 
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get the value of id_dda_product_category
     */ 
    public function getId_dda_product_category()
    {
        return $this->id_dda_product_category;
    }

    /**
     * Get the value of id_dda_stores
     */ 
    public function getId_dda_stores()
    {
        return $this->id_dda_stores;
    }
}