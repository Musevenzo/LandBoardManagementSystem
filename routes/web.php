<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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

require __DIR__.'/auth.php';
