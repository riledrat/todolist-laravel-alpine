<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 p-6 bg-gray-800 shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold text-white mb-6">Edit Task</h1>
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-400">Task Name</label>
                <input type="text" name="name" value="{{ $task->name }}" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-400">Description</label>
                <textarea name="description" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $task->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-400">Start Date</label>
                <input type="date" name="start_date" value="{{ $task->start_date }}" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-400">End Date</label>
                <input type="date" name="end_date" value="{{ $task->end_date }}" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="priority" class="block text-sm font-medium text-gray-400">Priority</label>
                <select name="priority" class="mt-1 block w-full rounded-md bg-gray-700 text-white border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="Normal" {{ $task->priority == 'Normal' ? 'selected' : '' }}>Normal</option>
                    <option value="Minor" {{ $task->priority == 'Minor' ? 'selected' : '' }}>Minor</option>
                    <option value="Critical" {{ $task->priority == 'Critical' ? 'selected' : '' }}>Critical</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-md font-semibold shadow-md">Update Task</button>
        </form>
    </div>
</x-app-layout>
