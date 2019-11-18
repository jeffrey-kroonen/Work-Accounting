$(document).ready(function() {
  
  /** add client modal trigger */
  $(document).on("click", "#add-client-button", function() {
    
    $("#add-client-modal-append").load("/clients/add-client-modal.php", function() {
      $("#add-client-modal-box").modal("show");
    });
    
  });
  
  /** submit form to add client */
  $(document).on("submit", "#add-client-form", function(e) {
    
    e.preventDefault();
    
    $.post("/handlers/client/create.php", $(this).serialize(), function(res) {
      var msg;

      if (res == "empty") {
        msg = "Niet alle velden zijn ingevuld.";
      } else if (res == "exists") {
        msg = "De klant bestaat al.";
      } else if (res == "phonenumber") {
        msg = "Het telefoonnummer is ongeldig.";
      } else if (res == "success") {
        window.location.reload();
      } else {
        msg = "Er is iets misgegaan.";
      }
      
      if (msg.length > 0) {
        $(".msg-modal").addClass("alert alert-danger");
        $(".msg-modal").slideDown();
        $(".msg-modal").html(msg);
      }
      
    });
    
  });
  
  /** submit form to edit client */
  $(document).on("submit", "#edit-client-form", function(e) {
    
    e.preventDefault();
    
    $.post("/handlers/client/edit.php", $(this).serialize(), function(res) {
      var msg;
      console.log(res);
      if (res == "empty") {
        msg = "Niet alle velden zijn ingevuld.";
        $(".msg").addClass("alert alert-danger");
      } else if (res == "phonenumber") {
        msg = "Het telefoonnummer is ongeldig.";
        $(".msg").addClass("alert alert-danger");
      } else if (res == "does not exists") {
          msg = "De klant bestaat niet.";
        $(".msg").addClass("alert alert-danger");
      } else if (res == "success") {
        msg = "De bewerking is doorgevoerd.";
        $(".msg").removeClass("alert-danger");
        $(".msg").addClass("alert alert-success");
      } else {
        msg = "Er is iets misgegaan.";
        $(".msg").addClass("alert alert-danger");
      }
      
      if (msg.length > 0) {
        $(".msg").hide();
        $(".msg").slideDown();
        $(".msg").html(msg);
      }
      
    });
    
  });
  
  /** delete client */
  $(document).on("click", ".delete-client", function(e) {
    e.preventDefault();
    
    var id = $(this).data("id");
    
    if (confirm("Weet u zeker dat u deze klant wilt verwijderen?")) {
      $.post("/handlers/client/delete.php", { id }, function(res) {
        var msg;

        if (res == "empty") {
          msg = "Niet alle velden zijn ingevuld.";
        } else if (res == "does not exists") {
          msg = "De klant bestaat niet.";
        } else if (res == "success") {
          window.location.reload();
        } else {
          msg = "Er is iets misgegaan.";
        }

        if (msg.length > 0) {
          $(".msg").hide();
          $(".msg").addClass("alert alert-danger");
          $(".msg").slideDown();
          $(".msg").html(msg);
        }

      });
    }
    
  });
  
});