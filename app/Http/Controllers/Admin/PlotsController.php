<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use Illuminate\Http\Request;

class PlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plots = Plot::withCount('applications')->latest()->paginate(10);
        return view('admin.plots', compact('plots'));
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
        $plot = Plot::findOrFail($id);
        return view('admin.plots', compact('plot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'size' => 'required|numeric',
            'status' => 'required|in:available,occupied,reserved'
        ]);

        $plot = Plot::findOrFail($id);
        $plot->update($validated);

        return redirect()->route('admin.plots')->with('success', 'Plot updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plot = Plot::findOrFail($id);
        $plot->delete();
        return redirect()->route('admin.plots')->with('success', 'Plot deleted successfully');

    }
}
