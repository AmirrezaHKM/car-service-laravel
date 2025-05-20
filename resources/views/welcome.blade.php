<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>سامانه نوبت‌دهی تعمیرگاه</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            direction: rtl;
            font-family: 'Tahoma', sans-serif;
            scroll-behavior: smooth;
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out both;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- هدر -->
    <header class="bg-indigo-900 text-white shadow-md py-4 px-6 flex justify-between items-center fade-in">
        <h1 class="text-xl font-bold">سامانه نوبت‌دهی تعمیرگاه</h1>
        <nav class="space-x-4 space-x-reverse text-sm">
            <a href="/login" class="hover:text-gray-300 transition">ورود</a>
            <a href="/register" class="hover:text-gray-300 transition">ثبت‌نام</a>
        </nav>
    </header>

    <!-- بخش Hero -->
    <section class="flex-grow flex flex-col justify-center items-center text-center px-4 py-12 bg-gradient-to-br from-indigo-100 to-white fade-in">
        <h2 class="text-4xl font-bold text-indigo-800 mb-4">تجربه‌ای نوین در مدیریت تعمیرگاه</h2>
        <p class="max-w-xl text-gray-600 text-lg leading-relaxed mb-6">
            با سامانه ما می‌توانید نوبت‌های تعمیر را آسان‌تر رزرو کنید، درخواست‌های مشتریان را مدیریت کرده و با پشتیبانی در ارتباط باشید.
        </p>
        <div class="flex gap-4 flex-wrap justify-center">
            <a href="/login" class="px-6 py-3 bg-indigo-700 text-white rounded-lg shadow hover:bg-indigo-800 transition">ورود به حساب</a>
            <a href="/register" class="px-6 py-3 bg-white border border-indigo-700 text-indigo-700 rounded-lg hover:bg-indigo-100 transition">ثبت‌نام</a>
        </div>
    </section>

    <!-- بخش مزایا -->
    <section class="py-12 bg-white fade-in">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center text-gray-700 mb-10">چرا سامانه ما؟</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-indigo-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <div class="text-indigo-700 text-3xl mb-3">📅</div>
                    <h4 class="font-semibold mb-2">رزرو نوبت آنلاین</h4>
                    <p class="text-sm text-gray-600">مشتریان می‌توانند نوبت‌های خود را به صورت آنلاین رزرو و مدیریت کنند.</p>
                </div>
                <div class="bg-indigo-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <div class="text-indigo-700 text-3xl mb-3">🛠</div>
                    <h4 class="font-semibold mb-2">پنل اختصاصی تعمیرکار</h4>
                    <p class="text-sm text-gray-600">تعمیرکاران به راحتی وضعیت خودرو و خدمات را ثبت و پیگیری می‌کنند.</p>
                </div>
                <div class="bg-indigo-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <div class="text-indigo-700 text-3xl mb-3">📊</div>
                    <h4 class="font-semibold mb-2">کنترل کامل مدیریت</h4>
                    <p class="text-sm text-gray-600">مدیر سامانه تمام نوبت‌ها، کاربران و تیکت‌ها را تحت کنترل دارد.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- فوتر -->
    <footer class="bg-indigo-900 text-white text-center py-4 text-sm fade-in">
        © 2025 سامانه نوبت‌دهی تعمیرگاه | طراحی با ❤️ توسط شما
    </footer>

</body>
</html>
