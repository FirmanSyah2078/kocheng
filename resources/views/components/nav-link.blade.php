@props(['active' => false, 'href'])

<a {{ $attributes->merge(['href' => $href]) }} @class([
    'group relative inline-block py-1 text-sm font-medium transition-colors duration-200',
    'text-primary' => $active,
    'text-secondary hover:text-primary' => !$active,
])>
    {{ $slot }}

    <span @class([
        'absolute -bottom-0.5 left-0 h-0.5 rounded-full bg-accent transition-all duration-300 ease-out',
        'w-full' => $active,
        'w-0 group-hover:w-full' => !$active,
    ])></span>
</a>
