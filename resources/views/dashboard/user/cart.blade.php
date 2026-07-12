<x-layout>
    <x-slot:title>Keranjang - Meowland</x-slot>

    <div class="max-w-6xl mx-auto px-6 py-10">
        <h1 class="font-serif text-3xl font-bold text-primary mb-8">Keranjang Belanja</h1>

        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex-1 space-y-4">
                @forelse ($products as $product)
                    <x-dashboard.cart-item :product="$product" :quantity="$cart[$product->id]" />
                @empty
                    <div class="bg-white rounded-2xl p-12 text-center text-secondary">
                        Keranjang kamu masih kosong 🐾
                        <a href="{{ route('dashboard.user.products') }}" class="text-accent font-bold block mt-2">Belanja
                            sekarang</a>
                    </div>
                @endforelse
            </div>

            <div class="w-full lg:w-80 shrink-0">
                <div class="bg-white p-6 rounded-2xl shadow-sm sticky top-24">
                    <h2 class="text-lg font-bold text-primary mb-4">Ringkasan Belanja</h2>
                    <div class="flex justify-between mb-2 text-sm text-secondary">
                        <span>Total Item</span>
                        <span>{{ $totalItems }}</span>
                    </div>
                    <div class="flex justify-between mb-6 text-lg font-bold border-t border-black/10 pt-4">
                        <span>Total Bayar</span>
                        <span class="text-primary">{{ $formattedGrandTotal }}</span>
                    </div>

                    <a href="{{ $totalItems > 0 ? route('dashboard.user.payment') : '#' }}"
                        class="w-full block text-center bg-primary text-white py-3 rounded-xl font-bold hover:opacity-90 transition {{ $totalItems == 0 ? 'opacity-40 pointer-events-none' : '' }}">
                        Lanjut ke Pembayaran
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>