<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8" />
    <title>پنل مدیریت</title>
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
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-100 h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col p-5 space-y-3 sticky top-0 h-screen overflow-auto">
        <h2 class="text-xl font-bold mb-6 border-b pb-3 border-gray-200">پنل مدیریت</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }} "
                   class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition
                   {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون داشبورد (نمونه SVG) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 4v6m0-6H7m6 0h6" />
                    </svg>
                    داشبورد
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition
                   {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون کاربران -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 11-8 0 4 4 0 018 0zm8 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    مدیریت کاربران
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tickets.index') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition
                   {{ request()->routeIs('admin.tickets.*') ? 'bg-blue-600 text-white' : 'text-gray-700' }}">
                    <!-- آیکون تیکت‌ها -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 8h10M7 12h8m-5 8h5a2 2 0 002-2v-7a2 2 0 00-2-2h-5a2 2 0 00-2 2v7a2 2 0 002 2z" />
                    </svg>
                    تیکت‌ها
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1  overflow-auto fade-in">
        <header class="bg-gradient-to-l from-indigo-600 to-indigo-500 text-white py-4 px-6 shadow-lg flex justify-between items-center">
            <div class="text-xl font-bold">سامانه مدیریت تعمیرگاه</div>
            <div class="text-sm">👤 {{ Auth::user()->name }} (مدیر سیستم)</div>  <!-- نام مدیر سیستم -->
        </header>
        <div class=" my-10 p-6">
            @yield('content')
        </div>
    </main>

</body>
</html>
