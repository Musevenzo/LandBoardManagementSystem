<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();
        
        // Apply search filter
        if ($request->filled('search') && $request->filled('field')) {
            $field = $request->input('field');
            $search = $request->input('search');
            
            if (in_array($field, ['id', 'name', 'email', 'role'])) {
                $query->where($field, 'LIKE', "%{$search}%");
            }
        }
        
        // Apply role filter
        if ($request->filled('role')) {
            $query->where('role', $request->input('role'));
        }
        
        $users = $query->latest()->paginate(10);
        
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:admin,user'
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    
    }
}
