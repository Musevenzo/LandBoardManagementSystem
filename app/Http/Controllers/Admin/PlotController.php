<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    // Index method to list all plots
    public function index(Request $request)
    {
        // Filter plots by status if provided
        $status = $request->query('status');
        $plots = Plot::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->paginate(10);

        return view('admin.plots', compact('plots'));
    }

    // Show a single plot
    public function show($id)
    {
        $plot = Plot::findOrFail($id);
        return view('admin.plot-show', compact('plot'));
    }

    // Edit a plot
    public function edit($id)
    {
        $plot = Plot::findOrFail($id);
        return view('admin.plot-edit', compact('plot'));
    }

    public function create() {

        return view('admin.create-plots');
    }

    // Update a plot's status
    public function update(Request $request, $id)
    {
        $plot = Plot::findOrFail($id);
        $plot->update($request->only('status'));
        return redirect()->route('admin.plots.index')->with('success', 'Plot status updated successfully.');
    }
}