@props(['task'])

<div class="relative inline-block text-left">
    <button type="button" class="action-button inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
        Actions
        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
    </button>
    <div class="dropdown-menu absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-gray-800 ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical">
        <div class="py-1" role="none">
            <a href="{{ route('tasks.edit', $task) }}" class="text-gray-300 block px-4 py-2 text-sm hover:bg-gray-700" role="menuitem">Edit</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="delete-form" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="text-red-500 block px-4 py-2 text-sm hover:bg-gray-700 delete-button" data-task-name="{{ $task->name }}" role="menuitem">Delete</button>
            </form>
            <form action="{{ route('tasks.complete', $task) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="text-green-500 block px-4 py-2 text-sm hover:bg-gray-700" role="menuitem">Complete</button>
            </form>
            <form action="{{ route('tasks.cancel', $task) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="text-orange-500 block px-4 py-2 text-sm hover:bg-gray-700" role="menuitem">Cancel</button>
            </form>
        </div>
    </div>
</div>
