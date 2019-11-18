<?php
  
  /** Declare page config array */
  $pageconfig = [
    "pagetitle" => "Dashboard",
    "navactive" => "dashboard"
  ];

  require_once dirname(__DIR__)."/config/initialize.php";
  require_once dirname(__FILE__)."/layouts/header.php";
  require_once dirname(__FILE__)."/layouts/navbar.php";

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
                  <div class="card">
                    <div class="card-body">
                      ..
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