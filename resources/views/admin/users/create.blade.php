@extends('layouts.admin.app')

@section('content')
    <div class="bg-white p-5 rounded shadow max-w-xl mx-auto">
        <h1 class="text-xl font-bold mb-4">ایجاد کاربر جدید</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">نام</label>
                <input type="text" name="name" id="name"
                       class="w-full border rounded p-2" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">ایمیل</label>
                <input type="email" name="email" id="email"
                       class="w-full border rounded p-2" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block font-medium mb-1">شماره تلفن</label>
                <input type="text" name="phone" id="phone" class="w-full border rounded p-2" value="{{ old('phone') }}" required>
            </div>


            <div class="mb-4">
                <label for="password" class="block font-medium mb-1">رمز عبور</label>
                <input type="password" name="password" id="password" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block font-medium mb-1">تکرار رمز عبور</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="role" class="block font-medium mb-1">نقش</label>
                <select name="role" id="role" class="w-full border rounded p-2" required>
                    <option value="customer">مشتری</option>
                    <option value="repairman">مکانیک</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="block font-medium mb-1">وضعیت</label>
                <select name="status" id="status" class="w-full border rounded p-2" required>
                    <option value="1">فعال</option>
                    <option value="0">غیرفعال</option>
                </select>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:underline">بازگشت</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">ایجاد کاربر</button>
            </div>
        </form>
    </div>
@endsection
