<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Sistem Informasi Surat')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans antialiased">

        <div class="flex h-screen overflow-hidden">
            
            <!-- Sidebar -->
            <aside class="w-64 bg-red-300 text-white flex flex-col shadow-xl">
                <!-- Sidebar Header / Logo -->
                <div class="px-6 py-6 border-b border-red-800">
                    <h2 class="text-lg font-bold tracking-wider uppercase text-red-100">
                        SIM Surat
                    </h2>
                    <p class="text-xs text-red-300 mt-1">Sistem Informasi Surat</p>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center px-4 py-3 font-semibold rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-red-800 text-white shadow-md' : 'text-red-200 hover:bg-red-800/50 hover:text-white' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('surat-masuk.index') }}" 
                       class="flex items-center px-4 py-3 font-semibold rounded-lg transition-colors {{ request()->routeIs('surat-masuk.*') ? 'bg-red-800 text-white shadow-md' : 'text-red-200 hover:bg-red-800/50 hover:text-white' }}">
                        Surat Masuk
                    </a>

                    <a href="{{ route('surat-keluar.index') }}" 
                       class="flex items-center px-4 py-3 font-semibold rounded-lg transition-colors {{ request()->routeIs('surat-keluar.*') ? 'bg-red-800 text-white shadow-md' : 'text-red-200 hover:bg-red-800/50 hover:text-white' }}">
                        Surat Keluar
                    </a>
                </nav>

                <!-- Sidebar Footer / User Profile & Logout -->
                @auth
                <div class="p-4 border-t border-red-800 bg-red-950/40">
                    <div class="flex items-center mb-3">
                        <div class="w-9 h-9 rounded-full bg-red-700 flex items-center justify-center text-white font-bold text-sm">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="ml-3 overflow-hidden">
                            <p class="text-xs text-red-300">Masuk sebagai:</p>
                            <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2 text-xs font-semibold uppercase tracking-wider text-red-100 bg-red-800 hover:bg-red-700 rounded-lg transition-colors shadow">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Keluar
                        </button>
                    </form>
                </div>
                @endauth
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col overflow-hidden">
                
                <!-- Top Navbar (Opsional untuk informasi tambahan/header halaman) -->
                <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 z-10">
                    <h1 class="text-xl font-semibold text-gray-800">@yield('header-title', 'Dashboard')</h1>
                    <span class="text-sm text-gray-500">{{ date('d M Y') }}</span>
                </header>

                <!-- Scrollable Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                    @yield('content')
                </main>

                <!-- Footer -->
                <footer class="bg-white border-t border-gray-200 py-4 px-8 text-center text-xs text-gray-500">
                    <p>&copy; {{ date('Y') }} Sistem Informasi Surat. All rights reserved.</p>
                </footer>
            </div>

        </div>

    </body>
</html>
