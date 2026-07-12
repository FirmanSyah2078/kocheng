<footer class="bg-primary text-white mt-auto border-t border-white/10">
    <div class="container mx-auto px-6 py-14 grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- Brand --}}
        <div class="md:col-span-2">
            <p class="font-serif text-2xl text-accent mb-3">Meowland<span class="text-white">.</span></p>
            <p class="text-sm text-white/60 max-w-sm leading-relaxed">
                Klik, pesan, ambil. Kebutuhan kucing kesayanganmu, dari makanan sampai perlengkapan,
                kami siapkan dengan mudah dan cepat.
            </p>

            {{-- Sosial media (ikon inline, tinggal ganti href-nya) --}}
            <div class="flex items-center gap-3 mt-5">
                <a href="#" aria-label="Instagram"
                    class="w-9 h-9 flex items-center justify-center rounded-full bg-white/10 hover:bg-accent hover:text-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="3" width="18" height="18" rx="5" />
                        <circle cx="12" cy="12" r="4" />
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                    </svg>
                </a>
                <a href="#" aria-label="TikTok"
                    class="w-9 h-9 flex items-center justify-center rounded-full bg-white/10 hover:bg-accent hover:text-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path d="M14 3v10.5a3.5 3.5 0 1 1-3-3.46" />
                        <path d="M14 7c1 1.5 2.5 2.3 4 2.3" />
                    </svg>
                </a>
                <a href="#" aria-label="WhatsApp"
                    class="w-9 h-9 flex items-center justify-center rounded-full bg-white/10 hover:bg-accent hover:text-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Navigasi --}}
        <div>
            <p class="text-sm font-semibold text-white mb-4 tracking-wide uppercase">Navigasi</p>
            <ul class="space-y-2 text-sm text-white/60">
                <li><a href="{{ route('home') }}" class="hover:text-accent transition-colors">Home</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-accent transition-colors">About</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-accent transition-colors">Contact</a></li>
            </ul>
        </div>

        {{-- Kontak --}}
        <div>
            <p class="text-sm font-semibold text-white mb-4 tracking-wide uppercase">Kontak</p>
            <ul class="space-y-2 text-sm text-white/60">
                <li>Blitar, Jawa Timur</li>
                <li>hello@meowland.id</li>
                <li>+62 812-0000-0000</li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-white/40">
            <p>&copy; {{ date('Y') }} Meowland Pet Shop. All rights reserved.</p>
            <p>Dibuat dengan &hearts; untuk pecinta kucing.</p>
        </div>
    </div>
</footer>