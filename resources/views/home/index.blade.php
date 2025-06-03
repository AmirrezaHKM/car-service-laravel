@extends('layouts.home.app')

@section('title', 'خانه')

@section('content')
<section class="relative flex flex-col justify-center items-center text-center px-4 py-24 bg-gradient-to-br from-indigo-900 to-indigo-600 fade-in overflow-hidden">
    <img src="{{ asset('images/repair-shop.jpg') }}" alt="تعمیرگاه" class="absolute inset-0 w-full h-full object-cover opacity-30 pointer-events-none" />

    <div class="absolute inset-0 bg-indigo-900 bg-opacity-60 pointer-events-none"></div>

    <div class="relative z-10 max-w-3xl text-white">
        <h2 class="text-5xl font-extrabold mb-6 drop-shadow-lg">تجربه‌ای نوین در مدیریت تعمیرگاه</h2>
        <p class="text-lg leading-relaxed mb-8 drop-shadow-md">
            با سامانه ما می‌توانید نوبت‌های تعمیر را آسان‌تر رزرو کنید، درخواست‌های مشتریان را مدیریت کرده و با پشتیبانی در ارتباط باشید.
        </p>
        <a href="{{ route('services.list') }}" class="inline-block bg-yellow-400 text-indigo-900 font-bold px-8 py-3 rounded-full shadow-lg hover:bg-yellow-500 transition">
            شروع کنید
        </a>
    </div>
</section>


<section class="my-10 px-4">
    <h2 class="text-3xl font-bold mb-10 text-center text-indigo-700">خدمات ما</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($services as $service)
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 cursor-pointer flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-extrabold text-indigo-800 mb-3">{{ $service->title }}</h3>
                    <p class="text-gray-700 mb-4 leading-relaxed min-h-[80px]">{{ $service->description }}</p>
                </div>
                <div class="mt-auto">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-indigo-700 font-bold text-lg">{{ number_format($service->price_estimate) }} تومان</span>
                        <span class="flex items-center text-gray-500 text-sm space-x-2 rtl:space-x-reverse">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8" />
                            </svg>
                            تعمیرکار: {{ $service->repairman->name }}
                        </span>
                    </div>
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                        جزئیات بیشتر
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('home') }}" class="inline-block bg-indigo-700 text-white px-6 py-3 rounded hover:bg-indigo-800 transition">مشاهده همه خدمات</a>
    </div>
</section>

<section class="my-10 px-4">
    <h2 class="text-3xl font-bold mb-10 text-center text-indigo-700">تعمیرکاران فعال</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($repairmen as $repairman)
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 cursor-pointer flex flex-col justify-between text-center">
                <div>
                    <h3 class="text-2xl font-extrabold text-indigo-800 mb-3">{{ $repairman->name }}</h3>
                    <p class="text-gray-700 mb-2">{{ $repairman->phone }}</p>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $repairman->email }}</p>
                </div>
                <div class="mt-auto">
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                        مشاهده پروفایل
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('home') }}" class="inline-block bg-indigo-700 text-white px-6 py-3 rounded hover:bg-indigo-800 transition">مشاهده همه تعمیرکاران</a>
    </div>
</section>

<section class="py-5 bg-white fade-in cursor-pointer">
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
