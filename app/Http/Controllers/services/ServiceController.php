<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('repairman_id', auth()->user()->id)->get();

        return view('mechanic.services.index', compact('services'));
    }


    public function create()
    {
        return view('mechanic.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_estimate' => 'nullable|numeric',
            'duration_estimate' => 'nullable|integer',
        ]);

        Service::create([
            'repairman_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'price_estimate' => $request->price_estimate,
            'duration_estimate' => $request->duration_estimate,
        ]);

        return redirect()->route('mechanicpanel.services.index')->with('success', 'سرویس جدید با موفقیت ایجاد شد!');
    }

    public function edit(Service $service)
    {
        $repairmen = User::where('role', 'repairman')->get();
        return view('mechanic.services.edit', compact('service', 'repairmen'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_estimate' => 'nullable|numeric',
            'duration_estimate' => 'nullable|integer',
        ]);

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'price_estimate' => $request->price_estimate,
            'duration_estimate' => $request->duration_estimate,
        ]);

        return redirect()->route('mechanicpanel.services.index')->with('success', 'سرویس با موفقیت بروزرسانی شد!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('mechanicpanel.services.index')->with('success', 'سرویس با موفقیت حذف شد!');
    }
}