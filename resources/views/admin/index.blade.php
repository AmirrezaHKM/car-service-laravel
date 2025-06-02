@extends('layouts.admin.app')

@section('title', 'داشبورد مدیریت')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-6">
    <!-- خوش‌آمدگویی -->
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 mb-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-2 flex items-center gap-2">
            <i class="bi bi-speedometer2 text-indigo-600 text-2xl"></i>
            خوش آمدید به داشبورد مدیریت
        </h1>
        <p class="text-gray-600 text-sm">در این بخش می‌توانید آمار کلی، تیکت‌ها، کاربران، و فعالیت‌های اخیر را مشاهده کنید.</p>
    </div>

    <!-- کارت‌های آماری -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-indigo-50 p-5 rounded-xl shadow-sm border border-indigo-100">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-indigo-700 mb-1">تعداد کاربران</h3>
                    <p class="text-2xl font-bold text-indigo-900">{{ $usersCount ?? '...' }}</p>
                </div>
                <i class="bi bi-people-fill text-indigo-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-yellow-50 p-5 rounded-xl shadow-sm border border-yellow-100">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-yellow-700 mb-1">تیکت‌های باز</h3>
                    <p class="text-2xl font-bold text-yellow-900">{{ $openTickets ?? '...' }}</p>
                </div>
                <i class="bi bi-ticket-perforated-fill text-yellow-500 text-3xl"></i>
            </div>
        </div>

       
    </div>

    <!-- لینک‌های سریع -->
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <i class="bi bi-lightning-fill text-purple-600"></i>
            دسترسی سریع
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-sm">
            <a href="{{ route('admin.users.index') }}" class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 hover:bg-gray-100 transition flex items-center gap-2">
                <i class="bi bi-person-lines-fill text-gray-600"></i> مدیریت کاربران
            </a>
            <a href="{{ route('admin.tickets.index') }}" class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 hover:bg-gray-100 transition flex items-center gap-2">
                <i class="bi bi-chat-dots text-gray-600"></i> مشاهده تیکت‌ها
            </a>

        </div>
    </div>
</div>
@endsection
