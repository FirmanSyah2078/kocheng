<x-layout>
    <x-slot:title>{{ $data->invoice_number }}</x-slot>

    <a href="{{ route('dashboard.admin.index', ['tab' => 'transactions']) }}" class="text-sm text-secondary hover:text-primary">&larr; Kembali</a>

    <div class="grid grid-cols-2 gap-4 my-6 bg-white p-6 rounded-2xl shadow-sm">
        <div><p class="text-xs text-secondary">Pelanggan</p><p class="font-semibold">{{ $data->user->name }}</p></div>
        <div><p class="text-xs text-secondary">Metode Pembayaran</p><p class="font-semibold uppercase">{{ $data->payment_method }}</p></div>
        <div><p class="text-xs text-secondary">Status</p><p class="font-semibold capitalize">{{ $data->status }}</p></div>
        <div><p class="text-xs text-secondary">Tanggal</p><p class="font-semibold">{{ $data->created_at->format('d M Y, H:i') }}</p></div>
    </div>

    <x-dashboard.table>
        <x-slot:header>
            <th class="th-dashboard">Produk</th><th class="th-dashboard text-center">Jumlah</th><th class="th-dashboard">Harga Satuan</th><th class="th-dashboard">Subtotal</th>
        </x-slot:header>
        <x-slot:body>
            @foreach ($data->items as $item)
                <tr>
                    <td class="td-dashboard">{{ $item->product->name ?? 'Produk dihapus' }}</td>
                    <td class="td-dashboard text-center">{{ $item->quantity }}</td>
                    <td class="td-dashboard">Rp {{ number_format($item->price_at_sale, 0, ',', '.') }}</td>
                    <td class="td-dashboard">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </x-slot:body>
    </x-dashboard.table>

    <div class="mt-6 text-right">
        <p class="text-secondary">Total: <span class="text-primary font-bold">{{ $data->formatted_total_amount }}</span></p>
    </div>
</x-layout>
