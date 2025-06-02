<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل مکانیک</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('mechanic.sidebar')

    <div class="main-content" style="margin-right: 220px; padding: 20px;">
        @yield('content')
    </div>
</body>
</html>
