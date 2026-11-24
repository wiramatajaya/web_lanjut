@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')

@section('header-title', 'Tambah Arsip Surat Masuk')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <!-- Bagian Header & Tombol Kembali -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Surat Masuk</h1>
            <p class="text-sm text-gray-500 mt-1">Masukkan data arsip surat masuk baru ke dalam sistem.</p>
        </div>
        <a href="{{ route('surat-masuk.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-lg transition-colors shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- Card Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Header Card Merah -->
        <div class="bg-red-900 px-6 py-4 text-white">
            <span class="text-xs uppercase tracking-wider font-semibold bg-red-800 px-2.5 py-1 rounded">Formulir Input Surat</span>
        </div>

        <!-- Form Element -->
        <form action="{{ route('surat-masuk.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Surat -->
                <div class="space-y-1">
                    <label for="nomor_surat" class="block text-xs font-semibold uppercase tracking-wider text-gray-600">Nomor Surat <span class="text-red-600">*</span></label>
                    <input type="text" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}" 
                           placeholder="Contoh: 001/ABC/V/2026"
                           class="w-full px-4 py-2.5 rounded-lg border @error('nomor_surat') border-red-500 bg-red-50/30 @else border-gray-300 focus:border-red-800 @enderror text-sm focus:outline-none focus:ring-2 focus:ring-red-800/20 transition-all">
                    @error('nomor_surat') 
                        <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Tanggal Surat -->
                <div class="space-y-1">
                    <label for="tanggal" class="block text-xs font-semibold uppercase tracking-wider text-gray-600">Tanggal Surat <span class="text-red-600">*</span></label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" 
                           class="w-full px-4 py-2.5 rounded-lg border @error('tanggal') border-red-500 bg-red-50/30 @else border-gray-300 focus:border-red-800 @enderror text-sm focus:outline-none focus:ring-2 focus:ring-red-800/20 transition-all">
                    @error('tanggal') 
                        <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> 
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pengirim -->
                <div class="space-y-1">
                    <label for="pengirim" class="block text-xs font-semibold uppercase tracking-wider text-gray-600">Pengirim <span class="text-red-600">*</span></label>
                    <input type="text" id="pengirim" name="pengirim" value="{{ old('pengirim') }}" 
                           placeholder="Nama instansi / pengirim surat"
                           class="w-full px-4 py-2.5 rounded-lg border @error('pengirim') border-red-500 bg-red-50/30 @else border-gray-300 focus:border-red-800 @enderror text-sm focus:outline-none focus:ring-2 focus:ring-red-800/20 transition-all">
                    @error('pengirim') 
                        <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Perihal -->
                <div class="space-y-1">
                    <label for="perihal" class="block text-xs font-semibold uppercase tracking-wider text-gray-600">Perihal <span class="text-red-600">*</span></label>
                    <input type="text" id="perihal" name="perihal" value="{{ old('perihal') }}" 
                           placeholder="Perihal surat"
                           class="w-full px-4 py-2.5 rounded-lg border @error('perihal') border-red-500 bg-red-50/30 @else border-gray-300 focus:border-red-800 @enderror text-sm focus:outline-none focus:ring-2 focus:ring-red-800/20 transition-all">
                    @error('perihal') 
                        <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> 
                    @enderror
                </div>
            </div>

            <!-- Keterangan Tambahan -->
            <div class="space-y-1">
                <label for="keterangan" class="block text-xs font-semibold uppercase tracking-wider text-gray-600">Keterangan Tambahan</label>
                <textarea id="keterangan" name="keterangan" rows="4" 
                          placeholder="Catatan tambahan atau deskripsi singkat mengenai surat..."
                          class="w-full px-4 py-2.5 rounded-lg border @error('keterangan') border-red-500 bg-red-50/30 @else border-gray-300 focus:border-red-800 @enderror text-sm focus:outline-none focus:ring-2 focus:ring-red-800/20 transition-all">{{ old('keterangan') }}</textarea>
                @error('keterangan') 
                    <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Tombol Aksi Form -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('surat-masuk.index') }}" 
                   class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-red-800 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow-md transition-colors">
                    Simpan Surat
                </button>
            </div>
        </form>
    </div>

</div>
@endsection