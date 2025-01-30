<?php
$servername = "localhost";
$username = "root";  // Change this if needed
$password = "123";      // Change this if needed
$database = "lcd_dbs"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_FILES["pdfFile"]["error"] === UPLOAD_ERR_OK) {
    $fileName = basename($_FILES["pdfFile"]["name"]);
    $targetDir = "uploads/";
    $targetPath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetPath)) {
        // Store file path in database
        $stmt = $conn->prepare("INSERT INTO production_pdf_records (image_data, DateCreated) VALUES (?, ?)");
        $stmt->bind_param("ss", $fileName, $targetPath);

        if ($stmt->execute()) {
            echo "File uploaded and stored in database successfully!";
        } else {
            echo "Database error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Upload failed!";
    }
} else {
    echo "Error: " . $_FILES["pdfFile"]["error"];
}

$conn->close();
?>
