<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plot;
use App\Models\Application;

class AdminController extends Controller
{
    // ==================== DASHBOARD ====================
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

    // ==================== USERS MANAGEMENT ====================
    public function index()
    {
        $users = User::withCount('applications')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:admin,user'
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }

    // ==================== PLOTS MANAGEMENT ====================
    public function plots()
    {
        $plots = Plot::withCount('applications')->latest()->paginate(10);
        return view('admin.plots.index', compact('plots'));
    }

    public function editPlot($id)
    {
        $plot = Plot::findOrFail($id);
        return view('admin.plots.edit', compact('plot'));
    }

    public function updatePlot(Request $request, $id)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'size' => 'required|numeric',
            'status' => 'required|in:available,occupied,reserved'
        ]);

        $plot = Plot::findOrFail($id);
        $plot->update($validated);

        return redirect()->route('admin.plots.index')->with('success', 'Plot updated successfully');
    }

    public function destroyPlot($id)
    {
        $plot = Plot::findOrFail($id);
        $plot->delete();
        return redirect()->route('admin.plots.index')->with('success', 'Plot deleted successfully');
    }

    // ==================== APPLICATIONS MANAGEMENT ====================
    public function applications()
    {
        $applications = Application::with(['user', 'plot'])
            ->withCount('documents')
            ->latest()
            ->paginate(10);
            
        return view('admin.applications.index', compact('applications'));
    }

    public function editApplication($id)
    {
        $application = Application::with(['user', 'plot', 'documents'])->findOrFail($id);
        $plots = Plot::where('status', 'available')->get();
        return view('admin.applications.edit', compact('application', 'plots'));
    }

    public function updateApplication(Request $request, $id)
    {
        $validated = $request->validate([
            'plot_id' => 'required|exists:plots,id',
            'status' => 'required|in:pending,approved,rejected',
            'comments' => 'nullable|string'
        ]);

        $application = Application::findOrFail($id);
        $application->update($validated);

        return redirect()->route('admin.applications.index')->with('success', 'Application updated successfully');
    }

    public function destroyApplication($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully');
    }
}