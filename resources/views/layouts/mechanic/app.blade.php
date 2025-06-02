<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8" />
    <title>پنل مکانیک</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet" />
    <style>
        body {
            direction: rtl;
            font-family: 'Vazir', sans-serif !important;
            scroll-behavior: smooth;
            background-color: #f3f4f6; /* bg-gray-100 */
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

<body class="h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col p-5 space-y-3 sticky top-0 h-screen overflow-auto">
        <h2 class="text-xl font-bold mb-6 border-b pb-3 border-gray-200">پنل مکانیک</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('mechanicpanel.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded hover:bg-emerald-500 hover:text-white transition
                   {{ request()->routeIs('mechanicpanel.dashboard') ? 'bg-emerald-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون داشبورد -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 4v6m0-6H7m6 0h6" />
                    </svg>
                    داشبورد
                </a>
            </li>
            <li>
                <a href="{{ route('mechanicpanel.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded hover:bg-emerald-500 hover:text-white transition
                   {{ request()->routeIs('mechanicpanel.dashboard') ? 'bg-emerald-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون درخواست‌ها -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    درخواست‌های من
                </a>
            </li>
            <li>
                <a href="{{ route('mechanicpanel.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded hover:bg-emerald-500 hover:text-white transition
                   {{ request()->routeIs('mechanicpanel.dashboard') ? 'bg-emerald-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون چک‌لیست وضعیت خودرو -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2l4-4m1 6a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    چک‌لیست وضعیت خودرو
                </a>
            </li>
            <li>
                <a href="{{ route('mechanicpanel.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded hover:bg-emerald-500 hover:text-white transition
                   {{ request()->routeIs('mechanicpanel.dashboard') ? 'bg-emerald-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون تاریخچه تعمیرات -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    تاریخچه تعمیرات
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto fade-in">
        <header
            class="bg-gradient-to-l from-emerald-600 to-emerald-500 text-white py-4 px-6 shadow-lg flex justify-between items-center">
            <div class="text-xl font-bold">سامانه مکانیک تعمیرگاه</div>
            <div class="text-sm">👨‍🔧 مکانیک گرامی</div>
        </header>

        <section class="p-6 space-y-6">
            <div>
                @yield('content')
            </div>
        </section>
    </main>

</body>

</html>
