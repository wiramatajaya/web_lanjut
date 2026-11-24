@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('header-title', 'Edit Surat Masuk')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Bagian Heading & Tombol Kembali -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Surat Masuk</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui informasi data surat masuk dengan benar.</p>
        </div>
        <a href="{{ route('surat-masuk.index') }}" 
           class="inline-flex items-center justify-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-lg transition-colors duration-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- Card Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden p-6 sm:p-8">
        <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nomor Surat -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Surat</label>
                    <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" 
                           class="w-full px-4 py-2.5 rounded-lg border @error('nomor_surat') border-red-500 bg-red-50/20 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-900 focus:outline-none text-sm text-gray-800"
                           placeholder="Masukkan nomor surat...">
                    @error('nomor_surat') 
                        <span class="text-xs text-red-600 mt-1.5 block font-medium">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Tanggal Surat -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}" 
                           class="w-full px-4 py-2.5 rounded-lg border @error('tanggal') border-red-500 bg-red-50/20 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-900 focus:outline-none text-sm text-gray-800">
                    @error('tanggal') 
                        <span class="text-xs text-red-600 mt-1.5 block font-medium">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Pengirim -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pengirim</label>
                    <input type="text" name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" 
                           class="w-full px-4 py-2.5 rounded-lg border @error('pengirim') border-red-500 bg-red-50/20 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-900 focus:outline-none text-sm text-gray-800"
                           placeholder="Nama instansi/pengirim...">
                    @error('pengirim') 
                        <span class="text-xs text-red-600 mt-1.5 block font-medium">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Perihal -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Perihal</label>
                    <input type="text" name="perihal" value="{{ old('perihal', $surat->perihal) }}" 
                           class="w-full px-4 py-2.5 rounded-lg border @error('perihal') border-red-500 bg-red-50/20 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-900 focus:outline-none text-sm text-gray-800"
                           placeholder="Perihal surat...">
                    @error('perihal') 
                        <span class="text-xs text-red-600 mt-1.5 block font-medium">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <!-- Keterangan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan (Opsional)</label>
                <textarea name="rows="4" name="keterangan" 
                          class="w-full px-4 py-2.5 rounded-lg border @error('keterangan') border-red-500 bg-red-50/20 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-900 focus:outline-none text-sm text-gray-800"
                          placeholder="Tambahkan keterangan tambahan jika ada...">{{ old('keterangan', $surat->keterangan) }}</textarea>
                @error('keterangan') 
                    <span class="text-xs text-red-600 mt-1.5 block font-medium">{{ $message }}</span> 
                @enderror
            </div>

            <!-- Tombol Aksi Form -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                <a href="{{ route('surat-masuk.index') }}" 
                   class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-red-800 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow-md transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection