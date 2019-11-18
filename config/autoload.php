<?php

  spl_autoload_register(function ($mixed) {
    
    $path = dirname(__DIR__)."/source/".strtolower($mixed)."/".strtolower($mixed).".php";
    
    if (file_exists($path)) {
      require_once ucfirst($path);
    } else {
      echo "File of class or interface $mixed not found";
    }
    
  });