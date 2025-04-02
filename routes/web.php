<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\ApplicationController;   //users routers 

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    //The new route to admin dashboard
    Route::view('admin/dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified','admin'])
    ->name('admin.dashboard');


    Route::view('users', 'admin.users')
    ->middleware(['auth', 'verified'])
    ->name('users');

    
    Route::view('applications', 'admin.applications')
    ->middleware(['auth', 'verified'])
    ->name('applications');

    
    Route::view('plots', 'admin.plots')
    ->middleware(['auth', 'verified'])
    ->name('plots');

    
    Route::view('notifications', 'admin.notificattions')
    ->middleware(['auth', 'verified'])
    ->name('notifications');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::get('/plots', [AdminController::class, 'plots'])->name('admin.plots.index');
    Route::get('/applications', [AdminController::class, 'applications'])->name('admin.applications.index');
});

Route::get('/application-guidelines', function () {
    return view('application-guidelines');
})->name('application.guidelines');


// User Dashboard
Route::get('/user/dashboard', [ApplicationController::class, 'dashboard'])->name('user.dashboard');

// New Application
Route::get('/user/application/create', [ApplicationController::class, 'create'])->name('user.application.create');
Route::post('/user/application/store', [ApplicationController::class, 'store'])->name('user.application.store');

// View Application Status
Route::get('/user/application/status', [ApplicationController::class, 'status'])->name('user.application.status');

// Application History
Route::get('/user/application/history', [ApplicationController::class, 'history'])->name('user.application.history');

require __DIR__.'/auth.php';
