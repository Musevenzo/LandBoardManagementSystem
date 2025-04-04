@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Application History</h1>
    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Plot</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->created_at->format('Y-m-d') }}</td>
                        <td>{{ $application->plot->location }}</td>
                        <td>
                            <span class="badge bg-{{ 
                                $application->status == 'approved' ? 'success' : 
                                ($application->status == 'rejected' ? 'danger' : 'warning') 
                            }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection