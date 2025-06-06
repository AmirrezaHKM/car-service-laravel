@extends('layouts.mechanic.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">لیست سرویس‌ها</h1>
        <a href="{{ route('mechanicpanel.services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition">ایجاد سرویس جدید</a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full text-center bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="px-6 py-3 text-center text-gray-800 font-semibold">عنوان سرویس</th>
                <th class="px-6 py-3 text-center text-gray-800 font-semibold">توضیحات</th>
                <th class="px-6 py-3 text-center text-gray-800 font-semibold">قیمت تخمینی</th>
                <th class="px-6 py-3 text-center text-gray-800 font-semibold">مدت زمان تخمینی (دقیقه)</th>
                <th class="px-6 py-3 text-center text-gray-800 font-semibold">عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $service->title }}</td>
                    <td class="px-6 py-4">{{ $service->description ?? 'ندارد' }}</td>
                    <td class="px-6 py-4">{{ $service->price_estimate ? number_format($service->price_estimate) : 'ندارد' }} تومان</td>
                    <td class="px-6 py-4">{{ $service->duration_estimate ?? 'ندارد' }} دقیقه</td>
                    <td class="px-6 py-4 flex gap-3">
                        <a href="{{ route('mechanicpanel.services.edit', $service->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition">ویرایش</a>

                        <form action="{{ route('mechanicpanel.services.destroy', $service->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
