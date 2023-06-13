<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
    <h1>Finde</h1>

    <?php
    

    $sql_part = "";

    $file_name = $_POST['file_name'];
    $school = $_POST['select_school'];
    $sub = $_POST['select_subject'];
    $topic = $_POST['thema'];
    $teacher = $_POST['teacher'];
    $user = $_POST["user"];

    $check = [$file_name, $sub, $topic, $teacher, $user];
    $check_str = ["file_name", "sub", "topic", "teacher", "user"];

    for($i = 0; $i < count($check); $i++){
        if($check[$i] != ""){

            $sql_part .= " AND $check_str[$i] = '$check[$i]'";
        }
    }

    $sql = "SELECT * FROM MyFiles WHERE school = '$school'";
    $sql .= $sql_part;

    //echo $sql;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    ?>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Schule</th>
            <th>Fach</th>
            <th>Thema</th>
            <th>Lehrer</th>
            <th>User</th>
        </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <th>
                    <a href="https://gragsna.de/sheet/uploads/<?php echo $row['file_name']; ?>"><?php echo $row['file_name']; ?></a>
                </th>
                <th><?php echo $row['school']; ?></th>
                <th><?php echo $row['sub']; ?></th>
                <th><?php echo $row['topic']; ?></th>
                <th><?php echo $row['teacher']; ?></th>
                <th><?php echo $row['user']; ?></th>
            </tr>
        <?php
    }
    } else {
    echo "0 results";
    }
    ?>
    </table>

</body>
</html>

<?php
    $conn->close();
?>