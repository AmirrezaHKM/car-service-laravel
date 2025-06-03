<header class="bg-indigo-900 text-white shadow-md py-4 px-6 flex items-center justify-between relative">

    <h1 class="text-xl font-bold order-1 text-right">سامانه نوبت‌دهی تعمیرگاه</h1>

    <nav class="flex space-x-6 rtl:space-x-reverse order-2 mx-auto gap-4">
        <a href="{{ route('home') }}" class="hover:text-gray-300 transition">صفحه اصلی</a>
        <a href="{{ route('repairmen.list') }}" class="hover:text-gray-300 transition">تعمیرکاران</a>
        <a href="{{ route('services.list') }}" class="hover:text-gray-300 transition">خدمات</a>
    </nav>

    <div class="flex items-center space-x-4 rtl:space-x-reverse text-sm order-3 gap-3">
        @guest
            <a href="{{ route('login') }}" class="hover:text-gray-300 transition">ورود</a>
            <a href="{{ route('register') }}" class="hover:text-gray-300 transition">ثبت‌نام</a>
        @else

            @if(auth()->user()->role === 'customer')
                <a href="{{ route('customerpanel.dashboard') }}" class="hover:text-gray-300 transition">پنل مشتری</a>
            @elseif(auth()->user()->role === 'repairman')
                <a href="{{ route('mechanicpanel.dashboard') }}" class="hover:text-gray-300 transition">پنل مکانیک</a>
            @endif

            <a href="{{ route('profile.edit') }}" class="hover:text-gray-300 transition">پروفایل</a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:text-gray-300 transition">خروج</button>
            </form>
        @endguest
    </div>
</header>
