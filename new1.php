document.getElementById("captureButton").addEventListener("click", function () {
    const content = document.getElementById("productionData");

    html2canvas(content).then((canvas) => {
        const imgData = canvas.toDataURL("image/png");
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF("l", "mm", "a4"); // Landscape mode

        const pageWidth = pdf.internal.pageSize.getWidth();
        const imgWidth = pageWidth - 20; // Leave 10mm margins
        const imgHeight = (canvas.height * imgWidth) / canvas.width; // Maintain aspect ratio
        const x = (pageWidth - imgWidth) / 2; // Center horizontally
        const y = 10; // Top margin

        pdf.addImage(imgData, "PNG", x, y, imgWidth, imgHeight);
        
        // Convert PDF to Base64
        const pdfBase64 = pdf.output("datauristring").split(",")[1]; // Get only Base64 part
        
        // Send to server
        sendToServer(pdfBase64);

        // Optional: Save locally
        pdf.save("data_production.pdf");
    });
});

function sendToServer(pdfBase64) {
    fetch("upload.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "pdfFile=" + encodeURIComponent("data:application/pdf;base64," + pdfBase64)
    })
    .then(response => response.text())
    .then(data => console.log("Server Response:", data))
    .catch(error => console.error("Error:", error));
}
