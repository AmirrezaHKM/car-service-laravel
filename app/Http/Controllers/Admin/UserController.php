<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:customer,repairman,admin',
            'status' => 'required|boolean',
            'phone' => 'required|string|max:20', 
        ]);


        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'کاربر با موفقیت ایجاد شد.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'کاربر با موفقیت ویرایش شد.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'کاربر حذف شد.');
    }

    public function toggleStatus(User $user)
    {
        $user->status = !$user->status;
        $user->save();

        return back()->with('success', 'وضعیت کاربر تغییر کرد.');
    }

}
