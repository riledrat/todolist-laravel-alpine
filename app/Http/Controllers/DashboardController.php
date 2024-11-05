<?php

    namespace App\Http\Controllers;

    use App\Models\Task;
    class DashboardController extends Controller
    {
        public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
        {
            $userId = \Illuminate\Support\Facades\Auth::id();

            $totalTasks = Task::where('user_id', $userId)->count();
            $completedTasks = Task::where('user_id', $userId)->where('status', 'Completed')->count();
            $pendingTasks = Task::where('user_id', $userId)->where('status', 'Pending')->count();
            $canceledTasks = Task::where('user_id', $userId)->where('status', 'Canceled')->count();

            $recentActivities = \App\Models\ActivityLog::where('user_id', $userId)->latest()->take(5)->get();

            return view('dashboard', compact('totalTasks', 'completedTasks', 'pendingTasks', 'canceledTasks', 'recentActivities'));
        }

    }
