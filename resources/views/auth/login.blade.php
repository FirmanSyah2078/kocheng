<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Meowland</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral text-secondary font-sans min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-8 rounded-2xl shadow border-t-4 border-accent w-full max-w-md">
        <h1 class="font-serif text-3xl text-primary text-center mb-8">Login ke Meowland</h1>

        @if ($errors->any())
            <div class="mb-6 bg-danger/10 text-danger text-sm rounded-xl p-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.attempt') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-secondary mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border border-black/10 focus:ring-2 focus:ring-accent outline-none" placeholder="email@contoh.com">
            </div>
            <div>
                <label class="block text-sm font-semibold text-secondary mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-black/10 focus:ring-2 focus:ring-accent outline-none" placeholder="••••••••">
            </div>
            <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-bold hover:opacity-90 transition">
                Masuk
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-secondary">
            Belum punya akun?
            <a href="{{ route('signup') }}" class="text-accent font-bold hover:underline">Daftar sekarang</a>
        </p>
    </div>
</body>
</html>