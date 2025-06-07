@extends('layouts.mechanic.app')

@section('content')
<div class="container mx-auto p-6 max-w-xl">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">ویرایش سرویس</h1>
    </div>

    @if($errors->any())
        <div class="bg-red-500 text-white p-3 mb-4 rounded-md">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mechanicpanel.services.update', $service->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-sm space-y-4">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">عنوان سرویس</label>
            <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="عنوان سرویس">
        </div>

        <div class="form-group">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">توضیحات</label>
            <textarea name="description" id="description" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="توضیحات سرویس">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price_estimate" class="block text-sm font-medium text-gray-700 mb-2">قیمت تخمینی</label>
            <input type="number" name="price_estimate" id="price_estimate" value="{{ old('price_estimate', $service->price_estimate) }}" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="قیمت تخمینی">
        </div>

        <div class="form-group">
            <label for="duration_estimate" class="block text-sm font-medium text-gray-700 mb-2">مدت زمان تخمینی (دقیقه)</label>
            <input type="number" name="duration_estimate" id="duration_estimate" value="{{ old('duration_estimate', $service->duration_estimate) }}" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="مدت زمان تخمینی">
        </div>


        <div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 focus:outline-none transition duration-200">بروزرسانی سرویس</button>
        </div>

        <div class="mt-4">
            <a href="{{ route('mechanicpanel.services.index') }}" class="inline-block w-full text-center bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                بازگشت به لیست سرویس‌ها
            </a>
        </div>
    </form>
</div>
@endsection
