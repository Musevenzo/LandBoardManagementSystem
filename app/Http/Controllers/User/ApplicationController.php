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

       //new changes 
       public function store(Request $request)
       {
           // Validate the form data
           $validated = $request->validate([
               'full_name' => 'required|string|max:255',
               'omang_number' => 'required|string|max:20',
               'ward' => 'required|string|max:255',
               'village' => 'required|string|max:255',
               'address' => 'required|string|max:255',
               'marital_status' => 'required|string|in:single,married,widowed,divorced',
               'date_of_birth' => 'required|date',
               'location' => 'required|string|in:Gaborone,Francistown,Maun,Kasane,Serowe',
               'spouse_full_name' => 'nullable|required_if:marital_status,married|string|max:255',
               'spouse_omang_number' => 'nullable|required_if:marital_status,married|string|max:20',
               'age_declaration' => 'required|accepted',
               'plot_ownership' => 'required|accepted',
               'never_owned_plot' => 'required|accepted',
               'spouse_plot_ownership' => 'nullable|required_if:marital_status,married|boolean',
               'spouse_never_owned_plot' => 'nullable|required_if:marital_status,married|boolean',
               'omang_copy' => 'required|file|mimes:pdf,jpg,png|max:5120',
               'proof_of_payment' => 'required|file|mimes:pdf,jpg,png|max:5120',
               'additional_documents.*' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
               'terms_agreement' => 'required|accepted',
           ]);
   
           // Cast checkbox values to boolean
           $validated['age_declaration'] = filter_var($request->input('age_declaration'), FILTER_VALIDATE_BOOLEAN);
           $validated['plot_ownership'] = filter_var($request->input('plot_ownership'), FILTER_VALIDATE_BOOLEAN);
           $validated['never_owned_plot'] = filter_var($request->input('never_owned_plot'), FILTER_VALIDATE_BOOLEAN);
           $validated['spouse_plot_ownership'] = filter_var($request->input('spouse_plot_ownership', false), FILTER_VALIDATE_BOOLEAN);
           $validated['spouse_never_owned_plot'] = filter_var($request->input('spouse_never_owned_plot', false), FILTER_VALIDATE_BOOLEAN);
           $validated['terms_agreement'] = filter_var($request->input('terms_agreement', false), FILTER_VALIDATE_BOOLEAN);
   
           // Handle file uploads
           $omangCopyPath = $request->file('omang_copy')->store('documents');
           $proofOfPaymentPath = $request->file('proof_of_payment')->store('documents');
   
           $additionalDocuments = [];
           if ($request->hasFile('additional_documents')) {
               foreach ($request->file('additional_documents') as $file) {
                   $additionalDocuments[] = $file->store('documents');
               }
           }
   
           // Store the application in the database
           $application = new Application();
           $application->fill($validated);
           $application->user_id = Auth::id();
           $application->omang_copy = $omangCopyPath;
           $application->proof_of_payment = $proofOfPaymentPath;
           $application->additional_documents = json_encode($additionalDocuments);
           $application->save();
   
           // Redirect to dashboard with success message
           return redirect()->route('user.dashboard')->with('success', 'Your application has been submitted successfully!');
       }

    public function history()
    {
        return view('user.application-history');
    }

    public function status()
    {
        $applications = Application::where('user_id', auth()->id())
            ->with(['user','plot', 'documents'])
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