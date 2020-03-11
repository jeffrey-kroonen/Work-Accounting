<?php

  require_once dirname(__DIR__, 3)."/config/initialize.php";

  if (Guard::authenticated()) die("You are already logged in.");

  $email = !empty($_POST["email"]) ? $_POST["email"] : null;
  $password = !empty($_POST["password"]) ? $_POST["password"] : null;

  if (
      !is_null($email) &&
      !is_null($password)
  ) {
    
    $user = Authentication::find(["email" => $email]);

    if ($user) {
      
      if ($user->passwordVerify($password)) {
        
        $user->login();
        echo "success";
        
      } else {
        echo "password";
      }
      
    } else {
      echo "does not exists";
    }
    
  } else {
    echo "empty";
  }