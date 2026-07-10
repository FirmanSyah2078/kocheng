<nav class=" flex  bg-neutral ring-1 ring-gray-200 border-b border-neutral px-5 py-5">
    <div class="container mx-auto flex justify-between items-center">
        <div class="font-bold text-xl text-primary">
            <a href="/">{{ config('app.name', 'Laravel') }}</a>
        </div>
    </div>
    <div class="flex  gap-6">
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('/')">Home</x-nav-link>
        <x-nav-link href="{{ route('product') }}" :active="request()->routeIs('product')">Product</x-nav-link>
        <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-nav-link>
        <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-nav-link>

        {{-- Sementara --}}
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
        {{-- Sementara --}}
    </div>
</nav>
