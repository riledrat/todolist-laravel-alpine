<?php
    declare(strict_types=1);

    namespace App\Http\Controllers;

    use App\Models\Task;
    use App\Models\ActivityLog;

    class TaskController extends Controller
    {
        private $userId;

        public function __construct()
        {
            $this->userId = \Illuminate\Support\Facades\Auth::id();
        }

        public function index(\Illuminate\Http\Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
        {
            $query = Task::with(['assignedUser', 'user'])
                ->where('assigned_to', $this->userId)
                ->orWhere('user_id', $this->userId);

            if ($request->filled('name')) {
                $query->where('name', 'like', '%' . $request->input('name') . '%');
            }
            if ($request->filled('priority')) {
                $query->where('priority', $request->input('priority'));
            }

            $tasks = $query->get();

            return view('tasks.index', compact('tasks'));
        }

        public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
        {
            $users = \App\Models\User::all();
            return view('tasks.create', compact('users'));
        }

        public function store(\App\Http\Requests\StoreTaskRequest $request): \Illuminate\Http\RedirectResponse
        {
            $assignedTo = $request->input('assigned_to') ?? $this->userId;

            $task = Task::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'user_id' => $this->userId,
                'assigned_to' => $assignedTo,
                'priority' => $request->input('priority'),
            ]);

            \Illuminate\Support\Facades\Log::info('Starting TaskAssigned Event.');
            event(new \App\Events\TaskAssigned($task->name, $assignedTo));

            return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        }


        public function edit(Task $task): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
        {
            return view('tasks.edit', compact('task'));
        }

        public function update(\App\Http\Requests\UpdateTaskRequest $request, Task $task): \Illuminate\Http\RedirectResponse
        {
            $task->update($request->all());

            ActivityLog::create([
                'user_id' => $this->userId,
                'description' => "🔄 Updated task '{$task->name}' on " . now()->format('Y-m-d'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
        }

        public function destroy(Task $task): \Illuminate\Http\RedirectResponse
        {
            $task->delete();

            ActivityLog::create([
                'user_id' => $this->userId,
                'description' => "🗑️ Deleted task '{$task->name}' on " . now()->format('Y-m-d'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        }

        public function complete(Task $task): \Illuminate\Http\RedirectResponse
        {
            $task->update(['status' => 'Completed']);

            ActivityLog::create([
                'user_id' => $this->userId,
                'description' => "✅ Completed task '{$task->name}' on " . now()->format('Y-m-d'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
        }

        public function cancel(Task $task): \Illuminate\Http\RedirectResponse
        {
            $task->update(['status' => 'Canceled']);

            ActivityLog::create([
                'user_id' => $this->userId,
                'description' => "❌ Canceled task '{$task->name}' on " . now()->format('Y-m-d'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task has been canceled.');
        }

        public function completedTasks(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
        {
            $tasks = Task::where('status', 'Completed')->where('user_id', $this->userId)->get();
            return view('tasks.completed', compact('tasks'));
        }

        public function canceledTasks(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
        {
            $tasks = Task::where('status', 'Canceled')->where('user_id', $this->userId)->get();
            return view('tasks.canceled', compact('tasks'));
        }
    }
