<?php

  class Guard {
    
    public const ROLES = [
      "user",
      "administrator"
    ];
    
    public static function authenticated() : bool
    {
      if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] == "true") {
        return true;
      } else {
        return false;
      }
    }
    
    public static function role(string $preferredRole) : bool
    {
      if (static::authenticated()) {
        if (in_array($preferredRole, self::ROLES)) {
          if ($preferredRole == $_SESSION["role"]) {
            return true;
          } else {
            return false;
          }
        } else {
          return false;
        }
      } else {
        return false; 
      }
    }
    
  }