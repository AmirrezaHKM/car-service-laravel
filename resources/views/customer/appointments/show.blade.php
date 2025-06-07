@extends('layouts.customer.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-indigo-700 mb-8 text-center">جزییات نوبت</h1>

    <div class="p-8 bg-white rounded-lg shadow-lg space-y-6">
        <form action="{{ route('customerpanel.appointments.update', $appointment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="vehicle_id" class="text-lg font-semibold text-gray-800">وسیله نقلیه</label>
                    <div class="mt-2 p-4 bg-gray-100 rounded-lg text-gray-700">
                        {{ $appointment->vehicle->brand ?? 'نامشخص' }}
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="repairman_id" class="text-lg font-semibold text-gray-800">تعمیرکار</label>
                    <div class="mt-2 p-4 bg-gray-100 rounded-lg text-gray-700">
                        {{ $appointment->repairman->name ?? 'نامشخص' }}
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="service_id" class="text-lg font-semibold text-gray-800">خدمت</label>
                    <div class="mt-2 p-4 bg-gray-100 rounded-lg text-gray-700">
                        {{ $appointment->service->title ?? 'نامشخص' }}
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="status" class="text-lg font-semibold text-gray-800">وضعیت</label>
                    <div class="mt-2 p-4 bg-gray-100 rounded-lg text-gray-700">
                        <span class="font-medium {{ $appointment->status == 'pending' ? 'text-yellow-600' : ($appointment->status == 'accepted' ? 'text-green-600' : 'text-gray-600') }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="appointment_time" class="text-lg font-semibold text-gray-800">زمان نوبت</label>
                    <div class="mt-2 p-4 bg-gray-100 rounded-lg text-gray-700">
                        {{ $appointment->appointment_time ? $appointment->appointment_time->format('Y-m-d H:i') : 'تعیین نشده' }}
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="proposed_time" class="text-lg font-semibold text-gray-800">زمان پیشنهادی</label>
                    <input type="datetime-local" id="proposed_time" name="proposed_time" value="{{ $appointment->proposed_time ? $appointment->proposed_time->format('Y-m-d\TH:i') : '' }}" class="mt-2 p-4 bg-gray-100 rounded-lg w-full">
                </div>
            </div>

            <div class="flex flex-col">
                <label for="customer_note" class="text-lg font-semibold text-gray-800">یادداشت مشتری</label>
                <textarea id="customer_note" name="customer_note" rows="4" class="mt-2 p-4 bg-gray-100 rounded-lg w-full">{{ $appointment->customer_note }}</textarea>
            </div>

            @if ($appointment->repairman_note)
            <div class="flex flex-col mt-6">
                <label for="repairman_note" class="text-lg font-semibold text-gray-800">یادداشت تعمیرکار</label>
                <div class="mt-2 p-4 bg-white rounded-lg text-gray-700">
                    {{ $appointment->repairman_note }}
                </div>
            </div>
            @else
            <div class="flex flex-col mt-6">
                <label for="repairman_note" class="text-lg font-semibold text-gray-800">یادداشت تعمیرکار</label>
                <div class="mt-2 p-4 bg-white rounded-lg text-gray-500">
                    یادداشتی از تعمیرکار ثبت نشده است.
                </div>
            </div>
            @endif

            <div class="flex justify-start space-x-4 mt-6 gap-3">
                <a href="{{ route('customerpanel.appointments.index') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                    برگشت
                </a>

                <button type="submit" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                    ذخیره تغییرات
                </button>
            </div>
        </form>

        @if ($appointment->checklist)
        <div class="p-6 bg-gray-50 rounded-lg shadow-md mt-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">چک‌لیست تعمیرات</h3>
            <div class="space-y-4">
                <div>
                    <strong class="text-gray-700">توضیحات وضعیت:</strong>
                    <p class="text-gray-600">{{ $appointment->checklist->condition_description ?? 'ندارد' }}</p>
                </div>
                <div>
                    <strong class="text-gray-700">گزارش آسیب‌ها:</strong>
                    <p class="text-gray-600">{{ $appointment->checklist->damage_report ?? 'ندارد' }}</p>
                </div>
            </div>
        </div>
        @else
        <div class="mt-8 text-gray-500">
            <p>چک‌لیستی برای این نوبت ثبت نشده است.</p>
        </div>
        @endif

        @if ($appointment->serviceReport)
        <div class="p-6 bg-gray-50 rounded-lg shadow-md mt-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">گزارش نوبت</h3>
            <div class="space-y-4">
                <div>
                    <strong class="text-gray-700">خدمات انجام شده:</strong>
                    <p class="text-gray-600">{{ $appointment->serviceReport->services_performed }}</p>
                </div>
                <div>
                    <strong class="text-gray-700">قیمت نهایی:</strong>
                    <p class="text-gray-600">{{ number_format($appointment->serviceReport->final_price) }} تومان</p>
                </div>
                <div>
                    <strong class="text-gray-700">یادداشت‌های اضافی:</strong>
                    <p class="text-gray-600">{{ $appointment->serviceReport->additional_notes ?? 'ندارد' }}</p>
                </div>
            </div>
        </div>
        @else
        <div class="mt-8 text-gray-500">
            <p>گزارشی برای این نوبت ثبت نشده است.</p>
        </div>
        @endif

        <form action="{{ route('customerpanel.appointments.destroy', $appointment->id) }}" method="POST" class="mt-6">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                حذف نوبت
            </button>
        </form>

    </div>
</div>
@endsection
