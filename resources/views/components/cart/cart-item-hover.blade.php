@props(['name', 'price', 'image'])

<div class="flex flex-row gap-2 justify-between items-center">
    <div class="flex flex-row gap-2 justify-between items-center">
        <img src="https://i.kym-cdn.com/photos/images/newsfeed/002/429/796/96c.gif" class="w-12 h-12 rounded-lg"
            alt="">
        <h2 class="text font-medium text-[0.9rem]">{{ $name }}</h2>
    </div>

    <p class="text-primary text-[0.9rem]">{{ $price }}</p>
</div>
