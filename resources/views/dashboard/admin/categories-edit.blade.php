<x-layout>
    <x-slot:title>Edit Kategori</x-slot>

    <div class="max-w-md bg-white p-6 rounded-2xl shadow-sm border-t-4 border-accent">
        <form action="{{ route('dashboard.admin.categories.update', $data) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold mb-2">Nama Kategori</label>
                <input type="text" name="name" value="{{ $data->name }}" class="w-full px-4 py-3 rounded-xl border border-black/10 outline-none focus:ring-2 focus:ring-accent">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Status</label>
                <select name="status" class="w-full px-4 py-3 rounded-xl border border-black/10">
                    <option value="active" @selected($data->status === 'active')>Active</option>
                    <option value="inactive" @selected($data->status === 'inactive')>Inactive</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-bold hover:opacity-90">Simpan</button>
        </form>
    </div>
</x-layout>
