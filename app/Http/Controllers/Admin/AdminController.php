<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Count statistics
        $total_users = User::count();
        $total_applications = Application::count();
        $total_plots = Plot::count();
        $pending_applications = Application::where('status', 'pending')->count();
        
        // Get recent applications (last 5)
        $recentApplications = Application::with(['user', 'plot'])
            ->latest()
            ->take(5)
            ->get();
            
        // Create recent activity records
        // This is a simple implementation - you might want to create an actual Activity model
        $recentActivities = collect();
        
        // Add plot activities
        $recentPlots = Plot::latest()->take(3)->get();
        foreach ($recentPlots as $plot) {
            $recentActivities->push((object)[
                'type' => 'plot',
                'description' => "New plot added: {$plot->location}",
                'created_at' => $plot->created_at,
                'is_new' => $plot->created_at->gt(Carbon::now()->subDay())
            ]);
        }
        
        // Add user update activities
        $recentUserUpdates = User::whereDate('updated_at', '>=', Carbon::now()->subDays(7))
            ->where('updated_at', '>', DB::raw('created_at'))
            ->latest('updated_at')
            ->take(3)
            ->get();
            
        foreach ($recentUserUpdates as $user) {
            $recentActivities->push((object)[
                'type' => 'user',
                'description' => "User updated: {$user->name}",
                'created_at' => $user->updated_at,
                'is_new' => $user->updated_at->gt(Carbon::now()->subDay())
            ]);
        }
        
        // Sort activities by created_at
        $recentActivities = $recentActivities->sortByDesc('created_at');

        return view('admin.dashboard', compact(
            'total_users',
            'total_applications',
            'total_plots',
            'pending_applications',
            'recentApplications',
            'recentActivities'
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
