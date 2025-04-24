<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notification;
use App\Models\Application;
use App\Models\Plot;
use App\Models\PlotAllocation;
use App\Models\PlotStatus;

class ReportController extends Controller
{
    public function index()
    {
        // Fetch data for reports (example: user activity, application stats, etc.)
        $reports = [
            [
                'title' => 'User Activity Report',
                'description' => 'Summary of user activities over time.',
                'link' => route('admin.reports.user-activity'),
            ],
            [
                'title' => 'Application Status Report',
                'description' => 'Overview of application statuses.',
                'link' => route('admin.reports.application-status'),
            ],
            [
                'title' => 'Plot Allocation Report',
                'description' => 'Details of plot allocations.',
                'link' => route('admin.reports.plot-allocation'),
            ],
        ];

        return view('admin.reports.index', compact('reports'));
    }
    
    public function userActivity(Request $request)
    {
        $query = User::query();

        // Filter by month
        if ($request->filled('month')) {
            $query->whereMonth('created_at', $request->month);
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->whereYear('created_at', $request->year);
        }

        $users = $query->select('id', 'name', 'email', 'created_at')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);

        return view('admin.reports.user-activity', compact('users'));
    }

    public function applicationStatus(Request $request)
    {
        $query = Application::query();

        // Filter by month
        if ($request->filled('month')) {
            $query->whereMonth('created_at', $request->month);
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->whereYear('created_at', $request->year);
        }

        $applications = $query->with(['user', 'plot'])->paginate(10);

        return view('admin.reports.application-status', compact('applications'));
    }

    public function plotAllocation(Request $request)
    {
        $query = Plot::query();

        // Filter by month
        if ($request->filled('month')) {
            $query->whereMonth('created_at', $request->month);
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->whereYear('created_at', $request->year);
        }

        $plots = $query->with(['applications', 'allocatedUser'])->paginate(10);

        return view('admin.reports.plot-allocation', compact('plots'));
    }

}