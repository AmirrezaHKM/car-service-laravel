<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiclesController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $vehicles = Vehicle::where('user_id', $user->id)->get();

        return view('customer.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('customer.vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate',
            'year' => 'required|digits:4|integer',
        ]);
        $user = Auth::user();

        Vehicle::create([
            'user_id' => $user->id,
            'brand' => $request->brand,
            'model' => $request->model,
            'license_plate' => $request->license_plate,
            'year' => $request->year,
        ]);

        return redirect()->route('customerpanel.vehicles.index')->with('success', 'خودرو با موفقیت ثبت شد.');
    }


    public function edit(Vehicle $vehicle)
    {
        $user = Auth::user();

        if ($vehicle->user_id !== $user->id) {
            abort(403);
        }

        return view('customer.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $user = Auth::user();

        if ($vehicle->user_id !== $user->id) {
            abort(403);
        }
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate,' . $vehicle->id,
            'year' => 'required|integer',
        ]);


        $vehicle->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'license_plate' => $request->license_plate,
            'year' => $request->year,
        ]);

        return redirect()->route('customerpanel.vehicles.index')->with('success', 'اطلاعات خودرو با موفقیت بروزرسانی شد.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $user = Auth::user();

        if ($vehicle->user_id !== $user->id) {
            abort(403);
        }

        $vehicle->delete();

        return redirect()->route('customerpanel.vehicles.index')->with('success', 'خودرو با موفقیت حذف شد.');
    }
}
