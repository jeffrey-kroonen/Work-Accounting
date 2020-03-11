<?php

  require_once dirname(__DIR__, 3)."/config/initialize.php";

  if (!Guard::authenticated()) die("No access permitted");

  $user_id = (int) $_SESSION["user_id"];
  $client_id = isset($_POST["client_id"]) ? (int)$_POST["client_id"] : null;
  $type = $_POST["type"] ?? null;
  $title = $_POST["title"] ?? null;
  $description = $_POST["description"] ?? null;
  $start_datetime = $_POST["start_datetime"] ?? null;
  $end_datetime = $_POST["end_datetime"] ?? null;

  if (
      !is_null($client_id) &&
      !is_null($type) &&
      !is_null($title) &&
      !is_null($description) &&
      !is_null($start_datetime) &&
      !is_null($end_datetime)
     ) 
  {

    $user = User::find($user_id);
    
    if ($user) {
      
      /** format start- and enddate to datetime format */
      $start_datetime = new DateTime(str_replace("/", "-", $start_datetime));
      $start_datetime = $start_datetime->format("Y-m-d H:i:s");
      
      $end_datetime = new DateTime(str_replace("/", "-", $end_datetime));
      $end_datetime = $end_datetime->format("Y-m-d H:i:s");
      
      $timeregistration = new TimeRegistration;
      $timeregistration->user_id = $user_id;
      $timeregistration->client_id = $client_id;
      $timeregistration->type = $type;
      $timeregistration->title = $title;
      $timeregistration->description = $description;
      $timeregistration->start_datetime = $start_datetime;
      $timeregistration->end_datetime = $end_datetime;
      $timeregistration->save();
      echo "success";
      
    } else {
      echo "user not found";
    }
    
    
  } else {
    echo "empty";
  }