<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user();
        $applications = Application::where('user_id', $user->id)
            ->with('plot')
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'total' => Application::where('user_id', $user->id)->count(),
            'approved' => Application::where('user_id', $user->id)->where('status', 'approved')->count(),
            'pending' => Application::where('user_id', $user->id)->where('status', 'pending')->count()
        ];

        return view('user.dashboard', compact('applications', 'stats'));
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
