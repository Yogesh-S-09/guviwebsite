$(document).ready(function login() {
    $("#login-button").click(function() {
        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax({
            url: "../php/login.php",
            method: "POST",
            data: {email: email, password: password},
            success: function(data) {
                console.log(data);
                var data = JSON.parse(data);
                if(data.msg=="Login successful"){
                    var sessionToken = window.btoa(window.btoa(data.id));
                    console.log(sessionToken);
                    console.log(window.atob(window.atob(sessionToken)));
                    localStorage.setItem('sessionToken', sessionToken);
                    window.location.replace("profile.html");
                }else{
                $("#login-message").html(data.msg);
                }
            }
        });
    });
});
