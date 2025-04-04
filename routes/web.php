<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PlotsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\ApplicationController as UserApplicationController;
use App\Http\Controllers\User\UserController;
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
    Route::resource('notifications', ApplicationController::class)->names([
        'index' => 'admin.notifications.index',
        'create' => 'admin.notifications.create',
        'store' => 'admin.notifications.store',
        'show' => 'admin.notifications.show',
        'edit' => 'admin.notifications.edit',
        'update' => 'admin.notifications.update',
        'destroy' => 'admin.notifications.destroy'
    ]);

    // Admin-Notifications
    Route::resource('judgements', NotificationController::class)->names([
        'index' => 'admin.judgements.index',
        'create' => 'admin.judgements.create',
        'store' => 'admin.judgements.store',
        'show' => 'admin.judgements.show',
        'edit' => 'admin.judgements.edit',
        'update' => 'admin.judgements.update',
        'destroy' => 'admin.judgements.destroy'
    ]);

    // Admin-Plots
    Route::resource('judgements', PlotsController::class)->names([
        'index' => 'admin.judgements.index',
        'create' => 'admin.judgements.create',
        'store' => 'admin.judgements.store',
        'show' => 'admin.judgements.show',
        'edit' => 'admin.judgements.edit',
        'update' => 'admin.judgements.update',
        'destroy' => 'admin.judgements.destroy'
    ]);

});

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
        'destroy' => 'user.applications.destroy'
    ]);

    
});

//===================================================================
// LARAVEL LIVEWIRE ROUTES
//===================================================================
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Application guidelines (public but requires auth)
    Route::get('/application-guidelines', function () {
        return view('application-guidelines');
    })->name('application.guidelines');
});

require __DIR__.'/auth.php';