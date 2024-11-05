<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('All Tasks') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-8 p-6 bg-gray-800 shadow-lg rounded-lg">
        <x-search-bar />

        @if (session('success'))
            <x-alert-success />
        @endif

        <x-task-table :tasks="$tasks" />

        <x-delete-task-modal />
    </div>
</x-app-layout>

<x-index-scripts />
