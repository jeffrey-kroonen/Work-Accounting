<?php
  
  /** Declare page config array */
  $pageconfig = [
    "pagetitle" => "Dashboard",
    "navactive" => "dashboard"
  ];

  require_once dirname(__DIR__)."/config/initialize.php";
  require_once dirname(__FILE__)."/layouts/header.php";
  require_once dirname(__FILE__)."/layouts/navbar.php";

  if (!Guard::authenticated()) header("Location:/authentication");

?>

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow border-none">
          <div class="card-body">
            <div class="h3 text-secondary">
              Dashboard
            </div>

            <div class="card-content">
              <div class="row">

                <div class="col-md-4">
                  <div class="d-flex align-items-center border-right">
                    <div class="d-block mr-2">
                      <i class="fas fa-users fa-2x pr-2 text-muted"></i>
                    </div>
                    <div class="d-block">
                      <div class="text-muted">
                        Klanten
                      </div>
                      <div class="counter">
                        <?= count(Client::all()) ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="d-flex align-items-center border-right">
                    <div class="d-block mr-2">
                    <i class="fas fa-clock fa-2x pr-2 text-muted"></i>
                    </div>
                    <div class="d-block">
                      <div class="text-muted">
                        Tijd registraties
                      </div>
                      <div class="counter">
                        <?= count(TimeRegistration::all()) ?>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  require_once dirname(__FILE__)."/layouts/footer.php";
?>