$(document).ready(function() {
   
  /** add time registration modal trigger */
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

  /** edit time registration modal triger */
  $(document).on("click", ".edit-timeregistration-button", function(e) {

    let id = $(this).data("id");

    $("#edit-timeregistration-modal-append").load("/timeregistrations/edit-timeregistration-modal.php?id=" + id, function() {
      $("#edit-timeregistration-modal-box").modal("show");
    });

  });
  
  /**  submit time registration form */
  $(document).on("submit", "#add-timeregistration-form", function(e) {

    e.preventDefault();

    $.post("/handlers/timeregistration/create.php", $(this).serialize(), function(res) {
      var msg;

      if (res.indexOf("not found") !== -1) {
        msg = "De tijd registratie bestaat niet.";
      } else if (res == "empty") {
        msg = "Niet alle velden zijn ingevuld.";
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

  });

  /**  submit time registration edit form */
  $(document).on("submit", "#edit-timeregistration-form", function(e) {

    e.preventDefault();

    $.post("/handlers/timeregistration/update.php", $(this).serialize(), function(res) {
      var msg;

      if (res.indexOf("not found") !== -1) {
        msg = "De tijd registratie bestaat niet.";
      } else if (res == "empty") {
        msg = "Niet alle velden zijn ingevuld.";
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

  });
    
  /** delete time registration for user */
  $(document).on("click", ".user-delete-timeregistration", function(e) {
    let id = $(this).data("id");

    if(confirm("Weet u zeker dat u deze registratie wilt verwijderen?")) {
      $.post("/handlers/timeregistration/userDelete.php", {id}, function(res) {
        var msg;
        console.log(res);
        if (res.indexOf("not found") !== -1) {
          msg = "De tijd registratie bestaat niet.";
        } else if (res == "empty") {
          msg = "Niet alle verplichte velden zijn verstuurd.";
        } else if (res == "success") {
          window.location.reload();
        } else {
          msg = "Er is iets misgegaan.";
        }
  
        if (msg.length > 0) {
          $("html, body").animate({ scrollTop: 0 }, "slow");
          $(".msg").hide();
          $(".msg").addClass("alert alert-danger");
          $(".msg").slideDown();
          $(".msg").html(msg);
        }
      });
    }
  });

  /** Delete time registration for administrator */
  $(document).on("click", ".delete-timeregistration", function(e) {
    let id = $(this).data("id");

    if(confirm("Weet u zeker dat u deze registratie wilt verwijderen?")) {
      $.post("/handlers/timeregistration/delete.php", {id}, function(res) {
        var msg;
        console.log(res);
        if (res.indexOf("not found") !== -1) {
          msg = "De tijd registratie bestaat niet.";
        } else if (res == "empty") {
          msg = "Niet alle verplichte velden zijn verstuurd.";
        } else if (res == "success") {
          window.location.reload();
        } else {
          msg = "Er is iets misgegaan.";
        }
  
        if (msg.length > 0) {
          $("html, body").animate({ scrollTop: 0 }, "slow");
          $(".msg").hide();
          $(".msg").addClass("alert alert-danger");
          $(".msg").slideDown();
          $(".msg").html(msg);
        }
      });
    }
  });

  /** Undo deleted time registration for administrators */
  $(document).on("click", ".undo-timeregistration-deletion", function(e) {
    let id = $(this).data("id");

    if (confirm("Weet u zeker dat de verwijdering van deze tijd registratie ongedaan wilt maken?")) {
      $.post("/handlers/timeregistration/undoDeletion.php", {id}, function(res) {
        var msg;
        console.log(res);
        if (res.indexOf("not found") !== -1) {
          msg = "De tijd registratie bestaat niet.";
        } else if (res == "empty") {
          msg = "Niet alle verplichte velden zijn verstuurd.";
        } else if (res == "success") {
          window.location.reload();
        } else {
          msg = "Er is iets misgegaan.";
        }
  
        if (msg.length > 0) {
          $("html, body").animate({ scrollTop: 0 }, "slow");
          $(".msg").hide();
          $(".msg").addClass("alert alert-danger");
          $(".msg").slideDown();
          $(".msg").html(msg);
        }
      });
    }
  });
  
  
});