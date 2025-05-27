<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'سامانه نوبت‌دهی')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Vazir', sans-serif;
            background-color: #f0f4f8;
        }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen bg-blue-50">

    @yield('content')

    @stack('scripts')
</body>
</html>
