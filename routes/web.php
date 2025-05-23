<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PlotsController;
use App\Http\Controllers\Admin\UsersController;
// use App\Http\Controllers\Admin\PlotController;
use App\Http\Controllers\User\ApplicationController as UserApplicationController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//===================================================================
// ADMIN ROUTES
//===================================================================
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function() {

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
    // Reports route
        Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports.index');
        
        // Individual report routes
    Route::get('/admin/reports/user-activity', [ReportController::class, 'userActivity'])->name('admin.reports.user-activity');
    Route::get('/admin/reports/application-status', [ReportController::class, 'applicationStatus'])->name('admin.reports.application-status');
    Route::get('/admin/reports/plot-allocation', [ReportController::class, 'plotAllocation'])->name('admin.reports.plot-allocation');
    
    // Admin-Users
    Route::resource('users', UsersController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy'
    ]);

    // Admin-Applications
    Route::resource('applications', ApplicationController::class)->names([
        'index' => 'admin.applications.index',
        'create' => 'admin.applications.create',
        'store' => 'admin.applications.store',
        'show' => 'admin.applications.show',
        'edit' => 'admin.applications.edit',
        'update' => 'admin.applications.update',
        'destroy' => 'admin.applications.destroy'
    ]);

    // Admin-Notifications
    Route::resource('notifications', NotificationController::class)->names([
        'index' => 'admin.notifications.index',
        'create' => 'admin.notifications.create',
        'store' => 'admin.notifications.store',
        'show' => 'admin.notifications.show',
        'edit' => 'admin.notifications.edit',
        'update' => 'admin.notifications.update',
        'destroy' => 'admin.notifications.destroy'
    ]);

    // Admin-Plots
    Route::resource('plots', PlotsController::class)->names([
        'index' => 'admin.plots.index',
        'create' => 'admin.plots.create',
        'store' => 'admin.plots.store',
        'show' => 'admin.plot-show',
        'edit' => 'admin.plot-edit',
        'update' => 'admin.plots.update',
        'destroy' => 'admin.plots.destroy'
    ]);

    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.users.show');

});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('applications', ApplicationController::class)->only(['index', 'show', 'edit', 'update']);
    Route::post('/applications/{application}/approve', [ApplicationController::class, 'approve'])
        ->name('admin.applications.approve');
    Route::post('/applications/{application}/reject', [ApplicationController::class, 'reject'])
        ->name('admin.applications.reject');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('plots', PlotsController::class);
    Route::get('plots/{plot}', [PlotsController::class, 'show'])->name('plot-show');
    Route::get('plots/{plot}/edit', [PlotsController::class, 'edit'])->name('plot-edit');
});

Route::get('/admin/users/{id}', [UsersController::class, 'show'])->name('admin.users.show');

//===================================================================
// USER ROUTES
//===================================================================
Route::prefix('user')->middleware(['auth', 'verified', 'user'])->group(function() {

    // User Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // User-Applications
    Route::resource('applications', UserApplicationController::class)->names([
        'index' => 'user.applications.index',
        'create' => 'user.applications.create',
        'store' => 'user.applications.store',
        'show' => 'user.applications.show',
        'edit' => 'user.applications.edit',
        'update' => 'user.applications.update',
        'destroy' => 'user.applications.destroy',
        'history' => 'user.applications.history',
        'status' => 'user.applications.status',
    ]);
//New added routes for user-status application
Route::get('/user/applications/{application}/edit', [UserApplicationController::class, 'edit'])
    ->name('user.edit-application');
//aplication history
    Route::get('/user/applications/history', [UserApplicationController::class, 'history'])
    ->name('user.application.history');

});

Route::prefix('user')->middleware(['auth', 'verified', 'user'])->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

//===================================================================
// LARAVEL LIVEWIRE ROUTES
//===================================================================
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

});

 // Application guidelines (public but requires auth)
 Route::get('/application-guidelines', function () {
    return view('application-guidelines');
})->name('application.guidelines');

//Real time tracking more information
Route::get('/real-time-tracking', function () {
    return view('real-time-tracking');
})->name('real.time.tracking');

require __DIR__.'/auth.php';