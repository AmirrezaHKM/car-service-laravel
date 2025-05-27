<section class="bg-white text-gray-800 p-6 rounded-lg shadow">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            تغییر رمز عبور
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            برای حفظ امنیت حساب کاربری، از رمز عبور قوی و تصادفی استفاده کنید.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="رمز عبور فعلی" class="text-indigo-700" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="رمز عبور جدید" class="text-indigo-700" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="تایید رمز عبور جدید" class="text-indigo-700" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                ذخیره
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >ذخیره شد.</p>
            @endif
        </div>
    </form>
</section>
