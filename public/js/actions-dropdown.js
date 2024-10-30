document.addEventListener('DOMContentLoaded', function () {
    // Select all action buttons
    const buttons = document.querySelectorAll('.action-button');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            // Get the dropdown menu related to the clicked button
            const dropdown = button.closest('div.relative').querySelector('.dropdown-menu');
            dropdown.classList.toggle('hidden');
        });
    });

    // Close the dropdown if clicking outside
    window.addEventListener('click', function (event) {
        buttons.forEach(button => {
            const dropdown = button.closest('div.relative').querySelector('.dropdown-menu');
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    });
});
