<nav class=" flex  bg-neutral ring-1 ring-gray-200 border-b border-neutral px-5 py-5">

    <div class="container mx-auto flex justify-between items-center">

        <div class="font-bold text-xl text-primary">
            <a href="/">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <div class="flex gap-5 items-center">
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
            <x-nav-link href="{{ route('product') }}" :active="request()->routeIs('product')">Product</x-nav-link>
            <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-nav-link>
            <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-nav-link>
            <x-nav-link href="{{ route('dashboard.index') }}" :active="request()->routeIs('dashboard.index')">Dashboard</x-nav-link>
        </div>

        @auth
            <div class="flex items-center gap-5 text-sm">
                <x-cart.cart-hover />
                <span class="text-neutral-300">|</span>
                <span class="text-secondary">{{ Auth::user()->name }}</span>
                <span class="text-neutral-300">|</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-danger cursor-pointer">
                        Logout
                    </button>
                </form>
            </div>
        @endauth
    </div>
</nav>
