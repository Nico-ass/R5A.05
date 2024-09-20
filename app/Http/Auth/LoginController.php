<?php
namespace App\Http\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() : View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors([
            'email' => 'Email incorrect.',
        ])->onlyInput('email');
    }

    if (!Auth::attempt($request->only('email', 'password'))) {
        return back()->withErrors([
            'password' => 'Mot de passe incorrect.',
        ])->onlyInput('email');
    }

    $request->session()->regenerate();
    return redirect()->intended(''); 
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->intended('/login'); 
    }
}