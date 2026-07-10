<x-layout>
    <div class="min-h-screen flex items-start justify-center">
        <div class="max-w-md w-full p-5 bg-neutral rounded-lg shadow-sm border border-neutral-300">
            <h2 class="mb-5">Edit Product</h2>
            <form action="{{ route('product.update', $data->id) }}" method="POST">
                @csrf

                <div>
                    <label class="block text-sm text-secondary mb-2">Product Name</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none" type="text" name="name"
                        value="{{ $data->name }}">
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-secondary mb-2">Description</label>
                    <textarea name="describtion" class="p-2 border border-neutral-300 rounded-xl outline-none">{{ $data->describtion }}
                    </textarea>
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-secondary mb-2">Price</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none" type="number" name="price"
                        value="{{ $data->price }}">
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-secondary mb-2">Stock</label>
                    <input class="p-2 border border-neutral-300 rounded-xl outline-none" type="number" name="stock"
                        value="{{ $data->stock }}">
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
