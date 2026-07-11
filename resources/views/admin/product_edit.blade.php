<x-layout>
    <div class="min-h-screen flex items-start justify-center">
        <div class="max-w-md w-full p-5 bg-neutral rounded-lg shadow-sm border border-neutral-300">
            <h2 class="mb-5">Edit Product</h2>
            <form action="{{ route('product.update', $data->id) }}" method="POST">
                @csrf

                <div>
                    <label class="block text-sm text-secondary mb-2">SKU</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none text-secondary" type="text"
                        name="sku" value="{{ $data->sku }}" disabled>
                </div>

                <div class="mt-5">
                    <label class="block text-sm text-secondary mb-2">Product Name</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none" type="text" name="name"
                        value="{{ $data->name }}" required>
                </div>

                <div class="mt-5">
                    <label class="block text-sm text-secondary mb-2">Description</label>
                    <textarea name="describtion" class="p-2 border border-neutral-300 rounded-xl outline-none" rows="5" required>{{ $data->describtion }}</textarea>
                </div>

                <div class="mt-5">
                    <label class="block text-sm text-secondary mb-2">Price</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none" type="number" name="price"
                        value="{{ $data->price }}" required min="0">
                </div>

                <div class="mt-5">
                    <label class="block text-sm text-secondary mb-2">Stock</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none" type="number" name="stock"
                        value="{{ $data->stock }}"required min="0">
                </div>

                <div class="mt-5">
                    <label class="block text-sm text-secondary mb-2">Category</label>
                    <select name="category_id" class="p-2 border border-neutral-300 rounded-xl outline-none">
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}" {{ $data->category_id == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-5">
                    <label class="block text-sm text-secondary mb-2">Status</label>
                    <select class="p-2 border border-neutral-300 rounded-xl outline-none" type="text" name="status">
                        <option value="active"{{ $data->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive"{{ $data->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
