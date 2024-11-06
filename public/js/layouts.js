document.getElementById('toggle-btn').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
  });

  function toggleButton(button, activeClass) {
    button.classList.remove('btn-outline-primary', 'btn-outline-warning', 'btn-outline-danger');
    
    if (button.classList.contains(activeClass)) {
      button.classList.remove(activeClass);
      button.classList.add(`btn-outline-${activeClass.split('-')[1]}`);
    } else {
      button.classList.add(activeClass);
    }
  }

  const searchInput = document.getElementById('searchInput');
  console.log(searchInput)
  searchInput.addEventListener('keyup', function() {
      const input = this.value.toLowerCase();
      const rows = document.querySelectorAll('#myTable tbody tr');

      rows.forEach(function(row) {
          const cells = row.querySelectorAll('td');
          let rowText = '';
          cells.forEach(function(cell) {
              rowText += cell.textContent.toLowerCase() + ' ';
          });

          if (rowText.includes(input)) {
              row.style.display = '';
          } else {
              row.style.display = 'none';
          }
      });
  });