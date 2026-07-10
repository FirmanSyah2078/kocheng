<x-layout>
    <div>

        <div class="flex my-2 max-w-fit gap-2 border border-red-500 p-2 ">
            <a href="{{ route('dashboard', ['tab' => 'users']) }}"
                class="{{ request('tab') == 'users' || !request('tab') ? 'text-primary' : 'text-secondary' }}">
                Users
            </a>

            <a href="{{ route('dashboard', ['tab' => 'categories']) }}"
                class="{{ request('tab') == 'categories' ? 'text-primary' : 'text-secondary' }}">
                Categories
            </a>
        </div>

        <x-table>
            <x-slot:header>
                @if ($tab == 'users')
                    <th class="th-dashboard">ID</th>
                    <th class="th-dashboard">Name</th>
                    <th class="th-dashboard">Role</th>
                    <th class="th-dashboard">Created at</th>
                    <th class="th-dashboard">Updated at</th>
                    <th class="th-dashboard">Action</th>
                @elseif ($tab == 'categories')
                    <th class="th-dashboard">ID</th>
                    <th class="th-dashboard">Categories Name</th>
                    <th class="th-dashboard">Created at</th>
                    <th class="th-dashboard">Updated at</th>
                    <th class="th-dashboard">Action</th>
                @endif
            </x-slot:header>

            <x-slot:body>
                @foreach ($data as $d)
                    <tr class="hover:bg-primary/50 hover:text-neutral transition-all duration-300">
                        @if ($tab == 'users')
                            <td class="td-dashboard text-center">{{ $d['id'] }}</td>
                            <td class="td-dashboard">{{ $d['name'] }}</td>
                            <td class="td-dashboard text-center capitalize">{{ $d['role'] }}</td>
                            <td class="td-dashboard">{{ $d['created_at'] }}</td>
                            <td class="td-dashboard">{{ $d['updated_at'] }}</td>
                            <td class="td-dashboard justify-center flex gap-2">
                                <a href="{{ route('dashboard.edit', $d->id) }}">Edit</a>
                                <a href="{{ route('dashboard.delete', $d->id) }}" onclick="return confirm('Delete?')">
                                    Delete
                                </a>
                            </td>
                        @elseif ($tab == 'categories')
                            <td class="td-dashboard text-center">{{ $d['id'] }}</td>
                            <td class="td-dashboard">{{ $d['name'] }}</td>
                            <td class="td-dashboard">{{ $d['created_at'] }}</td>
                            <td class="td-dashboard">{{ $d['updated_at'] }}</td>
                            <td class="td-dashboard justify-center flex gap-2">
                                <a href="{{ route('dashboard.edit', $d->id) }}">Edit</a>
                                <a href="{{ route('dashboard.delete', $d->id) }}" onclick="return confirm('Delete?')">
                                    Delete
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table>
    </div>
</x-layout>
