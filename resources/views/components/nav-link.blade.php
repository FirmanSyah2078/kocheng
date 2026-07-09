@props(['active' => false, 'href'])

<a {{ $attributes->merge(['href' => $href, 'class' => 'transition-colors duration-200 font-medium text-sm ' . ($active ? 'text-primary' : 'text-secondary hover:text-primary')]) }}>
    {{ $slot }}
</a>