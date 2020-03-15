<?php
  
  /** Declare page config array */
  $pageconfig = [
    "pagetitle" => "Tijd registratie",
    "navactive" => "timeregistration",
    "javascript" => [
      "timeregistration"
    ]
  ];

  require_once dirname(__DIR__, 2)."/config/initialize.php";
  require_once dirname(__DIR__)."/layouts/header.php";
  require_once dirname(__DIR__)."/layouts/navbar.php";

  if (!Guard::authenticated()) header("Location:/authentication");

  /**
   * Time registrations intended for Users.
   */

  if (Guard::role("user")) {

  $registrations = TimeRegistration::where(["user_id" => $_SESSION["user_id"]]);
?>

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="msg mb-2" style="display: none;"></div>

        <div class="card shadow border-none">
          <div class="card-body">
            <div class="h3 text-secondary">
              Tijd registratie
            </div>
            <div class="card-content">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-secondary">KLANT</th>
                    <th class="text-secondary">TITEL</th>
                    <th></th>
                  </tr> 
                </thead>
                <tbody>
                  <?php
                    if (!empty($registrations)) {
                      foreach ($registrations as $registration) {
                        if ($registration->is_deleted == 0) {
                  ?>
                  <tr class="text-muted">
                    <td><?= ucwords(strtolower(Client::find($registration->client_id)->name)); ?></td>
                    <td><?= $registration->title; ?></td>
                    <td class="text-right">
                      <i class="fas fa-trash user-delete-timeregistration" data-id="<?= $registration->id; ?>"></i>
                    </td>
                  </tr>
                  <?php
                        }
                      }
                    }
                  ?>
                </tbody>
              </table>

              <button type="button" class="btn btn-light" id="add-timeregistration-button"><i class="fas fa-plus-circle text-secondary"></i> Nieuw</button>
              <div id="add-timeregistration-modal-append"></div>
              
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

    $registrations = TimeRegistration::all();

?>
  
    <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="msg mb-2" style="display: none;"></div>

        <div class="card shadow border-none">
          <div class="card-body">
            <div class="h3 text-secondary">
              Beheer tijd registratie
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-secondary">GEBRUIKER</th>
                      <th class="text-secondary">KLANT</th>
                      <th class="text-secondary">TITEL</th>
                      <th class="text-secondary">DATUM</th>
                      <th class="text-secondary"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach ($registrations as $registration) {
                  ?>
                    <tr <?= $registration->is_deleted == 1 ? "class='bg-danger text-white' title='De tijd registratie is verwijderd door de gebruiker.'" : "class='text-muted'"; ?>>
                      <td><?= User::find($registration->user_id)->name; ?></td>
                      <td><?= Client::find($registration->client_id)->name ?></td>
                      <td><?= $registration->title; ?></td>
                      <td><?= date("d-m-Y", strtotime($registration->created_at)); ?></td>
                      <td class="text-right text-muted">
                        <i class="far fa-edit mr-2 edit-timeregistration-button" data-id="<?= $registration->id; ?>"></i>
                        <i class="fas fa-trash delete-timeregistration" data-id="<?= $registration->id; ?>"></i>
                      </td>
                    </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>

              <div id="edit-timeregistration-modal-append"></div>

            </div>
          </div>
        </div>

        </div>
      </div>
    </div>

<?php

  }

  require_once dirname(__DIR__)."/layouts/footer.php";

?>