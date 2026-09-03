<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post - Workshop Web</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen flex flex-col">

    <!-- Header / Navbar -->
    <header class="border-b border-slate-800 bg-slate-950/50 backdrop-blur sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="font-mono font-bold text-lg text-indigo-400">Laravel MVC App</h1>
            <span class="text-xs font-medium px-3 py-1 rounded-full bg-slate-800 text-slate-400 border border-slate-700">
                Workshop Pengembangan Website
            </span>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-6 py-10 flex-grow w-full">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Daftar Post Praktikum</h2>
            <p class="text-slate-400 mt-2 text-sm">Data di bawah ini dipanggil secara dinamis dari Controller dan Model Laravel.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($posts as $post)
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-xl hover:border-indigo-500 transition-all duration-300">
                    <h3 class="text-xl font-bold text-indigo-300 mb-2">{{ $post->title }}</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">{{ $post->content }}</p>
                </div>
            @empty
                <div class="col-span-full bg-slate-800/30 border border-slate-700 p-8 rounded-xl text-center">
                    <p class="text-slate-400">Belum ada data post. (Pastikan data sudah diinput atau dipanggil dari Controller).</p>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800 py-6 text-center text-xs text-slate-500">
        &copy; 2026 Practical Web Development - JTI Polije
    </footer>

</body>
</html>
