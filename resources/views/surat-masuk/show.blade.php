@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('header-title', 'Detail Arsip Surat Masuk')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Bagian Header & Tombol Kembali -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Detail Surat Masuk</h1>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap mengenai arsip surat masuk.</p>
        </div>
        <a href="{{ route('surat-masuk.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-lg transition-colors shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- Card Informasi Detail Surat -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Header Card dengan Warna Merah -->
        <div class="bg-red-900 px-6 py-4 text-white flex items-center justify-between">
            <span class="text-xs uppercase tracking-wider font-semibold bg-red-800 px-2.5 py-1 rounded">Informasi Surat</span>
            <span class="text-xs text-red-200">ID Arsip: #{{ $surat->id }}</span>
        </div>

        <!-- Konten Detail -->
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Surat -->
                <div class="space-y-1">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Nomor Surat</span>
                    <p class="text-base font-bold text-gray-900 bg-gray-50 p-3 rounded-lg border border-gray-100">
                        {{ $surat->nomor_surat }}
                    </p>
                </div>

                <!-- Tanggal Surat -->
                <div class="space-y-1">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Tanggal Surat</span>
                    <p class="text-base font-semibold text-gray-800 bg-gray-50 p-3 rounded-lg border border-gray-100">
                        {{ \Carbon\Carbon::parse($surat->tanggal)->format('d F Y') }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pengirim -->
                <div class="space-y-1">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Pengirim</span>
                    <p class="text-base font-semibold text-gray-800 bg-gray-50 p-3 rounded-lg border border-gray-100">
                        {{ $surat->pengirim }}
                    </p>
                </div>

                <!-- Perihal -->
                <div class="space-y-1">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Perihal</span>
                    <p class="text-base font-semibold text-gray-800 bg-gray-50 p-3 rounded-lg border border-gray-100">
                        {{ $surat->perihal }}
                    </p>
                </div>
            </div>

            <!-- Keterangan / Catatan -->
            <div class="space-y-1">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Keterangan Tambahan</span>
                <div class="text-sm text-gray-700 bg-gray-50 p-4 rounded-lg border border-gray-100 min-h-[80px]">
                    {{ $surat->keterangan ?? 'Tidak ada keterangan tambahan.' }}
                </div>
            </div>
        </div>

        <!-- Footer Card dengan Tombol Aksi Cepat (Opsional Edit) -->
        @can('manage-letters')
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
            <a href="{{ route('surat-masuk.edit', $surat->id) }}" 
               class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold rounded-lg shadow transition-colors">
                Edit Surat Ini
            </a>
        </div>
        @endcan
    </div>

</div>
@endsection