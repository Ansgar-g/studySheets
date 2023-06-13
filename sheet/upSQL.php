<?php

session_start();

if(isset($_POST['submit'])){

    function upload_file(){
        $target_dir = "uploads/";
            
        $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //$target_file = $target_dir . $target_school . $target_subject . $fileName . "-" . $_SESSION['session_username'] . "." . $imageFileType;
        $uploadOk = 1;
    
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                upload_to_db($uploadOk);
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    function upload_to_db($uploadOk){
        $servername = "";
        $username = "";
        $password = "";
        $dbname = "";
        
        $file_name = basename($_FILES["fileToUpload"]["name"]);
        $school = $_POST['select_school'];
        $sub = $_POST['select_subject'];
        $topic = $_POST['thema'];
        $teacher = $_POST['teacher'];
        $user = $_SESSION['session_username'];
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $sql = "INSERT INTO MyFiles (file_name, school, sub, topic, teacher, user)
        VALUES ('$file_name', '$school', '$sub', '$topic', '$teacher', '$user')";
    
        $sql_sel = "SELECT * FROM MyFiles WHERE file_name = '$file_name'";
        $result = $conn->query($sql_sel);
    
        if ($result->num_rows == 0) {
            if ($conn->query($sql) === TRUE && $uploadOk == 1) {
                echo "New record created successfully <br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Dateiname bereits genutzt";
            echo $result->num_rows;
        }
    
        $conn->close();
    }

    upload_file();
}
?> 

<!DOCTYPE html>
<html>
<head>
    <title>hochladen</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>gragsna.de</h1>
    <form action="" method="post" enctype="multipart/form-data">
        
        <div class = "select_file">
            <h2>Datei auswählen:</h2>
            <div class="custom-select">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </div>
        </div>

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

        <h2>Thema:</h2>
        <input type="text" name="thema">

        <h2>Name des Lehrers:</h2>
        <input type="text" name="teacher">
    </form>
</body>
</html>