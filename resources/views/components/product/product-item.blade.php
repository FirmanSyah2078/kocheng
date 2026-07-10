@props(['images', 'name', 'price', 'stock', 'category', 'id'])

@php
    $categoryData = [
        'makanan' => ['icon' => 'icon-[game-icons--canned-fish]'],
        'obat' => ['icon' => 'icon-[mdi--medicine-bottle]'],
        'peralatan' => ['icon' => 'icon-[mdi--bowl-mix]'],
        'mainan' => ['icon' => 'icon-[mdi--toy-brick]'],
    ];

    $current = $categoryData[strtolower($category)] ?? ['icon' => 'icon-[mdi--paw]'];
@endphp


<section
    class="flex group w-40 sm:w-46 md:w-43 lg:w-55 items-center  flex-col shadow border-t border-secondary/10 bg-neutral  rounded-2xl  hover:shadow-lg transition-all duration-300 hover:scale-105 transform-style:preserve-3d ">
    <div class="flex justify-start w-full flex-col gap-2 mb-2 pt-4 px-4  ">
        <h1 class="font-bold text-sm truncate w-full">{{ $name }}</h1>
        <h2 class="font-bold md:text-lg  text-primary mb-2">{{ $price }}</h2>
    </div>

        <img class="w-full h-40 mb-4 object-cover transition-all duration-300" src="{{ $images }}" alt="" srcset="">


    <div class="flex items-center justify-between w-full mt-auto">
        <div class="flex  text-base  text-secondary ms-2.5 gap-3.5 items-center">
            <div class="flex px-2 items-center border-e-2 border-secondary">
                <span class="inline-block transition-all duration-300 {{ $current['icon'] }} text-secondary"></span>
            </div>

            <div class="flex items-center ">
                <h3 class="font-bold">{{ $stock }}</h3>
            </div>

        </div>
        <button
            class="bg-primary cursor-pointer cart-button relative overflow-hidden py-2 px-3 rounded-tl-2xl rounded-br-2xl group-hover:scale-110 transition-all duration-300 w-12 h-10 flex items-center justify-center">

            <span
                class="basket-icon inline-block text-2xl icon-[mdi--basket-fill] transition-all duration-300 group-hover:scale-110 group-hover:text-white"></span>

            <span
                class="paw-icon absolute inline-block text-2xl icon-[mdi--paw] transition-all duration-300 opacity-0 scale-0 text-white"></span>

        </button>
    </div>
</section>
