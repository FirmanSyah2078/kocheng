<x-layout>
    <div>
        <x-table>
            <x-slot:header>
                <th class="th-dashboard">ID</th>
                <th class="th-dashboard">Nama</th>
                <th class="th-dashboard">Role</th>
                <th class="th-dashboard">Action</th>
            </x-slot:header>

            <x-slot:body>
                @foreach ($users as $u)
                    <tr class="hover:bg-gray-300 transition-all duration-300">
                        <td class="td-dashboard text-center">{{ $u['id'] }}</td>
                        <td class="td-dashboard">{{ $u['name'] }}</td>
                        <td class="td-dashboard">{{ $u['role'] }}</td>
                        <td class="td-dashboard text-center">
                            <a href="{{ route('dashboard.edit', $u->id) }}" class="btn-table-edit">Edit</a>
                            <a href="{{ route('dashboard.delete', $u->id) }}" class="btn-table-delete"
                                onclick="return confirm('Delete?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table>
    </div>
</x-layout>
