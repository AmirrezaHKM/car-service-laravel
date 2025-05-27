@extends('layouts.base')

@section('title', 'خانه')

@section('content')
    <!-- بخش Hero -->
    <section class="flex flex-col justify-center items-center text-center px-4 py-12 bg-gradient-to-br from-indigo-100 to-white fade-in">
        <h2 class="text-4xl font-bold text-indigo-800 mb-4">تجربه‌ای نوین در مدیریت تعمیرگاه</h2>
        <p class="max-w-xl text-gray-600 text-lg leading-relaxed mb-6">
            با سامانه ما می‌توانید نوبت‌های تعمیر را آسان‌تر رزرو کنید، درخواست‌های مشتریان را مدیریت کرده و با پشتیبانی در ارتباط باشید.
        </p>
        <div class="flex gap-4 flex-wrap justify-center">
            <a href="/login" class="px-6 py-3 bg-indigo-700 text-white rounded-lg shadow hover:bg-indigo-800 transition">ورود به حساب</a>
            <a href="/register" class="px-6 py-3 bg-white border border-indigo-700 text-indigo-700 rounded-lg hover:bg-indigo-100 transition">ثبت‌نام</a>
        </div>
    </section>

    <!-- بخش مزایا -->
    <section class="py-12 bg-white fade-in">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center text-gray-700 mb-10">چرا سامانه ما؟</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-indigo-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <div class="text-indigo-700 text-3xl mb-3">📅</div>
                    <h4 class="font-semibold mb-2">رزرو نوبت آنلاین</h4>
                    <p class="text-sm text-gray-600">مشتریان می‌توانند نوبت‌های خود را به صورت آنلاین رزرو و مدیریت کنند.</p>
                </div>
                <div class="bg-indigo-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <div class="text-indigo-700 text-3xl mb-3">🛠</div>
                    <h4 class="font-semibold mb-2">پنل اختصاصی تعمیرکار</h4>
                    <p class="text-sm text-gray-600">تعمیرکاران به راحتی وضعیت خودرو و خدمات را ثبت و پیگیری می‌کنند.</p>
                </div>
                <div class="bg-indigo-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <div class="text-indigo-700 text-3xl mb-3">📊</div>
                    <h4 class="font-semibold mb-2">کنترل کامل مدیریت</h4>
                    <p class="text-sm text-gray-600">مدیر سامانه تمام نوبت‌ها، کاربران و تیکت‌ها را تحت کنترل دارد.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
