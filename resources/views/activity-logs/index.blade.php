<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Activity Logs') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-6">
        <div class="bg-gray-900 rounded-lg shadow-xl p-6 mb-8">
            <h4 class="text-xl font-semibold text-white mb-4">Recent Activity</h4>
            <form action="{{ route('activity-logs.clear') }}" method="POST" class="mb-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 no-underline text-sm">
                    Clear All Activity Logs
                </button>
            </form>
            <ul class="text-gray-300">
                @foreach ($recentActivities as $activity)
                    <li class="mb-2">{{ $activity->description }} at {{ $activity->created_at }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
