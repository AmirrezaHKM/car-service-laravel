<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $repairmen = User::where('role', 'repairman')
            ->where('status', true)
            ->latest()
            ->take(4)
            ->get();

        $minIds = Service::selectRaw('MIN(id) as id')
            ->groupBy('repairman_id', 'title')
            ->pluck('id');

        $services = Service::whereIn('id', $minIds)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('home.index', compact('repairmen', 'services'));
    }

    public function servicesList()
    {
        $services = Service::with('repairman')->paginate(16);
        return view('home.services', compact('services'));
    }

    public function repairmenList()
    {
        $repairmen = User::where('role', 'repairman')
            ->where('status', true)
            ->paginate(16);

        return view('home.repairmen', compact('repairmen'));
    }

    public function showRepairmanProfile($id)
    {
        $repairman = User::with(['services', 'appointments'])->findOrFail($id);

        return view('home.repairmen.profile', [
            'repairman' => $repairman,
            'services' => $repairman->services,
            'appointments' => $repairman->appointments,
        ]);
    }

    public function serviceDetail(Service $service)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'برای مشاهده جزئیات، باید وارد حساب کاربری خود شوید.');
        }

        $isReserved = $service->appointments()->where('customer_id', $user->id)->exists();

        return view('home.service-detail', compact('service', 'isReserved'));
    }





}
