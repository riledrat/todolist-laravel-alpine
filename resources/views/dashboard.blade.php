<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-6">
        <!-- Welcome Message -->
        <div class="bg-gray-900 rounded-lg shadow-xl p-6 mb-8">
            <h3 class="text-3xl font-bold text-white mb-2">Welcome to Your Dashboard!</h3>
            <p class="text-gray-300">
                Here you can manage your tasks, track your progress, and gain insights into your productivity.
            </p>
        </div>

        <!-- Stats Overview Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @foreach ([
                ['Total Tasks', $totalTasks, 'blue-500'],
                ['Completed Tasks', $completedTasks, 'green-500'],
                ['Pending Tasks', $pendingTasks, 'orange-500'],
                ['Canceled Tasks', $canceledTasks, 'red-500'],
            ] as [$title, $count, $color])
                <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-center transition transform hover:scale-105">
                    <h4 class="text-xl font-semibold text-white mb-2">{{ $title }}</h4>
                    <p class="text-3xl text-{{ $color }} font-bold">{{ $count }}</p>
                </div>
            @endforeach
        </div>

        <!-- Quick Access Links -->
        <div class="bg-gray-900 rounded-lg shadow-xl p-6 mb-8">
            <h4 class="text-2xl font-semibold text-white mb-4">Quick Access</h4>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ([
                    ['tasks.index', 'View Task List', 'blue-500', 'M5 12h14m-7 7h7m-7-14h7'],
                    ['tasks.create', 'Create New Task', 'green-500', 'M12 4v16m8-8H4'],
                    ['profile.edit', 'Manage Profile', 'yellow-500', 'M15.232 7.232a4 4 0 11-5.664 5.664M4.6 20.6a4.992 4.992 0 00-.6-1.294M16.6 20.6a4.992 4.992 0 00.6-1.294'],
                    ['activity-logs.index', 'View Activity Logs', 'purple-500', 'M9 17v-4h6v4m-6-6h6V7H9v4z']
                ] as [$route, $text, $color, $iconPath])
                    <a href="{{ route($route) }}" class="flex items-center bg-{{ $color }} hover:bg-{{ $color }}-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-150">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}"></path>
                        </svg>
                        {{ $text }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Task Progress Bar -->
        <div class="bg-gray-900 rounded-lg shadow-xl p-6 mb-8">
            <h4 class="text-2xl font-semibold text-white mb-4">Task Progress</h4>
            <div class="flex items-center justify-between mb-2">
                <span class="text-white">Completed Tasks</span>
                <span class="text-white font-semibold">{{ $completedTasks }} / {{ $totalTasks }}</span>
            </div>
            <div class="w-full bg-gray-700 rounded-full h-3">
                <div class="bg-green-500 h-3 rounded-full" style="width: {{ ($completedTasks / $totalTasks) * 100 }}%"></div>
            </div>
        </div>
    </div>
</x-app-layout>
