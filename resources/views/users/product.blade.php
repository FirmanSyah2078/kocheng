<x-layout>
    <div class=" flex flex-col gap-5">

        <section class="flex h-full flex-col md:flex-row w-full justify-between items-start md:items-center gap-5">
            <div>
                <h1 class="font-bold text-2xl">Product Catalogue</h1>
                <p class="text-secondary">Explore out pawduct you might like!</p>
            </div>

            <div id="categories-wrapper" class="relative inline-block group">


                @php
                    $selectedCategories = request('categories', []);
                @endphp



                <form action="{{ route('product') }}" method="GET" id="filter-form">

                    <button type="button"
                        class="categories flex items-center cursor-pointer border-t border-secondary/10 shadow rounded-2xl py-1.5 px-4 bg-neutral transition-all duration-500 group-[.menu-open]:rounded-b-none">
                        Categories
                        @if (count($selectedCategories) > 0)
                            <span
                                class="bg-primary text-white rounded-full px-2 py-0.5 text-xs ml-2">{{ count($selectedCategories) }}
                            </span>
                        @endif
                        <span
                            class="icon-[mdi--keyboard-arrow-down] categories-arrow text-xl transition-transform duration-500 ml-2"></span>
                    </button>

                    <div
                        class="categories-option z-10 absolute flex shadow p-4 gap-2 transition-all duration-500 ease-in-out flex-col opacity-0 invisible -translate-y-2 w-full  bg-neutral top-full left-0
                        group-[.menu-open]:opacity-100 group-[.menu-open]:visible group-[.menu-open]:translate-y-0">


                        @foreach ($categories as $category)
                            <div class="border-b border-secondary/20 py-2">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                        class="filter-checkbox" @checked(in_array($category->id, $selectedCategories))>
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach

                        <button type="submit"
                            class="bg-primary text-white py-1 mt-2 rounded-lg hover:bg-primary-dark transition">
                            Apply Filters
                        </button>

                    </div>
                </form>

            </div>

        </section>

        <section
            class="h-full grid gap-6 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-6 justify-items-center sm:justify-items-start">
            @foreach ($products as $product)
                <x-product.product-item :images="'https://i.kym-cdn.com/photos/images/newsfeed/002/429/796/96c.gif'" :name="$product->name" :price="$product->formatted_price" :stock="$product->stock"
                    :category="$product->category->name" :id="$product->id" />
            @endforeach
        </section>
    </div>

</x-layout>
