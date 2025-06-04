@extends('layouts.app')

@section('title', 'ثبت‌نام | سامانه نوبت‌دهی')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 bg-gray-50">

    <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl overflow-hidden flex flex-col md:flex-row">

        <!-- تصویر سمت چپ -->
        <div class="md:w-1/2 hidden md:block">
            <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=800&q=80"
                 alt="تصویر تعمیرگاه" class="h-full w-full object-cover">
        </div>

        <!-- فرم ثبت‌نام سمت راست -->
        <div class="md:w-1/2 p-10">

            <h2 class="text-3xl font-extrabold text-blue-700 text-center mb-8">ثبت‌نام در سامانه نوبت‌دهی</h2>

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <!-- نام کامل -->
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-semibold text-gray-700">نام کامل</label>
                    <input id="name" name="name" type="text" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('name') }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- شماره موبایل -->
                <div class="mb-6">
                    <label for="phone" class="block mb-2 text-sm font-semibold text-gray-700">شماره موبایل</label>
                    <input id="phone" name="phone" type="text" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('phone') }}">
                    <x-input-error :messages="$errors->get('phone')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- ایمیل -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">ایمیل (اختیاری)</label>
                    <input id="email" name="email" type="email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('email') }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- نقش کاربری -->
                <div class="mb-6">
                    <label for="role" class="block mb-2 text-sm font-semibold text-gray-700">ثبت‌نام به عنوان</label>
                    <select id="role" name="role" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>مشتری</option>
                        <option value="repairman" {{ old('role') == 'repairman' ? 'selected' : '' }}>تعمیرکار</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- رمز عبور -->
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-semibold text-gray-700">رمز عبور</label>
                    <input id="password" name="password" type="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- تأیید رمز عبور -->
                <div class="mb-8">
                    <label for="password_confirmation" class="block mb-2 text-sm font-semibold text-gray-700">تأیید رمز عبور</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- دکمه ثبت‌نام -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition duration-150">
                    ثبت‌نام
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
