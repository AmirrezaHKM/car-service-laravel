@extends('layouts.home.app')

@section('title', $service->title)

@section('content')
<section class="max-w-3xl mx-auto my-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-indigo-800 mb-4">{{ $service->title }}</h2>
        <p class="text-gray-700 mb-4">{{ $service->description }}</p>
        <p class="text-indigo-600 font-semibold mb-6">قیمت تقریبی: {{ number_format($service->price_estimate) }} تومان</p>

        <a href="#" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-semibold transition">
            رزرو نوبت
        </a>
    </div>
</section>
@endsection
