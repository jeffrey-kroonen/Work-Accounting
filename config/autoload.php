<?php

  spl_autoload_register(function ($mixed) {
    
    $path = dirname(__DIR__)."/source/".ucfirst($mixed)."/".ucfirst($mixed).".php";
    
    if (file_exists($path)) {
      require_once $path;
    } else {
      echo "File of class or interface $mixed not found";
    }
    
  });