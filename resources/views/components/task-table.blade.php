@props(['tasks'])

<table class="min-w-full bg-gray-900 rounded-lg">
    <thead>
    <tr>
        @foreach (['Name', 'Description', 'Start Date', 'End Date', 'Priority', 'Status', 'Assigned To', 'Assigned By', 'Actions'] as $header)
            <th class="py-4 px-6 bg-gray-700 text-white font-semibold text-center {{ $loop->first ? 'rounded-tl-lg' : ($loop->last ? 'rounded-tr-lg' : '') }}">{{ $header }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr class="border-b border-gray-600">
            @foreach ([
                $task->name,
                $task->description,
                date('d-m-Y', strtotime($task->start_date)),
                date('d-m-Y', strtotime($task->end_date)),
                $task->priority,
                $task->status,
                $task->assigned_to == Auth::id() ? 'Me' : ($task->assignedUser ? $task->assignedUser->name : 'Own Task'),
                $task->user->name
            ] as $value)
                <td class="py-4 px-6 text-center {{ is_string($value) ? 'text-gray-300' : '' }}">
                    @if (in_array($value, [$task->priority, $task->status]))
                        <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full {{ $value === 'Critical' ? 'bg-red-500 text-white' : ($value === 'Minor' ? 'bg-yellow-500 text-black' : ($value === 'Completed' ? 'bg-green-500 text-white' : ($value === 'Canceled' ? 'bg-red-500 text-white' : 'bg-gray-500 text-white'))) }}">
                                {{ $value }}
                        </span>
                    @else
                        {{ $value }}
                    @endif
                </td>
            @endforeach
            <td class="py-4 px-6 text-center">
                <x-action-button :task="$task" />
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
