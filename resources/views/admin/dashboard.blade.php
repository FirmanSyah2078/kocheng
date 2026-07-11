<x-layout>

    {{-- Tab --}}
    <div>

        <div class="flex my-2 max-w-fit gap-5 p-2">
            <a href="{{ route('dashboard.index', ['tab' => 'users']) }}"
                class="{{ request('tab') == 'users' || !request('tab') ? 'text-primary border-b-3 border-primary' : 'text-secondary border-b-3 border-transparent pb-1 hover:border-primary transition-all duration-300' }}">
                Users
            </a>

            <a href="{{ route('dashboard.index', ['tab' => 'product']) }}"
                class="{{ request('tab') == 'product' ? 'text-primary border-b-3 border-primary' : 'text-secondary border-b-3 border-transparent pb-1 hover:border-primary transition-all duration-300' }}">
                Product
            </a>
            <a href="{{ route('dashboard.index', ['tab' => 'categories']) }}"
                class="{{ request('tab') == 'categories' ? 'text-primary border-b-3 border-primary' : 'text-secondary border-b-3 border-transparent pb-1 hover:border-primary transition-all duration-300' }}">
                Categories
            </a>
            <a href="{{ route('dashboard.index', ['tab' => 'transactions']) }}"
                class="{{ request('tab') == 'transactions' ? 'text-primary border-b-3 border-primary' : 'text-secondary border-b-3 border-transparent pb-1 hover:border-primary transition-all duration-300' }}">
                Transactions
            </a>
        </div>

        <x-table>
            <x-slot:header>

                {{-- Table heading Users --}}
                @if ($tab == 'users')
                    <th class="th-dashboard">ID</th>
                    <th class="th-dashboard">Name</th>
                    <th class="th-dashboard">Email</th>
                    <th class="th-dashboard">Role</th>
                    <th class="th-dashboard">Status</th>
                    <th class="th-dashboard">Action</th>

                    {{-- Table heading Product --}}
                @elseif ($tab == 'product')
                    <th class="th-dashboard">ID</th>
                    <th class="th-dashboard">Category</th>
                    <th class="th-dashboard">SKU</th>
                    <th class="th-dashboard">Product Name</th>
                    <th class="th-dashboard">Price</th>
                    <th class="th-dashboard">Stock</th>
                    <th class="th-dashboard">Status</th>
                    <th class="th-dashboard">Action</th>

                    {{-- Table heading Categories --}}
                @elseif ($tab == 'categories')
                    <th class="th-dashboard">ID</th>
                    <th class="th-dashboard">Categories Name</th>
                    <th class="th-dashboard">Total Products</th>
                    <th class="th-dashboard">Status</th>
                    <th class="th-dashboard">Action</th>

                    {{-- Table heading Transactions --}}
                @elseif ($tab == 'transactions')
                    <th class="th-dashboard">ID</th>
                    <th class="th-dashboard">Name</th>
                    <th class="th-dashboard">Invoice Number</th>
                    <th class="th-dashboard">Total Amount</th>
                    <th class="th-dashboard">Payment Amount</th>
                    <th class="th-dashboard">Change Amount</th>
                    <th class="th-dashboard">Status</th>
                    <th class="th-dashboard">Payment Method</th>
                    <th class="th-dashboard">Action</th>
                @endif
            </x-slot:header>

            <x-slot:body>
                @foreach ($data as $d)
                    <tr class="hover:bg-neutral-200 transition-all duration-300">

                        {{-- Table data Users --}}
                        @if ($tab == 'users')
                            <td class="td-dashboard text-center">{{ $d['id'] }}</td>
                            <td class="td-dashboard">{{ $d['name'] }}</td>
                            <td class="td-dashboard">{{ $d['email'] }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d['role'] }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d['status'] }}</td>
                            <td class="td-dashboard text-center">
                                <a href="{{ route('dashboard.edit', $d->id) }}">Edit</a>
                                <a href="{{ route('dashboard.delete', $d->id) }}"
                                    onclick="return confirm('Delete {{ $d['name'] }}?')">
                                    Delete
                                </a>
                            </td>

                            {{-- Table data Product --}}
                        @elseif ($tab == 'product')
                            <td class="td-dashboard text-center">{{ $d['id'] }}</td>
                            <td class="td-dashboard text-center">
                                {{ $d->category->name }}
                            </td>
                            <td class="td-dashboard text-center capitalize">{{ $d['sku'] }}</td>
                            <td class="td-dashboard">{{ $d['name'] }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d['formatted_price'] }}</td>
                            <td class="td-dashboard text-center">{{ $d['stock'] }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d['status'] }}</td>
                            <td class="td-dashboard text-center">
                                <a href="{{ route('product.edit', $d->id) }}">Edit</a>
                                <a href="{{ route('product.delete', $d->id) }}"
                                    onclick="return confirm('Delete {{ $d['name'] }}?')">
                                    Delete
                                </a>
                            </td>

                            {{-- Table data Categories --}}
                        @elseif ($tab == 'categories')
                            <td class="td-dashboard text-center">{{ $d['id'] }}</td>
                            <td class="td-dashboard text-center">{{ $d['name'] }}</td>
                            <td class="td-dashboard text-center">{{ $d->products_count }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d['status'] }}</td>
                            <td class="td-dashboard text-center">
                                <a href="{{ route('categories.edit', $d->id) }}">Edit</a>
                                <a href="{{ route('categories.delete', $d->id) }}"
                                    onclick="return confirm('Delete {{ $d['name'] }}?')">
                                    Delete
                                </a>
                            </td>

                            {{-- Table data Transactions --}}
                        @elseif ($tab == 'transactions')
                            <td class="td-dashboard text-center">{{ $d['id'] }}</td>
                            <td class="td-dashboard">{{ $d->user->name }}</td>
                            <td class="td-dashboard">{{ $d['invoice_number'] }}</td>
                            <td class="td-dashboard">{{ $d->formatted_total_amount }}</td>
                            <td class="td-dashboard">{{ $d->formatted_payment_amount }}</td>
                            <td class="td-dashboard">{{ $d->formatted_change_amount }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d['status'] }}</td>
                            <td class="td-dashboard text-center uppercase">{{ $d['payment_method'] }}</td>
                            <td class="td-dashboard text-center">

                                <a href="{{ route('transaction.detail', $d->invoice_number) }}">Detail</a>

                                @if ($d->status == 'pending')
                                    <form action="{{ route('transaction.update', $d->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit" name="status" value="completed"
                                            class="cursor-pointer">Konfirmasi</button>

                                        <button type="submit" name="status" value="cancelled"
                                            class="cursor-pointer">Batal</button>
                                    </form>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table>
    </div>
</x-layout>
