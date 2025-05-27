<header class="bg-indigo-900 text-white shadow-md py-4 px-6 flex justify-between items-center fade-in">
    <h1 class="text-xl font-bold">سامانه نوبت‌دهی تعمیرگاه</h1>

    <nav class="space-x-4 space-x-reverse text-sm">
        @guest
            <a href="{{ route('login') }}" class="hover:text-gray-300 transition">ورود</a>
            <a href="{{ route('register') }}" class="hover:text-gray-300 transition">ثبت‌نام</a>
        @else
            <a href="{{ route('profile.edit') }}" class="hover:text-gray-300 transition">پروفایل</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:text-gray-300 transition">خروج</button>
            </form>
        @endguest
    </nav>
</header>
