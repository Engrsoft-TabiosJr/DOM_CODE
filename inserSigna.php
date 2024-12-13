<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "lcd_dbs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if (isset($_FILES['signatures'])) {
    $image = $_FILES['signatures']['tmp_name'];
    $imageName = $_POST['sign'];
    $imgData = addslashes(file_get_contents($image));
    $id = 1;
    $sql="UPDATE person_incharge SET name_incharge = '$imageName',picture_incharge ='$imgData' WHERE id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="text" name = "sign" placeholder="type name">
    <input type="file" name="signatures" id="signatures">
    <input type="submit" value="Upload Image" name="submit">
</form>

