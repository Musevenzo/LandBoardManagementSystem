<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Notifications\ApplicationProcessed; // Ensure this notification class exists
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $applications = Application::query();

        // Apply filters if provided
        if ($request->filled('search') && $request->filled('field')) {
            $field = $request->input('field');
            $search = $request->input('search');
            $applications->where($field, 'LIKE', "%{$search}%");
        }

        if ($request->filled('status')) {
            $applications->where('status', $request->input('status'));
        }

        $applications = $applications->with('user')->paginate(10);

        return view('admin.applications', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // You can implement this method if needed
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // You can implement this method if needed
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('admin.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        return view('admin.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $application->update(['status' => $request->status]);

        // Send notification to user if status is updated to 'approved'
        if ($request->status === 'approved') {
            $application->user->notify(new ApplicationProcessed($application));
        }

        return redirect()->route('admin.applications.index')->with('success', 'Application status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully');
    }

    /**
     * Reject an application with a reason.
     */
    public function reject(Request $request, Application $application)
    {
        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ]);

        $application->update([
            'status' => 'rejected',
            'rejection_reason' => $validated['rejection_reason'],
            'processed_by' => Auth::id(),
            'processed_at' => now(),
        ]);

        // Send notification to user
        $application->user->notify(new ApplicationProcessed($application));

        return redirect()->back()->with('success', 'Application rejected successfully');
    }
}