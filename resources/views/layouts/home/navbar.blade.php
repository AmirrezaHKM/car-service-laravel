<!-- داخل head فایل layout -->
<link href="https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css" rel="stylesheet">
<style>
  body { font-family: 'Vazir', sans-serif; }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .fade-in { animation: fadeIn 0.7s ease forwards; }
</style>

<header class="bg-gradient-to-tr from-indigo-900 via-purple-800 to-indigo-950 text-white shadow-2xl py-6 px-6 md:px-14 sticky top-0 z-50 backdrop-blur-md">

 
  <div class="flex items-center justify-between gap-4 fade-in">
    <div class="flex items-center gap-3">
      <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">سِروینو | نوبت‌دهی تعمیرگاه</h1>
    </div>

    <!-- منو -->
    <nav class="flex gap-5 text-base font-medium text-indigo-200 fade-in">
      <a href="{{ route('home') }}" class="flex items-center gap-2 hover:text-white transition">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m0 0v6a2 2 0 002 2h2a2 2 0 002-2v-6"/>
        </svg>
        خانه
      </a>
      <a href="{{ route('repairmen.list') }}" class="hover:text-white transition">تعمیرکاران</a>
      <a href="{{ route('services.list') }}" class="hover:text-white transition">خدمات</a>
    </nav>
  </div>

  <!-- منوی کاربری -->
  <div class="mt-5 flex justify-end gap-3 text-sm text-indigo-200 fade-in">
    @guest
      <a href="{{ route('login') }}" class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded">ورود</a>
      <a href="{{ route('register') }}" class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded">ثبت‌نام</a>
    @else
      @if(auth()->user()->role === 'customer')
        <a href="{{ route('customerpanel.dashboard') }}" class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded">پنل مشتری</a>
      @elseif(auth()->user()->role === 'repairman')
        @if(auth()->user()->status)
          <a href="{{ route('mechanicpanel.dashboard') }}" class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded">پنل مکانیک</a>
        @else
          <span class="text-yellow-300 font-semibold">فعال‌سازی در انتظار تأیید</span>
        @endif
      @elseif(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded">پنل ادمین</a>
      @endif

      <a href="{{ route('profile.edit') }}" class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded">پروفایل</a>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white">خروج</button>
      </form>
    @endguest
  </div>
</header>
