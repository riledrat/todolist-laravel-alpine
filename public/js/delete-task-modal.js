document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');
    const deleteModal = document.getElementById('deleteModal');
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');
    const taskNameSpan = document.getElementById('taskName');
    let formToDelete;

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            formToDelete = button.closest('form'); // Get the form to delete
            const taskName = button.getAttribute('data-task-name'); // Get the task name
            taskNameSpan.textContent = taskName; // Set the task name in the modal
            deleteModal.classList.remove('hidden'); // Show the modal
        });
    });

    cancelDelete.addEventListener('click', function () {
        deleteModal.classList.add('hidden'); // Hide the modal
    });

    confirmDelete.addEventListener('click', function () {
        if (formToDelete) {
            formToDelete.submit(); // Submit the form to delete the task
        }
    });
});
