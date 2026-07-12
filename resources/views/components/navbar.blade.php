@php
    $inDashboard = request()->routeIs('dashboard.*');
@endphp

<nav class="bg-neutral ring-1 ring-black/5 border-b border-black/5 px-6 py-4 sticky top-0 z-50">
    <div class="container mx-auto grid grid-cols-3 items-center">

        <a href="{{ route('home') }}" class="font-serif text-2xl font-bold text-primary justify-self-start">
            Meowland<span class="text-accent">.</span>
        </a>

        <div class="flex items-center justify-center gap-8">
            @if ($inDashboard && auth()->check() && !auth()->user()->isAdmin())
                <x-nav-link href="{{ route('dashboard.user.products') }}" :active="request()->routeIs('dashboard.user.products')">Katalog</x-nav-link>
            @elseif (!$inDashboard)
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-nav-link>
                <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-nav-link>
            @endif
        </div>

        <div class="flex items-center justify-end gap-6">
            @auth
                @if ($inDashboard)
                    @if (!auth()->user()->isAdmin())
                        <x-dashboard.cart-hover />
                    @endif

                    <span class="text-sm text-secondary">Halo, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-semibold text-danger hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ auth()->user()->isAdmin() ? route('dashboard.admin.index') : route('dashboard.user.products') }}"
                        class="bg-accent text-primary px-4 py-2 rounded-full text-sm font-bold hover:opacity-90 transition justify-self-end">
                        @auth
                            Katalog
                        @else
                            Dashboard
                        @endauth
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}"
                    class="bg-accent text-primary px-4 py-2 rounded-full text-sm font-bold hover:opacity-90 transition justify-self-end">
                    Login
                </a>
            @endauth
        </div>
    </div>
</nav>
