<?php
// Establish database connection
$conn = require __DIR__ . "/database.php";

// Get user input from AJAX POST request
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
    
$sql = sprintf("SELECT * FROM user WHERE email = '%s'",$email);
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($user) {
    
    if (password_verify($_POST["password"], $user["password_hash"])) 
    {

        echo json_encode(array("msg"=>"Login successful","id"=>$user["id"]));
    } else {
        echo json_encode(array("msg"=>"Invalid username or password?"));
    }
} else {
    echo json_encode(array("msg"=>"Invalid username or password"));
}
mysqli_close($conn);
?>
