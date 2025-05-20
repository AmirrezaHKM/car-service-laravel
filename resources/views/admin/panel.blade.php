<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'پنل مدیریت')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            direction: rtl;
            font-family: Tahoma, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col text-gray-700">

    <!-- هدر -->
    <header class="bg-gradient-to-l from-indigo-600 to-indigo-500 text-white py-4 px-6 shadow-lg flex justify-between items-center">
        <div class="text-xl font-bold">سامانه مدیریت تعمیرگاه</div>
        <div class="text-sm">👤 مدیر سیستم</div>
    </header>

    <div class="flex flex-grow">

        <!-- سایدبار -->
        <aside class="w-64 bg-white shadow-md p-6 hidden md:block">
            <nav class="space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 font-medium transition">🏠 داشبورد</a>
                <a href="{{ route('admin.users') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 font-medium transition">👥 کاربران</a>
                <a href="{{ route('admin.appointments') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 font-medium transition">📆 نوبت‌ها</a>
                <a href="{{ route('admin.tickets') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 font-medium transition">💬 تیکت‌ها</a>
                <a href="{{ route('admin.vehicles') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 font-medium transition">🚗 خودروها</a>
                <a href="{{ route('admin.mechanics') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 font-medium transition">🛠️ تعمیرکاران</a>
                <a href="{{ route('admin.customers') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 font-medium transition">📋 مشتریان</a>
                <hr class="my-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-right px-4 py-2 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 font-medium transition">🚪 خروج</button>
                </form>
            </nav>
        </aside>

        <!-- محتوای اصلی -->
        <main class="flex-grow p-6">
            @yield('content')
        </main>
    </div>

    <!-- فوتر -->
    <footer class="bg-white border-t text-center py-3 text-xs text-gray-500">
        © 2025 سامانه مدیریت تعمیرگاه
    </footer>
</body>
</html>
