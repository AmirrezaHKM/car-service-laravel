@extends('layouts.app')

@section('title', 'ورود به سامانه')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 bg-blue-50">
    <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl overflow-hidden flex flex-col md:flex-row">

        <div class="md:w-1/2 hidden md:block">
            <img src="https://images.unsplash.com/photo-1568992687947-868a62a9f521?auto=format&fit=crop&w=800&q=80"
                 alt="تصویر ورود" class="h-full w-full object-cover">
        </div>

        <div class="md:w-1/2 p-8">
            <h2 class="text-2xl font-bold text-blue-700 text-center mb-6">ورود به سامانه</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 mb-2">شماره تلفن</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 mb-2">رمز عبور</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                    ورود
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
