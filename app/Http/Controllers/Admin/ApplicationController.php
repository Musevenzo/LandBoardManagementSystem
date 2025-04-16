<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Plot;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Application::with('user');
        
        // Apply search filter
        if ($request->filled('search') && $request->filled('field')) {
            $field = $request->input('field');
            $search = $request->input('search');
            
            if ($field === 'id') {
                $query->where('id', 'LIKE', "%{$search}%");
            } elseif ($field === 'applicant') {
                $query->whereHas('user', function($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
            } elseif (in_array($field, ['omang', 'location'])) {
                $query->where($field, 'LIKE', "%{$search}%");
            }
        }
        
        // Apply status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        
        $applications = $query->latest()->paginate(10);
        
        return view('admin.applications', compact('applications'));
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
    public function show($id)
    {
        $application = Application::findOrFail($id);
        // Update the view path to locate the file in the correct directory
        return view('admin.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        // Update the view path to locate the file in the correct directory
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

        return redirect()->route('admin.applications.index')->with('success', 'Application status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('admin.applications')->with('success', 'Application deleted successfully');
    
    }
}
