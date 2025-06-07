@extends('layouts.mechanic.app')

@section('title', 'داشبورد مکانیک')

@section('content')
    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 p-6 rounded-lg shadow-xl text-white fade-in">
                <h2 class="text-2xl font-semibold">خوش آمدید {{ Auth::user()->name }} عزیز</h2>
                <p class="mt-2">به پنل مکانیکی تعمیرگاه خوش آمدید. در اینجا می‌توانید نوبت‌ها، سرویس‌ها و تیکت‌های خود را مدیریت کنید.</p>
                <div class="mt-6">
                    <a href="{{ route('mechanicpanel.appointments.index') }}"
                       class="inline-block bg-white text-blue-600 hover:bg-blue-200 font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                        مشاهده نوبت‌ها
                    </a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-xl fade-in">
                <h2 class="text-2xl font-semibold text-blue-600">وضعیت نوبت‌ها</h2>
                <div class="mt-6 space-y-4">
                    <div class="flex justify-between text-lg">
                        <span class="text-gray-600">نوبت‌های در انتظار</span>
                        <span class="text-yellow-500 font-semibold">{{ $pendingAppointmentsCount }}</span>
                    </div>
                    <div class="flex justify-between text-lg">
                        <span class="text-gray-600">نوبت‌های تایید شده</span>
                        <span class="text-green-500 font-semibold">{{ $confirmedAppointmentsCount }}</span>
                    </div>
                    <div class="flex justify-between text-lg">
                        <span class="text-gray-600">نوبت‌های تکمیل شده</span>
                        <span class="text-gray-500 font-semibold">{{ $completedAppointmentsCount }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-xl fade-in">
                <h2 class="text-2xl font-semibold text-blue-600">سرویس‌های شما</h2>
                <div class="mt-4 space-y-4">
                    @foreach($services as $service)
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="text-gray-600 font-semibold">{{ $service->title }}</span>

                        </div>
                    @endforeach
                    @if($services->isEmpty())
                        <p class="mt-2 text-gray-500">هیچ سرویس فعالی برای شما ثبت نشده است.</p>
                    @endif
                </div>
                <a href="{{ route('mechanicpanel.services.index') }}"
                   class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-semibold">مشاهده همه سرویس‌ها</a>
            </div>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg shadow-xl fade-in">
            <h2 class="text-2xl font-semibold text-blue-600">تیکت‌های شما</h2>
            <div class="mt-6 space-y-4">
                @foreach($tickets as $ticket)
                    <div class="flex justify-between items-center py-3 border-b">
                        <span class="text-gray-600 font-medium">{{ $ticket->subject }}</span>
                        <span class="text-gray-500">{{ $ticket->status }}</span>
                        <a href="{{ route('mechanicpanel.tickets.show', $ticket->id) }}"
                           class="text-blue-600 hover:text-blue-800 font-medium">مشاهده</a>
                    </div>
                @endforeach
                @if($tickets->isEmpty())
                    <p class="mt-2 text-gray-500">هیچ تیکتی ثبت نشده است.</p>
                @endif
            </div>
            <a href="{{ route('mechanicpanel.tickets.index') }}"
               class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-semibold">مشاهده همه تیکت‌ها</a>
        </div>
    </div>
@endsection
