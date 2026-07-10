<x-layout>
    <div>
        <x-table>
            <x-slot:header>
                <th class="th-dashboard">ID</th>
                <th class="th-dashboard">Nama</th>
                <th class="th-dashboard">Role</th>
                <th class="th-dashboard">Created at</th>
                <th class="th-dashboard">Updated at</th>
                <th class="th-dashboard">Action</th>
            </x-slot:header>

            <x-slot:body>
                @foreach ($users as $u)
                    <tr class="hover:bg-gray-100 transition-all duration-300">
                        <td class="td-dashboard text-center">{{ $u['id'] }}</td>
                        <td class="td-dashboard">{{ $u['name'] }}</td>
                        <td class="td-dashboard text-center capitalize">{{ $u['role'] }}</td>
                        <td class="td-dashboard">{{ $u['created_at'] }}</td>
                        <td class="td-dashboard">{{ $u['updated_at'] }}</td>
                        <td class="td-dashboard justify-center flex gap-2">
                            <a href="{{ route('dashboard.edit', $u->id) }}">Edit</a>
                            <a href="{{ route('dashboard.delete', $u->id) }}" onclick="return confirm('Delete?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table>
    </div>
</x-layout>
