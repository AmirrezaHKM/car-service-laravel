@extends('layouts.admin')

@section('title', 'مشتریان')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 mb-6">لیست مشتریان</h2>

    <div class="overflow-x-auto bg-white shadow rounded-xl p-4">
        <table class="min-w-full text-sm text-right">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">نام</th>
                    <th class="px-4 py-2">ایمیل</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach($customers as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $customers->links() }}</div>
    </div>
@endsection
