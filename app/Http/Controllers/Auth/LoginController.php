<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to their respective dashboards based on their roles.
    |
    */

    use AuthenticatesUsers;

    // redirecting 

    protected $redirectTo = '/admin/dashboard';
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return '/admin/dashboard'; // Redirect to admin dashboard
        }

        return '/user/dashboard'; // Redirect to user dashboard
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //inspect authenticated uers 
    public function login(Request $request)
{
    $this->validateLogin($request);

    // Attempt to log the user in
    if ($this->attemptLogin($request)) {
        $user = auth()->user();

        // Log the user's role for debugging
        \Log::info('Authenticated User Role: ' . $user->role);

        return $this->sendLoginResponse($request);
    }

    // If authentication fails, send a failed login response
    return $this->sendFailedLoginResponse($request);
}

// app/Http/Controllers/Auth/LoginController.php
protected function authenticated(Request $request, $user)
{
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    
    return redirect()->route('user.dashboard');
}


}