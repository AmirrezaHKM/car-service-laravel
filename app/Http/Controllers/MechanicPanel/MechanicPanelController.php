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
    // گرفتن مکانیک فعلی
    $mechanic = Auth::user();

    // تعداد نوبت‌های در انتظار، تایید شده و تکمیل شده
    $pendingAppointmentsCount = Appointment::where('repairman_id', $mechanic->id)
                                            ->where('status', 'pending')
                                            ->count();

    $confirmedAppointmentsCount = Appointment::where('repairman_id', $mechanic->id)
                                              ->where('status', 'confirmed')
                                              ->count();

    $completedAppointmentsCount = Appointment::where('repairman_id', $mechanic->id)
                                             ->where('status', 'completed')
                                             ->count();

    // دریافت سرویس‌ها و تیکت‌ها برای مکانیک
    $services = Service::where('repairman_id', $mechanic->id)->get();

    // تغییر: استفاده از user_id برای فیلتر تیکت‌ها
    $tickets = Ticket::where('user_id', $mechanic->id)->get();

    // ارسال اطلاعات به ویو
    return view('mechanic.index', [
        'pendingAppointmentsCount' => $pendingAppointmentsCount,
        'confirmedAppointmentsCount' => $confirmedAppointmentsCount,
        'completedAppointmentsCount' => $completedAppointmentsCount,
        'services' => $services,
        'tickets' => $tickets,
    ]);
}

}
