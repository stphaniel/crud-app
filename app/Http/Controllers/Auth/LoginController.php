<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    
    public function logout()
    {
        Auth::logout();
    
        // Optionally, clear any other session data or tokens
        // Session::flush();
        // Revoke API tokens, etc.
    
        return redirect()->route('login'); // Redirect to the login page after logout
    }
}
