<?php
  
  /** Declare page config array */
  $pageconfig = [
    "pagetitle" => "Login",
    "javascript" => [
      "authentication"
    ]
  ];

  require_once dirname(__DIR__, 2)."/config/initialize.php";
  require_once dirname(__DIR__)."/layouts/header.php";
  require_once dirname(__DIR__)."/layouts/navbar.php";

  if (Guard::authenticated()) header("Location:/");

?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        
        <div class="msg mb-2" style="display: none;"></div>
        
        <div class="card shadow border-none">
          <div class="card-body">
            <div class="h3 text-secondary">
              Login
            </div>
            <div class="card-content">
              
              <form id="login-form">
                <div class="form-group">
                  <label for="email">E-mail adres</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Wachtwoord</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Login</button>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>