@extends('layouts.customer.app')

@section('title', 'ویرایش خودرو')

@section('content')
<div class="max-w-lg mx-auto mt-10 px-4">
    <h2 class="text-3xl font-bold text-indigo-800 mb-6">ویرایش خودرو</h2>

    <form action="{{ route('customerpanel.vehicles.update', $vehicle->id) }}" method="POST" class="space-y-6 bg-white p-8 rounded-xl shadow-lg">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700">برند</label>
                <input type="text" name="brand" id="brand" value="{{ old('brand', $vehicle->brand) }}" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('brand')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="model" class="block text-sm font-medium text-gray-700">مدل</label>
                <input type="text" name="model" id="model" value="{{ old('model', $vehicle->model) }}" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('model')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="license_plate" class="block text-sm font-medium text-gray-700">پلاک</label>
                <input type="text" name="license_plate" id="license_plate" value="{{ old('license_plate', $vehicle->license_plate) }}" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('license_plate')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">سال ساخت</label>
                <input type="number" name="year" id="year" value="{{ old('year', $vehicle->year) }}" min="1300" max="1500" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('year')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 space-y-4">
            <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                بروزرسانی
            </button>

            <a href="{{ route('customerpanel.vehicles.index') }}" class="w-full py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition duration-300 ease-in-out text-center flex justify-center items-center">
                برگشت به لیست خودروها
            </a>
        </div>
    </form>
</div>
@endsection
