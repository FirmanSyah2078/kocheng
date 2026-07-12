@props(['product'])

@php
    $categoryIcons = [
        'makanan' => 'icon-[game-icons--canned-fish]',
        'obat' => 'icon-[mdi--medicine-bottle]',
        'alat' => 'icon-[mdi--bowl-mix]',
        'mainan' => 'icon-[mdi--toy-brick]',
    ];
    $icon = $categoryIcons[strtolower($product->category->name ?? '')] ?? 'icon-[mdi--paw]';
@endphp

<section class="group flex flex-col bg-white rounded-2xl border border-black/5 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden">
    <div class="h-36 bg-accent/10 flex items-center justify-center">
        <span class="icon-[mdi--paw] text-5xl text-accent/40"></span>
    </div>

    <div class="p-4 flex flex-col flex-1">
        <p class="text-[11px] font-bold uppercase text-accent tracking-wide mb-1">{{ $product->category->name ?? '-' }}</p>
        <h3 class="font-bold text-primary text-sm truncate mb-1">{{ $product->name }}</h3>
        <p class="font-bold text-primary mb-3">{{ $product->formatted_price }}</p>

        <div class="flex items-center justify-between mt-auto">
            <div class="flex items-center gap-1.5 text-xs text-secondary">
                <span class="{{ $icon }} text-base"></span>
                <span>Stok {{ $product->stock }}</span>
            </div>

            <form action="{{ route('dashboard.user.cart.add', $product) }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-primary text-white rounded-tl-xl rounded-br-xl w-10 h-9 flex items-center justify-center group-hover:scale-110 transition-transform disabled:opacity-30"
                    @disabled($product->stock < 1)>
                    <span class="icon-[mdi--basket-fill] text-lg"></span>
                </button>
            </form>
        </div>
    </div>
</section>
