document.getElementById("captureButton").addEventListener("click", function () {
    const content = document.getElementById("productionData");

    html2canvas(content).then((canvas) => {
        const imgData = canvas.toDataURL("image/png");
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF("l", "mm", "a4");

        const pageWidth = pdf.internal.pageSize.getWidth(); // 297mm
        const pageHeight = pdf.internal.pageSize.getHeight(); // 210mm

        const imgWidth = pageWidth - 20; // Leave 10mm margins
        const imgHeight = (canvas.height * imgWidth) / canvas.width;

        const x = (pageWidth - imgWidth) / 2; // Center horizontally
        const y = (pageHeight - imgHeight) / 2; // Center vertically

        pdf.addImage(imgData, "PNG", x, y, imgWidth, imgHeight);
        
        // Convert to Blob and send to the server
        const pdfBlob = pdf.output("blob");
        sendToServer(pdfBlob);

        // Save the PDF
        pdf.save("data_production.pdf");
    });
});

function sendToServer(pdfBlob) {
    const formData = new FormData();
    formData.append("pdfFile", pdfBlob, "data_production.pdf");

    fetch("upload.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => console.log("Server Response:", data))
    .catch(error => console.error("Error:", error));
}
