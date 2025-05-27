@extends('layouts.app')

@section('title', 'ویرایش پروفایل')

@section('content')
    <div class="max-w-3xl mx-auto space-y-6 mt-10">

        <a href="{{ route('home') }}" class="inline-block text-blue-600 hover:text-blue-800 font-semibold mb-4">
            ← برگشت به صفحه اصلی
        </a>

        <section class="p-6">
            @include('profile.partials.update-profile-information-form')
        </section>

        <section class="p-6">
            @include('profile.partials.update-password-form')
        </section>

    </div>
@endsection
