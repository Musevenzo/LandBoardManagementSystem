<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{

       //hellen
       public function create()
       {
           return view('user.create-application');
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
        return view('user.application-history');
    }

    public function status()
    {
        $applications = Application::where('user_id', auth()->id())
            ->with(['plot', 'documents'])
            ->latest()
            ->get();
            
        return view('user.application-status', compact('applications'));
    }

    /**
     * Display a listing of the user's applications.
     */
    public function index()
    {
        // Fetch all applications for the authenticated user
        $applications = Application::where('user_id', Auth::id())->get();

        return view('user.application-status', compact('applications'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.applications');
    }



}