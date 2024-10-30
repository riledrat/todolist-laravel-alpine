<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-6">
        <!-- Welcome Message -->
        <div class="bg-gray-900 rounded-lg shadow-xl p-6 mb-8">
            <h3 class="text-2xl font-semibold text-white mb-2">Welcome to Your Dashboard!</h3>
            <p class="text-gray-300">
                Here you can manage your tasks, track your progress, and get insights into your productivity.
            </p>
        </div>

        <!-- Stats Overview Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Tasks Card -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-center">
                <h4 class="text-xl font-semibold text-white mb-2">Total Tasks</h4>
                <p class="text-3xl text-blue-500 font-bold">{{ $totalTasks }}</p>
            </div>

            <!-- Completed Tasks Card -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-center">
                <h4 class="text-xl font-semibold text-white mb-2">Completed Tasks</h4>
                <p class="text-3xl text-green-500 font-bold">{{ $completedTasks }}</p>
            </div>

            <!-- Pending Tasks Card -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-center">
                <h4 class="text-xl font-semibold text-white mb-2">Pending Tasks</h4>
                <p class="text-3xl text-orange-500 font-bold">{{ $pendingTasks }}</p>
            </div>

            <!-- Canceled Tasks Card -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-xl text-center">
                <h4 class="text-xl font-semibold text-white mb-2">Canceled Tasks</h4>
                <p class="text-3xl text-red-500 font-bold">{{ $canceledTasks }}</p>
            </div>
        </div>

        <!-- Quick Access Links -->
        <div class="bg-gray-900 rounded-lg shadow-xl p-6 mb-8">
            <h4 class="text-xl font-semibold text-white mb-4">Quick Access</h4>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('tasks.index') }}" class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-150">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7h7m-7-14h7"></path>
                    </svg>
                    View Task List
                </a>
                <a href="{{ route('tasks.create') }}" class="flex items-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-150">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create New Task
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold py-2 px-4 rounded-md shadow-md transition duration-150">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 7.232a4 4 0 11-5.664 5.664M4.6 20.6a4.992 4.992 0 00-.6-1.294M16.6 20.6a4.992 4.992 0 00.6-1.294"></path>
                    </svg>
                    Manage Profile
                </a>
                <a href="{{ route('activity-logs.index') }}" class="flex items-center bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-150">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-4h6v4m-6-6h6V7H9v4z"></path>
                    </svg>
                    View Activity Logs
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
