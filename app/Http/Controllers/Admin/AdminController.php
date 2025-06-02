<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;

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
}