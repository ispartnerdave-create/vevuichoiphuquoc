<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta name="theme-color" content="#08324F" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/app.jsx'])
        <x-inertia::head>
            <title>Vé vui chơi Phú Quốc</title>
        </x-inertia::head>
    </head>
    <body class="min-h-screen antialiased">
        <x-inertia::app />
    </body>
</html>
