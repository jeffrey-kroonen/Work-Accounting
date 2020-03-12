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

  $client = Client::find($id);

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
                    <td class="text-right"><i class="fas fa-trash delete-timeregistration" data-id="<?= $registration->id; ?>"></i></td>
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