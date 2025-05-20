<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Ticket;
use App\Models\Vehicle;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'todayAppointments' => Appointment::whereDate('created_at', today())->count(),
            'openTickets' => Ticket::where('status', 'open')->count(),
            'activities' => [
                ['icon' => '📅', 'text' => 'مشتری علی رضایی یک نوبت جدید ثبت کرد.'],
                ['icon' => '🔧', 'text' => 'تعمیرکار مهدی رفیعی وضعیت ماشین را بروزرسانی کرد.'],
                ['icon' => '❗', 'text' => 'تیکت جدید از سارا سلیمی ثبت شد.'],
            ]
        ]);
    }

    public function users()
    {
        return view('admin.users', ['users' => User::latest()->paginate(10)]);
    }

    public function appointments()
    {
        return view('admin.appointments', ['appointments' => Appointment::latest()->paginate(10)]);
    }

    public function tickets()
    {
        return view('admin.tickets', ['tickets' => Ticket::latest()->paginate(10)]);
    }

    public function vehicles()
    {
        return view('admin.vehicles', ['vehicles' => Vehicle::latest()->paginate(10)]);
    }

    public function mechanics()
    {
        return view('admin.mechanics', [
            'mechanics' => User::where('role', 'mechanic')->latest()->paginate(10)
        ]);
    }
    
    public function customers()
    {
        return view('admin.customers', [
            'customers' => User::where('role', 'customer')->latest()->paginate(10)
        ]);
    }
}