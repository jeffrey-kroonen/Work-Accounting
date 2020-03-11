$(document).ready(function() {
  
  $(document).on("submit", "#login-form", function(e) {
    
    e.preventDefault();
    
    $.post("/handlers/authentication/login.php", $(this).serialize(), function(res) {
      let msg;
      
      if (res == "success") {
        location.reload();
      } else if (res == "empty") {
        msg = "Niet alle velden zijn ingevuld.";
      } else if ((res == "password") || (res == "email")) {
        msg = "Ongeldig e-mailadres of wachtwoord";
      }
      
      if (msg.length > 0) {
        $(".msg").addClass("alert alert-danger");
        $(".msg").slideDown();
        $(".msg").html(msg);
      }
      
    });
    
  })
  
});