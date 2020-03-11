<?php

  require_once dirname(__DIR__, 3)."/config/initialize.php";

  if (!Guard::authenticated()) die("You are not logged in.");

  Authentication::logout();
  header("Location:/");