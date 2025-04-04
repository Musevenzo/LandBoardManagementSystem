<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\ApplicationController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// ========================
// COMMON AUTHENTICATED ROUTES
// ========================
Route::middleware(['auth', 'verified'])->group(function () {
    // Settings routes (accessible by all authenticated users)
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    
    // Application guidelines (public but requires auth)
    Route::get('/application-guidelines', function () {
        return view('application-guidelines');
    })->name('application.guidelines');
});

// Custom routes for user and admin dashboards
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');

// ========================
// ADMIN-SPECIFIC ROUTES
// ========================
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {
    // Admin Dashboard - use the dedicated DashboardController
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    
    // Users
    Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    
    // Plots
    Route::get('/plots', [AdminController::class, 'plots'])->name('admin.plots.index');
    Route::get('/plots/{plot}/edit', [AdminController::class, 'editPlot'])->name('admin.plots.edit');
    
    // Applications
    Route::get('/applications', [AdminController::class, 'applications'])->name('admin.applications.index');
    Route::get('/applications/{application}/edit', [AdminController::class, 'editApplication'])->name('admin.applications.edit');
});

// ========================
// USER-SPECIFIC ROUTES
// ========================
Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    // User Dashboard
    Route::get('/dashboard', [ApplicationController::class, 'dashboard'])->name('user.dashboard');
    
    // Application Management
    Route::prefix('application')->group(function () {
        // Create new application
        Route::get('/create', [ApplicationController::class, 'create'])->name('user.application.create');
        Route::post('/store', [ApplicationController::class, 'store'])->name('user.application.store');
        
        // View application status
        Route::get('/status', [ApplicationController::class, 'status'])->name('user.application.status');
        
        // Application history
        Route::get('/history', [ApplicationController::class, 'history'])->name('user.application.history');
         

        Route::middleware(['auth'])->group(function () {
            Route::get('/my-applications', [ApplicationController::class, 'index'])->name('my-applications');
            Route::get('/application-history', [ApplicationController::class, 'history'])->name('application-history');
            Route::get('/application-status', [ApplicationController::class, 'status'])->name('view-status');
            Route::get('/application-status/{application}', [ApplicationController::class, 'statusDetails'])->name('view-status-details');
        });
    });

    
    // Legacy routes (consider deprecating these in favor of the prefixed versions above)
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('applications', 'admin.applications')->name('applications');
    Route::view('plots', 'admin.plots')->name('plots');
});

require __DIR__.'/auth.php';
