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
    public function index()
    {
        $applications = Application::with(['user', 'plot'])
            ->latest()
            ->paginate(10);
            
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = Application::with(['user', 'plot', 'documents'])->findOrFail($id);
        $plots = Plot::where('status', 'available')->get();
        return view('admin.applications', compact('application', 'plots'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'plot_id' => 'required|exists:plots,id',
            'status' => 'required|in:pending,approved,rejected',
            'comments' => 'nullable|string'
        ]);

        $application = Application::findOrFail($id);
        $application->update($validated);

        return redirect()->route('admin.applications')->with('success', 'Application updated successfully');
    
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
