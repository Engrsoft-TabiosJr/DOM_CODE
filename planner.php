<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planner Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    
</head>
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    body, html {
        font-family: 'Roboto', sans-serif;
        background: linear-gradient(135deg, #e0eafc, #cfdef3);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container-data {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 1200px;
        height: 90vh;
        display: flex;
        overflow: hidden;
    }
   
    .side-nav {
        width: 200px;
        background-color: #f7f9fc;
        padding: 20px;
        border-right: 1px solid #ddd;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .side-nav button {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        color: #555;
        background-color: #f7f9fc;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .side-nav button:hover {
        background-color: #e0eafc;
    }

    .data-side {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
    }

    .title-dashboard {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        font-weight: 900;
        color: #007bff;
        align-items: center;
    }

    .title-dashboard span {
        font-size: 20px;
    }

    .graph-data-container {
        background-color: #f7f9fc;
        border-radius: 15px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 550px;
    
    }

    .graph-header {
        font-size: 1.8rem;
        font-weight: 500;
        color: #555;
        margin-bottom: 15px;
        text-align: center;
    }

    .dropdown-container {
        margin-bottom: 15px;
    }

    .dropdown {
        padding: 8px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
        width: 200px;
    }

    .download-production-data {
        background-color: #f7f9fc;
        border-radius: 10px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
        padding: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f7f9fc;
        font-weight: 500;
        color: #555;
    }

    td {
        color: #555;
    }

    .download-btn {
        color: #007bff;
        cursor: pointer;
        text-decoration: underline;
    }

    .download-btn:hover {
        color: #0056b3;
    }   
    /* Professional Form Styling */
    #form-container {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        padding: 40px;
        width: 800px;
        max-width: 800px;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 25px;
        font-family: 'Roboto', sans-serif;
        border:1px solid black;
    }

    .section-header {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2b2b2b;
        margin-bottom: 15px;
        border-left: 4px solid #007bff;
        padding-left: 10px;
    }

    .product-info, .plan-hr {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .product-info label {
        color: #333;
        font-weight: 600;
        font-size: 0.85rem;
    }

    input[type="text"], input[type="date"], input[type="number"] {
        padding: 10px 15px;
        font-size: 0.9rem;
        color: #333;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background-color: #f8f9fa;
        transition: border-color 0.2s;
    }

    input[type="text"]:focus, input[type="date"]:focus, input[type="number"]:focus {
        border-color: #007bff;
        outline: none;
        background-color: #fff;
    }

    .plan-hr input {
        padding: 10px;
        font-size: 0.85rem;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        text-align: center;
        background-color: #f8f9fa;
        color: #333;
    }

    .submit-btn-container {
        display: flex;
        justify-content: center;
        margin-top: 15px;
    }

    .submit-btn-container button {
        padding: 12px 25px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

    }

    .submit-btn-container button:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 10px rgba(0, 91, 187, 0.2);
    }
    .btns-form-container{
        height: 60px;
        display: flex;
        flex-direction: row;
        gap: 15px;
    }
    .btns-form button{
        padding: 12px 25px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        margin-bottom: 10px;
    }
    #input-data{
    
        border-radius: 15px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        height: 1100px;
    
    }
    .upload-swp-container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 400px;
    margin: 20px auto;
}

.upload-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    justify-content: center;
}

.upload-label {
    display: inline-block;
    padding: 12px 20px;
    font-size: 1rem;
    color: #ffffff;
    background-color: #007bff;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-weight: 600;
    text-align: center;
}

.upload-label:hover {
    background-color: #0056b3;
}

.file-input {
    display: none; /* Hide the default file input */
}

.upload-label i {
    margin-right: 8px;
}

.submit-button {
    padding: 10px 20px;
    font-size: 1rem;
    color: #ffffff;
    background-color: #28a745;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-weight: 600;
}

.submit-button:hover {
    background-color: #218838;
}

#form-pic-container, #form-swp-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
    background-color: #f8f9fa;
    width: 800px;
    max-width: 800px;
    display: none;
}

.upload-pic-container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 150px;
    
}

.upload-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.upload-label {
    display: inline-block;
    padding: 12px 20px;
    font-size: 1rem;
    color: #ffffff;
    background-color: #007bff;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-weight: 600;
    text-align: center;
}

.upload-label:hover {
    background-color: #0056b3;
}

.upload-label i {
    margin-right: 8px;
    font-size: 1.2rem;
}

.file-input {
    display: none; /* Hide the default file input */
}

.text-input {
    width: 100%;
    padding: 10px 15px;
    font-size: 1rem;
    border: 1px solid #ced4da;
    border-radius: 8px;
    transition: border-color 0.3s ease;
}

.text-input:focus {
    border-color: #80bdff;
    outline: none;
}

.submit-button {
    padding: 10px 20px;
    font-size: 1rem;
    color: #ffffff;
    background-color: #28a745;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-weight: 600;
    width: 100%;
}

.submit-button:hover {
    background-color: #218838;
}

#input-data{
  display:none;

}
</style>
<body>
    <div class="container-data">
        <div class="side-nav">
            <button>Dashboard</button>
            <button>Data Entry</button>
        </div>
        <div class="data-side">
            <div id="dashboard">
                <div class="title-dashboard">
                    <span>Dashboard</span>
                    <div style="display: flex; flex-direction:row; gap:4px; align-items:center;">
                        
                        <img   width="35" height="25" src="nichivi_logo.jpg" alt="logo">
                        <span style="font-size: 16px;">NICHIVI PHILS., CORP.</span>
                    </div>
                </div>
                <div class="graph-data-container">
                    <div class="graph-header">Production vs. Downtime</div>
                    <div class="dropdown-container">
                        <select class="dropdown" id="data-selector" onchange="updateChartData()">
                            <option value="monthly">Monthly Data</option>
                            <option value="yearly">Yearly Data</option>
                        </select>
                    </div>
                    <canvas id="graph-data" width="800" height="400"></canvas>
                </div>
                <div class="download-production-data">
                    <table id= "imagesTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Data Production</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

     <div id="input-data">
        <div class="title-dashboard">
            <span>Data Entry </span>
                <div style="display: flex; flex-direction:row; gap:4px; align-items:center;">    
                     <img   width="35" height="25" src="nichivi_logo.jpg" alt="logo">
                     <span style="font-size: 16px;">NICHIVI PHILS., CORP.</span>
                 </div>
         </div>
         <div class="btns-form-container" >
            <div class="btns-form">
                <button onclick="showPlandata()" style='font-size:15px'>Input plan data <i class='fas fa-file-upload'></i></button>
            </div>
            <div class="btns-form">
                <button onclick="showSwp()" style='font-size:15px'>Upload SWP <i class='fas fa-file-upload'></i></button>
            </div>
            <div class="btns-form">
                <button onclick="showPic()"style='font-size:15px'>Upload PIC <i class='fas fa-file-upload'></i></button>
            </div>
        </div>
        <div id="form-container" >
            <form id="plan-data" action="formhandler.inc.php" method="post" >
                <div class="section-header">Product Information</div>
                <div class="product-info">
                    <label>Plan ID.</label>
                    <input type="text" name = "id" placeholder="Enter plan ID">
                    <label>Part no.</label>
                    <input type="text" name= "part_no" placeholder="Enter part number">
                    <label>Model</label>
                    <input type="text" name="model" placeholder="Enter model name">
                    <label>Line</label>
                    <input type="text"name= "line" placeholder="Enter line name">
                    <label>Delivery Date</label>
                    <input type="date" name="del_date">
                    <label>Balance</label>
                    <input type="number" name ="balance" placeholder="Enter balance">
                    <label>Manpower</label>
                    <input type="number" name= "man_power" placeholder="Enter manpower count">
                    <label>Ct. as of</label>
                    <input type="date" name ="ct_as_of">
                    <label>Exp. Date</label>
                    <input type="date" name="exp_date">
                    <label>Production Hours</label>
                    <input type="text" name="prod_hrs" placeholder = "Enter Production Hours">
                </div>

                <div class="section-header">Production Hours</div>
                <div class="plan-hr">
                    <input type="number" name ="plan1" placeholder="6am - 7am">
                    <input type="number" name ="plan2" placeholder="7am - 8am">
                    <input type="number" name ="plan3" placeholder="8am - 9am">
                    <input type="number" name ="plan4" placeholder="9am - 10am">
                    <input type="number" name ="plan5" placeholder="10am - 11am">
                    <input type="number" name ="plan6" placeholder="11am - 12nn">
                    <input type="number" name ="plan7" placeholder="12nn - 1pm">
                    <input type="number" name ="plan8" placeholder="1pm - 2pm">
                    <input type="number" name ="plan9" placeholder="2pm - 3pm">
                    <input type="number" name ="plan10" placeholder="3pm - 4pm">
                    <input type="number" name ="plan11" placeholder="4pm - 5pm">
                    <input type="number" name ="plan12" placeholder="5pm - 6pm">
                    <input type="number" name ="plan13" placeholder="6pm - 7pm">
                    <input type="number" name ="plan14"placeholder="7pm - 8pm">
                   


                </div>

                <div class="submit-btn-container">
                    <button type="submit">Submit</button>
                </div>
            </form>
         </div>

<div id="form-swp-container">
    <div class="upload-swp-container">
     <form action="upload_file_server.php" method = "post" enctype="multipart/form-data">
        <div class="upload-section">
  <!--
            <label for="file" class="upload-label">
                 Select SWP File
            </label>
            <input type="file" name = "file" id="file" class="file-input" />
            <input type="submit" value = "Upload File" class="submit-button">
                Upload
            </>
        </div>
       </form>
   -->
    <form action="upload_file_swp.php" method="post" enctype="multipart/form-data">
      <div class="upload-section">
        <label for="file">Select file:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload File" class ="submit-button">
       </div>
    </form>
    </div>
</div>

<div id="form-pic-container" >
    <div class="upload-pic-container">
        <form action="">
            <div class="upload-section">
                <label for="upload-file" class="upload-label">
                     Select PIC
                </label>
                <input type="file" id="upload-file" class="file-input" />
                <input type="text" placeholder="Enter PIC name" class="text-input"/>
                <button type="submit" class="submit-button">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>


</div>


    </div>

        </div>
    </div>

    <script>
        const ctx = document.getElementById('graph-data').getContext('2d');

        let chartData = {
            monthly: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [
                    { label: 'Production', data: [120, 150, 100, 180, 130], backgroundColor: 'green' },
                    { label: 'Downtime', data: [30, 20, 40, 15, 25], backgroundColor: 'red' }
                ]
            },
            yearly: {
                labels: ['2020', '2021', '2022', '2023', '2024'],
                datasets: [
                    { label: 'Production', data: [1500, 1800, 1600, 1900, 1700], backgroundColor: 'green' },
                    { label: 'Downtime', data: [300, 250, 350, 200, 400], backgroundColor: 'red' }
                ]
            }
        };

        let chart = new Chart(ctx, {
            type: 'bar',
            data: chartData.monthly,
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true, title: { display: true, text: 'Hours' } },
                    x: { title: { display: true, text: 'Months' } }
                },
                plugins: {
                    legend: { position: 'top', labels: { color: '#555' } }
                }
            }
        });

        function updateChartData() {
            const selectedData = document.getElementById('data-selector').value;
            chart.data = chartData[selectedData];
            chart.options.scales.x.title.text = selectedData === 'monthly' ? 'Months' : 'Years';
            chart.update();
        }

        function downloadData(date, production) {
            const dataStr = `Date: ${date}\nProduction: ${production}`;
            const blob = new Blob([dataStr], { type: 'text/plain' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `production_data_${date}.txt`;
            a.click();
            window.URL.revokeObjectURL(url);
        }
    document.querySelector('.side-nav button:nth-child(1)').addEventListener('click', function() {
     document.getElementById('dashboard').style.display = 'block';
     document.getElementById('input-data').style.display = 'none';
    });

    document.querySelector('.side-nav button:nth-child(2)').addEventListener('click', function() {
     document.getElementById('dashboard').style.display = 'none';
     document.getElementById('input-data').style.display = 'block';
    });
    function showSwp(){
        document.getElementById('form-pic-container').style.display='none';
        document.getElementById('form-swp-container').style.display='block';
        document.getElementById('form-container').style.display='none';

    }
    function showPlandata(){
        document.getElementById('form-pic-container').style.display='none';
        document.getElementById('form-swp-container').style.display='none';
        document.getElementById('form-container').style.display='block';
    }
    function showPic(){
        document.getElementById('form-pic-container').style.display='block';
        document.getElementById('form-swp-container').style.display='none';
        document.getElementById('form-container').style.display='none';
    }


    </script>
    <script>
        async function loadImages() {
            try {
                const response = await fetch('server_display.php');
                const images = await response.json();

                const tableBody = document.querySelector('#imagesTable tbody');
                tableBody.innerHTML = ''; // Clear existing rows

                images.forEach(image => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${image.date}</td>
                        <td><img  style ="width:100px; height:30px;"src="data:image/png;base64,${image.image_data}" alt="Captured Image"/></td>
                        <td><button  style= " padding: 12px 25px; background-color: #007bff; color: #ffffff; border: none; border-radius: 6px; font-size: 0.8rem; font-weight: 700; cursor: pointer;"onclick="convertToPDF('${image.image_data}')">Download Data</button></td>
                    `;
                    tableBody.appendChild(row);
                });
            } catch (error) {
                console.error('Error loading images:', error);
            }
        }

        function convertToPDF(base64Image) {
            const { jsPDF } = window.jspdf;
            const img = new Image();
            img.src = `data:image/png;base64,${base64Image}`;
            img.onload = function () {
                const doc = new jsPDF({
                    orientation: 'landscape',
                    unit: 'px',
                    format: [img.width, img.height]
                });
                doc.addImage(img, 'PNG', 0, 0, img.width, img.height);
                doc.save('production-data.pdf');
            };
        }

        document.addEventListener('DOMContentLoaded', loadImages);
    </script>
</body>
</html>
