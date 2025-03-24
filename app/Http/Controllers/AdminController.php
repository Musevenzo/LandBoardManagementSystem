<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use App\Models\Plot; // Import the Plot model
use App\Models\Application; // Import the Application model

class AdminController extends Controller
{
    // ==================== USERS MANAGEMENT ====================

    /**
     * Display a list of all users.
     */
    public function index()
    {
        $users = User::all(); // Fetch all users
        // dd($users)   //debugging:dump and die to inspect $users
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for editing a user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        return view('admin.users', compact('user'));
    }

    /**
     * Update a user's details.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all()); // Update user details
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    /**
     * Delete a user.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Delete the user
        return redirect()->route('admin.usersr')->with('success', 'User deleted successfully');
    }

    // ==================== PLOTS MANAGEMENT ====================

    /**
     * Display a list of all plots.
     */
    public function indexPlots()
    {
        $plots = Plot::all(); // Fetch all plots
        return view('admin.plots.index', compact('plots'));
    }

    /**
     * Show the form for editing a plot.
     */
    public function editPlot($id)
    {
        $plot = Plot::findOrFail($id); // Find the plot by ID
        return view('admin.plots.edit', compact('plot'));
    }

    /**
     * Update a plot's details.
     */
    public function updatePlot(Request $request, $id)
    {
        $plot = Plot::findOrFail($id);
        $plot->update($request->all()); // Update plot details
        return redirect()->route('admin.plots.index')->with('success', 'Plot updated successfully');
    }

    /**
     * Delete a plot.
     */
    public function destroyPlot($id)
    {
        $plot = Plot::findOrFail($id);
        $plot->delete(); // Delete the plot
        return redirect()->route('admin.plots.index')->with('success', 'Plot deleted successfully');
    }

    // ==================== APPLICATIONS MANAGEMENT ====================

    /**
     * Display a list of all applications.
     */
    public function indexApplications()
    {
        $applications = Application::with('user', 'plot')->get(); // Fetch applications with user and plot details
        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Show the form for editing an application.
     */
    public function editApplication($id)
    {
        $application = Application::findOrFail($id); // Find the application by ID
        return view('admin.applications.edit', compact('application'));
    }

    /**
     * Update an application's details.
     */
    public function updateApplication(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->update($request->all()); // Update application details
        return redirect()->route('admin.applications.index')->with('success', 'Application updated successfully');
    }

    /**
     * Delete an application.
     */
    public function destroyApplication($id)
    {
        $application = Application::findOrFail($id);
        $application->delete(); // Delete the application
        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully');
    }
}