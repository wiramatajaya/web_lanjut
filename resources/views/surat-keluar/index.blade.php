@extends('layouts.app')

@section('title', 'Surat Keluar')

@section('header-title', 'Daftar Surat Keluar')

@section('content')
<div class="space-y-6">
    
    <!-- Bagian Heading & Tombol Tambah Surat Keluar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Surat Keluar</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data surat keluar dan arsip dengan mudah.</p>
        </div>


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
                        <th class="py-3 px-4">Tujuan</th>
                        <th class="py-3 px-4">Perihal</th>
                        <th class="py-3 px-4 text-center w-44">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($suratkeluar as $surat)
                        <tr class="hover:bg-red-50/40 transition-colors">
                            <td class="py-3 px-4 text-center font-medium text-gray-500">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 font-semibold text-gray-900">{{ $surat->nomor_surat }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ \Carbon\Carbon::parse($surat->tanggal)->format('d M Y') }}</td>
                            <td class="py-3 px-4 text-gray-800">{{ $surat->tujuan }}</td>
                            <td class="py-3 px-4 text-gray-600 truncate max-w-xs">{{ $surat->perihal }}</td>
                            
                            <!-- Kolom Aksi (Detail, Edit, Hapus) -->
                            <td class="py-3 px-4 text-center">
                                <div class="inline-flex items-center space-x-1.5">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('surat-keluar.show', $surat->id) }}" 
                                       class="px-2.5 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md text-xs font-medium transition-colors"
                                       title="Lihat Detail">
                                        Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('surat-keluar.edit', $surat->id) }}" 
                                       class="px-2.5 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-md text-xs font-medium transition-colors"
                                       title="Edit Surat">
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus / Delete -->
                                    <form method="POST" action="{{ route('surat-keluar.destroy', $surat->id) }}" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat keluar ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-2.5 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 rounded-md text-xs font-medium transition-colors"
                                                title="Hapus Surat">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    <p class="text-sm font-medium">Belum ada data surat keluar.</p>
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