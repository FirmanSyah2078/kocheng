<x-layout>
    <h2 class="mb-5">Edit Profile</h2>
    <form action="{{ route('dashboard.update', $users->id) }}" method="POST">
        @csrf

        <div>
            <label class="block text-sm text-gray-600 mb-2">Name</label>
            <input class="p-2 border border-gray-300 rounded-xl outline-none" type="text" name="name"
                value="{{ $users->name }}">
        </div>

        <div class="mt-5">
            <label class="block text-sm text-gray-600 mb-2">Email</label>
            <input class="p-2 border border-gray-300 rounded-xl outline-none" type="text" name="email"
                value="{{ $users->email }}">
        </div>

        <div class="mt-5">
            <label class="block text-sm text-gray-600 mb-2">Role</label>
            <input class="p-2 border border-gray-300 rounded-xl outline-none" type="text" name="role"
                value="{{ $users->role }}">
        </div>

        <div class="mt-5">
            <button type="submit"
                class="w-max p-2 rounded-md text-gray-600 bg-gray-300 hover:bg-gray-600 hover:text-gray-300 transition-all duration-300">Update</button>
        </div>

    </form>
</x-layout>
