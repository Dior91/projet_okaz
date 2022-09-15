<?php

class Order {
    private $id;
    private $payment_amount;
    private $payment_type;
    private $delivery_address;
    private $order_date;
    private $cart_id;
    private $id_dda_users;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of payment_amount
     */ 
    public function getPayment_amount()
    {
        return $this->payment_amount;
    }

    /**
     * Get the value of payment_type
     */ 
    public function getPayment_type()
    {
        return $this->payment_type;
    }


    /**
     * Get the value of delivery_adress
     */ 
    public function getDelivery_address()
    {
        return $this->delivery_address;
    }


    /**
     * Get the value of order_date
     */ 
    public function getOrder_date()
    {
        return $this->order_date;
    }


    /**
     * Get the value of cart_id
     */ 
    public function getCart_id()
    {
        return $this->cart_id;
    }

    /**
     * Get the value of id_dda_users
     */ 
    public function getId_dda_users()
    {
        return $this->id_dda_users;
    }
}