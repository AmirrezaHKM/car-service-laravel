<?php

namespace App\Http\Controllers\CustomerPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerPanelController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $tickets = $user->tickets()->get() ?? collect();

        $pendingAppointmentsCount = $user->getPendingAppointmentsCount();
        $confirmedAppointmentsCount = $user->getConfirmedAppointmentsCount();
        $completedAppointmentsCount = $user->getCompletedAppointmentsCount();

        $vehicles = $user->vehicles ?? collect();

        return view('customer.index', compact(
            'vehicles',
            'tickets',
            'pendingAppointmentsCount',
            'confirmedAppointmentsCount',
            'completedAppointmentsCount'
        ));
    }






}
