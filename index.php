<?php
session_start();
?>

<?php
if(isset($_POST['anmeldung_submit'])){
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    $user_username = $_POST['anmeldung_username'];
    $user_password = $_POST['anmeldung_password'];
    $_SESSION['session_username'] = $user_username;

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
                $_SESSION["in"] = "yes";
                header("Location: ");
                exit();
            }
            else{
                echo '<div class="fehler"><p>Username und Passwort stimmen nicht überein. Versuchen sie es erneut. </p></div>';
            }
        }
	} else {
        	echo '<div class="fehler"><p>"Username und Passwort stimmen nicht überein. Versuchen sie es erneut. </p></div>';
    	}

    	$conn->close();
	}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Homepage</title>
</head>
<body>
    <h1>gragsna.de</h1>
    <div>
        <div class="registrierung">
            <form action="sheet/registrieren.php" method="post">
                <h3>Registrieren</h3>
                <div class="ohne">username:</div><input type="text" name="register_username"><br>
                <div class="ohne">password:</div><input type="text" name="register_password" autocomplete="off"><br>
                <input type="submit" name="register_submit" value="registrieren">
            </form>
        </div>

        <div class="anmeldung">
            <form action="" method="post">
                <h3>Anmeldung</h3>
                <div class="ohne">username:</div><input type="text" name="anmeldung_username"><br>
                <div class="ohne">password:</div><input type="text" name="anmeldung_password" autocomplete="off"><br>
                <input type="submit" name="anmeldung_submit" value="anmelden">
            </form>
        </div>
    </div>
</body>
</html>
