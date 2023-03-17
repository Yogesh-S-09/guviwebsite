// Retrieve the session token from local storage
var sessionToken = localStorage.getItem('sessionToken');
try {
  var id = window.atob(window.atob(sessionToken));
}
catch(error){var id = -1}

// Send a request to the server to authenticate the user and retrieve their profile information
$.ajax({
  url: '../php/profile.php',
  type: 'POST',
  data: {'id': id},
  success: function(data) {
    //$("#msg").html(data);
    //If the user is authenticated, display their profile information
    var data = JSON.parse(data);
    if (data.success) {
      $('#name').text(data.name);
      $('#email').text(data.email);
      // $('#age').text(response.age);
      // $('#dob').text(response.dob);
      // $('#contact').text(response.contact);
    } else {
      // If the user is not authenticated, redirect to the login page
      window.location.href = 'login.html';
    }
  }
});