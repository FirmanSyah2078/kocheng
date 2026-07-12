<x-layout>
    <div class="w-full flex justify-center items-center p-10 flex-col">
        <x-slot:title>Edit User</x-slot>
        <div class="w-full mb-5">

            <a href="{{ route('dashboard.admin.index', ['tab' => 'users']) }}"
                class="text-sm text-secondary hover:text-primary">&larr; Kembali</a>

        </div>
        <div class="flex ">
            <div class="max-w-md bg-red p-6 rounded-2xl shadow-sm border-t-4 border-accent">
                <form action="{{ route('dashboard.admin.users.update', $data) }}" method="POST" class="space-y-5">
                    @csrf @method('PUT')
                    <div>
                        <label class="block text-sm font-semibold mb-2">Nama</label>
                        <input type="text" name="name" value="{{ $data->name }}"
                            class="w-full px-4 py-3 rounded-xl border border-black/10 outline-none focus:ring-2 focus:ring-accent">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Email</label>
                        <input type="text" value="{{ $data->email }}" disabled
                            class="w-full px-4 py-3 rounded-xl border border-black/10 bg-neutral text-secondary">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Role</label>
                        <select name="role" class="w-full px-4 py-3 rounded-xl border border-black/10">
                            <option value="admin" @selected($data->role === 'admin')>Admin</option>
                            <option value="user" @selected($data->role === 'user')>User</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-3 rounded-xl border border-black/10">
                            <option value="active" @selected($data->status === 'active')>Active</option>
                            <option value="inactive" @selected($data->status === 'inactive')>Inactive</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full bg-primary text-white py-3 rounded-xl font-bold hover:opacity-90">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
