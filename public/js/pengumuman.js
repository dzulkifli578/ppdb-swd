document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const dataTable = document.getElementById('dataTable');
    const rows = dataTable.getElementsByTagName('tr');
    const filterTipe = document.getElementById('filterTipe'); // Filter tipe

    function filterRows() {
        const query = searchInput.value.toLowerCase();
        const selectedTipe = filterTipe.value; // Mendapatkan nilai dari dropdown tipe

        Array.from(rows).forEach(row => {
            const cells = row.getElementsByTagName('td');
            if (cells.length > 0) {
                const titleCell = cells[1]; // Kolom Judul
                const contentCell = cells[2]; // Kolom Isi
                const tipeCell = cells[3]; // Kolom Tipe

                const titleText = titleCell.textContent.toLowerCase();
                const contentText = contentCell.textContent.toLowerCase();
                const tipeText = tipeCell.textContent.toLowerCase();

                // Logika pencocokan tipe dan teks pencarian
                const matchesTipe = (selectedTipe === 'semua' || tipeText === selectedTipe.toLowerCase());
                const matchesQuery = titleText.includes(query) || contentText.includes(query);

                if (matchesTipe && matchesQuery)
                    row.style.display = '';
                else
                    row.style.display = 'none';
            }
        });
    }

    // Event listener untuk pencarian dan filter tipe
    searchInput.addEventListener('input', filterRows);
    filterTipe.addEventListener('change', filterRows);
});