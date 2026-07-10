<x-layout>
    <div class="min-h-screen flex items-start justify-center">
        <div class="max-w-md w-full p-5 bg-neutral rounded-lg shadow-sm border border-neutral-300">

            <h2 class="mb-5">Edit Profile</h2>
            <form action="{{ route('dashboard.update', $data->id) }}" method="POST">
                @csrf

                <div>
                    <label class="block text-sm text-secondary mb-2">Name</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none" type="text" name="name"
                        value="{{ $data->name }}">
                </div>

                <div class="mt-5">
                    <label class="block text-sm text-secondary mb-2">Email</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none" type="text" name="email"
                        value="{{ $data->email }}">
                </div>

                <div class="mt-5">
                    <label class="block text-sm text-secondary mb-2">Role</label>
                    <select class="p-2 border border-neutral-300 rounded-xl outline-none" type="text" name="role">
                        <option value="admin"{{ $data->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user"{{ $data->role == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <div class="mt-5">
                    <button type="submit"
                        class="w-max p-2 rounded-md text-neutral bg-primary hover:bg-secondary transition-all duration-300">Save
                        changes</button>
                </div>

            </form>
        </div>

    </div>
</x-layout>
