<?php

  class User extends Model {
    
    protected static $table = "users";
    public $id;
    public $name;
    public $email;
    public $phonenumber;
    protected $password;
    public $remembter_token;
    public $status;
    public $role;
    
    public function __construct($init = null)
    {
      if (is_array($init)) {
        foreach ($init as $column => $value) {
          $this->$column = $value;
        }
      }
    }
    
  }