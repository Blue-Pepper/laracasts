@props(['active' => false])
@php
$classes = "block text-left px-3 text-xs leading-5 hover:bg-blue-300 focus:bg-blue-300 focus:text-white hover:text-white";
if ($active)
    $classes .= " bg-blue-300 text-white";
@endphp
<a {{ $attributes(['class' => $classes]); }}>
{{ $slot }}</a>
