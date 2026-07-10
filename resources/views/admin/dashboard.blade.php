<x-layout>
    <div>
        <x-table>
            <x-slot:header>
                <th class="th-dashboard">ID</th>
                <th class="th-dashboard">Nama</th>
                <th class="th-dashboard">Action</th>
            </x-slot:header>

            <x-slot:body>
                @foreach ($products as $p)
                    <tr>
                        <td class="td-dashboard text-center">{{ $p['id'] }}</td>
                        <td class="td-dashboard">{{ $p['name'] }}</td>
                        <td class="td-dashboard text-center">
                            <a href="#" class="btn-table-edit">Edit</a>
                            <a href="{{ route('dashboard.delete', $p->id) }}" class="btn-table-delete"
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
