<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                پنل مشتری
            </h2>
            <nav class="space-x-4 space-x-reverse text-sm">
                <a href="{{ route('customer.dashboard') }}" class="text-indigo-700 hover:underline">داشبورد</a>
                <a href="{{ route('customer.cars.index') }}" class="text-indigo-700 hover:underline">ثبت خودرو</a>
                <a href="{{ route('customer.appointments.create') }}" class="text-indigo-700 hover:underline">درخواست نوبت</a>
                <a href="{{ route('customer.appointments.index') }}" class="text-indigo-700 hover:underline">نوبت‌های من</a>
                <a href="{{ route('customer.support.create') }}" class="text-indigo-700 hover:underline">پشتیبانی</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-red-600 hover:underline">خروج</button>
                </form>
            </nav>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <p class="text-sm text-gray-500 dark:text-gray-400">تعداد خودروهای ثبت‌شده</p>
                    <h3 class="text-2xl font-bold text-indigo-700">{{ $carsCount }}</h3>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <p class="text-sm text-gray-500 dark:text-gray-400">نوبت‌های فعال</p>
                    <h3 class="text-2xl font-bold text-indigo-700">{{ $activeAppointmentsCount }}</h3>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <p class="text-sm text-gray-500 dark:text-gray-400">نوبت‌های لغوشده</p>
                    <h3 class="text-2xl font-bold text-indigo-700">{{ $canceledAppointmentsCount }}</h3>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-100 mb-4">آخرین وضعیت نوبت</h3>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    @forelse($latestAppointments as $appointment)
                        <li>
                            🛠 خودرو <strong>{{ $appointment->car->brand }} {{ $appointment->car->model }}</strong> -
                            {{ __($appointment->status_label) }}
                            ({{ verta($appointment->date)->format('Y/m/d') }})
                        </li>
                        <li>
                            ⌛ مرکز: <strong>{{ $appointment->workshop->name }}</strong>
                        </li>
                    @empty
                        <li>هنوز نوبتی ثبت نشده است.</li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
