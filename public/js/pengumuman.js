document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const dataTable = document.getElementById('dataTable');
    const rows = dataTable.getElementsByTagName('tr');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase();

        Array.from(rows).forEach(row => {
            const cells = row.getElementsByTagName('td');
            if (cells.length > 0) {
                // Mencari di beberapa kolom: Judul (index 1) dan Isi (index 2)
                const titleCell = cells[1]; // Kolom Judul
                const contentCell = cells[2]; // Kolom Isi

                const titleText = titleCell.textContent.toLowerCase();
                const contentText = contentCell.textContent.toLowerCase();

                // Menampilkan baris jika ada pencocokan
                if (titleText.includes(query) || contentText.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
});