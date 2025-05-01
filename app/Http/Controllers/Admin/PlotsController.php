<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Plot::query();

        // Apply search filter
        if ($request->filled('search') && $request->filled('field')) {
            $field = $request->input('field');
            $search = $request->input('search');

            if (in_array($field, ['id', 'location', 'size', 'plot_number'])) {
                $query->where($field, 'LIKE', "%{$search}%");
            }
        }

        // Apply status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $plots = $query->latest()->paginate(10);

        return view('admin.plots', compact('plots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-plots');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'plot_number' => 'required|string|max:255|unique:plots,plot_number',
            'location' => 'required|string|max:255',
            'size' => 'required|numeric|min:1',
            'status' => 'required|in:available,allocated,reserved',
        ]);

        // Create a new plot record
        Plot::create($validated);

        // Redirect back to the plots list with a success message
        return redirect()->route('admin.plots.index')->with('success', 'Plot created successfully.');
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
        return view('admin.plot-edit', compact('plot'));
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
