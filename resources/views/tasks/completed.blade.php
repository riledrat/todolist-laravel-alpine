<!-- resources/views/tasks/completed.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Completed Tasks') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-8 p-6 bg-gray-800 shadow-lg rounded-lg">
        <!-- Display Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <table class="min-w-full bg-gray-900 rounded-lg">
            <thead>
            <tr>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center rounded-tl-lg">Name</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">Description</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">Start Date</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">End Date</th>
                <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center">Priority</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr class="border-b border-gray-600">
                    <td class="py-4 px-6 text-center text-gray-300">{{ $task->name }}</td>
                    <td class="py-4 px-6 text-center text-gray-300">{{ $task->description }}</td>
                    <td class="py-4 px-6 text-center text-gray-300">{{ $task->start_date }}</td>
                    <td class="py-4 px-6 text-center text-gray-300">{{ $task->end_date }}</td>
                    <td class="py-4 px-6 text-center">
                        <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full {{ $task->priority == 'Critical' ? 'bg-red-500 text-white' : ($task->priority == 'Minor' ? 'bg-yellow-500 text-black' : 'bg-blue-500 text-white') }}">
                            {{ $task->priority }}
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
