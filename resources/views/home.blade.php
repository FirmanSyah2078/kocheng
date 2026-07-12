<x-layout>
    <x-slot:title>Meowland - Klik, Pesan, Ambil!</x-slot>

    {{-- ============ HERO ============ --}}
<section class="relative overflow-hidden min-h-[86vh] flex items-center">
    <div class="pointer-events-none absolute -top-24 -right-24 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>
    <div class="pointer-events-none absolute top-1/2 -left-32 w-72 h-72 bg-primary/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-12 py-12 grid lg:grid-cols-2 gap-16 items-center">
        <div class="reveal">
            <span class="inline-flex items-center gap-2 bg-accent/10 text-accent font-semibold text-xs tracking-wide uppercase px-4 py-1.5 rounded-full mb-5">
                <span class="icon-[mdi--paw] text-sm"></span>
                Pet shop kesayangan si Meong
            </span>

            <h1 class="font-serif text-4xl lg:text-5xl font-semibold text-primary leading-[1.15] tracking-tight mb-5">
                Kebutuhan Anabul, <span class="text-accent">Satu Klik</span> Selesai.
            </h1>

            <p class="text-base lg:text-lg text-secondary/80 mb-8 max-w-lg leading-relaxed">
                Pesan makanan, mainan, dan obat kucing favoritmu secara online.
                Gak perlu antre, tinggal datang dan ambil di toko!
            </p>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('signup') }}"
                    class="group inline-flex items-center gap-2 bg-primary text-white px-7 py-3.5 rounded-full font-bold text-sm shadow-lg shadow-primary/20 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                    <span class="icon-[mdi--paw] text-lg"></span>
                    Klik Meowland Sekarang
                    <span class="icon-[mdi--arrow-right] text-base transition-transform duration-300 group-hover:translate-x-1"></span>
                </a>
                <a href="#kategori"
                    class="inline-flex items-center gap-2 text-primary font-semibold text-sm px-6 py-3.5 rounded-full hover:bg-primary/5 transition-colors duration-200">
                    Lihat Kategori
                </a>
            </div>

            <div class="flex flex-wrap items-center gap-x-10 gap-y-4 mt-10 pt-6 border-t border-secondary/10">
                <div>
                    <p class="font-serif text-xl text-primary font-bold">500+</p>
                    <p class="text-xs text-secondary/60 uppercase tracking-wide">Pelanggan Puas</p>
                </div>
                <div>
                    <p class="font-serif text-xl text-primary font-bold">4.9/5</p>
                    <p class="text-xs text-secondary/60 uppercase tracking-wide">Rating Toko</p>
                </div>
                <div>
                    <p class="font-serif text-xl text-primary font-bold">100%</p>
                    <p class="text-xs text-secondary/60 uppercase tracking-wide">Produk Original</p>
                </div>
            </div>
        </div>

        <div class="relative reveal reveal-delay-2">
            <div class="w-full aspect-square max-w-md mx-auto rounded-[2.5rem] overflow-hidden shadow-xl">
                <img
                    src="{{ asset('src/khoceng.jpg') }}"
                    alt="Kucing Meowland"
                    class="w-full h-full object-cover"
                >
            </div>

            <div class="absolute -bottom-6 -left-4 sm:-left-8 bg-white rounded-2xl shadow-xl px-5 py-4 flex items-center gap-3 max-w-55">
                <span class="w-10 h-10 shrink-0 rounded-full bg-accent/10 flex items-center justify-center">
                    <span class="icon-[mdi--store-clock] text-xl text-accent"></span>
                </span>
                <p class="text-sm font-semibold text-secondary leading-snug">Siap diambil di toko &lt; 1 jam</p>
            </div>
        </div>
    </div>
</section>

    {{-- ============ STRIP KEUNGGULAN ============ --}}
    <section class="border-y border-secondary/10 bg-white/60">
        <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="reveal flex items-start gap-3">
                <span class="icon-[mdi--truck-fast-outline] text-2xl text-accent shrink-0"></span>
                <div>
                    <p class="font-bold text-primary text-sm">Cepat Diambil</p>
                    <p class="text-xs text-secondary/60 mt-0.5">Pesan online, tinggal jemput di toko</p>
                </div>
            </div>
            <div class="reveal reveal-delay-1 flex items-start gap-3">
                <span class="icon-[mdi--shield-check-outline] text-2xl text-accent shrink-0"></span>
                <div>
                    <p class="font-bold text-primary text-sm">Produk Original</p>
                    <p class="text-xs text-secondary/60 mt-0.5">Terjamin asli & bergaransi</p>
                </div>
            </div>
            <div class="reveal reveal-delay-2 flex items-start gap-3">
                <span class="icon-[mdi--cash-multiple] text-2xl text-accent shrink-0"></span>
                <div>
                    <p class="font-bold text-primary text-sm">Harga Bersahabat</p>
                    <p class="text-xs text-secondary/60 mt-0.5">Kualitas oke, kantong tetap aman</p>
                </div>
            </div>
            <div class="reveal reveal-delay-3 flex items-start gap-3">
                <span class="icon-[mdi--chat-processing-outline] text-2xl text-accent shrink-0"></span>
                <div>
                    <p class="font-bold text-primary text-sm">CS Responsif</p>
                    <p class="text-xs text-secondary/60 mt-0.5">Siap bantu tiap pertanyaanmu</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ KATEGORI FAVORIT ============ --}}
    <section id="kategori" class="py-24 scroll-mt-20">
        <div class="text-center mb-14 reveal">
            <p class="text-accent font-semibold text-xs uppercase tracking-widest mb-3">Belanja Sesuai Kebutuhan</p>
            <h2 class="font-serif text-3xl lg:text-4xl font-semibold text-primary mb-3">Kategori Favorit</h2>
            <div class="w-16 h-1 bg-accent mx-auto rounded-full"></div>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-6 px-6">
            @php
                $categories = [
                    ['icon' => 'mdi--toy-brick', 'label' => 'Mainan'],
                    ['icon' => 'mdi--bowl-mix', 'label' => 'Makanan'],
                    ['icon' => 'mdi--medicine-bottle', 'label' => 'Obat'],
                    ['icon' => 'game-icons--canned-fish', 'label' => 'Alat'],
                ];
                $ctaRoute = auth()->check() && ! auth()->user()->isAdmin()
                    ? route('dashboard.user.products')
                    : route('login');
            @endphp

            @foreach ($categories as $i => $cat)
                <a href="{{ $ctaRoute }}"
                    class="reveal reveal-delay-{{ $i + 1 }} group bg-white p-6 rounded-2xl border-b-4 border-accent shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 text-center">
                    <span class="icon-[{{ $cat['icon'] }}] text-4xl text-accent mb-3 block mx-auto transition-transform duration-300 group-hover:scale-110"></span>
                    <p class="font-bold text-primary">{{ $cat['label'] }}</p>
                </a>
            @endforeach
        </div>
    </section>

    {{-- ============ CARA KERJA ============ --}}
    <section class="py-24 bg-primary relative overflow-hidden">
        <div class="pointer-events-none absolute -bottom-20 -right-20 w-72 h-72 bg-accent/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 reveal">
                <p class="text-accent font-semibold text-xs uppercase tracking-widest mb-3">Gampang Banget</p>
                <h2 class="font-serif text-3xl lg:text-4xl font-semibold text-white mb-3">3 Langkah Aja</h2>
                <div class="w-16 h-1 bg-accent mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-10 relative">
                <div class="hidden md:block absolute top-8 left-[16.5%] right-[16.5%] border-t-2 border-dashed border-white/15"></div>

                @php
                    $steps = [
                        ['no' => '01', 'icon' => 'mdi--cursor-default-click-outline', 'title' => 'Klik', 'desc' => 'Pilih produk favorit anabul lewat website, di mana pun kamu berada.'],
                        ['no' => '02', 'icon' => 'mdi--clipboard-check-outline', 'title' => 'Pesan', 'desc' => 'Konfirmasi pesanan & tentukan jadwal pengambilan sesuai waktumu.'],
                        ['no' => '03', 'icon' => 'mdi--shopping-outline', 'title' => 'Ambil', 'desc' => 'Datang ke toko, ambil pesanan, langsung bawa pulang kebahagiaan.'],
                    ];
                @endphp

                @foreach ($steps as $i => $step)
                    <div class="reveal reveal-delay-{{ $i + 1 }} relative text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-white flex items-center justify-center shadow-lg mb-5 relative z-10">
                            <span class="icon-[{{ $step['icon'] }}] text-3xl text-primary"></span>
                        </div>
                        <p class="font-serif text-sm text-accent font-bold mb-1">{{ $step['no'] }}</p>
                        <p class="font-bold text-white text-lg mb-2">{{ $step['title'] }}</p>
                        <p class="text-sm text-white/60 leading-relaxed max-w-xs mx-auto">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ TESTIMONI ============ --}}
    <section class="py-24">
        <div class="text-center mb-14 reveal">
            <p class="text-accent font-semibold text-xs uppercase tracking-widest mb-3">Kata Mereka</p>
            <h2 class="font-serif text-3xl lg:text-4xl font-semibold text-primary mb-3">Dipercaya Pecinta Kucing</h2>
            <div class="w-16 h-1 bg-accent mx-auto rounded-full"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-6">
            @php
                $testimonials = [
                    ['name' => 'Dinda', 'role' => 'Pelanggan sejak 2024', 'quote' => 'Tinggal pesan online, sampai toko udah siap diambil. Hemat waktu banget buat yang sibuk kerja.'],
                    ['name' => 'Rangga', 'role' => 'Pemilik 3 kucing', 'quote' => 'Stok makanan lengkap dan harganya bersaing. CS-nya juga fast response kalau ada pertanyaan.'],
                    ['name' => 'Wulan', 'role' => 'Pelanggan setia', 'quote' => 'Obat dan vitamin kucingnya selalu original. Anabul di rumah jadi makin sehat dan aktif.'],
                ];
            @endphp

            @foreach ($testimonials as $i => $t)
                <div class="reveal reveal-delay-{{ $i + 1 }} bg-white rounded-2xl p-8 shadow-sm border border-secondary/5">
                    <span class="icon-[mdi--format-quote-open] text-3xl text-accent/40 block mb-4"></span>
                    <p class="text-secondary/80 leading-relaxed mb-6">{{ $t['quote'] }}</p>
                    <div class="flex items-center gap-3 pt-4 border-t border-secondary/10">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary font-serif font-bold flex items-center justify-center">
                            {{ mb_substr($t['name'], 0, 1) }}
                        </span>
                        <div>
                            <p class="font-bold text-primary text-sm">{{ $t['name'] }}</p>
                            <p class="text-xs text-secondary/50">{{ $t['role'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============ CTA BANNER ============ --}}
    <section class="pb-24">
        <div class="max-w-5xl mx-auto px-6">
            <div class="reveal relative overflow-hidden bg-linear-to-br from-primary to-[#1c1428] rounded-3xl px-10 py-16 text-center">
                <div class="pointer-events-none absolute -top-10 -left-10 w-56 h-56 bg-accent/10 rounded-full blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-10 -right-10 w-56 h-56 bg-accent/10 rounded-full blur-3xl"></div>

                <span class="icon-[mdi--paw] text-4xl text-accent mb-4 inline-block"></span>
                <h2 class="font-serif text-3xl lg:text-4xl font-semibold text-white mb-4">
                    Yuk, Manjakan Anabul Kesayanganmu
                </h2>
                <p class="text-white/60 max-w-md mx-auto mb-8 leading-relaxed">
                    Daftar sekarang dan nikmati kemudahan belanja kebutuhan kucing tanpa ribet.
                </p>
                <a href="{{ route('signup') }}"
                    class="inline-flex items-center gap-2 bg-accent text-primary px-8 py-4 rounded-full font-bold hover:opacity-90 hover:-translate-y-0.5 transition-all duration-300 shadow-lg">
                    <span class="icon-[mdi--paw] text-xl"></span>
                    Daftar Gratis
                </a>
            </div>
        </div>
    </section>
</x-layout>
