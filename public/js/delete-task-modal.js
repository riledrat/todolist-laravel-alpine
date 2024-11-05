document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');
    const deleteModal = document.getElementById('deleteModal');
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');
    const taskNameSpan = document.getElementById('taskName');
    let formToDelete;

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            formToDelete = button.closest('form');
            const taskName = button.getAttribute('data-task-name');
            taskNameSpan.textContent = taskName;
            deleteModal.classList.remove('hidden');
        });
    });

    cancelDelete.addEventListener('click', function () {
        deleteModal.classList.add('hidden');
    });

    confirmDelete.addEventListener('click', function () {
        if (formToDelete) {
            formToDelete.submit();
        }
    });
});
