@extends('layouts.customer.app')

@section('title', 'لیست خودروها')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-indigo-800">خودروهای من</h2>
            <a href="{{ route('customerpanel.vehicles.create') }}"
                class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 ease-in-out">
                افزودن خودرو جدید
            </a>
        </div>

        @if ($vehicles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($vehicles as $vehicle)
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-2xl transition duration-300 ease-in-out">
                        <div class="space-y-2">
                            <p class="font-semibold text-indigo-700 text-xl">{{ $vehicle->brand }} {{ $vehicle->model }}</p>
                            <p class="text-sm text-gray-600">
                                پلاک: <span class="font-medium text-gray-800">{{ $vehicle->license_plate }}</span>
                                | سال ساخت: <span class="font-medium text-gray-800">{{ $vehicle->year }}</span>
                            </p>
                        </div>

                        <div class="mt-6 flex justify-between items-center">
                            <a href="{{ route('customerpanel.vehicles.edit', $vehicle) }}"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 text-sm transition duration-300 ease-in-out flex items-center">
                                <i class="fas fa-edit mr-2"></i> ویرایش
                            </a>


                            <form action="{{ route('customerpanel.vehicles.destroy', $vehicle->id) }}" method="POST"
                                onsubmit="return confirm('آیا از حذف این خودرو اطمینان دارید؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm transition duration-300 ease-in-out flex items-center">
                                    <i class="fas fa-trash-alt mr-2"></i> حذف
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-center mt-6">هیچ خودرویی ثبت نشده است.</p>
        @endif
    </div>
@endsection
