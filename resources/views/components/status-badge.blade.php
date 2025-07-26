@props(['status'])

@php
    $statusClasses = [
        'pending' => 'text-yellow-600 bg-yellow-100',
        'accepted' => 'text-green-600 bg-green-100',
        'rejected' => 'text-red-600 bg-red-100',
        'completed' => 'text-blue-600 bg-blue-100',
        'canceled' => 'text-gray-600 bg-gray-100',
    ];

    $statusLabels = [
        'pending' => 'در انتظار',
        'accepted' => 'تایید شده',
        'rejected' => 'رد شده',
        'completed' => 'کامل شده',
        'canceled' => 'لغو شده',
    ];

    $class = $statusClasses[$status] ?? 'text-gray-600 bg-gray-100';
    $label = $statusLabels[$status] ?? ucfirst($status);
@endphp

<span class="inline-block px-3 py-1 text-sm font-medium rounded-full {{ $class }}">
    {{ $label }}
</span>
