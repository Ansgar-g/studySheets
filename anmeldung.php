<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$user_username = $_POST['anmeldung_username'];
$user_password = $_POST['anmeldung_password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT pwd FROM MyUsers WHERE username='$user_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($user_password == $row['pwd']){

            echo 'logged in';
        }
        else{
            echo "Username und Passwort stimmen nicht überein. Versuchen sie es erneut.";
        }
    }
} else {
    echo "Username und Passwort stimmen nicht überein. Versuchen sie es erneut.";
}
$conn->close();
?> 
