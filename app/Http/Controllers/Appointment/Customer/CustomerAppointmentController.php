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
    public function show($appointment)
    {
        $appointment = Appointment::with(['checklist', 'serviceReport'])->findOrFail($appointment);
        return view('customer.appointments.show', compact('appointment'));
    }



    public function update(Request $request, $appointment)
    {
        $appointment = Appointment::findOrFail($appointment);

        $request->validate([
            'proposed_time' => 'nullable|date',
            'customer_note' => 'nullable|string',
        ]);

        $appointment->update([
            'proposed_time' => $request->proposed_time,
            'customer_note' => $request->customer_note,
        ]);

        return redirect()->route('customerpanel.appointments.index')->with('success', 'نوبت با موفقیت ویرایش شد.');
    }

    public function destroy($id)
    {
        $user = Auth::user();

        $appointment = Appointment::findOrFail($id);

        if ($appointment->customer_id !== $user->id) {
            return redirect()->route('customerpanel.appointments.index')->with('error', 'شما اجازه حذف این نوبت را ندارید.');
        }

        $appointment->delete();

        return redirect()->route('customerpanel.appointments.index')->with('success', 'نوبت با موفقیت حذف شد.');
    }
}
