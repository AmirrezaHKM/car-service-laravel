@extends('layouts.admin.app')

@section('content')
    <div class="bg-white p-5 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">لیست کاربران</h1>
            <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">کاربر جدید</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border border-gray-300 text-center">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 text-center">نام</th>
                    <th class="p-2 text-center">ایمیل</th>
                    <th class="p-2 text-center">نقش</th>
                    <th class="p-2 text-center">وضعیت</th>
                    <th class="p-2 text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b">
                        <td class="p-2 text-center">{{ $user->name }}</td>
                        <td class="p-2 text-center">{{ $user->email }}</td>
                        <td class="p-2 text-center">
                            @switch($user->role)
                                @case('admin')
                                    <span class="text-red-600 font-semibold">مدیر</span>
                                    @break
                                @case('repairman')
                                    <span class="text-yellow-600 font-semibold">مکانیک</span>
                                    @break
                                @default
                                    <span class="text-gray-700">مشتری</span>
                            @endswitch
                        </td>
                        <td class="p-2 text-center">
                            <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}">
                                @csrf
                                <button type="submit"
                                        class="px-3 py-1 rounded {{ $user->status ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                    {{ $user->status ? 'فعال' : 'غیرفعال' }}
                                </button>
                            </form>
                        </td>
                        <td class="p-2 text-center space-x-2 space-x-reverse">
                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="text-blue-600 hover:underline">ویرایش</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('آیا مطمئنی؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
