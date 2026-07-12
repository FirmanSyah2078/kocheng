<x-layout>
    <x-slot:title>Kelola {{ ucfirst($tab) }}</x-slot>

    <section class="max-w-7xl mx-auto px-6 py-10">
        @if (session('success'))
            <div class="mb-6 rounded-xl p-4 text-sm" style="background: color-mix(in srgb, #7C9473 12%, white); color:#4d5d47;">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex gap-5 mb-6 border-b border-black/10">
            @foreach (['users' => 'Users', 'categories' => 'Categories', 'products' => 'Products', 'transactions' => 'Transactions'] as $key => $label)
                <a href="{{ route('dashboard.admin.index', ['tab' => $key]) }}"
                    class="pb-3 text-sm font-semibold {{ $tab === $key ? 'text-primary border-b-2 border-accent' : 'text-secondary hover:text-primary' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <x-dashboard.table>
            <x-slot:header>
                @if ($tab === 'users')
                    <th class="th-dashboard text-center">ID</th>
                    <th class="th-dashboard text-left">Nama</th>
                    <th class="th-dashboard text-left">Email</th>
                    <th class="th-dashboard text-center">Role</th>
                    <th class="th-dashboard text-center">Status</th>
                    <th class="th-dashboard text-center">Aksi</th>
                @elseif ($tab === 'categories')
                    <th class="th-dashboard text-center">ID</th>
                    <th class="th-dashboard text-left">Nama</th>
                    <th class="th-dashboard text-center">Total Produk</th>
                    <th class="th-dashboard text-center">Status</th>
                    <th class="th-dashboard text-center">Aksi</th>
                @elseif ($tab === 'products')
                    <th class="th-dashboard text-center">ID</th>
                    <th class="th-dashboard text-left">Kategori</th>
                    <th class="th-dashboard text-left">SKU</th>
                    <th class="th-dashboard text-left">Nama</th>
                    <th class="th-dashboard text-left">Harga</th>
                    <th class="th-dashboard text-center">Stok</th>
                    <th class="th-dashboard text-center">Status</th>
                    <th class="th-dashboard text-center">Aksi</th>
                @elseif ($tab === 'transactions')
                    <th class="th-dashboard text-left">Invoice</th>
                    <th class="th-dashboard text-left">Pelanggan</th>
                    <th class="th-dashboard text-left">Total</th>
                    <th class="th-dashboard text-center">Status</th>
                    <th class="th-dashboard text-center">Metode</th>
                    <th class="th-dashboard text-center">Aksi</th>
                @endif
            </x-slot:header>

            <x-slot:body>
                @forelse ($data as $d)
                    <tr class="hover:bg-neutral transition">
                        @if ($tab === 'users')
                            <td class="td-dashboard text-center">{{ $d->id }}</td>
                            <td class="td-dashboard">{{ $d->name }}</td>
                            <td class="td-dashboard">{{ $d->email }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d->role }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d->status }}</td>
                            <td class="td-dashboard text-center space-x-2">
                                <a href="{{ route('dashboard.admin.users.edit', $d) }}" class="text-primary hover:underline">Edit</a>
                                <form action="{{ route('dashboard.admin.users.destroy', $d) }}" method="POST" class="inline" onsubmit="return confirm('Nonaktifkan {{ $d->name }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-danger hover:underline">Nonaktifkan</button>
                                </form>
                            </td>
                        @elseif ($tab === 'categories')
                            <td class="td-dashboard text-center">{{ $d->id }}</td>
                            <td class="td-dashboard">{{ $d->name }}</td>
                            <td class="td-dashboard text-center">{{ $d->products_count }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d->status }}</td>
                            <td class="td-dashboard text-center space-x-2">
                                <a href="{{ route('dashboard.admin.categories.edit', $d) }}" class="text-primary hover:underline">Edit</a>
                                <form action="{{ route('dashboard.admin.categories.destroy', $d) }}" method="POST" class="inline" onsubmit="return confirm('Nonaktifkan {{ $d->name }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-danger hover:underline">Nonaktifkan</button>
                                </form>
                            </td>
                        @elseif ($tab === 'products')
                            <td class="td-dashboard text-center">{{ $d->id }}</td>
                            <td class="td-dashboard">{{ $d->category->name ?? '-' }}</td>
                            <td class="td-dashboard">{{ $d->sku }}</td>
                            <td class="td-dashboard">{{ $d->name }}</td>
                            <td class="td-dashboard">{{ $d->formatted_price }}</td>
                            <td class="td-dashboard text-center">{{ $d->stock }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d->status }}</td>
                            <td class="td-dashboard text-center space-x-2">
                                <a href="{{ route('dashboard.admin.products.edit', $d) }}" class="text-primary hover:underline">Edit</a>
                                <form action="{{ route('dashboard.admin.products.destroy', $d) }}" method="POST" class="inline" onsubmit="return confirm('Nonaktifkan {{ $d->name }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-danger hover:underline">Nonaktifkan</button>
                                </form>
                            </td>
                        @elseif ($tab === 'transactions')
                            <td class="td-dashboard">{{ $d->invoice_number }}</td>
                            <td class="td-dashboard">{{ $d->user->name }}</td>
                            <td class="td-dashboard">{{ $d->formatted_total_amount }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d->status }}</td>
                            <td class="td-dashboard text-center uppercase">{{ $d->payment_method }}</td>
                            <td class="td-dashboard text-center space-x-2">
                                <a href="{{ route('dashboard.admin.transactions.detail', $d->invoice_number) }}" class="text-primary hover:underline">Detail</a>
                                @if ($d->status === 'pending')
                                    <form action="{{ route('dashboard.admin.transactions.update', $d) }}" method="POST" class="inline">
                                        @csrf @method('PUT')
                                        <button type="submit" name="status" value="completed" class="hover:underline" style="color:#7C9473">Konfirmasi</button>
                                        <button type="submit" name="status" value="cancelled" class="text-danger hover:underline">Batal</button>
                                    </form>
                                @endif
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr><td class="td-dashboard text-center" colspan="8">Belum ada data.</td></tr>
                @endforelse
            </x-slot:body>
        </x-dashboard.table>
    </section>
</x-layout>