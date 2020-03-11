<?php
  
  require_once dirname(__DIR__, 2)."/config/initialize.php";

  if (!Guard::authenticated()) header("Location:/authentication");

  $id = (isset($_GET["id"]) && !empty($_GET["id"])) ? (int) $_GET["id"] : null;
  if (!is_null($id)) $client_get = Client::find($id);

  $clients = Client::all();
  
?>

<!-- Modal -->
<div class="modal fade" id="add-timeregistration-modal-box" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Tijd registratie toevoegen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-timeregistration-form">
        
        <div class="modal-body">

          <div class="msg-modal mb-2" style="display: none;"></div>
        
          <div class="form-group">
            <label for="client">Klant</label>
            <?php
              if (!is_null($id)) {
            ?>
              <input type="hidden" name="client_id" value="<?= $id; ?>">
            <?php
              }
            ?>
            <select name="client_id" id="client" class="form-control" <?= !is_null($id) ? "disabled" : "" ; ?> required>
              <option value="" selected disabled>Selecteer een klant..</option>
              <?php
                foreach ($clients as $client) {
              ?>
                <option <?= !is_null($id) ?  ($client_get->id == $client->id) ? "selected" : "" : "" ?> value="<?= $client->id; ?>"><?= $client->name; ?></option>
              <?php
                }
              ?>
            </select>
          </div>
          
          <div class="form-group">
            <label for="client">Type</label>
            <select name="type" id="client" class="form-control" required>
              <option value="" selected disabled>Selecteer een type..</option>
              <?php
                foreach (TimeRegistration::TYPES as $type) {
              ?>
                <option value="<?= $type; ?>"><?= $type ?></option>
              <?php
                }
              ?>
            </select>
          </div>
          
          <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" name="title" id="title" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea name="description" id="description" rows="5" class="form-control" required></textarea>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="start_datetime">Van</label>
              <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input"  name="start_datetime" id="start_datetime" data-target="#datetimepicker2" required>
                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="end_datetime">Tot</label>
              <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input"  name="end_datetime" id="end_datetime" data-target="#datetimepicker1" required>
                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
          <button type="submit" class="btn btn-light">Opslaan</button>
        </div>
        
      </form>
    </div>
  </div>
</div>


<?php

  $pageconfigfooter = [
    "javascript" => [
      "datetimepicker-master/datetimepicker.jquery-full.js",
    ]
  ];

?>

<script type="text/javascript">
  $(function () {
      $('#datetimepicker1, #datetimepicker2').datetimepicker({
        format: "DD/MM/YYYY HH:mm",
        locale: "nl"
      });
  });
</script>
