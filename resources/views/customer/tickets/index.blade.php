@extends('layouts.customer.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6">لیست تیکت‌ها</h1>

    <div class="mb-8 text-left">
        <a href="{{ route('customerpanel.tickets.create') }}" class=" bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
            افزودن تیکت جدید
        </a>
    </div>

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
                <th class="py-3 px-4 text-right">وضعیت</th>
                <th class="py-3 px-4 text-right">تاریخ ایجاد</th>
                <th class="py-3 px-4 text-right">عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4 text-right">{{ $ticket->id }}</td>
                    <td class="py-3 px-4 text-right">{{ $ticket->subject }}</td>
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
                        <a href="{{ route('customerpanel.tickets.show', $ticket) }}" class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700 transition">جزئیات</a>

                        <form action="{{ route('customerpanel.tickets.destroy', $ticket) }}" method="POST" onsubmit="return confirm('آیا از حذف این تیکت مطمئن هستید؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($tickets->isEmpty())
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">تیکتی وجود ندارد.</td>
                </tr>
            @endif
        </tbody>
    </table>

</div>
@endsection
