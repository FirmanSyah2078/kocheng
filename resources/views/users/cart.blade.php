@php
    $paymentData = [
        'qris' => [
            'label' => 'QRIS',
            'image' =>
                'https://th.bing.com/th/id/OIP.ygl20QGpbbgcG39FVM3AQQAAAA?r=0&o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3',
        ],
        'ovo' => [
            'label' => 'OVO',
            'image' => 'https://images.seeklogo.com/logo-png/64/1/ovo-logo-png_seeklogo-644219.png',
        ],
        'dana' => ['label' => 'DANA', 'image' => 'https://1000logos.net/wp-content/uploads/2021/03/Dana-logo.png'],
        'paypal' => [
            'label' => 'PayPal',
            'image' =>
                'https://th.bing.com/th/id/OIP.UEXTt6nVBMLf5I8rQh8U_wHaFj?r=0&o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3',
        ],
        'bayar ditempat' => [
            'label' => 'Bayar di Tempat',
            'image' =>
                'https://img.freepik.com/premium-vector/cash-logo-icon-design-vector-illustration_586739-3606.jpg?w=2000',
        ],
    ];
@endphp

<x-layout>
    <div class="h-full">
        <h1 class="text-3xl font-bold mb-8">Your Shopping Cart</h1>

        <div class="flex flex-col md:flex-row gap-10">
            <section
                class="flex flex-1 h-120 lg:h-156 overflow-auto flex-col ring-1 ring-secondary/10 rounded-xl p-4 gap-4 shadow">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        @php $quantity = $cart[$product->id]; @endphp
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

            <section class="flex w-full justify-between flex-col flex-1">
                <div class="grid p-2 grid-cols-3  md:grid-cols-4 lg:grid-cols-6 gap-3 mb-6">
                    <form action="{{ route('payment') }}" method="POST" id="payment-form" class="contents">
                        @csrf
                        <input type="hidden" name="payment_method" id="selected-payment" value="qris">

                        @foreach ($paymentData as $key => $data)
                            <button type="button" onclick="selectPayment('{{ $key }}', this)"
                                class="payment-option ring-2 rounded-xl overflow-hidden flex flex-col items-center justify-center p-2 transition-all duration-200 {{ $key === 'qris' ? 'ring-primary bg-primary/5' : 'ring-secondary/30' }}">

                                @if (isset($data['image']))
                                    <img class="w-16 h-16 object-contain" src="{{ $data['image'] }}"
                                        alt="{{ $data['label'] }}">
                                @else
                                    <span class="{{ $data['icon'] }} text-2xl mb-1"></span>
                                @endif
                                <span class="text-[10px] font-medium uppercase">{{ $data['label'] }}</span>
                            </button>
                        @endforeach
                    </form>
                </div>

                <div class="bg-neutral p-6 rounded-2xl w-full shadow-sm top-10 h-fit">
                    <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Total Items:</span>
                        <span>{{ $totalItems }}</span>
                    </div>
                    <div class="flex justify-between mb-6 text-lg font-bold border-t pt-4">
                        <span>Grand Total:</span>
                        <span class="text-primary">{{ $formatedGrandtotal }}</span>
                    </div>
                    <div class="flex justify-between mb-6 text font-bold text-secondary">
                        <span>Payment Method:</span>
                        <span id="display-payment-method" class="text-secondary uppercase">QRIS</span>
                    </div>


                    <button type="submit" form="payment-form" @if ($totalItems == 0) disabled @endif
                        class="w-full block text-center bg-primary text-white py-3 rounded-xl font-bold hover:bg-primary-dark transition disabled:bg-gray-400 disabled:cursor-not-allowed">
                        Proceed to Payment
                    </button>
                </div>
            </section>
        </div>
    </div>


</x-layout>
