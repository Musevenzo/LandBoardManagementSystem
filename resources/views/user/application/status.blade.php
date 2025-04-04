@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Application Status</h1>
    
    <div class="card">
        <div class="card-body">
            @if($applications->isEmpty())
                <p>You have no applications yet.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Reference #</th>
                            <th>Plot Location</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                        <tr>
                            <td>APP-{{ $application->id }}</td>
                            <td>{{ $application->plot->location }}</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $application->status == 'approved' ? 'success' : 
                                    ($application->status == 'rejected' ? 'danger' : 'warning') 
                                }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                            <td>{{ $application->updated_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('view-status-details', $application->id) }}" class="btn btn-sm btn-primary">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection