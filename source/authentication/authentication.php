<?php

  class Authentication extends User {
    
    public function register() : void
    {
      //
    }
    
    public function passwordVerify(string $password) : bool
    {
      return password_verify($password, $this->password);
    }
    
    public function login() : void
    {
      session_regenerate_id();
      $_SESSION["user_id"] = $this->id;
      $_SESSION["role"] = $this->role;
      $_SESSION["authenticated"] = "true";
    }
    
    public function logout() : void
    {
      session_unset();
      session_destroy();
    }
    
  }