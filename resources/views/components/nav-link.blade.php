@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'nav-link active font-weight-bolder'
                : 'nav-link';
@endphp

<li class="nav-item">
    <a {{ $attributes->merge(['class' => $classes]) }} class="text-muted" style="font-size: 12px; font-weight: 500; ">
        {{ strtoupper($slot) }}
    </a>
</li>
