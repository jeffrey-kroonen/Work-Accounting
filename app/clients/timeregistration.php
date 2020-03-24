<?php
  
  /** Declare page config array */
  $pageconfig = [
    "pagetitle" => "Klanten",
    "navactive" => "clients",
    "javascript" => [
      "client",
      "timeregistration"
    ]
  ];

  require_once dirname(__DIR__, 2)."/config/initialize.php";
  require_once dirname(__DIR__)."/layouts/header.php";
  require_once dirname(__DIR__)."/layouts/navbar.php";

  if (!Guard::authenticated()) header("Location:/authentication");
  
  $id = (isset($_GET["id"]) && !empty($_GET["id"])) ? (int) $_GET["id"] : null;
  if (is_null($id)) die("No valid parameter value.");

  /** 
   * Time registrations intended for Users.
   */

  $client = Client::find($id);

  if (Guard::role("user")) {

  $registrations = TimeRegistration::where(["client_id" => $id, "is_deleted" => 0]);

?>

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        
        <div class="msg mb-2" style="display: none;"></div>
        
        <div class="card shadow border-none">
          <div class="card-body">
            <div class="h3 text-secondary">
              <?= $client->name ?>
            </div>
            <div class="card-content">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-secondary">TITEL</th>
                    <th class="text-secondary">BESCHRIJVING</th>
                    <th></th>
                  </tr> 
                </thead>
                <tbody>
                  <?php
                    if (!empty($registrations)) {
                      foreach ($registrations as $registration) {
                  ?>
                  <tr class="text-muted">
                    <td><?= $registration->title; ?></td>
                    <td title="<?= $registration->description; ?>"><?= (strlen($registration->description) > 39) ? substr($registration->description, 0, 39)."..." : substr($registration->description, 0, 39); ?></td>
                    <td class="text-right">
                      <i class="far fa-edit mr-2 edit-timeregistration-button" data-id="<?= $registration->id; ?>"></i>
                      <i class="fas fa-trash <?= Guard::role("user") ? "user-" : ""; ?>delete-timeregistration" data-id="<?= $registration->id; ?>"></i>
                    </td>
                  </tr>
                  <?php
                      }
                    }
                  ?>
                </tbody>
              </table>
              <button type="button" class="btn btn-light" id="add-timeregistration-button"><i class="fas fa-plus-circle text-secondary"></i> Nieuw</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

  }

  /**
   * Time registrations management panel.
   * 
   * Intended for Administrators.
   */

  if (Guard::role("administrator")) {

    $registrations = TimeRegistration::where(["client_id" => $id]);
  
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        
        <div class="msg mb-2" style="display: none;"></div>
        
        <div class="card shadow border-none">
          <div class="card-body">
            <div class="h3 text-secondary">
              <?= $client->name ?>
            </div>
            <div class="card-content">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-secondary">GEBRUIKER</th>
                    <th class="text-secondary">TITEL</th>
                    <th class="text-secondary">BESCHRIJVING</th>
                    <th></th>
                  </tr> 
                </thead>
                <tbody>
                  <?php
                    if (!empty($registrations)) {
                      foreach ($registrations as $registration) {
                  ?>
                  <tr <?= $registration->is_deleted == 1 ? "class='bg-danger text-white' title='De tijd registratie is verwijderd door de gebruiker.'" : "class='text-muted'"; ?>>
                  <td><?= User::find($registration->user_id)->name; ?></td>
                    <td><?= $registration->title; ?></td>
                    <td title="<?= $registration->description; ?>"><?= (strlen($registration->description) > 39) ? substr($registration->description, 0, 39)."..." : substr($registration->description, 0, 39); ?></td>
                    <td class="text-right">
                      <i class="far fa-edit mr-2 edit-timeregistration-button" data-id="<?= $registration->id; ?>"></i>
                      <i class="fas fa-trash <?= Guard::role("user") ? "user-" : ""; ?>delete-timeregistration" data-id="<?= $registration->id; ?>"></i>
                    </td>
                  </tr>
                  <?php
                      }
                    }
                  ?>
                </tbody>
              </table>
              <button type="button" class="btn btn-light" id="add-timeregistration-button"><i class="fas fa-plus-circle text-secondary"></i> Nieuw</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

  }

?>

<div id="add-timeregistration-modal-append"></div>

<div id="edit-timeregistration-modal-append"></div>

<?php
  
  require_once dirname(__DIR__)."/layouts/footer.php";

?>