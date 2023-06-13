<?php
    session_start();
    if(isset($_SESSION["in"])){
?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <link rel="stylesheet" href="profilStyle.css">
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Document</title>
            </head>
            <body>
                <div class="top">
                    <h1>gragsna.de</h1>
                    <h3>eingeloggt als: <?=$_SESSION['session_username'] ?></h3>
                </div>

                <div class="dropdown">
                    <button class="dropbtn">Menü</button>
                    <div class="dropdown-content">
			<a href="./index.php">Profil</a>
                        <a href="./suche.php">Suchen</a>
                        <a href="./upSQL.php">Hochladen</a>
                    </div>
                </div>
            </body>
        </html>
<?php
    }else{
        echo 'nanana. anmelden bevor du hier her darfs';
        echo $_SESSION["in"];
    }
?>
