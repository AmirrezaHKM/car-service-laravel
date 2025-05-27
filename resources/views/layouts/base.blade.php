<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'سامانه نوبت‌دهی تعمیرگاه')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">

    <style>
        body {
            direction: rtl;
            font-family: 'Vazir', sans-serif !important;
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

    @yield('styles')
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    @include('layouts.home.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.home.footer')

    @yield('scripts')
</body>
</html>
