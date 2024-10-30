<?php

    namespace App\Http\Controllers;

    use App\Models\Task;
    use App\Models\ActivityLog;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class DashboardController extends Controller
    {
        public function index()
        {
            $userId = Auth::id();

            $totalTasks = Task::where('user_id', $userId)->count();
            $completedTasks = Task::where('user_id', $userId)->where('status', 'Completed')->count();
            $pendingTasks = Task::where('user_id', $userId)->where('status', 'Pending')->count();
            $canceledTasks = Task::where('user_id', $userId)->where('status', 'Canceled')->count();

            $recentActivities = ActivityLog::where('user_id', $userId)->latest()->take(5)->get();

            return view('dashboard', compact('totalTasks', 'completedTasks', 'pendingTasks', 'canceledTasks', 'recentActivities'));
        }

    }
