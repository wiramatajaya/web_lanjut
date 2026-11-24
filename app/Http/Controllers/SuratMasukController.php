<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingLatter;

class SuratMasukController extends Controller{

    public function index()
    {
        $suratmasuk = IncomingLatter::orderBy('id', 'desc')->get();
        return view('surat-masuk.index', compact('suratmasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        IncomingLatter::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil ditambahkan.');
    }

    public function show($id)
    {
        $surat = IncomingLatter::findOrFail($id);
        return view('surat-masuk.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = IncomingLatter::findOrFail($id);
        return view('surat-masuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = IncomingLatter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = IncomingLatter::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil dihapus.');
    }
}
