document.addEventListener('DOMContentLoaded', function () {
    const finishDateInput = document.getElementById('finish_date');
    const finishFlgRadios = document.querySelectorAll('input[name="finish_flg"]');

    function toggleFinishDate() {
        const selected = document.querySelector('input[name="finish_flg"]:checked').value;
        if (selected === '1') {
            finishDateInput.disabled = false;
        } else {
            finishDateInput.value = '';  // ここで値をクリア
            finishDateInput.disabled = true;
        }
    }

    // 初期状態設定
    toggleFinishDate();

    // ラジオボタンの変更イベントに反応
    finishFlgRadios.forEach(radio => {
        radio.addEventListener('change', toggleFinishDate);
    });
});
