@php
    $classes = "text-xs text-gray-600 hover:text-gray-900 font-bold"
@endphp

<div>
    {{-- attributes toma todos los atributos que le mandes --}}
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{$slot}}
    </a>
</div>