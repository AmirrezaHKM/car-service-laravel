@extends('layouts.customer.app')

@section('content')
<div class="container mx-auto mt-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">ایجاد تیکت جدید</h1>

    <form action="{{ route('customerpanel.tickets.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6">
        @csrf

        <!-- موضوع تیکت -->
        <div class="mb-6">
            <label for="subject" class="block text-lg font-medium text-gray-700">موضوع تیکت</label>
            <input
                type="text"
                name="subject"
                id="subject"
                class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="موضوع تیکت خود را وارد کنید"
                value="{{ old('subject') }}"
                required
            />
            @error('subject')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- دکمه ارسال -->
        <div class="mb-6 flex justify-end">
            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                ثبت تیکت
            </button>
        </div>
    </form>

    <div class="text-center">
        <a href="{{ route('customerpanel.tickets.index') }}" class="inline-block my-4 text-center w-[200px] bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">بازگشت به لیست تیکت‌ها</a>
    </div>
</div>
@endsection
