<x-layout>
    <x-slot:title>Tentang Kami - Meowland</x-slot>

    <section class="reveal max-w-4xl mx-auto px-6 py-20 text-center">
        <p class="text-accent font-semibold text-xs uppercase tracking-widest mb-3">Kisah Kami</p>
        <h1 class="font-serif font-semibold text-4xl text-primary mb-8">Kisah Meowland</h1>
        <div class="bg-white p-10 rounded-2xl shadow-sm text-left leading-relaxed text-secondary/80">
            <p class="mb-6">
                Meowland lahir dari keinginan untuk memberikan kemudahan bagi para pecinta kucing.
                Kami paham waktumu berharga, tapi kesehatan dan kebahagiaan anabul tetap prioritas utama.
            </p>
            <p>
                Dengan konsep <strong class="text-primary font-semibold">"Klik Meowland, Ambil di Toko"</strong>,
                kamu cukup pesan dari ponsel, datang ke toko, dan bawa pulang kebahagiaan untuk kucingmu.
            </p>
        </div>
    </section>

<section class="py-15">
    <div class="text-center mb-14 reveal">
        <p class="text-accent font-semibold text-xs uppercase tracking-widest mb-3">Di Balik Layar</p>
        <h2 class="font-serif text-3xl lg:text-4xl font-semibold text-primary mb-3">Tim Kami</h2>
        <div class="w-16 h-1 bg-accent mx-auto rounded-full"></div>
    </div>

    <div class="max-w-5xl mx-auto px-6 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
        @php
            $team = [
                ['slug' => 'abad', 'name' => 'Abad'],
                ['slug' => 'fadil', 'name' => 'Fadil'],
                ['slug' => 'eko', 'name' => 'Eko'],
                ['slug' => 'firman', 'name' => 'Firman'],
                ['slug' => 'arga', 'name' => 'Arga'],
            ];
        @endphp

        @foreach ($team as $i => $member)
            @php $hasPhoto = file_exists(public_path("src/{$member['slug']}.png")); @endphp

            <div class="reveal reveal-delay-{{ ($i % 4) + 1 }} bg-white rounded-2xl p-6 text-center shadow-sm border border-secondary/5">
                <div class="w-24 h-24 mx-auto rounded-full overflow-hidden bg-neutral flex items-center justify-center mb-4 ring-4 ring-accent/10">
                    @if ($hasPhoto)
                        <img
                            src="{{ asset("src/{$member['slug']}.png") }}"
                            alt="{{ $member['name'] }}"
                            class="w-full h-full object-cover object-top"
                        >
                    @else
                        <span class="icon-[mdi--paw] text-4xl text-accent/50"></span>
                    @endif
                </div>
                <p class="font-bold text-primary text-sm">{{ $member['name'] }}</p>
                <p class="text-xs text-secondary/50 mt-1">NIM: {{ $member['nim'] ?? '-' }}</p>
            </div>
        @endforeach
    </div>
</section>
</x-layout>
