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
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                 role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tasks Table -->
        <table class="min-w-full bg-gray-900 rounded-lg">
            <thead>
            <tr>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center rounded-tl-lg">Name</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">Description</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">Start Date</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">End Date</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">Priority</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">Status</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center rounded-tr-lg">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr class="border-b border-gray-600">
                    <td class="py-4 px-6 text-center text-gray-300">{{ $task->name }}</td>
                    <td class="py-4 px-6 text-center text-gray-300">{{ $task->description }}</td>
                    <td class="py-4 px-6 text-center text-gray-300">{{ date('d-m-Y', strtotime($task->start_date ))}}</td>
                    <td class="py-4 px-6 text-center text-gray-300">{{ date('d-m-Y', strtotime($task->end_date)) }}</td>
                    <td class="py-4 px-6 text-center">
                        <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full {{ $task->priority == 'Critical' ? 'bg-red-500 text-white' : ($task->priority == 'Minor' ? 'bg-yellow-500 text-black' : 'bg-blue-500 text-white') }}">
                            {{ $task->priority }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full {{ $task->status == 'Completed' ? 'bg-green-500 text-white' : ($task->status == 'Canceled' ? 'bg-red-500 text-white' : 'bg-gray-500 text-white') }}">
                            {{ $task->status }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="relative inline-block text-left">
                            <div>
                                <button type="button"
                                        class="action-button inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-800 text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                    Actions
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M5.
                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>

                            <!-- Dropdown menu -->
                            <div
                                class="dropdown-menu absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-gray-800 ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                                role="menu" aria-orientation="vertical">
                                <div class="py-1" role="none">
                                    <a href="{{ route('tasks.edit', $task) }}"
                                       class="text-gray-300 block px-4 py-2 text-sm hover:bg-gray-700" role="menuitem">Edit</a>

                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="delete-form"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                class="text-red-500 block px-4 py-2 text-sm hover:bg-gray-700 delete-button"
                                                data-task-name="{{ $task->name }}" role="menuitem">
                                            Delete
                                        </button>
                                    </form>

                                    <form action="{{ route('tasks.complete', $task) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        <button type="submit"
                                                class="text-green-500 block px-4 py-2 text-sm hover:bg-gray-700"
                                                role="menuitem">Complete
                                        </button>
                                    </form>

                                    <form action="{{ route('tasks.cancel', $task) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        <button type="submit"
                                                class="text-orange-500 block px-4 py-2 text-sm hover:bg-gray-700"
                                                role="menuitem">Cancel
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <x-delete-task-modal/>
    </div>
</x-app-layout>

<script src="{{ asset('js/delete-task-modal.js') }}"></script>
<script src="{{ asset('js/actions-dropdown.js') }}"></script>
