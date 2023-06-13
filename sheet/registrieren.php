<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

$user_username = $_POST['register_username'];
$user_password = $_POST['register_password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MyUsers (username, pwd)
VALUES ('$user_username', '$user_password')";

$sql_sel = "SELECT * FROM MyUsers WHERE username = '$user_username'";
$result = $conn->query($sql_sel);

if ($result->num_rows == 0) {
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    echo "Benutzername bereits vergeben";
    echo $result->num_rows;
}

$conn->close();
?> 