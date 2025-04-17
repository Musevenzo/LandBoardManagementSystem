<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function dashboard()
{
    $user = auth()->user();
    
    return view('user.dashboard', [
        'totalApplications' => $user->applications()->count(),
        'pendingApplications' => $user->applications()->where('status', 'pending')->count(),
        'approvedApplications' => $user->applications()->where('status', 'approved')->count(),
        'notifications' => $user->notifications()->latest()->take(5)->get(),
        'unreadNotificationsCount' => $user->unreadNotifications()->count(),
    ]);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
