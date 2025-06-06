@extends('layouts.admin.app') {{-- فرض بر اینه که این فایل شامل قالب کلی پنل هست --}}

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">لیست تیکت‌ها</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white rounded shadow overflow-hidden text-center">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="py-3 px-4 text-right">شناسه</th>
                    <th class="py-3 px-4 text-right">موضوع</th>
                    <th class="py-3 px-4 text-right">کاربر</th>
                    <th class="py-3 px-4 text-right">نقش کاربر</th> {{-- اضافه کردن ستون نقش --}}
                    <th class="py-3 px-4 text-right">وضعیت</th>
                    <th class="py-3 px-4 text-right">تاریخ ایجاد</th>
                    <th class="py-3 px-4 text-right">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4 text-right">{{ $ticket->id }}</td>
                        <td class="py-3 px-4 text-right">{{ $ticket->subject }}</td>
                        <td class="py-3 px-4 text-right">{{ $ticket->user->name }}</td>
                        <td class="py-3 px-4 text-right">
                            @if($ticket->user->role == 'customer')
                                <span class="text-green-600 font-semibold">مشتری</span>
                            @elseif($ticket->user->role == 'repairman')
                                <span class="text-green-600 font-semibold">تعمیرکار</span>
                            @else
                                <span class="text-gray-600 font-semibold">نامشخص</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-right">
                            @if($ticket->status == 'open')
                                <span class="text-green-600 font-semibold">باز</span>
                            @elseif($ticket->status == 'answered')
                                <span class="text-blue-600 font-semibold">پاسخ داده شده</span>
                            @else
                                <span class="text-red-600 font-semibold">بسته شده</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-right">{{ $ticket->created_at->format('Y/m/d H:i') }}</td>
                        <td class="py-3 px-4 text-right flex gap-2 justify-end">
                            <a href="{{ route('admin.tickets.show', $ticket) }}" class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700 transition">جزئیات</a>

                            <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST" onsubmit="return confirm('آیا از حذف این تیکت مطمئن هستید؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-500">تیکتی وجود ندارد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            {{ $tickets->links() }} {{-- پیجینیشن لاراول --}}
        </div>
    </div>
@endsection
