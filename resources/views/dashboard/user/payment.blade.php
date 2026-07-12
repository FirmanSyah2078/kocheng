<x-layout>
    <x-slot:title>Pembayaran</x-slot>

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm">
        <h1 class="font-serif text-2xl text-primary mb-6">Pilih Metode Pembayaran</h1>

        <form action="{{ route('dashboard.user.payment.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-3 gap-3">
                @foreach (['qris' => 'QRIS', 'ovo' => 'OVO', 'dana' => 'DANA', 'paypal' => 'PayPal', 'bayar ditempat' => 'Bayar di Tempat'] as $value => $label)
                    <label class="border border-black/10 rounded-xl p-4 text-center text-sm font-semibold cursor-pointer has-[:checked]:border-accent has-[:checked]:bg-accent/10">
                        <input type="radio" name="payment_method" value="{{ $value }}" class="hidden" @checked($loop->first)>
                        {{ $label }}
                    </label>
                @endforeach
            </div>

            <div class="border-t pt-4 flex justify-between font-bold text-lg">
                <span>Total Bayar</span>
                <span class="text-primary">{{ $formattedGrandTotal }}</span>
            </div>

            <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-bold hover:opacity-90">
                Konfirmasi Pesanan
            </button>
        </form>
    </div>
</x-layout>
