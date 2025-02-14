<?php
header('Access-Control-Allow-Origin: *');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("connect_db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Startup Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("bg_c91.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: rgba(93, 85, 85, 0.35);
            -webkit-backdrop-filter: blur(6px);
            backdrop-filter: blur(6px);
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            width: 400px;
            height: 420px;
            position: relative;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #004494;
        }

        button:active {
            background-color: #004494;
        }

        .keyboard-container {
            display: none;
            flex-direction: row;
            padding: 10px 20px;
            background: linear-gradient(145deg, rgb(26, 17, 203), #2575fc);
            width: 430px;
            height: 50px;
            border-radius: 15px;
            position: fixed;
            bottom: -200px;
            /* Start off-screen */
            left: 50%;
            transform: translateX(-50%);
            gap: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: bottom 1s ease-in;
            align-items: center;
        }

        .keyboard-container.visible {
            bottom: 20px;
            /* Slide up to this position */
        }

        .key {
            padding: 10px 5px 10px 5px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            cursor: pointer;
            width: 100px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 20px;
            font-weight: bold;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.2s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .key:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .key:active {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .toggle-keyboard-btn {
            width: auto;
            position: fixed;
            bottom: 20px;
            padding: 20px 10px 20px 10px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .toggle-keyboard-btn:hover {
            background-color: #004494;
        }
    </style>
</head>

<body>
    <section>
        <div class="form-container">

            <div>
                <h2>Production Startup Input Form</h2>
            </div>
            <div>
                <label for="timestart">Time Start ID:</label>
                <select id="timeStart" name="time_start" required>
                    <option value="">Select Time Start ID</option>
                    <option value="t1">1</option>
                    <option value="t2">2</option>
                    <option value="t3">3</option>
                    <option value="t4">4</option>
                    <option value="t5">5</option>
                    <option value="t6">6</option>
                    <option value="t7">7</option>
                    <option value="t8">8</option>
                    <option value="t9">9</option>
                    <option value="t10">10</option>
                    <option value="t11">11</option>
                    <option value="t12">12</option>
                    <option value="t13">13</option>
                    <option value="t14">14</option>
                </select>
            </div>
            <div>
                <label for="Partno">Part no.:</label>
                <select id="part_no" name="part_no" required>
                    <option id="partno" value="" selected="selected">Select Part.No</option>
                    <?php
                    $sql = "SELECT id ,part_no,line, model, date_created FROM details_product";
                    $resultset = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($resultset)) {
                    ?>
                        <option value="<?php echo $rows["id"]; ?>"><?php echo $rows["part_no"]; ?></option>
                    <?php }    ?>
                </select>
            </div>
            <div>
                <label for="remainingBalance">Remaining Balance:</label>
                <input type="number" id="remainingBalance" name="remainingBalance" onclick="setActiveInput('remainingBalance')" required>
            </div>
            <div>
                <label for="pic">PIC:</label>
                <select id="pic" name="pic" required>
                    <option value="">Select PIC</option>
                    <option value="pic1">PIC 1</option>
                    <option value="pic2">PIC 2</option>
                    <option value="pic3">PIC 3</option>
                </select>
            </div>
            <div>
                <button onclick="submit()">Submit</button>
            </div>

        </div>
    </section>

    <!-- Keyboard Container -->
    <div class="keyboard-container" id="keyboardContainer">
        <div class="key" onclick="addToInput('1')">1</div>
        <div class="key" onclick="addToInput('2')">2</div>
        <div class="key" onclick="addToInput('3')">3</div>
        <div class="key" onclick="addToInput('4')">4</div>
        <div class="key" onclick="addToInput('5')">5</div>
        <div class="key" onclick="addToInput('6')">6</div>
        <div class="key" onclick="addToInput('7')">7</div>
        <div class="key" onclick="addToInput('8')">8</div>
        <div class="key" onclick="addToInput('9')">9</div>
        <div class="key" onclick="addToInput('0')">0</div>
        <div class="key" onclick="deleteFromInput()"><i class="fa fa-arrow-left"></i></div>
    </div>

    <!-- Toggle Keyboard Button -->
    <button class="toggle-keyboard-btn" id="toggleKeyboardBtn" onclick="showKeys()"><i class="fa fa-keyboard-o"></button>
    <script src="submit_input.js"></script>
    <script>
        // JavaScript to toggle the keyboard visibility
        const toggleKeyboardBtn = document.getElementById('toggleKeyboardBtn');
        const keyboardContainer = document.getElementById('keyboardContainer');

        /* toggleKeyboardBtn.addEventListener('click', () => {
             keyboardContainer.classList.toggle('visible');
             toggleKeyboardBtn.textContent = keyboardContainer.classList.contains('visible') ? 'Hide Keyboard' : 'Show Keyboard';
         });*/

        function submit() {
            const input1 = document.getElementById('timeStart').value;
            const input2 = document.getElementById('part_no').value;
            const input3 = document.getElementById('remainingBalance').value;
            const input4 = document.getElementById('pic').value

            console.log(`time:${input1}`);
            console.log(`partno:${input2}`);
            console.log(`balance:${input3}`);
            console.log(`PIC:${input4}`);

            const inputData1 = {
                part_no: input2,
                remaining_bal: input3,
            }

            const inputData2= {
                time_start: input1,
                PIC: input4
            }

            var urlEncodedData = Object.keys(inputData)
                .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(dataToSend[key]))
                .join('&');

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "server_inputdata.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // alert("Data submitted successfully: " + xhr.responseText);
                        console.log("data  is recorded");
                    } else {
                        alert("Error: " + xhr.status);
                    }
                }
            };
            var urlEncodedData1 = Object.keys(inputData2)
            .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(dataToSend[key]))
            .join('&');

            var xhr1 = new XMLHttpRequest();
            xhr1.open("POST", "server_inputdata.php", true);
            xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr1.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // alert("Data submitted successfully: " + xhr.responseText);
                        console.log("data  is recorded");
                    } else {
                        alert("Error: " + xhr1.status);
                    }
                }
            };
            xhr1.send(urlEncodedData);






        }

        function showKeys() {

            document.getElementById('keyboardContainer').style.display = "flex";
            document.getElementById('keyboardContainer').style.bottom = '100px';
            document.getElementById('keyboardContainer').style.transition = 'bottom 0.3s ease-in';

        }
        let activeInputId = null;

        // Set the active input field
        function setActiveInput(inputId) {
            activeInputId = inputId;
        }

        // Add the clicked character to the active input field
        function addToInput(value) {
            if (activeInputId) {
                const inputField = document.getElementById(activeInputId);
                inputField.value += value;
            }
        }

        // Delete the last character from the active input field
        function deleteFromInput() {
            if (activeInputId) {
                const inputField = document.getElementById(activeInputId);
                inputField.value = inputField.value.slice(0, -1);
            }
        }
    </script>
    <script src = "testing.js"></script>
</body>

</html>