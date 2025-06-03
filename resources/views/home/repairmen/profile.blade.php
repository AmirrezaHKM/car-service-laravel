@extends('layouts.home.app')

@section('title', 'پروفایل تعمیرکار')

@section('content')
<section class="max-w-6xl mx-auto my-12 px-4">
    <h2 class="text-4xl font-extrabold text-indigo-800 mb-10 text-center">پروفایل تعمیرکار</h2>

    <!-- مشخصات تعمیرکار -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-10 border border-indigo-100">
        <h3 class="text-2xl font-bold text-indigo-700 mb-4">اطلاعات فردی</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700 text-base">
            <div><strong>نام:</strong> {{ $repairman->name }}</div>
            <div><strong>شماره تماس:</strong> {{ $repairman->phone }}</div>
            <div><strong>ایمیل:</strong> {{ $repairman->email ?? 'ندارد' }}</div>
            <div><strong>وضعیت:</strong>
                <span class="inline-block px-2 py-1 rounded-full text-white text-sm {{ $repairman->status ? 'bg-green-500' : 'bg-red-500' }}">
                    {{ $repairman->status ? 'فعال' : 'غیرفعال' }}
                </span>
            </div>
        </div>
    </div>

    <!-- لیست خدمات -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-10 border border-indigo-100">
        <h3 class="text-2xl font-bold text-indigo-700 mb-4">خدمات ارائه شده</h3>
        @if($services->count())
            <ul class="space-y-4 text-gray-700 flex flex-wrap gap-2 justify-between">
                @foreach($services as $service)
                <div class="bg-white p-4 w-[350px] rounded-lg shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold text-indigo-700 mb-2">{{ $service->title }}</h3>
                    <p class="text-gray-600 mb-2">{{ $service->description }}</p>
                    <p class="text-indigo-800 font-bold mb-4">قیمت حدودی: {{ number_format($service->price_estimate) }} تومان</p>
                    <a href="{{ route('services.detail', $service->id) }}"
                       class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition duration-200">
                       مشاهده جزئیات
                    </a>
                </div>
            @endforeach

            </ul>
        @else
            <p class="text-gray-500">هیچ خدمتی ثبت نشده است.</p>
        @endif
    </div>

    <!-- لیست نوبت‌ها -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-indigo-100">
        <h3 class="text-2xl font-bold text-indigo-700 mb-4">نوبت‌های ثبت شده</h3>
        @if($appointments->count())
            <table class="w-full text-center text-sm border">
                <thead class="bg-indigo-100 text-indigo-700">
                    <tr>
                        <th class="py-2 px-4 border">مشتری</th>
                        <th class="py-2 px-4 border">تاریخ</th>
                        <th class="py-2 px-4 border">زمان</th>
                        <th class="py-2 px-4 border">وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $app)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border">{{ $app->user->name }}</td>
                            <td class="py-2 px-4 border">{{ jdate($app->date)->format('Y/m/d') }}</td>
                            <td class="py-2 px-4 border">{{ $app->time }}</td>
                            <td class="py-2 px-4 border">
                                <span class="px-2 py-1 text-white text-xs rounded-full {{ $app->status === 'confirmed' ? 'bg-green-500' : ($app->status === 'pending' ? 'bg-yellow-500' : 'bg-red-500') }}">
                                    {{ $app->status === 'confirmed' ? 'تایید شده' : ($app->status === 'pending' ? 'در انتظار' : 'لغو شده') }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">هیچ نوبتی ثبت نشده است.</p>
        @endif
    </div>
</section>
@endsection
