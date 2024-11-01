<!-- resources/views/tasks/canceled.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Canceled Tasks') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-8 p-6 bg-gray-800 shadow-lg rounded-lg">
        <!-- Display Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <x-task-table :tasks="$tasks" showStatus="true" showAssignedTo="true" showAssignedBy="true" />
    </div>
</x-app-layout>
