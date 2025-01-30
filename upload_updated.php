<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get PDF file from request
    $pdfData = $_POST['pdfFile'];

    // Extract Base64 data
    $pdfData = str_replace('data:application/pdf;base64,', '', $pdfData);
    $pdfData = str_replace(' ', '+', $pdfData);
    $pdfBinaryData = base64_decode($pdfData);

    if (!$pdfBinaryData) {
        echo "Error decoding PDF data!";
        exit;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO production_pdf_records (pdf_data, DateCreated) VALUES (?, NOW())");
    $stmt->bind_param("b", $pdfBinaryData);
    
    // Use MySQL BLOB data type
    $stmt->send_long_data(0, $pdfBinaryData);

    if ($stmt->execute()) {
        echo "PDF saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
function sendToServer(pdf) {
    const pdfBase64 = pdf.output("datauristring"); // Convert PDF to Base64

    fetch("upload.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "pdfFile=" + encodeURIComponent(pdfBase64)
    })
    .then(response => response.text())
    .then(data => console.log("Server Response:", data))
    .catch(error => console.error("Error:", error));
}
