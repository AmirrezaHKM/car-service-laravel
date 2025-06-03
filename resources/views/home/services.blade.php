@extends('layouts.home.app')

@section('title', 'سرویس ها')

@section('content')

    <section class="my-10 px-4">
        <h2 class="text-3xl font-bold mb-10 text-center text-indigo-700">خدمات ما</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach ($services as $service)
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 cursor-pointer flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-extrabold text-indigo-800 mb-3">{{ $service->title }}</h3>
                        <p class="text-gray-700 mb-4 leading-relaxed min-h-[80px]">{{ $service->description }}</p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-indigo-700 font-bold text-lg">{{ number_format($service->price_estimate) }}
                                تومان</span>
                            <span class="flex items-center text-gray-500 text-sm space-x-2 rtl:space-x-reverse">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8" />
                                </svg>
                                تعمیرکار: {{ $service->repairman->name }}
                            </span>
                        </div>
                        <button
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                            <a href="{{ route('services.detail', $service->id) }}">
                                مشاهده جزئیات
                            </a> </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="my-6 flex justify-center">
            {{ $services->links() }}
        </div>
    </section>

@endsection
