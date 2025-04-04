<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_applications' => Application::count(),
            'total_plots' => Plot::count(),
            'pending_applications' => Application::where('status', 'pending')->count()
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withCount('applications')->latest()->paginate(10);
        return view('admin.users', compact('users'));
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
