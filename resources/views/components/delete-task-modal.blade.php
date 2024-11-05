<div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-70 hidden flex justify-center items-center">
    <div class="bg-gray-900 rounded-lg shadow-lg p-6 max-w-md mx-auto">
        <h2 class="text-lg text-white font-semibold mb-4">Confirm Delete</h2>
        <p class="text-gray-300">Are you sure you want to delete task <span id="taskName" class="font-bold"></span>?</p>
        <div class="flex justify-end mt-4">
            <button id="cancelDelete" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md mr-2">Cancel</button>
            <button id="confirmDelete" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md">Delete</button>
        </div>
    </div>
</div>
