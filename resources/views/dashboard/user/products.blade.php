<x-layout>
    <x-slot:title>Katalog Produk - Meowland</x-slot>

    <div class="max-w-7xl mx-auto px-6 py-10">

        @if (session('success'))
            <div id="cart-alert-container"
                class="added-cart-indicator fixed right-0 z-50 left-0 group pointer-events-none">
                <div
                    class="w-fit h-fit p-5 rounded-2xl bg-primary text-white absolute right-10 top-4 transition-all duration-500 ease-in-out opacity-0 translate-x-full invisible group-[.success]:opacity-100 group-[.success]:visible group-[.success]:translate-x-0 shadow-lg">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <section class="flex flex-col md:flex-row w-full justify-between items-start md:items-center gap-5 mb-8">
            <div>
                <h1 class="font-serif text-3xl font-bold text-primary">Katalog Produk</h1>
                <p class="text-secondary">Semua kebutuhan anabul kesayanganmu ada di sini!</p>
            </div>

            <div id="categories-wrapper" class="relative inline-block group">

                @php
                    $selectedCategories = request('categories', []);
                @endphp

                <form action="{{ route('dashboard.user.products') }}" method="GET" id="filter-form">

                    <button type="button"
                        class="categories flex items-center cursor-pointer border-t border-black/10 shadow rounded-2xl py-2 px-4 bg-white transition-all duration-500 group-[.menu-open]:rounded-b-none">
                        Kategori
                        @if (count($selectedCategories) > 0)
                            <span class="bg-accent text-primary rounded-full px-2 py-0.5 text-xs ml-2 font-bold">
                                {{ count($selectedCategories) }}
                            </span>
                        @endif
                        <span
                            class="icon-[mdi--keyboard-arrow-down] categories-arrow text-xl transition-transform duration-500 ml-2"></span>
                    </button>

                    <div
                        class="categories-option z-10 absolute shadow-lg p-4 gap-2 transition-all duration-500 ease-in-out flex flex-col opacity-0 invisible -translate-y-2 w-56 bg-white top-full right-0 rounded-b-2xl
                        group-[.menu-open]:opacity-100 group-[.menu-open]:visible group-[.menu-open]:translate-y-0">

                        @forelse ($categories as $category)
                            <div class="border-b border-black/10 py-2">
                                <label class="flex items-center gap-2 cursor-pointer text-sm">
                                    <input type="checkbox" name="categories[]" value="{{ $category->slug }}"
                                        class="filter-checkbox" @checked(in_array($category->slug, $selectedCategories))>
                                    {{ $category->name }}
                                </label>
                            </div>
                        @empty
                            <p class="text-xs text-secondary py-2">Belum ada kategori.</p>
                        @endforelse

                        <button type="submit"
                            class="bg-primary text-white py-2 mt-2 rounded-lg hover:opacity-90 transition text-sm font-bold">
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <x-dashboard.product-card :product="$product" />
            @empty
                <p class="text-secondary col-span-full text-center py-12">Belum ada produk di kategori ini.</p>
            @endforelse
        </div>
        <div class="mt-6">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
</x-layout>
