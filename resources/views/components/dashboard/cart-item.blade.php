@props(['product', 'quantity'])

@php
    $categoryIcons = [
        'makanan' => 'icon-[game-icons--canned-fish]',
        'obat' => 'icon-[mdi--medicine-bottle]',
        'alat' => 'icon-[mdi--bowl-mix]',
        'mainan' => 'icon-[mdi--toy-brick]',
    ];
    $icon = $categoryIcons[strtolower($product->category->name ?? '')] ?? 'icon-[mdi--paw]';
@endphp

<div class="flex justify-between items-center bg-white rounded-2xl border border-black/5 px-5 py-4">
    <div class="flex items-center gap-4">
        <div class="w-16 h-16 rounded-xl bg-accent/10 flex items-center justify-center shrink-0">
            <span class="{{ $icon }} text-2xl text-accent"></span>
        </div>
        <div>
            <p class="font-bold text-primary text-sm">{{ $product->name }}</p>
            <p class="text-xs text-secondary mb-1">{{ $product->category->name ?? '-' }}</p>
            <p class="text-primary font-semibold text-sm">{{ $product->formatted_price }}</p>
        </div>
    </div>

    <div class="flex flex-col items-end gap-2">
        <form action="{{ route('dashboard.user.cart.remove', $product) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit" class="text-danger text-xs font-semibold hover:underline">Hapus</button>
        </form>

        <div class="flex items-center gap-2">
            <form action="{{ route('dashboard.user.cart.update', [$product, 'minus']) }}" method="POST">
                @csrf
                <button class="w-7 h-7 rounded-lg bg-neutral hover:bg-black/5 flex items-center justify-center text-sm font-bold {{ $quantity <= 1 ? 'opacity-30 pointer-events-none' : '' }}">−</button>
            </form>
            <span class="font-bold text-sm w-4 text-center">{{ $quantity }}</span>
            <form action="{{ route('dashboard.user.cart.update', [$product, 'plus']) }}" method="POST">
                @csrf
                <button class="w-7 h-7 rounded-lg bg-neutral hover:bg-black/5 flex items-center justify-center text-sm font-bold">+</button>
            </form>
        </div>
    </div>
</div>
