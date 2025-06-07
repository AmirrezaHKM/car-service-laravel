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

        // دریافت تیکت‌ها
        $tickets = $user->tickets()->get() ?? collect(); // اضافه کردن get() برای دریافت تیکت‌ها

        // محاسبه تعداد نوبت‌ها برای مشتری
        $pendingAppointmentsCount = $user->getPendingAppointmentsCount();
        $confirmedAppointmentsCount = $user->getConfirmedAppointmentsCount();
        $completedAppointmentsCount = $user->getCompletedAppointmentsCount();

        // دریافت وسایل نقلیه
        $vehicles = $user->vehicles ?? collect();

        // ارسال داده‌ها به ویو
        return view('customer.index', compact(
            'vehicles',
            'tickets',
            'pendingAppointmentsCount',
            'confirmedAppointmentsCount',
            'completedAppointmentsCount'
        ));
    }






}
