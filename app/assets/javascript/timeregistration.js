$(document).ready(function() {
   
  /** add timeregistration modal trigger */
  $(document).on("click", "#add-timeregistration-button", function() {
    
    let params = window.location.search.substr(1).split("&");
    let q = "";
    
    for (let i = 0; i < params.length; i++) {

      if (params[i].indexOf("id=") !== -1) {
          let pair = params[i].split("=");
          let key = pair[0];
          let value = pair[1];
          q = "?" + key + "=" + value;
      }
    }

    $("#add-timeregistration-modal-append").load("/timeregistrations/add-timeregistration-modal.php" + q, function() {
      $("#add-timeregistration-modal-box").modal("show");
    });
    
  });
  
  /**  submit timeregistration form */
  $(document).on("submit", "#add-timeregistration-form", function(e) {

    e.preventDefault();

    $.post("/handlers/timeregistration/create.php", $(this).serialize(), function(res) {
      console.log(res);
      /** handler is done, next step is write reponse to the fornt-end */
    });

  });
    
  
  
});