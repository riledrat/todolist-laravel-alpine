document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.action-button');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const dropdown = button.closest('div.relative').querySelector('.dropdown-menu');
            dropdown.classList.toggle('hidden');
        });
    });

    window.addEventListener('click', function (event) {
        buttons.forEach(button => {
            const dropdown = button.closest('div.relative').querySelector('.dropdown-menu');
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    });
});
