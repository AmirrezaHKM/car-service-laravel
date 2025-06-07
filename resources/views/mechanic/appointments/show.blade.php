@extends('layouts.mechanic.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-indigo-700 mb-8 text-center">ویرایش نوبت</h1>

        <div class="p-8 bg-white rounded-lg shadow-lg space-y-6">
            <form action="{{ route('mechanicpanel.appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- بخش اطلاعات نوبت -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- نام وسیله نقلیه -->
                    <div class="flex flex-col">
                        <label for="vehicle_id" class="text-lg font-semibold text-gray-800">وسیله نقلیه</label>
                        <div class="mt-2 p-4 bg-gray-100 rounded-lg text-gray-700">
                            {{ $appointment->vehicle->brand ?? 'نامشخص' }}
                        </div>
                    </div>

                    <!-- نام مشتری -->
                    <div class="flex flex-col">
                        <label for="customer_id" class="text-lg font-semibold text-gray-800">مشتری</label>
                        <div class="mt-2 p-4 bg-gray-100 rounded-lg text-gray-700">
                            {{ $appointment->customer->name ?? 'نامشخص' }}
                        </div>
                    </div>

                    <!-- نام سرویس -->
                    <div class="flex flex-col">
                        <label for="service_id" class="text-lg font-semibold text-gray-800">خدمت</label>
                        <div class="mt-2 p-4 bg-gray-100 rounded-lg text-gray-700">
                            {{ $appointment->service->title ?? 'نامشخص' }}
                        </div>
                    </div>

                    <!-- وضعیت -->
                    <div class="flex flex-col">
                        <label for="status" class="text-lg font-semibold text-gray-800">وضعیت</label>
                        <select name="status" id="status" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">
                            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>منتظر تایید
                            </option>
                            <option value="accepted" {{ $appointment->status == 'accepted' ? 'selected' : '' }}>تایید شده
                            </option>
                            <option value="rejected" {{ $appointment->status == 'rejected' ? 'selected' : '' }}>رد شده
                            </option>
                            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>کامل شده
                            </option>
                            <option value="canceled" {{ $appointment->status == 'canceled' ? 'selected' : '' }}>لغو شده
                            </option>
                        </select>
                    </div>

                    <!-- زمان نوبت -->
                    <div class="flex flex-col">
                        <label for="appointment_time" class="text-lg font-semibold text-gray-800">زمان نوبت</label>
                        <input type="datetime-local" id="appointment_time" name="appointment_time"
                            value="{{ $appointment->appointment_time ? $appointment->appointment_time->format('Y-m-d\TH:i') : '' }}"
                            class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">
                    </div>

                    <!-- زمان پیشنهادی مشتری -->
                    <div class="flex flex-col">
                        <label for="final_time" class="text-lg font-semibold text-gray-800">زمان پیشنهادی مشتری</label>
                        <input type="datetime-local" id="final_time" name="final_time"
                            value="{{ $appointment->proposed_time ? $appointment->proposed_time->format('Y-m-d\TH:i') : '' }}"
                            class="mt-2 p-4 bg-gray-300 rounded-lg w-full" readonly>
                    </div>

                    <!-- یادداشت مشتری -->
                    <div class="flex flex-col">
                        <label for="customer_note" class="text-lg font-semibold text-gray-800">یادداشت مشتری</label>
                        <textarea id="customer_note" name="customer_note" rows="4" class="mt-2 p-4 bg-gray-100 rounded-lg w-full"
                            readonly>{{ $appointment->customer_note }}</textarea>
                    </div>

                    <!-- یادداشت تعمیرکار -->
                    <div class="flex flex-col">
                        <label for="repairman_note" class="text-lg font-semibold text-gray-800">یادداشت تعمیرکار</label>
                        <textarea id="repairman_note" name="repairman_note" rows="4" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">{{ $appointment->repairman_note }}</textarea>
                    </div>
                </div>

                <!-- دکمه ذخیره -->
                <div class="flex justify-start space-x-4 mt-6 gap-3">
                    <a href="{{ route('mechanicpanel.appointments.index') }}"
                        class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                        برگشت
                    </a>

                    <button type="submit"
                        class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                        ذخیره تغییرات
                    </button>
                </div>
            </form>


        </div>
        <!-- بخش چک‌لیست -->
        <div class="mt-8 p-8 bg-white rounded-lg shadow-lg space-y-6">
            <h2 class="text-xl font-semibold text-indigo-700 mb-4">چک‌لیست تعمیرکار</h2>

            @if ($appointment->checklist)
                <!-- فرم ویرایش چک‌لیست -->
                <form action="{{ route('mechanicpanel.appointments.checklist.update', $appointment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="condition_description" class="text-lg font-semibold text-gray-800">توضیحات
                                وضعیت</label>
                            <textarea id="condition_description" name="condition_description" rows="4"
                                class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">{{ $appointment->checklist->condition_description }}</textarea>
                        </div>

                        <div class="flex flex-col">
                            <label for="damage_report" class="text-lg font-semibold text-gray-800">گزارش آسیب</label>
                            <textarea id="damage_report" name="damage_report" rows="4" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">{{ $appointment->checklist->damage_report }}</textarea>
                        </div>
                    </div>

                    <div class="flex space-x-4 mt-6">
                        <button type="submit"
                            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">ویرایش
                            چک‌لیست</button>
                    </div>
                </form>

                <!-- فرم حذف چک‌لیست -->
                <form action="{{ route('mechanicpanel.appointments.checklist.delete', $appointment->id) }}" method="POST"
                    class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">حذف
                        چک‌لیست</button>
                </form>
            @else
                <!-- فرم اضافه کردن چک‌لیست -->
                <form action="{{ route('mechanicpanel.appointments.checklist.store', $appointment->id) }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="condition_description" class="text-lg font-semibold text-gray-800">توضیحات
                                وضعیت</label>
                            <textarea id="condition_description" name="condition_description" rows="4"
                                class="mt-2 p-4 bg-indigo-100 rounded-lg w-full"></textarea>
                        </div>

                        <div class="flex flex-col">
                            <label for="damage_report" class="text-lg font-semibold text-gray-800">گزارش آسیب</label>
                            <textarea id="damage_report" name="damage_report" rows="4" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full"></textarea>
                        </div>
                    </div>

                    <div class="flex space-x-4 mt-6">
                        <button type="submit"
                            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">اضافه
                            کردن چک‌لیست</button>
                    </div>
                </form>
            @endif
        </div>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-semibold text-indigo-700 mb-8 text-center">گزارش خدمات</h1>

            <div class="p-8 bg-white rounded-lg shadow-lg space-y-6">
                @if ($appointment->serviceReport)
                    <!-- فرم ویرایش گزارش خدمات -->
                    <form action="{{ route('mechanicpanel.appointments.service_report.update', $appointment->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label for="services_performed" class="text-lg font-semibold text-gray-800">خدمات انجام شده</label>
                                <textarea id="services_performed" name="services_performed" rows="4" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">{{ $appointment->serviceReport->services_performed }}</textarea>
                            </div>

                            <div class="flex flex-col">
                                <label for="additional_notes" class="text-lg font-semibold text-gray-800">یادداشت‌های اضافی</label>
                                <textarea id="additional_notes" name="additional_notes" rows="4" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">{{ $appointment->serviceReport->additional_notes }}</textarea>
                            </div>

                            <div class="flex flex-col">
                                <label for="final_price" class="text-lg font-semibold text-gray-800">قیمت نهایی</label>
                                <input type="number" id="final_price" name="final_price" step="0.01" value="{{ $appointment->serviceReport->final_price }}" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">
                            </div>
                        </div>

                        <div class="flex justify-start space-x-4 mt-6 gap-3">
                            <button type="submit" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                                ذخیره گزارش
                            </button>
                        </div>
                    </form>

                    <!-- فرم حذف گزارش خدمات -->
                    <form action="{{ route('mechanicpanel.appointments.service_report.delete', $appointment->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                            حذف گزارش
                        </button>
                    </form>
                @else
                    <!-- فرم اضافه کردن گزارش خدمات -->
                    <form action="{{ route('mechanicpanel.appointments.service_report.store', $appointment->id) }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label for="services_performed" class="text-lg font-semibold text-gray-800">خدمات انجام شده</label>
                                <textarea id="services_performed" name="services_performed" rows="4" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full"></textarea>
                            </div>

                            <div class="flex flex-col">
                                <label for="additional_notes" class="text-lg font-semibold text-gray-800">یادداشت‌های اضافی</label>
                                <textarea id="additional_notes" name="additional_notes" rows="4" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full"></textarea>
                            </div>

                            <div class="flex flex-col">
                                <label for="final_price" class="text-lg font-semibold text-gray-800">قیمت نهایی</label>
                                <input type="number" id="final_price" name="final_price" step="0.01" class="mt-2 p-4 bg-indigo-100 rounded-lg w-full">
                            </div>
                        </div>

                        <div class="flex justify-start space-x-4 mt-6 gap-3">
                            <button type="submit" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                                ذخیره گزارش
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

    </div>
@endsection
