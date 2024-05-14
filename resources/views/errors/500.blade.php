<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="h-screen w-screen flex items-center justify-center bg-gradient-to-br from-red-300 to-blue-200">
        <div class="flex flex-col gap-y-10 p-10 rounded-lg shadow-2xl bg-white">
            <h1 class="text-6xl font-bold text-center">500 Internal Server Error</h1>
            <p class="text-xl font-medium">Maaf, terjadi kesalahan pada program kami. Mohon coba kembali lagi nanti.</p>
            <a href="/"><button class="px-4 py-3 text-lg bg-blue-500 hover:bg-blue-400 rounded-lg text-white w-full font-medium">Kembali</button></a>
        </div>
    </div>
</body>
</html>
