<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{

    public function create()
    {
        $plots = Plot::where('status', 'available')->get();
        return view('user.application', compact('plots'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plot_id' => 'required|exists:plots,id',
            'purpose' => 'required|string|max:255',
            'documents' => 'required|array|min:1',
            'documents.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $application = Application::create([
            'user_id' => auth()->id(),
            'plot_id' => $validated['plot_id'],
            'purpose' => $validated['purpose'],
            'status' => 'pending'
        ]);

        foreach ($request->file('documents') as $document) {
            $path = $document->store('applications/documents');
            $application->documents()->create(['path' => $path]);
        }

        return redirect()->route('user.application')
               ->with('success', 'Application submitted successfully!');
    }

    public function history()
    {
        $applications = Application::where('user_id', auth()->id())
            ->with(['plot', 'documents'])
            ->latest()
            ->paginate(10);

        return view('user.application', compact('applications'));
    }

    public function status()
{
    $applications = Application::where('user_id', auth()->id())
        ->with(['plot', 'documents'])
        ->latest()
        ->get();
        
    return view('user.application', compact('applications'));
}

    public function index()
{
    $applications = Application::where('user_id', auth()->id())->get();
    return view('user.applications', compact('applications'));
}
}