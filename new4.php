const achievedCells = document.querySelectorAll(".data_achieved");
                achievedCells.forEach(function (cell) {
                    const achievedValue = parseFloat(cell.textContent.replace('%', ''));
                    if (achievedValue < 100) {
                        cell.style.backgroundColor = "red"; // Set red if less than 100
			cell.style.color ="white";
                    } else {
                        cell.style.backgroundColor = "green"; // Set green if 100 or more
			cell.style.color="white";
                    }
                });