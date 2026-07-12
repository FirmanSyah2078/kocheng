<x-layout>
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-20 flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-3/5">
            <h1 class="font-serif text-5xl lg:text-6xl text-primary leading-tight mb-6">
                Kebutuhan Anabul, <span class="text-accent">Satu Klik Selesai.</span>
            </h1>
            <p class="text-lg text-secondary mb-8 max-w-lg">
                Pesan makanan, mainan, dan obat kucing favoritmu secara online.
                Gak perlu antre, tinggal datang dan ambil di toko!
            </p>
            <a href="{{ route('signup') }}"
                class="inline-block bg-accent text-primary px-8 py-4 rounded-full font-bold hover:scale-105 transition-transform shadow">
                Klik Meowland Sekarang
            </a>
        </div>
        <div class="lg:w-2/5 flex justify-center">
            <div
                class="w-72 h-72 rounded-full bg-accent/10 border-4 border-dashed border-accent flex items-center justify-center">
                <span class="text-accent font-serif text-center px-4">Foto Kucing Disini</span>
            </div>
        </div>
    </div>

    <section class="bg-white/60 py-20">
        <div class="text-center mb-14">
            <h2 class="font-serif text-3xl text-primary mb-3">Kategori Favorit</h2>
            <div class="w-16 h-1 bg-accent mx-auto"></div>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-6 px-6">
            <div class="bg-white p-6 rounded-2xl border-b-4 border-accent shadow-sm hover:shadow-md transition">
                <p class="font-bold text-primary">Mainan</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border-b-4 border-secondary shadow-sm hover:shadow-md transition">
                <p class="font-bold text-primary">Makanan</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border-b-4 border-danger shadow-sm hover:shadow-md transition">
                <p class="font-bold text-primary">Obat</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border-b-4 border-primary shadow-sm hover:shadow-md transition">
                <p class="font-bold text-primary">Alat</p>
            </div>
        </div>
    </section>

</x-layout>
