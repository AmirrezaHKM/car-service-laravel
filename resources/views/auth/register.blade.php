@extends('layouts.app')

@section('title', 'ثبت‌نام | سامانه نوبت‌دهی')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4">

    <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/2 hidden md:block">
            <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=800&q=80"
                 alt="تصویر تعمیرگاه" class="h-full w-full object-cover">
        </div>

        <div class="md:w-1/2 p-8">
            <h2 class="text-2xl font-bold text-blue-700 text-center mb-6">ثبت‌نام در سامانه نوبت‌دهی</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-blue-900">نام کامل</label>
                    <input id="name" name="name" type="text" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('name') }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-blue-900">شماره موبایل</label>
                    <input id="phone" name="phone" type="text" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('phone') }}">
                    <x-input-error :messages="$errors->get('phone')" class="mt-1 text-sm text-red-600" />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-blue-900">ایمیل </label>
                    <input id="email" name="email" type="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('email') }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-blue-900">ثبت‌نام به عنوان</label>
                    <select id="role" name="role" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>مشتری</option>
                        <option value="repairman" {{ old('role') == 'repairman' ? 'selected' : '' }}>تعمیرکار</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-1 text-sm text-red-600" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-blue-900">رمز عبور</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-blue-900">تأیید رمز عبور</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">قبلاً ثبت‌نام کرده‌اید؟</a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                        ثبت‌نام
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
