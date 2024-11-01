<?php

    namespace App\Http\Controllers;

    use App\Models\Task;
    use App\Models\ActivityLog;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class TaskController extends Controller
    {
        public function index(Request $request)
        {
            $query = Task::with(['assignedUser', 'user']) // Eager load both assignedUser and user
                ->where('assigned_to', Auth::id())
                ->orWhere('user_id', Auth::id());

            if ($request->filled('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->filled('priority')) {
                $query->where('priority', $request->priority);
            }

            $tasks = $query->get();

            return view('tasks.index', compact('tasks'));
        }

        public function create()
        {
            $users = User::all();
            return view('tasks.create', compact('users'));
        }


        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'priority' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            $assignedTo = $request->input('assigned_to') ?? Auth::id();

            Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'user_id' => Auth::id(),
                'assigned_to' => $assignedTo,
                'priority' => $request->priority,
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        }


        public function edit(Task $task)
        {
            return view('tasks.edit', compact('task'));
        }

        public function update(Request $request, Task $task)
        {
            $request->validate([
                'name' => 'required',
                'priority' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            $task->update($request->all());

            ActivityLog::create([
                'user_id' => Auth::id(),
                'description' => "🔄 Updated task '{$task->name}' on " . now()->format('Y-m-d'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
        }

        public function destroy(Task $task)
        {
            $task->delete();

            ActivityLog::create([
                'user_id' => Auth::id(),
                'description' => "🗑️ Deleted task '{$task->name}' on " . now()->format('Y-m-d'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        }

        public function complete(Task $task)
        {
            $task->update(['status' => 'Completed']);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'description' => "✅ Completed task '{$task->name}' on " . now()->format('Y-m-d'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
        }

        public function cancel(Task $task)
        {
            $task->update(['status' => 'Canceled']);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'description' => "❌ Canceled task '{$task->name}' on " . now()->format('Y-m-d'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task has been canceled.');
        }

        public function completedTasks()
        {
            $tasks = Task::where('status', 'Completed')->where('user_id', Auth::id())->get();
            return view('tasks.completed', compact('tasks'));
        }

        public function canceledTasks()
        {
            $tasks = Task::where('status', 'Canceled')->where('user_id', Auth::id())->get();
            return view('tasks.canceled', compact('tasks'));
        }
    }
