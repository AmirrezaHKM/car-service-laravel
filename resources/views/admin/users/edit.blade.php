@extends('layouts.admin.app')

@section('content')
    <div class="bg-white p-5 rounded shadow max-w-xl mx-auto">
        <h1 class="text-xl font-bold mb-4">ویرایش کاربر</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">نام</label>
                <input type="text" name="name" id="name"
                       class="w-full border rounded p-2" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">ایمیل</label>
                <input type="email" name="email" id="email"
                       class="w-full border rounded p-2" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block font-medium mb-1">رمز عبور جدید (اختیاری)</label>
                <input type="password" name="password" id="password" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block font-medium mb-1">تکرار رمز عبور</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full border rounded p-2">
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:underline">بازگشت</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">ذخیره تغییرات</button>
            </div>
        </form>
    </div>
@endsection
