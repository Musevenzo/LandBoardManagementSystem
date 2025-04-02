<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application; // Assuming you have an Application model


class ApplicationController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function create()
    {
        return view('user.application.create'); // Create a view for the application form
    }

    public function store(Request $request)
    {
        // Validate and store the application
        $request->validate([
            'location' => 'required|string|max:255',
            'documents' => 'required|array',
            'documents.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048', // Adjust as needed
        ]);

        // Store the application logic here
        $application = new Application();
        $application->user_id = auth()->id(); // Assuming you have user authentication
        $application->location = $request->location;
        // Handle file uploads
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $path = $document->store('documents'); // Store in storage/app/documents
                $application->documents()->create(['path' => $path]); // Assuming a relationship
            }
        }
        $application->save();

        return redirect()->route('user.dashboard')->with('success', 'Application submitted successfully.');
    }

    public function status()
    {
        // Fetch application status logic here
        $applications = Application::where('user_id', auth()->id())->get();
        return view('user.application.status', compact('applications'));
    }

    public function history()
    {
        // Fetch application history logic here
        $applications = Application::where('user_id', auth()->id())->get();
        return view('user.application.history', compact('applications'));
    }
}