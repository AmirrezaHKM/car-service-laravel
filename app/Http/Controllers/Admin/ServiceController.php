<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('repairman')->latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $repairmen = User::where('role', 'repairman')->get(); // یا هر شرطی که تعمیرکارها را فیلتر می‌کند
        return view('admin.services.create', compact('repairmen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'repairman_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'price_estimate' => 'nullable|numeric',
            'duration_estimate' => 'nullable|integer',
        ]);

        Service::create($request->only([
            'title',
            'repairman_id',
            'description',
            'price_estimate',
            'duration_estimate',
        ]));

        return redirect()->route('admin.services.index')->with('success', 'سرویس با موفقیت ایجاد شد.');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $repairmen = User::where('role', 'repairman')->get();
    return view('admin.services.edit', compact('service', 'repairmen'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            //'repairman_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'price_estimate' => 'nullable|numeric',
            'duration_estimate' => 'nullable|integer',
        ]);

        $service->update($request->only([
            'title',
            //'repairman_id',
            'description',
            'price_estimate',
            'duration_estimate',
        ]));

        return redirect()->route('admin.services.index')->with('success', 'سرویس با موفقیت بروزرسانی شد.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'سرویس با موفقیت حذف شد.');
    }
}
