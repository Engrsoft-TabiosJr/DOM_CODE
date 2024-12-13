let copiedPlan = [];
//const loadingIndicator = document.getElementById('loading'); // Uncomment this if you have a loading element

// Create the initial chart
const ctx = document.getElementById('prodChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: 'Production Data',
            data: [],
            backgroundColor: [],
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
	    barThickness:25
        },

     

	]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Show loading indicator
//function showLoading() {
  //  loadingIndicator.style.display = 'block';
//}

// Hide loading indicator
//function hideLoading() {
  //  loadingIndicator.style.display = 'none';
//}

function fetchData() {
//    showLoading();
    fetch('data_prod_chart.php')
        .then(response => response.json())
        .then(data => {
    //        hideLoading();
            if (data.labels.length !== data.datas.length) {
                console.error('Data inconsistency between labels and values.');
                return;
            }

            chart.data.labels = data.labels;
            chart.data.datasets[0].data = data.datas;

            if (copiedPlan.length > 0) {
                if (copiedPlan.length !== data.datas.length) {
                    console.error('Mismatch between copiedPlan and production data length.');
                    return;
                }

                // Set colors based on comparison
                chart.data.datasets[0].backgroundColor = data.datas.map((value, index) => {
                  //  console.log(`Comparing production value: ${value} with target: ${copiedPlan[index]}`);
                    return Number(value) >= Number(copiedPlan[index]) ? '#28A745' : 'red';
                });
            } else {
                console.error('copiedPlan array is empty.');
            }

            chart.update();
        })
        .catch(error => {
  //          hideLoading();
            console.error('Error fetching data:', error);
            alert('Failed to fetch data: ' + error.message);
        });
}

function fetchPlanData() {
   // showLoading();
    fetch('getarrayplan.php')
        .then(response => response.json())
        .then(data => {
       //     hideLoading();
            if (!data.datas || data.datas.length === 0) {
                throw new Error('Plan data is empty or invalid.');
            }

            copiedPlan = [...data.datas];
            fetchData();
        })
        .catch(error => {
     //       hideLoading();
            console.error('Error fetching plan data:', error);
            alert('Failed to fetch plan data: ' + error.message);
        });
}

const ctxd = document.getElementById('downChart').getContext('2d');
const chartd = new Chart(ctxd, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: 'Downtime',
            data: [],
            backgroundColor: 'red',
            borderColor: 'rgba(75, 192, 192, 1)', // Fixed typo here
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function fetchDataD() {
    fetch('data_down_chart.php')
        .then(response => response.json())
        .then(data => {
            chartd.data.labels = data.labels;
            chartd.data.datasets[0].data = data.time_datas;
            chartd.update();
        })
        .catch(error => console.error('Error fetching data:', error));
}

// Initial data fetch
fetchPlanData();
fetchDataD();

// Set intervals for periodic data fetching
setInterval(fetchData, 2000);
setInterval(fetchDataD, 2000);

