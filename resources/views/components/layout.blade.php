<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;

            }
        </style>
    </head>
    <body class="bg-zinc-50">
        <header class="shadow-sm bg-white">
            <div class="max-w-6xl mx-auto py-5 px-10">
                <h1 class="text-lg font-bold">Hub de integrações</h1>
            </div>
        </header>
        <main class="max-w-6xl mx-auto p-10">
            <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
        <footer class="p-5 bg-white text-center -shadow-sm">
            Hub &copy; 2022
        </footer>
    </body>
</html>
