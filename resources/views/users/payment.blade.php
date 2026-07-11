<x-layout>
    <div class="max-w-4xl mx-auto p-10 ring ring-secondary/10 shadow shadow-secondary/10 ">
        <h1 class="text-3xl font-bold mb-6 border-t border-secondary/50 border-dashed pt-5">Payment Details</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 ">
            <div>
                <h3 class="text-sm uppercase tracking-wider text-secondary font-semibold mb-1">Invoice Date</h3>
                <p class="text-lg font-medium">{{ $date }}</p>
            </div>
            <div>
                <h3 class="text-sm uppercase tracking-wider text-secondary font-semibold mb-1">Invoice Number</h3>
                <p class="text-lg font-mono font-bold">{{ $invoiceNumber }}</p>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 border-t border-secondary/50 border-dashed pt-5">Transaction Items</h2>
            <div class="bg-neutral rounded-xl p-4 shadow-sm overflow-hidden">
                @foreach ($products as $product)
                    @php $quantity = $cart[$product->id]; @endphp
                    <x-transaction.transaction-item :name="$product->name" :quantity="$quantity" :price="$product->formatted_price"
                        :subtotal="Number::currency($product->price * $quantity, in: 'IDR', locale: 'id', precision: 0)" :image="'https://i.kym-cdn.com/photos/images/newsfeed/002/429/796/96c.gif'" />
                @endforeach
            </div>
        </div>

        <div class="flex justify-end mb-10 border-t border-secondary/50 border-dashed pt-5">
            <div class="text-right">
                <h2 class="text-xl font-semibold text-secondary mb-1 ">Transaction Total</h2>
                <p class="text-4xl font-bold text-primary">{{ $formattedGrandTotal }}</p>
            </div>
        </div>

        <div class="bg-secondary/5 border border-secondary/20 rounded-2xl p-8 text-center mb-8 ">
            <h3 class="text-lg font-bold mb-4 uppercase">Payment Method: {{ strtoupper($paymentMethod) }}</h3>

            @if ($paymentMethod === 'bayar ditempat')
                <div class="flex flex-col items-center gap-4">
                    <div class="p-4 bg-white rounded-full shadow-sm">
                        <span class="text-4xl icon-[streamline-freehand--begging-giving] p-5 px-10"></span>
                    </div>
                    <p class="text-lg text-secondary">Please show your <span
                            class="font-bold text-primary">{{ $invoiceNumber }}</span> to the cashier upon arrival.</p>
                </div>
            @else
                <div class="flex flex-col items-center gap-4">
                    <div class="bg-white p-4 rounded-xl shadow-sm ring-1 ring-secondary/20">
                        <img src="https://quickchart.io/qr?text=https://www.youtube.com/watch?v=hvL1339luv0&list=RDhvL1339luv0&start_radio=1&size=200"
                            alt="QR Code">
                    </div>
                    <p class="text-sm text-secondary">Scan the QR code above to complete your payment.</p>
                </div>
            @endif
        </div>

        <div class="flex gap-4 justify-center border-t border-secondary/50 border-dashed pt-5 border-b pb-5">
            <a href="{{ route('cart') }}"
                class="px-8 py-3 rounded-xl font-bold text-secondary hover:bg-neutral transition">
                Cancel
            </a>
            <button
                class="px-8 py-3 rounded-xl font-bold bg-primary text-white hover:bg-primary-dark transition hover:scale-110 ">
                Confirm Payment
            </button>
        </div>
    </div>
</x-layout>
