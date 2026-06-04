<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolEvent - @yield('title', 'Beranda')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white min-h-screen flex flex-col font-sans text-gray-800 antialiased">

    {{-- ===== NAVBAR ===== --}}
    <nav class="bg-white border-b-2 border-yellow-300 shadow-sm sticky top-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Brand --}}
                <a href="/" class="flex items-center gap-2 group">
                    <div class="w-8 h-8 bg-yellow-400 rounded-lg flex items-center justify-center shadow-sm group-hover:bg-yellow-500 transition-colors">
                        <span class="text-white font-black text-sm">SE</span>
                    </div>
                    <span class="font-extrabold text-lg text-gray-800 tracking-tight">SchoolEvent</span>
                </a>

                {{-- Desktop Navigation (Center) --}}
                <div class="hidden md:flex items-center gap-1">
                    <a href="/"
                       class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-600 hover:text-yellow-600 hover:bg-yellow-50 transition-all">
                        Home
                    </a>
                    @auth
                        <a href="/dashboard"
                           class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-600 hover:text-yellow-600 hover:bg-yellow-50 transition-all">
                            Dashboard
                        </a>
                        <a href="/events"
                           class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-600 hover:text-yellow-600 hover:bg-yellow-50 transition-all">
                            Manajemen Acara
                        </a>
                    @endauth
                </div>

                {{-- Desktop Right Side --}}
                <div class="hidden md:flex items-center gap-3">
                    @guest
                        <a href="/login"
                           class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-yellow-600 transition-colors">
                            Masuk
                        </a>
                        <a href="/register"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold px-5 py-2 rounded-xl text-sm transition-colors shadow-sm">
                            Daftar
                        </a>
                    @else
                        {{-- User Dropdown --}}
                        <div class="relative" x-data="{ dropdown: false }" @click.outside="dropdown = false">
                            <button @click="dropdown = !dropdown"
                                    class="flex items-center gap-2.5 pl-1 pr-3 py-1 rounded-xl text-gray-700 hover:bg-yellow-50 border border-transparent hover:border-yellow-200 transition-all">
                                <div class="w-8 h-8 bg-yellow-400 rounded-lg flex items-center justify-center shadow-sm">
                                    <span class="text-white font-black text-xs">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                    </span>
                                </div>
                                <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-gray-400 transition-transform duration-200"
                                     :class="dropdown ? 'rotate-180' : ''"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="dropdown"
                                 x-transition:enter="transition ease-out duration-150"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-52 bg-white border border-yellow-200 rounded-2xl shadow-lg py-2 origin-top-right">
                                <div class="px-4 py-2 border-b border-yellow-50 mb-1">
                                    <p class="text-xs text-gray-400 font-medium">Masuk sebagai</p>
                                    <p class="text-sm text-gray-700 font-bold truncate">{{ Auth::user()->name }}</p>
                                </div>
                                <a href="/dashboard"
                                   class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                    </svg>
                                    Panel Admin
                                </a>
                                <div class="border-t border-yellow-100 mt-1 pt-1">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors font-semibold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Keluar / Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>

                {{-- Mobile Menu Toggle Button --}}
                <button @click="open = !open"
                        class="md:hidden p-2 rounded-xl text-gray-500 hover:bg-yellow-50 hover:text-yellow-600 border border-transparent hover:border-yellow-200 transition-all">
                    <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden border-t border-yellow-100 bg-white px-4 pb-5 pt-3 space-y-1">
            <a href="/" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 font-semibold text-sm">Home</a>
            @auth
                <a href="/dashboard" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 font-semibold text-sm">Dashboard</a>
                <a href="/events" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 font-semibold text-sm">Manajemen Acara</a>
            @endauth
            <div class="border-t border-yellow-100 pt-3 mt-2">
                @guest
                    <a href="/login" class="flex items-center justify-center px-4 py-2.5 rounded-xl text-gray-700 hover:bg-yellow-50 font-semibold text-sm border border-gray-200 mb-2">Masuk</a>
                    <a href="/register" class="flex items-center justify-center px-4 py-2.5 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-white font-bold text-sm transition-colors">Daftar</a>
                @else
                    <div class="bg-yellow-50 rounded-xl px-4 py-3 mb-3 border border-yellow-100">
                        <p class="text-xs text-gray-400">Masuk sebagai</p>
                        <p class="text-sm font-bold text-gray-700">{{ Auth::user()->name }}</p>
                    </div>
                    <a href="/dashboard" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-yellow-50 font-semibold text-sm mb-1">Panel Admin</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-red-50 text-red-500 font-bold text-sm hover:bg-red-100 transition-colors">
                            Keluar / Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    {{-- ===== MAIN CONTENT ===== --}}
    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </div>
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-yellow-50 border-t-2 border-yellow-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-yellow-400 rounded-lg flex items-center justify-center">
                        <span class="text-white font-black text-xs">SE</span>
                    </div>
                    <span class="font-extrabold text-gray-700">SchoolEvent</span>
                </div>
                <p class="text-gray-500 text-sm">
                    &copy; 2026 <span class="font-semibold text-gray-600">SMK Plus Pelita Nusantara</span>. All rights reserved.
                </p>
                <div class="flex items-center gap-4 text-sm text-gray-400">
                    <a href="/" class="hover:text-yellow-500 transition-colors">Home</a>
                    @auth
                        <a href="/dashboard" class="hover:text-yellow-500 transition-colors">Dashboard</a>
                    @endauth
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
