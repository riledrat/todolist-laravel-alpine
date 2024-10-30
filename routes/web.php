<?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\TaskController;
    use App\Http\Controllers\ActivityLogController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::middleware('auth')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
        Route::post('/tasks/{task}/cancel', [TaskController::class, 'cancel'])->name('tasks.cancel');
        Route::get('/tasks/completed', [TaskController::class, 'completedTasks'])->name('tasks.completed');
        Route::get('/tasks/canceled', [TaskController::class, 'canceledTasks'])->name('tasks.canceled');

        Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
        Route::delete('/activity-logs/clear', [ActivityLogController::class, 'clear'])->name('activity-logs.clear');

        Route::resource('tasks', TaskController::class);
    });

    require __DIR__.'/auth.php';
