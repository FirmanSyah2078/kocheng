<x-layout>
    <x-slot:title>Keranjang - Meowland</x-slot>

    <div class="max-w-6xl mx-auto px-6 py-10">
        <h1 class="font-serif text-3xl font-bold text-primary mb-8">Keranjang Belanja</h1>

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Cart Items -->
            <section
                class="flex-1 h-fit md:h-150 overflow-auto flex flex-col gap-4 ring-1 ring-secondary/10 rounded-2xl p-4 shadow-sm bg-white/50">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        @php $quantity = $cart[$product->id]; @endphp
                        <x-dashboard.cart-item :product="$product" :quantity="$quantity" />
                    @endforeach
                @else
                    <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-secondary/30">
                        <p class="text-xl text-secondary">Keranjang kamu masih kosong 🐾</p>
                        <a href="{{ route('dashboard.user.products') }}"
                            class="text-primary font-bold underline mt-4 block">Belanja Sekarang</a>
                    </div>
                @endif
            </section>

            <!-- Order Summary & Payment Selection -->
            <section class="w-full lg:w-96 flex flex-col gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm ring-1 ring-secondary/10 h-fit t top-24">
                    <h2 class="text-xl font-bold text-primary mb-6">Ringkasan Belanja</h2>

                    <!-- Payment Method Selection -->
                    <form action="{{ route('dashboard.user.payment') }}" method="GET" id="payment-form"
                        class="space-y-6">
                        <div class="grid grid-cols-3 gap-3 mb-6">
                            @php
                                $paymentData = [
                                    'qris' => [
                                        'label' => 'QRIS',
                                        'image' =>
                                            'https://th.bing.com/th/id/OIP.ygl20QGpbbgcG39FVM3AQQAAAA?r=0&o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3',
                                    ],
                                    'ovo' => [
                                        'label' => 'OVO',
                                        'image' =>
                                            'https://images.seeklogo.com/logo-png/64/1/ovo-logo-png_seeklogo-644219.png',
                                    ],
                                    'dana' => [
                                        'label' => 'DANA',
                                        'image' => 'https://1000logos.net/wp-content/uploads/2021/03/Dana-logo.png',
                                    ],
                                    'paypal' => [
                                        'label' => 'PayPal',
                                        'image' =>
                                            'https://th.bing.com/th/id/OIP.UEXTt6nVBMLf5I8rQh8U_wHaFj?r=0&o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3',
                                    ],
                                    'bayar ditempat' => [
                                        'label' => 'COD',
                                        'image' =>
                                            'https://img.freepik.com/premium-vector/cash-logo-icon-design-vector-illustration_586739-3606.jpg?w=2000',
                                    ],
                                ];
                            @endphp

                            <input type="hidden" name="payment_method" id="selected-payment" value="qris">

                            @foreach ($paymentData as $key => $data)
                                <button type="button" onclick="selectPayment('{{ $key }}', this)"
                                    class="payment-option ring-2 rounded-xl overflow-hidden flex flex-col items-center justify-center p-2 transition-all duration-200 {{ $key === 'qris' ? 'ring-primary bg-primary/5' : 'ring-secondary/30 bg-white' }}">
                                    <img class="w-12 h-12 object-contain mb-1" src="{{ $data['image'] }}"
                                        alt="{{ $data['label'] }}">
                                    <span
                                        class="text-[9px] font-medium uppercase text-secondary">{{ $data['label'] }}</span>
                                </button>
                            @endforeach
                        </div>

                        <div class="space-y-2 border-t border-black/5 pt-4">
                            <div class="flex justify-between text-sm text-secondary">
                                <span>Total Item</span>
                                <span class="font-semibold">{{ $totalItems }}</span>
                            </div>
                            <div class="flex justify-between text-lg font-bold text-primary">
                                <span>Total Bayar</span>
                                <span>{{ $formattedGrandTotal }}</span>
                            </div>
                            <div class="flex justify-between text-xs font-medium text-secondary uppercase">
                                <span>Metode Pembayaran:</span>
                                <span id="display-payment-method">QRIS</span>
                            </div>
                        </div>

                        <button type="submit" @if ($totalItems == 0) disabled @endif
                            class="w-full block text-center bg-primary text-white py-3 rounded-xl font-bold hover:opacity-90 transition disabled:bg-gray-300 disabled:cursor-not-allowed shadow-lg shadow-primary/20">
                            Lanjut ke Pembayaran
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>

</x-layout>
