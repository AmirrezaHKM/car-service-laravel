@extends('layouts.customer.app')

@section('title', 'افزودن خودرو')

@section('content')
<div class="max-w-lg mx-auto mt-10 px-4">
    <h2 class="text-3xl font-bold text-indigo-800 mb-6">افزودن خودرو جدید</h2>

    <form action="{{ route('customerpanel.vehicles.store') }}" method="POST" class="space-y-6 bg-white p-8 rounded-xl shadow-lg">
        @csrf

        <div class="space-y-4">
            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700">برند</label>
                <input type="text" name="brand" id="brand" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('brand')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="model" class="block text-sm font-medium text-gray-700">مدل</label>
                <input type="text" name="model" id="model" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('model')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="license_plate" class="block text-sm font-medium text-gray-700">پلاک</label>
                <input type="text" name="license_plate" id="license_plate" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('license_plate')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">سال ساخت</label>
                <input type="number" name="year" id="year"  class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('year')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6 space-y-4">
            <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                ذخیره
            </button>

            <a href="{{ route('customerpanel.vehicles.index') }}" class="w-full py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition duration-300 ease-in-out text-center flex justify-center items-center">
                برگشت به لیست خودروها
            </a>
        </div>
    </form>

</div>
@endsection
