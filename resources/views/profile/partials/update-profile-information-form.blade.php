<section class="bg-white text-gray-800 p-6 rounded-lg shadow">
    <header>
        <h2 class="text-lg font-semibold text-indigo-700">
            اطلاعات پروفایل
        </h2>

        <p class="mt-1 text-sm text-gray-800">
            اطلاعات پروفایل و ایمیل خود را بروزرسانی کنید.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="نام" class="text-indigo-700" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="ایمیل" class="text-indigo-700" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-700">
                        ایمیل شما تایید نشده است.
                        <button form="send-verification" class="underline text-indigo-600 hover:text-indigo-800">
                            کلیک کنید تا ایمیل تایید دوباره ارسال شود.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-600">
                            لینک تایید جدید به ایمیل شما ارسال شد.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                ذخیره
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    ذخیره شد.
                </p>
            @endif
        </div>
    </form>
</section>
