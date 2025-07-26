@extends('layouts.admin.app')

@section('title', 'ایجاد سرویس جدید')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">

    <h1 class="text-2xl font-semibold mb-6 text-gray-800">ایجاد سرویس جدید</h1>

    @if($errors->any())
        <div class="bg-red-500 text-white p-3 mb-4 rounded-md">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="repairman_id" class="block text-sm font-medium text-gray-700 mb-2">انتخاب تعمیرکار</label>
            <select name="repairman_id" id="repairman_id" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500">
                <option value="">-- تعمیرکار را انتخاب کنید --</option>
                @foreach($repairmen as $repairman)
                    <option value="{{ $repairman->id }}" {{ old('repairman_id') == $repairman->id ? 'selected' : '' }}>
                        {{ $repairman->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">عنوان سرویس</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500" placeholder="عنوان سرویس">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">توضیحات</label>
            <textarea name="description" id="description" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500" placeholder="توضیحات سرویس">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="price_estimate" class="block text-sm font-medium text-gray-700 mb-2">قیمت تخمینی</label>
            <input type="number" name="price_estimate" id="price_estimate" value="{{ old('price_estimate') }}" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500" placeholder="قیمت تخمینی">
        </div>

        <div>
            <label for="duration_estimate" class="block text-sm font-medium text-gray-700 mb-2">مدت زمان تخمینی (دقیقه)</label>
            <input type="number" name="duration_estimate" id="duration_estimate" value="{{ old('duration_estimate') }}" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500" placeholder="مدت زمان تخمینی">
        </div>

        <div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition duration-200">ایجاد سرویس</button>
        </div>

        <div>
            <a href="{{ route('admin.services.index') }}" class="block text-center w-full bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition duration-200">بازگشت به لیست سرویس‌ها</a>
        </div>
    </form>
</div>
@endsection
