<?php
// Check if the session token is valid and retrieve the user's profile information
// ...
// Establish database connection
$conn = require __DIR__ . "/database.php";

// Get user input from AJAX POST request
$id = mysqli_real_escape_string($conn, $_POST['id']);
    
$sql = sprintf("SELECT * FROM user WHERE id = '%s'",$id);
$result = $conn->query($sql);
$user = $result->fetch_assoc();
// If the user is authenticated, return their profile information in JSON format
if($user){
  $response = array(
    'success' => true,
    'name' => $user['name'],
    'email' => $user['email'],
    // 'age' => $age,
    // 'dob' => $dob,
    // 'contact' => $contact
  );
  echo json_encode($response);
}
else{
  $response = array(
    'success' => false
  );
  echo json_encode($response);
}
?>
