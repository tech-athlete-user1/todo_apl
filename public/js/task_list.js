document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('hide_finished');

    checkbox.addEventListener('change', function () {
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const statusCell = row.cells[4]; // 5列目が状態
            if (!statusCell) return;

            const isFinished = statusCell.textContent.trim() === '完了';
            if (checkbox.checked && isFinished) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
            }
        });
    });
});
