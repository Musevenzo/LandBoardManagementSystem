<?php
    $approved = "approved";
    $rejected = "rejected";
?>
<x-layouts.app title="Application History">
    <div class="container">
        <h1>Applications</h1>
        
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
                        <tr>
                            <td>05/07/2024</td>
                            <td>Plot 34456</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $approved == 'approved' ? 'success' : 
                                    ($rejected == 'rejected' ? 'danger' : 'warning') 
                                }}">
                                    Approved
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
    </x-layouts.app>