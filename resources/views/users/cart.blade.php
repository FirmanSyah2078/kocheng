<x-layout>
    <div class="p-10">
        <h1 class="text-3xl font-bold mb-8">Your Shopping Cart</h1>

        @php
            $cart = session('cart', []);
            $products = \App\Models\Product::whereIn('id', array_keys($cart))->get();
            $grandTotal = 0;
        @endphp

        <div class="flex flex-row gap-10">

            <section class="flex flex-1 flex-col">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        @php
                            $quantity = $cart[$product->id];

                            $subtotal = $product->price * $quantity;
                            $grandTotal += $subtotal;
                        @endphp
                        <x-cart.cart-item :id="$product->id" :name="$product->name" :category="$product->category->name" :price="$product->formatted_price"
                            :quantity="$quantity" :image="'https://i.kym-cdn.com/photos/images/newsfeed/002/429/796/96c.gif'" />
                    @endforeach
                @else
                    <div class="text-center py-20 bg-neutral rounded-2xl">
                        <p class="text-xl text-secondary">Your cart is empty 🐾</p>
                        <a href="/" class="text-primary underline mt-4 block">Go Shopping</a>
                    </div>
                @endif
            </section>

            <section class="flex flex-1">
                <div class="bg-neutral p-6 rounded-2xl shadow-sm sticky top-10 h-fit">
                    <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Total Items:</span>
                        <span>{{ array_sum($cart) }}</span>
                    </div>
                    <div class="flex justify-between mb-6 text-lg font-bold border-t pt-4">
                        <span>Grand Total:</span>
                        <span class="text-primary">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                    </div>

                    <a href="{{ route('checkout') }}"
                        class="block text-center bg-primary text-white py-3 rounded-xl font-bold hover:bg-primary-dark transition">
                        Proceed to Checkout
                    </a>
                </div>
            </section>
        </div>
    </div>
</x-layout>
