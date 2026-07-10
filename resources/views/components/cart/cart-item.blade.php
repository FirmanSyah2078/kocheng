@props(['name', 'id', 'category', 'price', 'quantity', 'image'])

@php
    $categoryData = [
        'makanan' => ['icon' => 'icon-[game-icons--canned-fish]'],
        'obat' => ['icon' => 'icon-[mdi--medicine-bottle]'],
        'peralatan' => ['icon' => 'icon-[mdi--bowl-mix]'],
        'mainan' => ['icon' => 'icon-[mdi--toy-brick]'],
    ];

    $current = $categoryData[strtolower($category)] ?? ['icon' => 'icon-[mdi--paw]'];
@endphp

<div class="flex flex-row w-full h-fit shadow bg-neutral justify-between px-4 py-4 rounded-lg mb-4">

    <div class="flex flex-row gap-5 items-center">
        <img src="{{ $image }}" class="w-24 h-24 rounded-lg object-cover" alt="{{ $name }}">
        <div>
            <h1 class="font-semibold text-xl">{{ $name }}</h1>
            <div>
                <span class="{{ $current['icon'] }}"></span>
                <p>{{ $category }}</p>
            </div>
            <p class="text-primary mt-10 text-lg">{{ $price }}</p>
        </div>
    </div>

    <div class="flex flex-col justify-between items-end py-1">
        {{-- DELETE BUTTON --}}
        <form action="{{ route('cart.remove', $id) }}" method="POST">
            @csrf
            <button type="submit" class="font-bold text-red-500 hover:text-red-700 transition">
                <span class="icon-[maki--cross]"></span>
            </button>
        </form>

        <div class="flex flex-row gap-2 items-center">

            <form action="{{ route('cart.update', [$id, 'minus']) }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center bg-secondary/10 px-2 py-1 rounded-lg transition
                    {{ $quantity <= 1 ? 'opacity-30 cursor-not-allowed pointer-events-none bg-gray-200' : 'hover:bg-secondary/20' }}">
                    <span class="icon-[tabler--minus]">-</span>
                </button>
            </form>

            <p class="font-bold">{{ $quantity }}</p>


            <form action="{{ route('cart.update', [$id, 'plus']) }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center bg-secondary/10 px-2 py-1 rounded-lg hover:bg-secondary/20 transition">
                    <span class="icon-[tabler--plus]">+</span>
                </button>
            </form>
        </div>
    </div>
</div>
