@extends('layouts.customer.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-8 text-center">نوبت‌های شما</h1>

    @if ($appointments->isEmpty())
        <p class="text-center text-lg text-gray-500">شما هیچ نوبتی ثبت نکرده‌اید.</p>
    @else
        <div class="space-y-6">
            @foreach ($appointments as $appointment)
                <div class="p-5 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-between mb-4">
                        <div class="font-semibold text-lg text-gray-800">
                            <strong>خدمت:</strong> {{ $appointment->service->name ?? 'نامشخص' }}
                        </div>
                        <div class="text-sm text-gray-600">
                            <strong>وضعیت:</strong> {{ ucfirst($appointment->status) }}
                        </div>
                    </div>

                    <div class="flex justify-between mb-4 text-gray-700">
                        <div class="text-sm">
                            <strong>وسیله نقلیه:</strong> {{ $appointment->vehicle->name ?? 'نامشخص' }}
                        </div>
                        <div class="text-sm">
                            <strong>تعمیرکار:</strong> {{ $appointment->repairman->name ?? 'نامشخص' }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <strong>زمان نوبت:</strong>
                        @if ($appointment->appointment_time)
                            <span class="text-sm text-gray-700">{{ $appointment->appointment_time->format('Y-m-d H:i') }}</span>
                        @else
                            <span class="text-sm text-red-500">تعیین نشده</span>
                        @endif
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('customerpanel.appointments.show', $appointment->id) }}"
                           class="text-blue-500 hover:text-blue-700 font-semibold transition-colors duration-200">
                           مشاهده جزییات
                        </a>
                        @if($appointment->status == 'pending')
                            <span class="text-xs text-gray-500">منتظر تایید</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
