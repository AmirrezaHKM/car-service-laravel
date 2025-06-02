@extends('layouts.admin.app')

@section('title', 'مشاهده تیکت')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4">
    <!-- اطلاعات تیکت -->
    <div class="bg-white shadow-lg rounded-2xl p-6 mb-8 border border-gray-200">
        <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
            <i class="bi bi-ticket-detailed text-indigo-500 text-2xl"></i> جزئیات تیکت
        </h2>
        <div class="space-y-2 text-gray-800">
            <p><span class="font-semibold">عنوان:</span> {{ $ticket->subject }}</p>
            <p><span class="font-semibold">کاربر:</span> {{ $ticket->user->name }} <span class="text-gray-500">({{ $ticket->user->email }})</span></p>
            <p>
                <span class="font-semibold">وضعیت:</span>
                <span class="inline-block px-3 py-1 rounded-full text-sm
                    {{ $ticket->status == 'open' ? 'bg-yellow-100 text-yellow-800' : ($ticket->status == 'answered' ? 'bg-blue-100 text-blue-800' : 'bg-gray-200 text-gray-700') }}">
                    {{ $ticket->status == 'open' ? 'باز' : ($ticket->status == 'answered' ? 'پاسخ داده شده' : 'بسته شده') }}
                </span>
            </p>
            <p><span class="font-semibold">تاریخ ایجاد:</span> {{ $ticket->created_at?->format('Y-m-d H:i') ?? 'نامشخص' }}</p>
        </div>
    </div>

    <!-- پیام‌ها -->
    <div class="mb-10">
        <h3 class="text-xl font-semibold mb-4 flex items-center gap-2 text-gray-800">
            <i class="bi bi-chat-left-dots text-green-600 text-xl"></i> پیام‌ها
        </h3>

        <div class="space-y-4">
            @forelse ($ticket->ticketMessages as $message)
                <div class="p-4 rounded-xl shadow
                    {{ $message->sender_id == auth()->id() ? 'bg-green-50 border border-green-200' : 'bg-gray-50 border border-gray-200' }}">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-bold text-sm text-gray-700">
                            {{ $message->sender->name ?? 'ادمین' }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $message->created_at?->format('Y-m-d H:i') }}</span>
                    </div>
                    <p class="text-gray-800 whitespace-pre-line text-sm">{{ $message->message }}</p>
                </div>
            @empty
                <p class="text-gray-500 text-sm">هیچ پیامی برای این تیکت وجود ندارد.</p>
            @endforelse
        </div>

    </div>

    <!-- فرم پاسخ -->
    <div class="mb-10 bg-white p-6 rounded-xl shadow border border-gray-200">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center gap-2">
            <i class="bi bi-reply text-blue-600"></i> ارسال پاسخ
        </h3>
        <form method="POST" action="{{ route('admin.tickets.reply', $ticket) }}" class="space-y-4">
            @csrf
            <div>
                <label for="message" class="block mb-1 font-medium text-gray-700">متن پیام</label>
                <textarea name="message" id="message" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
            </div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow transition">
                <i class="bi bi-send"></i> ارسال پاسخ
            </button>
        </form>
    </div>

    <!-- تغییر وضعیت -->
    <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center gap-2">
            <i class="bi bi-arrow-repeat text-purple-600"></i> تغییر وضعیت تیکت
        </h3>
        <form method="POST" action="{{ route('admin.tickets.update-status', $ticket) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="status" class="block mb-1 font-medium text-gray-700">وضعیت جدید</label>
                <select name="status" id="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>باز</option>
                    <option value="answered" {{ $ticket->status == 'answered' ? 'selected' : '' }}>پاسخ داده شده</option>
                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>بسته شده</option>
                </select>
            </div>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg shadow transition">
                <i class="bi bi-check2-circle"></i> بروزرسانی وضعیت
            </button>
        </form>

    </div>
    <div class="my-6">
    <a href="{{ route('admin.tickets.index') }}" class="inline-flex items-center bg-indigo-50 text-indigo-700 px-4 py-2 rounded-lg hover:bg-indigo-100 transition text-sm">
        <i class="bi bi-arrow-right-circle ml-2 text-lg"></i> بازگشت به لیست تیکت‌ها
    </a>
    </div>
</div>
@endsection
