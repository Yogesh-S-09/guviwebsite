$(document).ready(function() {
    $("#signup-button").click(function() {
      var username = $("#username").val();
      var password = $("#password").val();
      var email = $("#email").val();
  
      $.ajax({
        type: "POST",
        url: "../php/register.php",
        data: {
          username: username,
          password: password,
          email: email
        },
        success: function(data) {
          if( data == 'Email already exists.'){

            $("#signup-message").html(data);
          }else window.location.replace("../login.html");

        }
      });
    });
  });
  