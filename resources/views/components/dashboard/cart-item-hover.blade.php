@props(['name', 'price'])

<div class="flex flex-row gap-2 justify-between items-center">
    <div class="flex flex-row gap-2 items-center">
        <div class="w-10 h-10 rounded-lg bg-accent/10 flex items-center justify-center shrink-0">
            <span class="icon-[mdi--paw] text-accent"></span>
        </div>
        <h2 class="font-medium text-[0.9rem]">{{ $name }}</h2>
    </div>
    <p class="text-primary text-[0.9rem] font-semibold">{{ $price }}</p>
</div>