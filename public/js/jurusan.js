document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const dataTable = document.getElementById('dataTable');
    const rows = dataTable.getElementById('tr');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase();

        Array.from(rows).forEach(row => {
            const cells = row.getElementsByTagName('td');
            if (cells.length > 0) {
                const namaCell = cells[1]; // Assuming the 'Nama' column is the second one
                const deskripsiCell = cells[2];

                const nameText = namaCell.textContent.toLowerCase();
                const deskripsiText = deskripsiCell.textContent.toLowerCase();

                if (nameText.includes(query) || deskripsiText.includes(query))
                    row.style.display = '';
                else
                    row.style.display = 'none';
            }
        });
    });
});