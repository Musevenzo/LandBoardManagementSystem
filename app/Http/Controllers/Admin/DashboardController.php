<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Add any data you want to pass to the dashboard view
        $data = [
            'title' => 'Admin Dashboard',
            'user' => Auth::user(),
            // Add other dashboard statistics or data here
        ];

        return view('admin.dashboard', $data);
    }
}