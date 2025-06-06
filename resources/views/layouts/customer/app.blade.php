<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8" />
    <title>پنل مشتری</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet" />
    <style>
        body {
            direction: rtl;
            font-family: 'Vazir', sans-serif !important;
            scroll-behavior: smooth;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    @yield('styles')
</head>

<body class="bg-gray-100 h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col p-5 space-y-3 sticky top-0 h-screen overflow-auto">
        <h2 class="text-xl font-bold mb-6 border-b pb-3 border-gray-200">پنل مشتری</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('customerpanel.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition
                   {{ request()->routeIs('customerpanel.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون خانه -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 4v6m0-6H7m6 0h6" />
                    </svg>
                    داشبورد
                </a>
            </li>
            <li>
                <a href="{{ route('customerpanel.vehicles.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition
                   {{ request()->routeIs('customerpanel.vehicles.*') ? 'bg-blue-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون وسیله نقلیه -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4v16m8-8H4" />
                    </svg>
                    وسیله نقلیه من
                </a>
            </li>
            <li>
                <a href="{{ route('customerpanel.appointments.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition
                   {{ request()->routeIs('customerpanel.appointments.*') ? 'bg-blue-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون نوبت‌ها -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    نوبت‌های من
                </a>
            </li>
            <li>
                <a href="{{ route('customerpanel.tickets.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition
                   {{ request()->routeIs('customerpanel.tickets.*') ? 'bg-blue-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون تیکت‌ها -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    تیکت‌ها
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto fade-in">
        <header
            class="bg-gradient-to-l from-blue-600 to-blue-500 text-white py-4 px-6 shadow-lg flex justify-between items-center">
            <div class="text-xl font-bold">سامانه مشتریان تعمیرگاه</div>
            <div class="text-sm flex items-center gap-3">
                <a href="{{ route('home') }}" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition">بازگشت به سایت</a>
                <span>👤 {{ Auth::user()->name }} عزیز</span>
            </div>
        </header>
        <div class="my-10 p-6">
            @yield('content')
        </div>
    </main>

</body>

</html>
