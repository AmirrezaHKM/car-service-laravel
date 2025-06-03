@extends('layouts.home.app')

@section('title', 'تعمیرکاران')

@section('content')

<section class="my-10 px-4">
    <h2 class="text-3xl font-bold mb-10 text-center text-indigo-700">تعمیرکاران فعال</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($repairmen as $repairman)
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1 cursor-pointer flex flex-col justify-between text-center">
                <div>
                    <h3 class="text-2xl font-extrabold text-indigo-800 mb-3">{{ $repairman->name }}</h3>
                    <p class="text-gray-700 mb-2">{{ $repairman->phone }}</p>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $repairman->email }}</p>
                </div>
                <div class="mt-auto">
                    <a href="{{ route('repairmen.profile', $repairman->id) }}">
                        <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                            مشاهده پروفایل
                        </button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="my-6 flex justify-center">
        {{ $repairmen->links() }}
    </div>
</section>

@endsection
