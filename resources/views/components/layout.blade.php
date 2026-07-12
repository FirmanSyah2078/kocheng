<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Meowland - Klik, Pesan, Ambil!' }}</title>
</head>
<body class="min-h-screen flex flex-col bg-neutral text-secondary font-sans">
    <x-navbar />

    <main class="grow">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>