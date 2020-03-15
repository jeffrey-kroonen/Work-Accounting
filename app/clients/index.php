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

  $clients = Client::all();

?>

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        
        <div class="msg mb-2" style="display: none;"></div>
        
        <div class="card shadow border-none">
          <div class="card-body">
            <div class="h3 text-secondary">
              Klanten
            </div>
            <div class="card-content">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-secondary">NAAM</th>
                    <th></th>
                  </tr> 
                </thead>
                <tbody>
                  <?php
                    if (!empty($clients)) {
                      foreach ($clients as $client) {
                  ?>
                  <tr class="text-muted">
                    <td><?= $client->name; ?></td>
                    <td class="text-right">
                      <a href="/clients/timeregistration.php?id=<?= $client->id; ?>" class="text-muted"><i class="far fa-clock mr-2"></i></a>
                      <a href="/clients/client.php?id=<?= $client->id; ?>" class="text-muted"><i class="far fa-edit mr-2"></i></a>
                      <?php
                        if (Guard::role("administrator")) {
                      ?>
                      <i class="fas fa-trash delete-client" data-id="<?= $client->id; ?>"></i>
                      <?php
                        }
                      ?>
                    </td>
                  </tr>
                  <?php
                      }
                    }
                  ?>
                </tbody>
              </table>
              <button type="button" class="btn btn-light" id="add-client-button"><i class="fas fa-plus-circle text-secondary"></i> Nieuw</button>
              <div id="add-client-modal-append"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  require_once dirname(__DIR__)."/layouts/footer.php";
?>