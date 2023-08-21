<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // Override the authenticated method to redirect to a specific URL
    public function authenticated(Request $request, $user)
    {
        return redirect()->intended('/dashboard');
    }
}
