<?php

  class Client extends Model {
    
    protected static $table = "clients";
    public $id;
    public $name;
    public $email;
    public $phonenumber;
    public $address;
    public $city;
    public $zipcode;
    public $status;
    
    public function __construct($init = null)
    {
      if (is_array($init)) {
        foreach ($init as $column => $value) {
          $this->$column = $value;
        }
      }
    }
    
  }