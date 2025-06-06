<?php

namespace App\Http\Controllers\Appointment\Customer;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAppointmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $appointments = Appointment::with(['service', 'vehicle', 'repairman'])
                                    ->where('customer_id', $user->id)
                                    ->get();

        return view('customer.appointments.index', compact('appointments'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'appointment_time' => 'required|date',
            'customer_note' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'repairman_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,accepted,rejected,completed,canceled',
        ]);

        $user = Auth::user();

        $appointment = Appointment::create([
            'customer_id' =>  $user->id,
            'vehicle_id' => $validated['vehicle_id'],
            'service_id' => $validated['service_id'],
            'repairman_id' => $validated['repairman_id'],
            'proposed_time' => $validated['appointment_time'],
            'customer_note' => $validated['customer_note'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('services.list', $validated['service_id'])
                         ->with('success', 'درخواست نوبت با موفقیت ثبت شد.');
    }


}
