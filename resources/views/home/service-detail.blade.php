@extends('layouts.home.app')

@section('title', $service->title)

@section('content')
<section class="max-w-3xl mx-auto my-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-indigo-800 mb-4">{{ $service->title }}</h2>
        <p class="text-gray-700 mb-4">{{ $service->description }}</p>
        <p class="text-indigo-600 font-semibold mb-6">قیمت تقریبی: {{ number_format($service->price_estimate) }} تومان</p>

        <!-- چک کردن وجود تعمیرکار -->
        <p class="text-gray-700 mb-6">تعمیرکار: {{ $service->repairman?->name ?? 'نامشخص' }}</p>

        <!-- بررسی لاگین بودن کاربر -->
        @if(!auth()->check())
            <span class="inline-block bg-yellow-600 text-white py-2 px-4 rounded-lg font-semibold transition">
                برای رزرو نوبت باید وارد حساب کاربری خود شوید.
            </span>
        @else
            <!-- دکمه باز کردن فرم رزرو -->
            @if($isReserved)
                <span class="inline-block bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold transition">
                    قبلاً رزرو شده
                </span>
            @else
                @if(auth()->user()?->role === 'customer') <!-- بررسی رل کاربر -->
                    <!-- بررسی وجود وسیله نقلیه -->
                    @if(auth()->user()->vehicles->isEmpty())
                        <span class="inline-block bg-yellow-600 text-white py-2 px-4 rounded-lg font-semibold transition">
                            برای رزرو نوبت باید وسیله نقلیه خود را از پنل مشتری اضافه کنید.
                        </span>
                        <a href="{{ route('customerpanel.vehicles.create') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-semibold transition mt-2">
                            افزودن وسیله نقلیه
                        </a>
                    @else
                        <button id="openModalButton" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-semibold transition">
                            رزرو نوبت
                        </button>
                    @endif
                @else
                    <span class="inline-block bg-red-600 text-white py-2 px-4 rounded-lg font-semibold transition">
                        شما نمی‌توانید نوبت رزرو کنید
                    </span>
                @endif
            @endif
        @endif
    </div>
</section>

<!-- دیالوگ باکس برای فرم رزرو -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h3 class="text-xl font-bold text-indigo-800 mb-4">فرم رزرو نوبت</h3>

        <form action="{{ route('customerpanel.appointments.store') }}" method="POST">
            @csrf
            <!-- نمایش پیامی اگر وسیله نقلیه وجود نداشته باشد -->
            @if(auth()->user()->vehicles->isEmpty())
                <p class="text-gray-700 mb-4">شما وسیله نقلیه‌ای ندارید. برای رزرو نوبت باید وسیله نقلیه خود را اضافه کنید.</p>
                <a href="{{ route('customerpanel.vehicles.create') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-semibold transition">
                    افزودن وسیله نقلیه
                </a>
            @else
                <div class="mb-4">
                    <label for="vehicle_id" class="block text-gray-700 mb-2">انتخاب وسیله نقلیه</label>
                    <select name="vehicle_id" id="vehicle_id" class="w-full p-2 border rounded-lg">
                        @foreach(auth()->user()->vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->brand }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="appointment_time" class="block text-gray-700 mb-2">زمان پیشنهادی</label>
                    <input type="datetime-local" name="appointment_time" id="appointment_time" class="w-full p-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="customer_note" class="block text-gray-700 mb-2">یادداشت مشتری</label>
                    <textarea name="customer_note" id="customer_note" rows="4" class="w-full p-2 border rounded-lg"></textarea>
                </div>

                <div class="mb-4">
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <input type="hidden" name="repairman_id" value="{{ $service->repairman?->id ?? '' }}">
                    <input type="hidden" name="status" value="pending">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('services.detail', ['service' => $service->id]) }}" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg font-semibold transition">
                        برگشت
                    </a>

                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-semibold transition">
                        ارسال درخواست
                    </button>
                </div>
            @endif
        </form>
    </div>
</div>

<script>
    // پیدا کردن المنت‌های مودال و دکمه‌ها
    const modal = document.getElementById('modal');
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');

    // وقتی روی دکمه "رزرو نوبت" کلیک شد
    openModalButton.addEventListener('click', function() {
        modal.classList.remove('hidden');
    });

    // وقتی روی دکمه "برگشت" کلیک شد یا هر جایی غیر از مودال کلیک شد
    closeModalButton.addEventListener('click', function() {
        modal.classList.add('hidden');
    });

    // بستن مودال با کلیک خارج از آن
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // بستن مودال با فشار دادن دکمه Escape
    window.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            modal.classList.add('hidden');
        }
    });
</script>
@endsection
