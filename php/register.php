<?php
// Establish database connection
$conn = require __DIR__ . "/database.php"; 

// Get user input from AJAX POST request
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password_hash = password_hash($password, PASSWORD_DEFAULT);
//Check if email already exists
$sql = sprintf("SELECT * FROM user WHERE email = '%s'",$email);           
$result = $conn->query($sql);
if ($result->num_rows === 0) {
  $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
          
  $stmt = $conn->stmt_init();
  
    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $conn->error);
    }
  
    $stmt->bind_param("sss",
                      $username,
                      $email,
                      $password_hash);
                      
    if ($stmt->execute()) {
        echo("Sign up successful");
        header("Location:../profile.html");
        exit;
        
    } else {
        
      die($conn->error . " " . $conn->errno);
    }
  } else {
  echo "Email already exists.";
}
?>
