<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>gragsna.de</h1>
    <form action="registrieren.php" method="post">
        username: <input type="text" name="register_username"><br>
        password: <input type="text" name="register_password"><br>
        <input type="submit" name="register_submit" value="registrieren">
    </form>

    <form action="anmeldung.php" method="post">
        username: <input type="text" name="anmeldung_username"><br>
        password: <input type="text" name="anmeldung_password"><br>
        <input type="submit" name="register_submit" value="registrieren">
    </form> 
</body>
</html>
