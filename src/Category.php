<?php 

class Category{
    private $id;
    private $name_category;
    private $image_category;
    private $description_category;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name_category
     */ 
    public function getName_category()
    {
        return $this->name_category;
    }

    /**
     * Set the value of name_category
     *
     * @return  self
     */ 
    public function setName_category($name_category)
    {
        $this->name_category = $name_category;

        return $this;
    }

    /**
     * Get the value of image_category
     */ 
    public function getImage_category()
    {
        return $this->image_category;
    }

    /**
     * Set the value of image_category
     *
     * @return  self
     */ 
    public function setImage_category($image_category)
    {
        $this->image_category = $image_category;

        return $this;
    }

    /**
     * Get the value of description_category
     */ 
    public function getDescription_category()
    {
        return $this->description_category;
    }

    /**
     * Set the value of description_category
     *
     * @return  self
     */ 
    public function setDescription_category($description_category)
    {
        $this->description_category = $description_category;

        return $this;
    }
}

