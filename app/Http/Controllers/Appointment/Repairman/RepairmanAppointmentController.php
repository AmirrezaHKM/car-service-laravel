<?php

namespace App\Http\Controllers\Appointment\Repairman;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Checklist;
use App\Models\ServiceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairmanAppointmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $appointments = Appointment::with(['service', 'vehicle', 'repairman'])
            ->where('repairman_id', $user->id)
            ->get();

        return view('mechanic.appointments.index', compact('appointments'));
    }

    public function show($appointment)
    {
        $appointment = Appointment::with(['checklist', 'serviceReport', 'vehicle', 'customer', 'repairman'])->findOrFail($appointment);
        return view('mechanic.appointments.show', compact('appointment'));
    }

    public function update(Request $request, $appointment)
    {
        $appointment = Appointment::findOrFail($appointment);
        $user = Auth::user();

        if ($user->id == $appointment->repairman_id) {
            $validated = $request->validate([
                'appointment_time' => 'nullable|date',
                'repairman_note' => 'nullable|string',
                'status' => 'required|in:pending,accepted,rejected,completed,canceled',
            ]);
            
            if (isset($validated['appointment_time'])) {
                $appointment->appointment_time = $validated['appointment_time'];
            }

            if (isset($validated['repairman_note'])) {
                $appointment->repairman_note = $validated['repairman_note'];
            }

            if (isset($validated['status'])) {
                $appointment->status = $validated['status'];
            }

            $appointment->save();

            return redirect()->route('mechanicpanel.appointments.show', $appointment->id)->with('success', 'Appointment updated successfully');
        }

        return redirect()->route('mechanicpanel.appointments.index')->with('error', 'You are not authorized to update this appointment');
    }

    public function showChecklistForm($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        return view('mechanic.appointments.checklist', compact('appointment'));
    }

    public function storeChecklist(Request $request, $appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->checklist()->create([
            'condition_description' => $request->condition_description,
            'damage_report' => $request->damage_report,
        ]);

        return redirect()->route('mechanicpanel.appointments.index')->with('success', 'چک‌لیست با موفقیت اضافه شد.');
    }

    public function updateChecklist(Request $request, $appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $checklist = $appointment->checklist;

        $checklist->update([
            'condition_description' => $request->condition_description,
            'damage_report' => $request->damage_report,
        ]);

        return redirect()->route('mechanicpanel.appointments.index')->with('success', 'چک‌لیست با موفقیت بروزرسانی شد.');
    }

    public function deleteChecklist($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $checklist = $appointment->checklist;

        $checklist->delete();

        return redirect()->route('mechanicpanel.appointments.index')->with('success', 'چک‌لیست با موفقیت حذف شد.');
    }
    public function showServiceReportForm($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        return view('mechanic.appointments.service_report', compact('appointment'));
    }

    public function storeServiceReport(Request $request, $appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);

        $validated = $request->validate([
            'services_performed' => 'required|string',
            'final_price' => 'required|numeric',
            'additional_notes' => 'nullable|string',
        ]);

        ServiceReport::create([
            'appointment_id' => $appointmentId,
            'services_performed' => $validated['services_performed'],
            'final_price' => $validated['final_price'],
            'additional_notes' => $validated['additional_notes'],
        ]);

        return redirect()->route('mechanicpanel.appointments.index')->with('success', 'گزارش خدمات با موفقیت اضافه شد.');
    }

    public function updateServiceReport(Request $request, $appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $serviceReport = $appointment->serviceReport;

        $validated = $request->validate([
            'services_performed' => 'required|string',
            'final_price' => 'required|numeric',
            'additional_notes' => 'nullable|string',
        ]);

        $serviceReport->update([
            'services_performed' => $validated['services_performed'],
            'final_price' => $validated['final_price'],
            'additional_notes' => $validated['additional_notes'],
        ]);

        return redirect()->route('mechanicpanel.appointments.index')->with('success', 'گزارش خدمات با موفقیت بروزرسانی شد.');
    }

    public function deleteServiceReport($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $serviceReport = $appointment->serviceReport;

        $serviceReport->delete();

        return redirect()->route('mechanicpanel.appointments.index')->with('success', 'گزارش خدمات با موفقیت حذف شد.');
    }

}
