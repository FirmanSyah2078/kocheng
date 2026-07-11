@props([
    'name',
    'price',
    'quantity',
    'subtotal',
    'image',
])

<div
    class="flex flex-row w-full h-fit border-b border-secondary/10 bg-neutral/50 justify-between px-4 py-4 items-center gap-4">
    <div class="flex flex-row gap-4 items-center flex-1">
        <img src="{{ $image }}" class="w-16 h-16 rounded-xl object-cover ring-1 ring-secondary/20"
            alt="{{ $name }}">
        <div class="flex flex-col">
            <h1 class="font-bold text-sm text-neutral-800">{{ $name }}</h1>
            <p class="text-xs text-secondary font-medium">{{ $price }} / item</p>
        </div>
    </div>

    <div class="flex flex-row gap-8 items-center text-right">
        <div class="flex flex-col">
            <span class="text-[10px] uppercase text-secondary font-bold">Quantity</span>
            <span class="text-sm font-semibold">{{ $quantity }}</span>
        </div>
        <div class="flex flex-col min-w-25">
            <span class="text-[10px] uppercase text-secondary font-bold">Sub Total</span>
            <span class="text-sm font-bold text-primary">{{ $subtotal }}</span>
        </div>
    </div>
</div>
