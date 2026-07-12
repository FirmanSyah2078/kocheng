<x-layout>

    <div>
        <a href="{{ route('dashboard.index', ['tab' => 'transactions']) }}" class="text-secondary hover:text-primary">
            ← Kembali ke Daftar Transaksi
        </a>
    </div>

    <h1 class="mt-5">{{ $data->invoice_number }}</h1>


    <div class="mt-5 mb-5">
        <span>Nama Pelanggan</span>
        <span>{{ $data->user->name }}</span>
        <span>Metode Pembayaran</span>
        <span class="uppercase">{{ $data->payment_method }}</span>
        <span>Status</span>
        <span class="capitalize {{ $data->status }}">
            {{ $data->status }}
        </span>
        <span>Tanggal</span>
        <span>{{ $data->created_at }}</span>
    </div>

    <x-table>
        <x-slot:header>
            <th class="th-dashboard">Produk</th>
            <th class="th-dashboard text-center">Jumlah</th>
            <th class="th-dashboard">Harga Satuan</th>
            <th class="th-dashboard">Subtotal</th>
        </x-slot:header>

        <x-slot:body>
            @foreach ($data->items as $item)
                <tr class="hover:bg-neutral-200 transition-all duration-300">
                    <td class="td-dashboard">
                        {{ $item->product_name }}
                        <br>
                        <span class="text-sm text-secondary">{{ $item->category_name }}</span>
                    </td>
                    <td class="td-dashboard text-center">{{ $item->quantity }}</td>
                    <td class="td-dashboard">
                        {{ $item->price_at_sale }}
                    </td>
                    <td class="td-dashboard">
                        {{ $item->subtotal }}
                    </td>
                </tr>
            @endforeach
        </x-slot:body>
    </x-table>

    <div class="mt-5 text-right">
        <p class="text-sm text-secondary">Total Pembayaran: <span
                class="text-primary">{{ $data->formatted_total_amount }}</span></p>
        <p class="text-sm text-secondary">Uang Bayar: <span
                class="text-primary">{{ $data->formatted_payment_amount }}</span></p>
        <p class="text-sm text-secondary">Kembalian:
            <span class="text-primary">{{ $data->formatted_change_amount }}</span>
        </p>
    </div>

</x-layout>
