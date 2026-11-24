@extends('layouts.app')

@section('title', 'Dashboard')

@section('header-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    
    <!-- Welcome Banner / Hero Section -->
    <div class="bg-gradient-to-r from-red-900 to-red-800 rounded-2xl shadow-md p-6 sm:p-8 text-white flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
        <div class="space-y-2">
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight">Selamat Datang, {{ Auth::user()->name ?? 'Test User' }}! 👋</h1>
            <p class="text-red-100 text-sm sm:text-base max-w-xl">
                Sistem Informasi Surat (SIM Surat) membantu Anda mengelola arsip surat masuk dan surat keluar dengan lebih mudah, cepat, dan terstruktur.
            </p>
        </div>
        <div class="bg-white/10 backdrop-blur-md px-4 py-3 rounded-xl border border-white/20 text-center shrink-0">
            <span class="block text-xs uppercase tracking-wider text-red-200 font-medium">Tanggal Hari Ini</span>
            <span class="text-lg font-semibold text-white">{{ \Carbon\Carbon::now()->format('d M Y') }}</span>
        </div>
    </div>

    <!-- Statistik / Shortcut Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Card Surat Masuk -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div class="space-y-1">
                    <h2 class="text-lg font-bold text-gray-800">Surat Masuk</h2>
                    <p class="text-sm text-gray-500">Kelola dan pantau arsip wira kikuk hihu surat masuk instansi.</p>
                </div>
                <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                </div>
            </div>
            
            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Akses Cepat</span>
                <a href="{{ route('surat-masuk.index') }}" 
                   class="inline-flex items-center text-sm font-semibold text-red-800 hover:text-red-700 transition-colors">
                    Kelola Surat Masuk
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Card Surat Keluar -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div class="space-y-1">
                    <h2 class="text-lg font-bold text-gray-800">Surat Keluar</h2>
                    <p class="text-sm text-gray-500">Kelola dan pantau arsip surat keluar instansi.</p>
                </div>
                <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </div>
            </div>
            
            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Akses Cepat</span>
                <a href="{{ route('surat-keluar.index') }}" 
                   class="inline-flex items-center text-sm font-semibold text-red-800 hover:text-red-700 transition-colors">
                    Kelola Surat Keluar
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

    </div>

</div>
@endsection