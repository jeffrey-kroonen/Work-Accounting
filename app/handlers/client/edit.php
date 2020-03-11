<?php

  require_once dirname(__DIR__, 3)."/config/initialize.php";

  if (!Guard::authenticated()) die("No access permitted");

  $id = isset($_POST["id"]) ? (int)$_POST["id"] : null;
  $name = $_POST["name"] ?? null;
  $email = $_POST["email"] ?? null;
  $phonenumber = $_POST["phonenumber"] ?? null;
  $address = $_POST["address"] ?? null;
  $city = $_POST["city"] ?? null;
  $zipcode = $_POST["zipcode"] ?? null;

  if (
    !is_null($name) &&
    !is_null($email) &&
    !is_null($phonenumber) &&
    !is_null($address) &&
    !is_null($city) &&
    !is_null($zipcode)
  ) {
    
    if (preg_match("/^[\d ]*$/", $phonenumber) === 1) {
      
      $client = Client::find($id);
      
      if ($client) {
        
        $client->name = ucwords(strtolower($name));
        $client->email = strtolower($email);
        $client->phonenumber = str_replace(" ", "", $phonenumber);
        $client->address = ucwords(strtolower($address));
        $client->city = ucwords(strtolower($city));
        $client->zipcode = strtoupper($zipcode);
        $client->save();
        echo "success";
        
      } else {
        echo "does not exists";
      }
      
    } else {
      echo "phonenumber";
    }
    
  } else {
    echo "empty";
  }