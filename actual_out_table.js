function updateTableOutput() {
    let i = 0;
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "output_table_server.php", true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            try {
                const data = JSON.parse(xhr.responseText);
                const tableBody = document.querySelector("#actual_output_table tbody");
                tableBody.innerHTML = ""; // Clear existing data

                data.forEach(function (row) {
                    const tr = document.createElement("tr");
                    i++;
                    tr.innerHTML = `
                        <td>${row.time_prod}</td>
                        <td>${row.cycle_time}</td>
                        <td>${row.min}</td>
                        <td>${row.plan_out_hr}</td>
                        <td>${row.total_out_hr}</td>
                        <td>${row.countPerHr}</td>
                        <td>${row.countTol}</td>
                        <td>${row.achieved}%</td>
                        <td>${row.NG_count}</td>

                    </tr>`;
                    tableBody.appendChild(tr);
                });
            } catch (error) {
                console.error("Error parsing JSON data: ", error);
            }
        } else {
            console.error("Failed to fetch data: " + xhr.status);
        }
    };
    xhr.onerror = function () {
        console.error("Request error: An error occurred during the request.");
    };
    xhr.send();
}

// Set interval to update the table every second
setInterval(updateTableOutput, 1000);

// Initial data fetch when the page loads
window.onload = updateTableOutput;

