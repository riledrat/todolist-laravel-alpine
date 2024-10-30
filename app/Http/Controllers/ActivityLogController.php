<?php

    namespace App\Http\Controllers;

    use App\Models\ActivityLog;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class ActivityLogController extends Controller
    {
        public function index()
        {
            $recentActivities = ActivityLog::where('user_id', Auth::id())->latest()->take(5)->get();
            return view('activity-logs.index', compact('recentActivities'));
        }

        public function clear()
        {
            ActivityLog::where('user_id', Auth::id())->delete();

            return redirect()->back()->with('success', 'Your activity logs have been cleared.');
        }
    }
