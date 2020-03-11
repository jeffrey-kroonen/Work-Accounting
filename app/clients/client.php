<?php
  
  /** Declare page config array */
  $pageconfig = [
    "pagetitle" => "Klanten",
    "navactive" => "clients",
    "javascript" => [
      "client"
    ]
  ];

  require_once dirname(__DIR__, 2)."/config/initialize.php";
  require_once dirname(__DIR__)."/layouts/header.php";
  require_once dirname(__DIR__)."/layouts/navbar.php";

  if (!Guard::authenticated()) header("Location:/authentication");

  $id = (isset($_GET["id"]) && !empty($_GET["id"])) ? (int) $_GET["id"] : null;
  if (is_null($id)) die("No valid parameter value.");

  $client = Client::find($id);

?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        
        <div class="msg mb-2" style="display: none;"></div>
        
        <div class="card shadow border-none">
          <div class="card-body">
            <div class="h3 text-secondary">
              <?= $client->name; ?>
            </div>
            <div class="card-content">
              
              <form id="edit-client-form">

                <input type="hidden" name="id" value="<?= $client->id; ?>">
                
                <div class="form-group">
                  <label for="name">Naam</label>
                  <input type="text" name="name" id="name" class="form-control" value="<?= $client->name; ?>" required>
                </div>
                <div class="form-group">
                  <label for="email">E-mail adres</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?= $client->email; ?>" required>
                </div>
                <div class="form-group">
                  <label for="phonenumber">Telefoon</label>
                  <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="<?= $client->phonenumber; ?>" required>
                </div>
                <div class="form-group">
                  <label for="address">Adres</label>
                  <input type="text" name="address" id="address" class="form-control" value="<?= $client->address; ?>" required>
                </div>
                <div class="form-group">
                  <label for="city">Stad</label>
                  <input type="text" name="city" id="city" class="form-control" value="<?= $client->city; ?>" required>
                </div>
                <div class="form-group">
                  <label for="zipcode">Postcode</label>
                  <input type="text" name="zipcode" id="zipcode" class="form-control" value="<?= $client->zipcode; ?>" required>
                </div>

                <button type="submit" class="btn btn-light">Opslaan</button>
                
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>