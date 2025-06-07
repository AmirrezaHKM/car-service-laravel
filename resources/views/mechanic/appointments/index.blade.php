@extends('layouts.mechanic.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-indigo-700 mb-8 text-center">نوبت‌های شما</h1>

    @if ($appointments->isEmpty())
        <p class="text-center text-lg text-gray-500">شما هیچ نوبتی ثبت نکرده‌اید.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($appointments as $appointment)
                <div class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="mb-6">
                        <h3 class="font-semibold text-xl text-indigo-800">
                            <strong>خدمت:</strong> {{ $appointment->service->title ?? 'نامشخص' }}
                        </h3>
                    </div>

                    <div class=" mb-4 text-gray-700">
                        <div class="text-sm mb-4">
                            <strong>وسیله نقلیه:</strong> {{ $appointment->vehicle->brand ?? 'نامشخص' }}
                        </div>
                        <div class="text-sm mb-4">
                            <strong>مشتری:</strong> {{ $appointment->customer->name ?? 'نامشخص' }}
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

                    <div class="mb-4">
                        <strong>زمان پیشنهادی:</strong>
                        @if ($appointment->proposed_time)
                            <span class="text-sm text-gray-700">{{ $appointment->proposed_time->format('Y-m-d H:i') }}</span>
                        @else
                            <span class="text-sm text-red-500">تعیین نشده</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-600">وضعیت: </strong>
                        <span class="text-sm font-medium {{ $appointment->status == 'pending' ? 'text-yellow-600' : ($appointment->status == 'accepted' ? 'text-green-600' : 'text-gray-600') }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('mechanicpanel.appointments.show', $appointment->id) }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                           مشاهده جزییات
                        </a>
                        @if($appointment->status == 'pending')
                            <span class="text-xs text-gray-500">هنوز تایید نکرده اید </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
