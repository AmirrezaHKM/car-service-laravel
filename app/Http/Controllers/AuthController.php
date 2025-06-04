<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone'    => 'required|string|max:20|unique:users,phone',
            'role'     => 'required|in:customer,repairman,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $status = in_array($request->role, ['customer', 'admin']);
        $hashedPassword = Hash::make($request->password);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $hashedPassword,
            'phone'    => $request->phone,
            'role'     => $request->role,
            'status'   => $status,
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'phone' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    $user = User::where('phone', trim($request->phone))->first();

    if (!$user) {
        return back()->withErrors([
            'phone' => 'شماره موبایل یافت نشد.',
        ])->withInput();
    }


    if (!Hash::check(trim($request->password), $user->password)) {
        return back()->withErrors([
            'password' => 'رمز عبور اشتباه است.',
        ])->withInput();
    }

    Auth::login($user);

    $request->session()->regenerate();

    return redirect()->intended('/');
}

}
