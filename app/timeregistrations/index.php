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

  $registrations = TimeRegistration::where(["user_id" => $_SESSION["user_id"]]);
?>

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
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
                  ?>
                  <tr class="text-muted">
                    <td><?= ucwords(strtolower(Client::find($registration->client_id)->name)); ?></td>
                    <td><?= $registration->title; ?></td>
                    <td class="text-right">
                      <i class="fas fa-trash delete-client" data-id="<?= $registration->id; ?>"></i>
                    </td>
                  </tr>
                  <?php
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
  require_once dirname(__DIR__)."/layouts/footer.php";
?>