@extends('layouts.admin')

@section('title', 'داشبورد مدیریت')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 mb-6">داشبورد مدیریت 👋</h2>

    <!-- کارت‌های آمار -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow border">
            <div class="text-sm text-gray-500 mb-1">تعداد کل کاربران</div>
            <div class="text-3xl font-bold text-indigo-600">{{ $usersCount }}</div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow border">
            <div class="text-sm text-gray-500 mb-1">نوبت‌های امروز</div>
            <div class="text-3xl font-bold text-indigo-600">{{ $todayAppointments }}</div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow border">
            <div class="text-sm text-gray-500 mb-1">تیکت‌های باز</div>
            <div class="text-3xl font-bold text-indigo-600">{{ $openTickets }}</div>
        </div>
    </div>

    <!-- آخرین فعالیت‌ها -->
    <div class="bg-white p-6 rounded-xl shadow border">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">آخرین فعالیت‌ها</h3>
        <ul class="space-y-3 text-sm text-gray-600">
            @foreach($activities as $activity)
                <li class="flex items-center">
                    <span class="text-indigo-600 text-lg ml-2">{{ $activity['icon'] }}</span>
                    <span>{!! $activity['text'] !!}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
