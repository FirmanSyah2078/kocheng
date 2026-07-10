<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Laravel App' }}</title>
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-900">
    <x-navbar/>
    <main class="grow container mx-auto px-4 py-4">
        {{ $slot }}
    </main>
    <x-footer/>
</body>
</html>
