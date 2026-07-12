@php
    $cart = session('cart', []);
    $cartProducts = \App\Models\Product::whereIn('id', array_keys($cart))->get();
    $totalUniqueProducts = $cartProducts->count();
@endphp

<div id="cart-wrapper" class="relative inline-block group">

    <x-nav-link href="{{ route('dashboard.user.cart') }}" :active="request()->routeIs('dashboard.user.cart')">
        <div class="flex items-center justify-center relative">
            <span
                class="cart-icon text-2xl group-[.menu-open]:text-primary hover:text-primary transition-all duration-250 group-[.menu-open]:scale-110 icon-[solar--cart-3-bold]"></span>
            @if ($totalUniqueProducts > 0)
                <span
                    class="absolute -top-2 -right-2 bg-accent text-primary text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                    {{ $totalUniqueProducts }}
                </span>
            @endif
        </div>
    </x-nav-link>

    <div
        class="cart-modal absolute z-20 right-0 h-fit w-80 bg-white shadow-lg border-t-2 border-t-accent text-black px-4 py-4 rounded-tl-2xl rounded-bl-2xl rounded-br-2xl text-xs opacity-0 invisible -translate-y-2
        transition-all duration-250 ease-in-out
        group-[.menu-open]:opacity-100 group-[.menu-open]:visible group-[.menu-open]:translate-y-0">

        <div class="flex flex-col gap-2 border-b border-black/10 pb-2">
            @if ($totalUniqueProducts > 0)
                @foreach ($cartProducts->take(3) as $product)
                    <x-dashboard.cart-item-hover :name="$product->name" :price="$product->formatted_price" />
                @endforeach
                @if ($totalUniqueProducts > 3)
                    <p class="text-center text-secondary italic py-1">
                        ...dan {{ $totalUniqueProducts - 3 }} produk lainnya
                    </p>
                @endif
            @else
                <p class="text-center text-secondary py-2">Keranjang kamu masih kosong</p>
            @endif
        </div>

        <div class="mt-3 text-secondary px-2 flex flex-row justify-between items-center">
            <p>{{ $totalUniqueProducts }} produk di keranjang</p>
            <a href="{{ route('dashboard.user.cart') }}"
                class="bg-primary text-white py-1 px-3 rounded-lg hover:opacity-90 transition font-semibold">
                Lihat
            </a>
        </div>
    </div>
</div>