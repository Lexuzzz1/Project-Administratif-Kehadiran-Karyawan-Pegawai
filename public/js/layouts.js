document.getElementById('toggle-btn').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
  });

  function toggleButton(button, activeClass) {
    // Remove existing active classes
    button.classList.remove('btn-outline-primary', 'btn-outline-warning', 'btn-outline-danger');
    
    // Check if the button already has the active class
    if (button.classList.contains(activeClass)) {
      // If it does, remove the active style, reverting to the outline style
      button.classList.remove(activeClass);
      button.classList.add(`btn-outline-${activeClass.split('-')[1]}`);
    } else {
      // Otherwise, add the active style
      button.classList.add(activeClass);
    }
  }

// search bar
const searchInput = document.getElementById("searchInput");
console.log(searchInput);
searchInput.addEventListener("keyup", function () {
    const input = this.value.toLowerCase();
    const rows = document.querySelectorAll("#myTable tbody tr");

    rows.forEach(function (row) {
        const cells = row.querySelectorAll("td");
        let rowText = "";
        cells.forEach(function (cell) {
            rowText += cell.textContent.toLowerCase() + " ";
        });

        if (rowText.includes(input)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});


function toggleButton(value) {
  // Mencari semua radio button dengan value yang sesuai
  const radioButtons = document.querySelectorAll(`input[type="radio"][value="${value}"]`);
  
  // Memilih semua radio button dengan value yang sesuai
  radioButtons.forEach(radio => {
      radio.checked = true;
  });

  // Menghitung total setelah memilih
  countTotals();
}

function countTotals() {
  const totalHadir = document.querySelectorAll(`input[type="radio"][value="Hadir"]:checked`).length;
  const totalTelat = document.querySelectorAll(`input[type="radio"][value="Telat"]:checked`).length;
  const totalAbsen = document.querySelectorAll(`input[type="radio"][value="Absen"]:checked`).length;

  // Menampilkan total di bagian Total
  document.getElementById('totalHadir').textContent = `${totalHadir} Hadir`;
  document.getElementById('totalTelat').textContent = `${totalTelat} Telat`;
  document.getElementById('totalAbsen').textContent = `${totalAbsen} Absen`;

  document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', countTotals);
});
}

function toggleDropdown() {
    var dropdownContent = document.querySelector('.dropdown-content');
    
    // Menampilkan atau menyembunyikan dropdown
    if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "block";
    }
}
