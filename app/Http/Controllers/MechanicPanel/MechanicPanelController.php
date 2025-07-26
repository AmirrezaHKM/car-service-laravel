<?php

namespace App\Http\Controllers\MechanicPanel;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MechanicPanelController extends Controller
{
    public function index()
{
    $mechanic = Auth::user();

    $pendingAppointmentsCount = Appointment::where('repairman_id', $mechanic->id)
                                            ->where('status', 'pending')
                                            ->count();

    $confirmedAppointmentsCount = Appointment::where('repairman_id', $mechanic->id)
                                              ->where('status', 'accepted')
                                              ->count();

    $completedAppointmentsCount = Appointment::where('repairman_id', $mechanic->id)
                                             ->where('status', 'completed')
                                             ->count();

    $services = Service::where('repairman_id', $mechanic->id)->get();

    $tickets = Ticket::where('user_id', $mechanic->id)->get();

    return view('mechanic.index', [
        'pendingAppointmentsCount' => $pendingAppointmentsCount,
        'confirmedAppointmentsCount' => $confirmedAppointmentsCount,
        'completedAppointmentsCount' => $completedAppointmentsCount,
        'services' => $services,
        'tickets' => $tickets,
    ]);
}

}
