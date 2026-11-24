@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('header-title', 'Daftar Surat Masuk')

@section('content')
<div class="space-y-6">
    
    <!-- Bagian Heading & Tombol Tambah Surat -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Surat Masuk</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data surat masuk dan arsip dengan mudah.</p>
        </div>

            <a href="{{ route('surat-masuk.create') }}" 
               class="inline-flex items-center justify-center px-4 py-2.5 bg-red-800 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow-md transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Surat
            </a>
    </div>

    <!-- Alert Notifikasi Sukses -->
    @if (session('success'))
        <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-lg shadow-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Card Tabel Data -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-red-900 text-white text-xs uppercase tracking-wider font-semibold">
                        <th class="py-3 px-4 text-center w-16">No</th>
                        <th class="py-3 px-4">Nomor Surat</th>
                        <th class="py-3 px-4">Tanggal</th>
                        <th class="py-3 px-4">Pengirim</th>
                        <th class="py-3 px-4">Perihal</th>
                        <th class="py-3 px-4 text-center w-44">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($suratmasuk as $surat)
                        <tr class="hover:bg-red-50/40 transition-colors">
                            <td class="py-3 px-4 text-center font-medium text-gray-500">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 font-semibold text-gray-900">{{ $surat->nomor_surat }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ \Carbon\Carbon::parse($surat->tanggal)->format('d M Y') }}</td>
                            <td class="py-3 px-4 text-gray-800">{{ $surat->pengirim }}</td>
                            <td class="py-3 px-4 text-gray-600 truncate max-w-xs">{{ $surat->perihal }}</td>
                            
                            <!-- Kolom Aksi (Detail, Edit, Hapus) -->
<!-- Kolom Aksi (Detail, Edit, Hapus) -->
<td class="py-3 px-4 text-center">
    <div class="inline-flex items-center space-x-1.5">
        <!-- Tombol Detail -->
        <a href="{{ route('surat-masuk.show', $surat->id) }}" 
           class="px-2.5 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md text-xs font-medium transition-colors">
            Detail
        </a>

        <!-- Tombol Edit -->
        <a href="{{ route('surat-masuk.edit', $surat->id) }}" 
           class="px-2.5 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-md text-xs font-medium transition-colors">
            Edit
        </a>

        <!-- Tombol Hapus / Delete -->
        <form method="POST" action="{{ route('surat-masuk.destroy', $surat->id) }}" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')" 
                    class="px-2.5 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 rounded-md text-xs font-medium transition-colors">
                Hapus
            </button>
        </form>
    </div>
</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="text-sm font-medium">Belum ada data surat masuk.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection