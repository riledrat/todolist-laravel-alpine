<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('All Tasks') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-8 p-6 bg-gray-800 shadow-lg rounded-lg">
        <!-- Search Bar -->
        <form method="GET" action="{{ route('tasks.index') }}" class="mb-6 flex items-center space-x-4">
            <input
                type="text"
                name="name"
                placeholder="Search by name"
                class="bg-gray-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500"
                value="{{ request('name') }}"
            />
            <select
                name="priority"
                class="bg-gray-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500"
            >
                <option value="">All Priorities</option>
                <option value="Normal" {{ request('priority') == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Minor" {{ request('priority') == 'Minor' ? 'selected' : '' }}>Minor</option>
                <option value="Critical" {{ request('priority') == 'Critical' ? 'selected' : '' }}>Critical</option>
            </select>
            <button
                type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none"
            >
                Search
            </button>
        </form>

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tasks Table -->
        <x-task-table :tasks="$tasks" />
        
        <x-delete-task-modal/>
    </div>
</x-app-layout>

<script src="{{ asset('js/delete-task-modal.js') }}"></script>
<script src="{{ asset('js/actions-dropdown.js') }}"></script>
