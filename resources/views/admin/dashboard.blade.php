@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-gray-500">Total Users</h3>
            <p class="text-2xl font-bold">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-gray-500">Total Applications</h3>
            <p class="text-2xl font-bold">{{ $totalApplications }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-gray-500">Total Plots</h3>
            <p class="text-2xl font-bold">{{ $totalPlots }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-gray-500">Pending Applications</h3>
            <p class="text-2xl font-bold">{{ $pendingApplications }}</p>
        </div>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
        @include('admin.partials.recent-activity')
    </div>
</div>
@endsection