@extends('layouts.admin.app')

@section('title', 'مدیریت خدمات')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-6">

    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 mb-6">
        <h1 class="text-xl font-bold text-gray-800 mb-2 flex items-center gap-2">
            <i class="bi bi-tools text-blue-600 text-2xl"></i>
            لیست خدمات ثبت‌شده توسط تعمیرکاران
        </h1>
        <p class="text-gray-600 text-sm">در این بخش می‌توانید خدمات تعمیرکاران را مشاهده، ویرایش یا حذف کنید.</p>
    </div>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.services.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm shadow">
            <i class="bi bi-plus-circle me-1"></i> افزودن خدمت جدید
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow-md border border-gray-200">
        <table class="min-w-full text-sm text-right text-gray-800">
            <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-600">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">تعمیرکار</th>
                    <th class="px-4 py-3 border-b">عنوان خدمت</th>
                    <th class="px-4 py-3 border-b">قیمت (تومان)</th>
                    <th class="px-4 py-3 border-b">مدت زمان (دقیقه)</th>
                    <th class="px-4 py-3 border-b text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $service->id }}</td>
                        <td class="px-4 py-3">{{ $service->repairman->name ?? 'نامشخص' }}</td>
                        <td class="px-4 py-3">{{ $service->title }}</td>
                        <td class="px-4 py-3">{{ number_format($service->price_estimate) }}</td>
                        <td class="px-4 py-3">{{ $service->duration_estimate }}</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.services.edit', $service->id) }}"
                               class="text-indigo-600 hover:underline text-sm me-2">
                                <i class="bi bi-pencil-square"></i> ویرایش
                            </a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('آیا از حذف این خدمت مطمئن هستید؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    <i class="bi bi-trash"></i> حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">هیچ خدمتی یافت نشد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="px-4 py-3 bg-gray-50 border-t text-center">
            {{ $services->links() }}
        </div>
    </div>

</div>
@endsection
