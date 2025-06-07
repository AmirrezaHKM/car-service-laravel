@extends('layouts.customer.app')

@section('title', 'داشبورد مشتری')

@section('content')
    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- کارت خوشامدگویی -->
            <div class="bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 p-6 rounded-lg shadow-xl fade-in text-white">
                <h2 class="text-2xl font-semibold">خوش آمدید {{ Auth::user()->name }}</h2>
                <p class="mt-2">از اینکه به سامانه مشتریان تعمیرگاه ما پیوستید خوشحالیم. در اینجا می‌توانید تمامی نوبت‌ها، وسایل نقلیه و تیکت‌های خود را مدیریت کنید.</p>
                <div class="mt-6">
                    <a href="{{ route('customerpanel.appointments.index') }}"
                       class="inline-block bg-white text-indigo-600 hover:bg-indigo-200 font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                        مشاهده نوبت‌ها
                    </a>
                </div>
            </div>

            <!-- کارت وضعیت نوبت‌ها -->
            <div class="bg-white p-6 rounded-lg shadow-xl fade-in">
                <h2 class="text-2xl font-semibold text-indigo-600">وضعیت نوبت‌ها</h2>
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

            <!-- کارت وسایل نقلیه -->
            <div class="bg-white p-6 rounded-lg shadow-xl fade-in">
                <h2 class="text-2xl font-semibold text-indigo-600">وسایل نقلیه شما</h2>
                <div class="mt-4 space-y-4">
                    @foreach($vehicles as $vehicle)
                        <div class="flex justify-between items-center border-b pb-4">
                            <span class="text-gray-600 font-semibold">{{ $vehicle->brand }} - {{ $vehicle->model }}</span>
                           
                        </div>
                    @endforeach
                    @if($vehicles->isEmpty())
                        <p class="mt-2 text-gray-500">شما وسیله نقلیه‌ای اضافه نکرده‌اید.</p>
                    @endif
                </div>
                <a href="{{ route('customerpanel.vehicles.index') }}"
                   class="mt-4 inline-block text-indigo-600 hover:text-indigo-800 font-semibold">مشاهده همه وسایل نقلیه</a>
            </div>
        </div>

        <!-- بخش تیکت‌ها -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-xl fade-in">
            <h2 class="text-2xl font-semibold text-indigo-600">تیکت‌های شما</h2>
            <div class="mt-6 space-y-4">
                @foreach($tickets as $ticket)
                    <div class="flex justify-between items-center py-3 border-b">
                        <span class="text-gray-600 font-medium">{{ $ticket->subject }}</span>
                        <span class="text-gray-500">{{ $ticket->status }}</span>
                        <a href="{{ route('customerpanel.tickets.show', $ticket->id) }}"
                           class="text-indigo-600 hover:text-indigo-800 font-medium">مشاهده</a>
                    </div>
                @endforeach
                @if($tickets->isEmpty())
                    <p class="mt-2 text-gray-500">هیچ تیکتی ثبت نشده است.</p>
                @endif
            </div>
            <a href="{{ route('customerpanel.tickets.index') }}"
               class="mt-4 inline-block text-indigo-600 hover:text-indigo-800 font-semibold">مشاهده همه تیکت‌ها</a>
        </div>
    </div>
@endsection
