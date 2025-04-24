<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Plot;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch total counts
        $total_users = User::count();
        $total_applications = Application::count();
        $total_plots = Plot::count();

        // Fetch pending applications count
        $pending_applications = Application::where('status', 'pending')->count();

        // Fetch recent applications with plot details
        $recentApplications = Application::with(['user', 'plot']) // Assuming relationships are defined
            ->orderBy('created_at', 'desc')
            ->take(5) // Limit to 5 recent applications
            ->get();

        $plot = User::with(['plot']) // Assuming relationships are defined
            // ->where('user_id',)
            // ->orderBy('created_at', 'desc') // Limit to 5 recent applications
            ->get();

        // Fetch recent activities
        $recentActivities = Activity::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'total_users',
            'total_applications',
            'total_plots',
            'pending_applications',
            'recentApplications',
            'recentActivities',
            'plot'
        ));
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
