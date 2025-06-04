<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $openTickets = Ticket::where('status', 'open')->count();

        return view('admin.index', [
            'usersCount' => $usersCount,
            'openTickets' => $openTickets,
        ]);
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'ایمیل یا رمز عبور اشتباه است یا شما ادمین نیستید.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('admin.login'));
    }
}