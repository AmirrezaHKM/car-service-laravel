<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>پنل تعمیرکار | سامانه تعمیرگاه</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            direction: rtl;
            font-family: 'Tahoma', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- هدر -->
    <header class="bg-teal-700 text-white p-4 flex justify-between items-center shadow-md">
        <h1 class="text-lg font-bold">سامانه مدیریت تعمیرگاه</h1>
        <div class="text-sm">🔧 پنل تعمیرکار / سرویس‌کار</div>
    </header>

    <div class="flex flex-grow">

        <!-- سایدبار -->
        <aside class="w-64 bg-white shadow-lg p-6 hidden md:block">
            <h2 class="text-gray-500 text-sm mb-4">منوی تعمیرکار</h2>
            <nav class="space-y-2 text-sm">
                <a href="#" class="block px-4 py-2 rounded-xl hover:bg-teal-100 text-teal-800 font-medium">داشبورد</a>
                <a href="#" class="block px-4 py-2 rounded-xl hover:bg-teal-100 text-teal-800 font-medium">درخواست‌های دریافتی</a>
                <a href="#" class="block px-4 py-2 rounded-xl hover:bg-teal-100 text-teal-800 font-medium">ثبت خدمات انجام‌شده</a>
                <a href="#" class="block px-4 py-2 rounded-xl hover:bg-teal-100 text-teal-800 font-medium">چک‌لیست خودرو</a>
                <a href="#" class="block px-4 py-2 rounded-xl hover:bg-teal-100 text-teal-800 font-medium">پیام‌های مشتریان</a>
                <a href="#" class="block px-4 py-2 rounded-xl bg-red-100 text-red-600 hover:bg-red-200 font-medium mt-4">🚪 خروج</a>
            </nav>
        </aside>

        <!-- محتوای اصلی -->
        <main class="flex-grow p-6">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">سلام، خوش آمدید 👋</h2>

            <!-- کارت‌های آمار -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-5 rounded-xl shadow border border-gray-100 hover:shadow-md transition">
                    <p class="text-sm text-gray-500 mb-1">نوبت‌های در انتظار تایید</p>
                    <h3 class="text-3xl font-bold text-teal-700">3</h3>
                </div>
                <div class="bg-white p-5 rounded-xl shadow border border-gray-100 hover:shadow-md transition">
                    <p class="text-sm text-gray-500 mb-1">ماشین‌های در حال تعمیر</p>
                    <h3 class="text-3xl font-bold text-teal-700">2</h3>
                </div>
                <div class="bg-white p-5 rounded-xl shadow border border-gray-100 hover:shadow-md transition">
                    <p class="text-sm text-gray-500 mb-1">تعمیرات انجام‌شده</p>
                    <h3 class="text-3xl font-bold text-teal-700">18</h3>
                </div>
            </div>

            <!-- درخواست‌های اخیر -->
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">درخواست‌های جدید</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>🚗 نوبت جدید برای <strong>پژو ۲۰۶</strong> از مشتری <strong>علی رضایی</strong> - ۱۴۰۴/۰۲/۲۴</li>
                    <li>📅 منتظر تایید شما برای تعیین زمان مراجعه</li>
                </ul>
            </div>
        </main>
    </div>

    <!-- فوتر -->
    <footer class="bg-white border-t text-center py-3 text-sm text-gray-500">
        © 2025 سامانه مدیریت تعمیرگاه | پنل تعمیرکار
    </footer>
</body>
</html>
