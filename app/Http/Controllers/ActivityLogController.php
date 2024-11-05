<?php

    namespace App\Http\Controllers;

    class ActivityLogController extends Controller
    {
        public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
        {
            $recentActivities = \App\Models\ActivityLog::where('user_id', \Illuminate\Support\Facades\Auth::id())->latest()->take(5)->get();
            return view('activity-logs.index', compact('recentActivities'));
        }

        public function clear(): \Illuminate\Http\RedirectResponse
        {
            \App\Models\ActivityLog::where('user_id', \Illuminate\Support\Facades\Auth::id())->delete();

            return redirect()->back()->with('success', 'Your activity logs have been cleared.');
        }
    }
