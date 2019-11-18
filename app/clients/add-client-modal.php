<!-- Modal -->
<div class="modal fade" id="add-client-modal-box" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Klant toevoegen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-client-form">
        
        <div class="modal-body">

          <div class="msg-modal mb-2" style="display: none;"></div>
          
          <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="email">E-mail adres</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="phonenumber">Telefoon</label>
            <input type="text" name="phonenumber" id="phonenumber" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="address">Adres</label>
            <input type="text" name="address" id="address" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="city">Stad</label>
            <input type="text" name="city" id="city" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="zipcode">Postcode</label>
            <input type="text" name="zipcode" id="zipcode" class="form-control" required>
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