<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 p-6 bg-gray-800 shadow-lg rounded-lg">

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <h1 class="text-2xl font-semibold text-white mb-6">Create New Task</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-400">Task Name</label>
                <input type="text" name="name" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-400">Description</label>
                <textarea name="description" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-400">Start Date</label>
                <input type="date" name="start_date" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-400">End Date</label>
                <input type="date" name="end_date" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="priority" class="block text-sm font-medium text-gray-400">Priority</label>
                <select name="priority" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="Normal">Normal</option>
                    <option value="Minor">Minor</option>
                    <option value="Critical">Critical</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="assigned_to" class="block text-sm font-medium text-gray-400">Assign To</label>
                <select name="assigned_to" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Own Task</option>
                    @foreach ($users as $user)
                        @if ($user->id !== Auth::id())
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>            
            <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-md font-semibold shadow-md">Create Task</button>
        </form>
    </div>
</x-app-layout>
