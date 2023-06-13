<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>gragsna.de</h1>
    <form action="ergebnis.php" method="post">

        <div class="select_school">
            <label>Schule auswählen:
                <select name = "select_school">
                    <option>ksf</option>
                </select>
            </label>
        </div>    

        <div class="select_subject">
            <label>Fach auswählen:
                <select name = "select_subject">
                    <option>mathe</option>
                    <option>deutsch</option>
                    <option>englisch</option>
                </select>
            </label>    
        </div>

        <p style="color: green;
                  font-size: 1.5em;">Alle Textfelder sind optional</p>
        <h2>nach Thema suchen:</h2>
        <input type="text" name="thema">

        <h2>Nach Lehrer suchen:</h2>
        <input type="text" name="teacher">

        <h2>Nach Nutzer suchen:</h2>
        <input type="text" name="user">

        <h2>Nach Name der Datei suchen:</h2>
        <input type="text" name="file_name">

        <input type="submit" value="suchen" name="sub">
    </form>
</body>
</html>