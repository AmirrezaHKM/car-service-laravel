@extends('layouts.app')

@section('title', 'ورود به سامانه')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 bg-blue-50">
    <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl overflow-hidden flex flex-col md:flex-row">

        <!-- تصویر -->
        <div class="md:w-1/2 hidden md:block">
            <img src="https://images.unsplash.com/photo-1568992687947-868a62a9f521?auto=format&fit=crop&w=800&q=80"
                 alt="تصویر ورود" class="h-full w-full object-cover">
        </div>

        <!-- فرم ورود -->
        <div class="md:w-1/2 p-8">
            <h2 class="text-2xl font-bold text-blue-700 text-center mb-6">ورود به سامانه</h2>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- شماره موبایل -->
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-blue-900">شماره موبایل</label>
                    <input id="phone" name="phone" type="text" required autofocus
                        class="mt-1 block w-full rounded-md border border-black shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('phone') }}">
                    <x-input-error :messages="$errors->get('phone')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- رمز عبور -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-blue-900">رمز عبور</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-md border border-black shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- مرا به خاطر بسپار -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" name="remember" type="checkbox"
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                    <label for="remember_me" class="ms-2 text-sm text-gray-700">مرا به خاطر بسپار</label>
                </div>

                <!-- دکمه ورود و لینک‌ها -->
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <div class="text-sm space-x-4 space-x-reverse">
                        <a class="text-blue-600 hover:underline" href="{{ route('register') }}">
                            هنوز ثبت‌نام نکرده‌اید؟
                        </a>
                    </div>
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                        ورود
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
